<?php
/**
 * Created by PhpStorm.
 * User: selma
 * Date: 21.08.2017
 * Time: 17:17
 */

namespace ColorFill;


trait Informer
{
    use Colors;

    public function run()
    {
        return $this->colored(" RUN ","white","blue");
    }

    public function res()
    {
        return $this->colored(" RES ","white","light-green");
    }

    public function err()
    {
        return $this->colored(" ERR ","white","light-red");
    }

    public function out()
    {
        return $this->colored(" OUT ","white","green");
    }
}