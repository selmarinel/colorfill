<?php

namespace ColorFill\CountDown\Types;


interface TypeInterface
{
    public function get($count);

    public function config(array $params);
}