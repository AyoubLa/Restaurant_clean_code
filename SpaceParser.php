<?php
/**
 * Created by PhpStorm.
 * User: SQLI
 * Date: 08/03/2019
 * Time: 14:18
 */

namespace Restaurant;


class SpaceParser implements ParserString
{
    public function parser($StringEntry)
    {
        return explode(' ', $StringEntry);
    }
}