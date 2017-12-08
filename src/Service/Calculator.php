<?php
/**
 * Created by PhpStorm.
 * User: itnrw
 * Date: 08.12.17
 * Time: 15:23
 */

namespace App\Service;


class Calculator
{
    public function add(int $a, int $b)
    {
        return $a + $b;
    }

    public function sub(int $a, int $b)
    {
        return $a - $b;
    }
}
