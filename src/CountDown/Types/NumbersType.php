<?php
/**
 * Created by PhpStorm.
 * User: selma
 * Date: 19.07.2017
 * Time: 19:47
 */

namespace ColorFill\CountDown\Types;


class NumbersType extends AbstractType implements TypeInterface
{
    public function get($count)
    {
        return $count;
    }
}