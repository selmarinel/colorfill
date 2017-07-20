<?php

namespace ColorFill;

use ColorFill\CountDown\Types\NumbersType;
use ColorFill\CountDown\Types\TypeInterface;

trait Notices
{
    use Colors;

    public function __call($name, $arguments)
    {
        return $this->_default();
    }

    private function _default()
    {
        return "";
    }

    public function timed($inline = false)
    {
        print_r($this->colored("[" . date("Y-m-d H:i:s") . "]" . ((!$inline)?"\n":""), "light_purple"));
    }

    public function log($sting)
    {
        print_r($this->timeStamp("light_purple") . $this->colored("$sting\n"));
    }

    public function success($string)
    {
        print_r($this->timeStamp("light_purple") . $this->colored("$string\n", "light_green"));
    }

    public function warning($string)
    {
        print_r($this->timeStamp("light_purple") . $this->colored("$string\n", "yellow"));
    }

    public function error($string)
    {
        print_r($this->timeStamp("light_purple") . $this->colored("$string\n", "light_red"));
    }

    public function info($string)
    {
        print_r($this->timeStamp("light_purple") . $this->colored("$string\n", "light_blue"));
    }

    public function counts($string, $count, $color = "white", $secondColor = "light_cyan", $bgColor = "", $secondBgColor = "")
    {
        $countString = $this->colored($count, $secondColor, $secondBgColor) . $this->colored("", $color, $bgColor, true);
        print_r($this->timeStamp("light_purple") . sprintf($this->colored($string . " [%s]", $color, $bgColor), $countString) . "\n");
    }

    private $digits = 100;

    public function notice($string, $color = "", $bgColor = "", $notice = "Notice")
    {
        $length = mb_strlen($string);
        $counts = ($length < $this->digits) ? $length : $this->digits;
        $counts = ($counts < mb_strlen($notice) + 2) ? mb_strlen($notice) + 2 : $counts;
        print_r("\n");

        for ($i = 0; $i < round(($counts - mb_strlen($notice)) / 2); $i++) {
            print_r($this->colored("*", $color, $bgColor));
        }
        print_r($this->colored($notice, $color, $bgColor));
        for ($i = 0; $i < round(($counts - mb_strlen($notice)) / 2); $i++) {
            print_r($this->colored("*", $color, $bgColor));
        }
        print_r("\n");

        if (mb_stripos($color, "light") !== false) {
            $noticeColor = mb_substr($color, 6);
        } else {
            $noticeColor = "light_$color";
        }
        print_r($this->colored(wordwrap($string, $this->digits, "\n"), $noticeColor, $bgColor));
        print_r("\n");
        for ($i = 1; $i <= $counts; $i++) {
            print_r($this->colored("*", $color, $bgColor));
        }

        print_r("\n");
    }

    public function exception($string)
    {
        $this->notice($string, "red", "", "Exception");
    }

    public function warningNotice($string)
    {
        $this->notice($string, "yellow", "", "Warning");
    }

    public function infoNotice($string)
    {
        $this->notice($string, "light_blue", "", "Info");
    }

    public function successNotice($string)
    {
        $this->notice($string, "light_green", "", "Success");
    }

    public function countdown($from, $to, $add = "", $type = "numbers")
    {
        if (class_exists(__NAMESPACE__ . "\CountDown\Types\\" . ucfirst($type) . "Type")) {
            $typeClass = __NAMESPACE__ . "\CountDown\Types\\" . ucfirst($type) . "Type";
        } else {
            $typeClass = NumbersType::class;
        }
        /** @var TypeInterface $pointerEntity */
        $pointerEntity = new $typeClass();
        if ($type === "bar") {
            $pointerEntity->config(["max" => $to]);
        }

        if ($from < $to) {
            for ($i = $from; $i <= $to; $i++) {
                print_r($this->colored("\r$add " . $pointerEntity->get($i)));
                sleep(1);
            }
        }
        print_r("\n");
    }
}