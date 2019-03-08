<?php

namespace Restaurant;


final class DoubleDotParser implements ParserString
{
    private static $instance;

    private function __construct()
    {
    }

    public static function getInstance(): DoubleDotParser
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function parser($StringEntry)
    {
        //ok
        return explode(': ', $StringEntry);
    }
}