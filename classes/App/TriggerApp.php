<?php

namespace Classes\App;

class TriggerApp
{
    private const TRIGGER = "trigger";
    public const SUCCESS = "success";
    public const ERROR = "error";
    public const WARNING = "warning";

    private static $message;
    private static $errorType;
    private static $error;

    public static function show($message, $errorType = null)
    {
        self::setError($message, $errorType);
        echo self::$error;
    }

    public static function push($message, $errorType = null)
    {
        self::setError($message, $errorType);
        return self::$error;
    }

    private static function setError ($message, $errorType)
    {
        $reflexion = new \ReflectionClass(__CLASS__);
        $errorTypes = $reflexion->getConstants();

        self::$message = $message;
        self::$errorType = (!empty($errorType) || in_array($errorType, $errorTypes) ? "{$errorType}" : "");
        self::$error = "<p class='". self::TRIGGER . " " .self::$errorType . "'>". self::$message ."</p>";
    }
}