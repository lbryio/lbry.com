<?php

/**
 * SMAZ - compression for very small strings
 *
 * https://github.com/zhenhao/smaz.php (PHP port of https://github.com/antirez/smaz)
 *
 * <pre>Smaz is a simple compression library for compressing very short
 * strings. General purpose compression libraries will build the state needed
 * for compressing data dynamically, in order to be able to compress every kind
 * of data. This is a very good idea, but not for a specific problem: compressing
 * small strings will not work.</pre>
 */
class Smaz
{
    const CODEBOOK_DEFAULT = 'default';
    const CODEBOOK_EMAIL   = 'email';

    const VERBATIM_CHAR = 254;
    const VERBATIM_STR  = 255;

    protected static $encodeBooks = [];
    protected static $decodeBooks = [
    self::CODEBOOK_DEFAULT => [
      " ", "the", "e", "t", "a", "of", "o", "and", "i", "n", "s", "e ", "r", " th",
      " t", "in", "he", "th", "h", "he ", "to", "\r\n", "l", "s ", "d", " a", "an",
      "er", "c", " o", "d ", "on", " of", "re", "of ", "t ", ", ", "is", "u", "at",
      "   ", "n ", "or", "which", "f", "m", "as", "it", "that", "\n", "was", "en",
      "  ", " w", "es", " an", " i", "\r", "f ", "g", "p", "nd", " s", "nd ", "ed ",
      "w", "ed", "http://", "for", "te", "ing", "y ", "The", " c", "ti", "r ", "his",
      "st", " in", "ar", "nt", ",", " to", "y", "ng", " h", "with", "le", "al", "to ",
      "b", "ou", "be", "were", " b", "se", "o ", "ent", "ha", "ng ", "their", "\"",
      "hi", "from", " f", "in ", "de", "ion", "me", "v", ".", "ve", "all", "re ",
      "ri", "ro", "is ", "co", "f t", "are", "ea", ". ", "her", " m", "er ", " p",
      "es ", "by", "they", "di", "ra", "ic", "not", "s, ", "d t", "at ", "ce", "la",
      "h ", "ne", "as ", "tio", "on ", "n t", "io", "we", " a ", "om", ", a", "s o",
      "ur", "li", "ll", "ch", "had", "this", "e t", "g ", "e\r\n", " wh", "ere",
      " co", "e o", "a ", "us", " d", "ss", "\n\r\n", "\r\n\r", "=\"", " be", " e",
      "s a", "ma", "one", "t t", "or ", "but", "el", "so", "l ", "e s", "s,", "no",
      "ter", " wa", "iv", "ho", "e a", " r", "hat", "s t", "ns", "ch ", "wh", "tr",
      "ut", "/", "have", "ly ", "ta", " ha", " on", "tha", "-", " l", "ati", "en ",
      "pe", " re", "there", "ass", "si", " fo", "wa", "ec", "our", "who", "its", "z",
      "fo", "rs", ">", "ot", "un", "<", "im", "th ", "nc", "ate", "><", "ver", "ad",
      " we", "ly", "ee", " n", "id", " cl", "ac", "il", "</", "rt", " wi", "div",
      "e, ", " it", "whi", " ma", "ge", "x", "e c", "men", ".com"
    ],
    self::CODEBOOK_EMAIL   => [ // WARNING: only add to the end, or existing compressions will be messed up
      // single chars
      'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
      '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', '_', '+', '.', '@',
      // common domains
      '@gmail', '@hotmail', '@yahoo', '@comcast', '@aol', '@msn', '@live', '@verizon', '@me', '@shaw', '@outlook', '@gmx',
      // common TLDs
      '.com', '.net', '.edu', '.org', '.ca', '.de', '.fr', '.org', '.au', '.ru',
      // top 100 two-letter combos (local part only)
      'an','er','ar','on','in','ma','le','en','el','ri','ch','re','ll','ha','ra','al','st','li','ne','te','la','at','is','he','ro','am',
      'es','or','th','ke','ic','nd','il','ie','be','da','de','na','mi','as','so','ng','co','ck','n.','sh','ca','se','nn','tt','ol','ni',
      'sa','ti','me','ac','to','ey','et','ea','ho','br','ns','ia','rt','ee','it','jo','lo','ta','e.','ka','ad','ja','ur','ba','im','nt',
      'ge','au','sc','mo','os','ss','vi','hi','ul','rd','em','rs','pa','ki','ve','us','wa','do','ga','ry','a.','rr',
      // top 50 three-letter combos (local part only)
      'and','son','ell','man','ill','cha','ste','mar','ris','ter','han','ann','ing','lle','the','lin','ich','che','lan','har','ber','all',
      'her','ton','ick','dan','lli','mat','ale','att','ard','an.','ric','ers','art','ran','ley','ani','ren','ine','ath','tin','sha','der',
      'car','nne','nic','ian','nie','dav','bit',
      // common four-letter combos (local part only)
      'chri','andr','john','matt','davi','drew','icha','stin','mich','nder','illi','elle','will','rian','bert',
      'ryan','anie','rick','alex','ster','nson','ande','coin',
    ]
  ];

