<?php

namespace Shreenivask\Messaging\Models;

class Twilio
{
    protected static $sid = null;

    protected static $token = null;

    protected static $from = null;

    public function __construct($sid, $token, $from)
    {
        self::$sid = $sid;
        self::$token = $token;
        self::$from = $from;
    }

    public static function getSid()
    {
        return self::$sid;
    }

    public static function getToken()
    {
        return self::$token;
    }

    public static function getFrom()
    {
        return self::$from;
    }
}