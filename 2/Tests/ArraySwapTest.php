<?php

namespace App\Classes;

use PHPUnit\Framework\TestCase;

/**
 * Class ArraySwapTest
 * @package App\Classes
 */
class ArraySwapTest extends TestCase
{
    /**
     * @param array $expected
     * @param array $arr
     * @param int $pos
     * @dataProvider providerArray_swap
     */
    public function testArray_swap(array $expected, array $arr, int $pos)
    {
        self::assertSame($expected, Second::array_swap($arr, $pos));
    }

    /**
     * @return array[]
     */
    public function providerArray_swap(): array
    {
        return [
            [[], [], 0],
            [[1], [1], 1],
            [[1, 1], [1, 1], 1],
            [[1, 2, 3], [2, 1, 3], 1],
            [[2, 6, 3], [3, 6, 2], 2],
            [[4, 5, 8, 9, 1, 7, 2], [2, 5, 8, 9, 1, 7, 4], 6]
        ];
    }

    /**
     * @param array $expected
     * @param array $arr
     * @dataProvider providerHandle
     */
    public function testHandle(array $expected, array $arr)
    {
        self::assertSame($expected, Second::handle($arr));
    }

    /**
     * @return array[]
     */
    public function providerHandle(): array
    {
        return [
            [[], []],
            [[1], [1]],
            [[1, 2], [1, 2]],
            [[1, 2, 3], [1, 2, 3]],
            [[1, 2, 4], [1, 4, 2]],
            [[1, 2, 4, 5, 7, 8, 9,], [4, 5, 8, 9, 1, 7, 2]],
        ];
    }
}
