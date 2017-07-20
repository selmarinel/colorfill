<?php

namespace ColorFill;


trait TimeLogs
{
    public function timeStamp($color = "", $bgColor = "")
    {
        return $this->colored(date("[Y-m-d H:i:s] "), $color, $bgColor);
    }
}