<?php

namespace ColorFill\CountDown\Types;

class BarType extends AbstractType implements TypeInterface
{

    public function config(array $params)
    {
        if (isset($params["max"])) {
            $this->finish = $params["max"];
        }
        if (isset($params["min"])) {
            $this->start = $params["min"];
        }
    }

    public function get($count)
    {
        return $this->generateBar($count);
    }

    private $finish = 10;
    private $start = 0;

    const DIGITS = 100;

    private function generateBar($count = 0)
    {
        $result = "";
        if ($count) {
            for ($i = 1; $i <= round($count * $this->constant()); $i++) {
                $result .= "█";
            }
        }

        for ($i = $count; $i < (self::DIGITS - round($count * $this->constant())); $i++) {
            $result .= "▒";
        }
        return $result;
    }

    private function constant()
    {
        return ($this->finish) ? self::DIGITS / $this->finish : 1;
    }
}