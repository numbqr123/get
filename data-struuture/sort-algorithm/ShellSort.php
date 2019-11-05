<?php


class ShellSort
{
    public static function shellSortArray(array $arr):array
    {
        if (!is_array($arr)) {
            return ['message' => '必须传入数组比较排序'];
        }

        $count = count($arr);//得到数组的个数

        //如果数组的个数小于等于1就直接返回
        if ($count <= 1) {
            return $arr;
        }

        //$gap 是每次减半的分组，直到只可以分为一组结束，在php里面需要注意，两个整数相除，除不尽的情况下，得到的是一个浮点数，不是一个向下
        //取整的的整数，所以在最后判断gap 退出循环的时候，需要判断它 >= 1
        for ($gap = $count / 2; $gap >= 1; $gap /= 2) {
            for ($i = $gap; $i < $count; $i++) {
                for ($j = $i - $gap; $j >= 0; $j-=$gap) {
                    if ($arr[$j] > $arr[$j+$gap]) {//这个地方是比较第一个数和它的步长做比较，交换也是一样
                        $temp = $arr[$j];
                        $arr[$j] = $arr[$j+$gap];
                        $arr[$j+$gap] = $temp;
                    }
                }
            }
        }
        return $arr;
    }

    public static function testShellOne(array $data)
    {
        $temp = 0;
        $count = count($data);
        for ($i = 5; $i < $count; $i++) {
            for ($j = $i - 5; $j >= 0; $j-=5) {
                if ($data[$j] > $data[$j+5]) {
                    $temp = $data[$j];
                    $data[$j] = $data[$j+5];
                    $data[$j+5] = $temp;
                }
            }
        }

        for ($i = 2; $i < $count; $i++) {
            for ($j = $i - 2; $j >= 0; $j-=2) {
                if ($data[$j] > $data[$j+2]) {
                    $temp = $data[$j];
                    $data[$j] = $data[$j+2];
                    $data[$j+2] = $temp;
                }
            }
        }

        for ($i = 1; $i < 10; $i++) {
            for ($j = $i - 1; $j >= 0; $j-=1) {
                if ($data[$j] > $data[$j+1]) {
                    $temp = $data[$j];
                    $data[$j] = $data[$j+1];
                    $data[$j+1] = $temp;
                }
            }
        }

        var_dump($data);
    }
}

var_dump(ShellSort::shellSortArray([9,6,1,3,0,5,7,2,8,4]));
