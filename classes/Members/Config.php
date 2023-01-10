<?php

namespace classes\Members;

class Config
{
    public const COMPANY = "Fratelli";
    protected const DOMAIN = "fratelliti.com.br";
    private const SECTOR = "Desenvolvimento";

    public static $company;
    public static $domain;
    public static $sector;

    public static function setConfig($company, $domain, $sector) {
        self::$company = $company;
        self::$domain = $domain;
        self::$sector = $sector;
    }

}