<?php

class ReportActions extends Actions
{

    /**
     * Handles all routing requests without a claimId as parameter.
     * E.g. /dmca
     *
     * @return array
     * @throws Exception
     */
    public static function executeDmca() {

        self::setResponseHeader();
        self::redirectIfPostRequest(false, '');

        $values = [];
        $errors = [];

        self::validateForm($values, $errors);

        return ['report/dmca', [
            'errors' => $errors,
            'values' => $values
        ]];
    }

    /**
     * Handles all routing requests with a claimId as routing parameter since the used router doesn't support optional parameters.
     * E.g. /dmca/this-is-a-claim-id
     *
     * @param string $claimId
     *
     * @return array
     * @throws Exception
     */
    public static function executeDmcaWithClaimId(string $claimId): array {

        $claimId = htmlspecialchars($claimId);

        self::setResponseHeader();
        self::redirectIfPostRequest(true, $claimId);

        $values = [];
        $errors = [];

        self::validateForm($values, $errors);

        return ['report/dmca', [
            'errors' => $errors,
            'values' => $values,
            'claimId' => $claimId
        ]];
    }

    /**
     * @param array $values
     * @param array $errors
     *
     * @return array
     * @throws Exception
     */
    private static function validateForm(array $values, array $errors)
    {

        foreach (['name', 'email', 'rightsholder', 'identifier'] as $field) {
            $value = Request::getPostParam($field);

            if (!$value) {
                $errors[$field] = __('form_error.required');
            } elseif ($field === 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                $errors[$field] = __('form_error.invalid');
            }

            $values[$field] = $value;
        }

        if (!$errors) {
            $values['report_id'] = Encoding::base58Encode(random_bytes(6));
            Mailgun::sendDmcaReport($values);
            Session::setFlash('success', '<h3>Report Submitted</h3><p>We will respond shortly.</p><p>This ID for this report is <strong>' . $values['report_id'] . '</strong>. Please reference this ID when contacting us regarding this report.</p>');
            return Controller::redirect(Request::getRelativeUri(), 303);
        }

    }

    /**
     * Sets the response header.
     */
    private static function setResponseHeader()
    {
        Response::setHeader(Response::HEADER_CROSS_ORIGIN, "*");
    }

    /**
     * Chooses the right template according to passed variables.
     *
     * @param bool   $hasClaimId
     * @param string $claimId
     *
     * @return array
     */
    private static function redirectIfPostRequest(bool $hasClaimId = false, string $claimId = '') {

        if ($hasClaimId && !empty($claimId)) {
            $returnValue = ['report/dmca', ['claimId' => $claimId]];
        } else {
            $returnValue = ['report/dmca'];
        }

        if (!Request::isPost()) {
            return $returnValue;
        }
    }
}
