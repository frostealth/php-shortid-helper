<?php

namespace frostealth\Helpers;

/**
 * Class ShortId
 *
 * @package frostealth\Helpers
 */
class ShortId
{
    /**
     * @var array
     */
    private static $digits = [
        '0' => 0, '1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7,
        '8' => 8, '9' => 9, 'q' => 10, 'w' => 11, 'e' => 12, 'r' => 13, 't' => 14, 'y' => 15,
        'u' => 16, 'i' => 17, 'o' => 18, 'p' => 19, 'a' => 20, 's' => 21, 'd' => 22, 'f' => 23,
        'g' => 24, 'h' => 25, 'j' => 26, 'k' => 27, 'l' => 28, 'z' => 29, 'x' => 30, 'c' => 31,
        'v' => 32, 'b' => 33, 'n' => 34, 'm' => 35, 'Q' => 36, 'W' => 37, 'E' => 38, 'R' => 39,
        'T' => 40, 'Y' => 41, 'U' => 42, 'I' => 43, 'O' => 44, 'P' => 45, 'A' => 46, 'S' => 47,
        'D' => 48, 'F' => 49, 'G' => 50, 'H' => 51, 'J' => 52, 'K' => 53, 'L' => 54, 'Z' => 55,
        'X' => 56, 'C' => 57, 'V' => 58, 'B' => 59, 'N' => 60, 'M' => 61,
    ];

    /**
     * @param integer $id
     *
     * @return string
     */
    public static function encode($id)
    {
        $id = intval($id);
        $digits = array_keys(static::$digits);
        $code = '';

        do {
            $dig = $id % 62;
            $code = $digits{$dig} . $code;
            $id = floor($id / 62);
        } while ($id != 0);

        return $code;
    }

    /**
     * @param string $code
     *
     * @return integer
     */
    public static function decode($code)
    {
        $id = 0;
        $codeLen = strlen($code);

        for ($i = 0; $i < $codeLen; $i++) {
            $id += static::$digits[$code{$codeLen - $i - 1}] * pow(62, $i);
        }

        return $id;
    }
}
 