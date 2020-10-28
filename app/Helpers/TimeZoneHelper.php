<?php
use CodeIgniter\I18n\Time;

if(!function_exists('setDefaultTimeZone')) {
    function setDefaultTimeZone() {
        date_default_timezone_set('UTC');
    }
}

if(!function_exists('getUserTimeZoneByCountryCode')) {
    function getUserTimeZoneByCountryCode($countryCode) {
        $timezone = \DateTimeZone::listIdentifiers(\DateTimeZone::PER_COUNTRY, $countryCode);
        return $timezone;
    }
}

if(!function_exists('setUserTimeZone')) {
    function setUserTimeZone($timezone) {
        date_default_timezone_set($timezone);
    }
}