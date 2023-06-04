<?php

namespace JsonCoverter\Helpers;

class FrontHelpers
{
    public static function formatCase($sValue)
    {
        return mb_strtolower(preg_replace("/([A-Z])/u", '-$1', $sValue));
    }
}