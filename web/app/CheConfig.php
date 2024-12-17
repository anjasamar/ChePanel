<?php

namespace App;

class CheConfig
{
    public static function get($key, $default = null)
    {
        // Parse without sections
        $configIni = base_path() . "/che-config.ini";
        if (file_exists($configIni)) {
            $iniArray = parse_ini_file($configIni);
            if (isset($iniArray[$key])) {
                return $iniArray[$key];
            }
        }

        return $default;
    }

    public static function getAll()
    {
        // Parse without sections
        $configIni = base_path() . "/che-config.ini";
        if (file_exists($configIni)) {
            $iniArray = parse_ini_file($configIni);
            return $iniArray;
        }

        return [];
    }
}
