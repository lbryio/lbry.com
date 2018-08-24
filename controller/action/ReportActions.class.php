<?php

class ReportActions extends Actions
{
    public static function executeDmca()
    {
        Response::setHeader(Response::HEADER_CROSS_ORIGIN, "*");
        if (!Request::isPost()) {
            return ['report/dmca'];
        }

        $values = [];
        $errors = [];

        foreach (['name', 'email', 'rightsholder', 'identifier'] as $field) {
            $value = Request::getPostParam($field);

            if (!$value) {
                $errors[$field] = __('form_error.required');
            } elseif ($field == 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
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

        return ['report/dmca', ['errors' => $errors, 'values' => $values]];
    }
}
