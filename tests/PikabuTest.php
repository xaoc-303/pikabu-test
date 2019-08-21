<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use Pikabu20\Interview\JobSeeker;

/**
 * Class PikabuTest
 *
 * @example php vendor/bin/phpunit -c . tests/PikabuTest.php
 */
class PikabuTest extends TestCase
{
    public function testAssert1()
    {
        $this->assertTrue(
            strpos(JobSeeker::class, "Pikabu20\\") === 0
            && array_slice(explode("\\", get_class(new JobSeeker)), 1, 1) === ["Interview"]
            && substr_count(JobSeeker::class, "\\") === 2
        );
    }

    public function testAssert2()
    {
        $this->assertTrue(
            (string)new JobSeeker() === JobSeeker::class
        );
    }

    public function testAssert3()
    {
        date_default_timezone_set("Europe/Moscow");
        $inst = new JobSeeker();
        $this->assertTrue(
            isset($inst->{$d = date("\\t\u{0064}", 0x1da569b8fd)})
            && empty($inst->$d)
            && !is_string($inst->$d)
            && !is_bool($inst->$d)
            && !is_array($inst->$d)
            && $inst->$d !== 0
            && ($inst->$d | 1) === 1
        );
    }

    public function testAssert4()
    {
        $inst = new JobSeeker();
        $this->assertTrue(
            $inst instanceof \ArrayAccess
            && $inst instanceof \Countable
            && !$inst instanceof \OuterIterator
            && !$inst instanceof \Serializable
            && method_exists($inst, "getSize")
        );
    }

    public function testAssert5()
    {
        $this->assertTrue(
            preg_match(
                "@зовут (?<n>[^,]+), мне (?<a>.+) и я из (?<c>.+)$@",
                (new JobSeeker())->getWelcomeText("Меня зовут %name%, мне %age% и я из %city%"),
                $match
            ) > 0
            && preg_match("#^[A-Я][-а-яё]+ [A-Я]\.$#u", $match["n"]) > 0
            && preg_match("/^[1-5][0-9] (года?|лет)$/", $match["a"]) > 0
            && preg_match("%^(г|д|п)\. [A-Я][-A-ЯЁa-zа-яё ]+$%i", $match["c"]) > 0
        );
    }

    public function testAssert6()
    {
        $inst = new JobSeeker();
        $this->assertTrue(
            count($inst) >= 5
            && in_array("git", (array)$inst, true)
            && in_array("php", (array)$inst, true)
        );
    }
}
