<?php

namespace App\Classes;


/**
 * Class arraySwap
 */
class Second
{
    /**
     * @param array $arr
     * @param int $pos
     * @return array
     */
    public static function array_swap(array $arr, int $pos): array
    {
        if (!count($arr)) {
            return [];
        }
        if (!isset($arr[$pos])) {
            return $arr;
        }

        list($arr[0], $arr[$pos]) = [$arr[$pos], $arr[0]];
        return $arr;
    }

    /**
     * @param array $arr
     * @return array
     */
    public static function handle(array $arr): array
    {
        $lenArray = count($arr);
        if ($lenArray === 1) {
            return $arr;
        }

        $iteration = 0;

        while ($iteration < $lenArray) {
            foreach ($arr as $index => $value) {
                $firstElem = $arr[0];
                if ($firstElem === $value) {
                    continue;
                }

                $nextAfterIndex = $lenArray + 1 - $iteration;
                if ($index < $nextAfterIndex && $value > $firstElem) {
                    $arr = self::array_swap($arr, $index);
                }
            }
            $arr = self::array_swap($arr, $lenArray - $iteration);
            $iteration++;
        }
        return $arr;
    }
}