    protected static function getEncodeBook($codebook)
    {
        if (!isset(static::$encodeBooks[$codebook])) {
            static::$encodeBooks[$codebook] = array_flip(static::getDecodeBook($codebook));
        }
        return static::$encodeBooks[$codebook];
    }

    protected static function getDecodeBook($codebook)
    {
        if (!static::$decodeBooks[$codebook]) {
            throw new Exception('decodebook ' . $codebook . ' does not exist');
        }
        if (count(static::$decodeBooks[$codebook]) > static::VERBATIM_CHAR) {
            throw new Exception('decodebook ' . $codebook . ' must be at most ' . static::VERBATIM_CHAR . 'entries');
        }
        return static::$decodeBooks[$codebook];
    }


    /**
     * @param string $str
     * @param string $codebook
     *
     * @return string
     */
    public static function encode($str, $codebook = self::CODEBOOK_DEFAULT)
    {
        $encodeBook = static::getEncodeBook($codebook);

        $inLen      = strlen($str);
        $inIdx      = 0;
        $output     = '';
        $verbatim   = '';
        $maxItemLen = max(array_map('strlen', array_keys($encodeBook)));

        while ($inIdx < $inLen) {
            $encode = false;

            for ($j = min($maxItemLen, $inLen - $inIdx); $j > 0; $j--) {
                $code = isset($encodeBook[substr($str, $inIdx, $j)]) ? $encodeBook[substr($str, $inIdx, $j)] : null;
                if ($code !== null) {
//          echo substr($str, $inIdx, $j) . " = $code\n";
                    if (strlen($verbatim)) {
                        $output .= static::flushVerbatim($verbatim);
                        $verbatim = '';
                    }
                    $output .= chr($code);
                    $inIdx += $j;
                    $encode = true;
                    break;
                }
            }

            if (!$encode) {
//        echo "VERBATIM\n";
                $verbatim .= $str[$inIdx];
                $inIdx++;
                if (strlen($verbatim) == 255) { // any longer, and we can't represent the length as a single char
                    $output .= static::flushVerbatim($verbatim);
                    $verbatim = '';
                }
            }
        }

        if (strlen($verbatim)) {
            $output .= static::flushVerbatim($verbatim);
        }
        return $output;
    }

    /**
     * @param string $str
     * @param string $codebook
     *
     * @return string
     */
    public static function decode($str, $codebook = self::CODEBOOK_DEFAULT)
    {
        $decodeBook = static::getDecodeBook($codebook);

        $output = '';
        $i      = 0;

        while ($i < strlen($str)) {
            $code = ord($str[$i]);
            if ($code == static::VERBATIM_CHAR) {
                $output .= $str[$i + 1];
                $i += 2;
            } elseif ($code == static::VERBATIM_STR) {
                $len = ord($str[$i + 1]);
                $output .= substr($str, $i + 2, $len);
                $i += 2 + $len;
            } elseif (!isset($decodeBook[$code])) {
                return null; // decode error. throw exception?
            } else {
                $output .= $decodeBook[$code];
                $i++;
            }
        }
        return $output;
    }

    protected static function flushVerbatim($verbatim)
    {
        $output = '';
        if (!strlen($verbatim)) {
            return $output;
        }

        if (strlen($verbatim) > 1) {
            $output .= chr(static::VERBATIM_STR);
            $output .= chr(strlen($verbatim));
        } else {
            $output .= chr(static::VERBATIM_CHAR);
        }
        $output .= $verbatim;
        return $output;
    }
}
