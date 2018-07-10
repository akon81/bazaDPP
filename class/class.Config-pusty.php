<?php
/**
 * Klasa z danymi konfiguracyjnymi
 *
 * @author Konrad Adamczyk
 *
 */ 
class Config {
    private static $array = array();
     
    public static function set($name, $value) {
        self::$array[$name]=$value;
    }
    public static function get($name) {
        return self::$array[$name];
    }
    public static function exist($name) {
        return isset(self::$array[$name]);
    }
}
ini_set('display_errors','off');
//baza danych
Config::set("DB_DSN", "mysql:host=localhost;dbname=nazwa_bazy");
Config::set("DB_NAME", "nazwa_bazy");
Config::set("DB_HOST", "localhost");
Config::set("DB_USER", "user");
Config::set("DB_PASS", "haslo");

// strona
Config::set("ROOT_DIR", "/baza/");
Config::set("HTML_TITLE", "ETC DPP - rejestr numerów prac niezwiązanych");
Config::set("PHOTO_PATH", "pliki/upload/");
Config::set("THUMB_MAX_WIDTH", "382");
Config::set("THUMB_MAX_HEIGHT", "287");

// poczta
Config::set("SMTP_HOST", "");
Config::set("SMTP_USERNAME", "");
Config::set("SMTP_PASS", "");
Config::set("SMTP_FROM", "");
Config::set("SMTP_FROMNAME", "");
Config::set("ADMIN_EMAIL", "");

?>