<?php
/**
 * Created by PhpStorm.
 * User: selma
 * Date: 19.07.2017
 * Time: 19:37
 */

namespace ColorFill\CountDown\Types;


class PointsType extends AbstractType implements TypeInterface
{
    protected $template = ".";

    public function get($count)
    {
        $result = "";
        for($i=1;$i<=$count;$i++)
        {
            $result.=$this->template;
        }
        return $result;
    }
}