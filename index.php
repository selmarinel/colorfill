<?php

require __DIR__ . '/vendor/autoload.php';

class TEST
{
    use \ColorFill\Notices;

}
$lipsum = new joshtronic\LoremIpsum();
$a = new TEST();
$text = $a->colored("something", "red");
$a->log($text);
//$a->countdown(0,1, "please wait","bar");
$a->success("SUCCESS");
$a->warning("SUCCESS");
$a->error("SUCCESS");
$a->counts("Find Tasks",23);
$a->log("Some some Some");
$a->info("Some some Some");
$a->exception( $lipsum->words(20));
$a->warningNotice( $lipsum->words(20));
$a->infoNotice( $lipsum->words(20));
$a->successNotice( $lipsum->words(20));
$a->info("Some some Some");
//$a->countdown(0,1);
//$a->countdown(0,1, "please wait","points");
