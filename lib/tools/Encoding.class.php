<?php

class Encoding
{
    public static function base64EncodeUrlsafe($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); // equals sign is just for padding, can be safely removed
    }

    public static function base64DecodeUrlsafe($data)
    {
        return base64_decode(strtr($data, '-_', '+/')); // dont worry about replacing equals sign
    }

    public static function base58Encode($byteString)
    {
        $alphabet = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
        return static::convertBase($byteString, join('', array_map('chr', range(0, 255))), $alphabet);
    }

    protected static function convertBase($numberInput, $sourceAlphabet, $targetAlphabet)
    {
        if ($sourceAlphabet == $targetAlphabet) {
            return $numberInput;
        }

        $decimalAlphabet = '0123456789';

        $fromBase = str_split($sourceAlphabet);
        $toBase   = str_split($targetAlphabet);
        $number   = str_split($numberInput);

        $fromLen   = strlen($sourceAlphabet);
        $toLen     = strlen($targetAlphabet);
        $numberLen = strlen($numberInput);

        if ($targetAlphabet == $decimalAlphabet) {
            $decimal = 0;
            for ($i = 1; $i <= $numberLen; $i++) {
                $decimal = bcadd($decimal, bcmul(array_search($number[$i - 1], $fromBase), bcpow($fromLen, $numberLen - $i)));
            }
            return $decimal;
        }

        $base10 = $sourceAlphabet == $decimalAlphabet ? $numberInput : static::convertBase($numberInput, $sourceAlphabet, $decimalAlphabet);

        if ($base10 < strlen($targetAlphabet)) {
            return $toBase[$base10];
        }

        $retval = '';
        while ($base10 != '0') {
            $retval = $toBase[bcmod($base10, $toLen)] . $retval;
            $base10 = bcdiv($base10, $toLen, 0);
        }

        return $retval;
    }
}
