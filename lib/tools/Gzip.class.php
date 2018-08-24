<?php

class Gzip
{
    public static function compressFile($source, $level = 1)
    {
        $compressedPath  = $source . '.gz';
        $mode  = 'wb' . $level;

        $fpOut = gzopen($compressedPath, $mode);
        if (!$fpOut) {
            return false;
        }

        $fpIn = fopen($source, 'rb');
        $error = false;
        if ($fpIn) {
            while (!feof($fpIn)) {
                gzwrite($fpOut, fread($fpIn, 1024 * 512));
            }
            fclose($fpIn);
        } else {
            $error = true;
        }

        gzclose($fpOut);

        return $error ? false : $compressedPath;
    }
}
