<?php
namespace Azelea\Templater;
use \Azelea\Core\Core; //incase Azelea\Core exists, use the Core:error() function

class Locales {
    private $dir;
    private $locales;

    public function __construct() {
        $dir = substr(dirname(__DIR__), 0, strpos(dirname(__DIR__), "\\vendor\\")); //grabs the root dir path
        $this->dir = $dir;
    }

    /**
     * Configures the language for the templater to seek.
     * @param string $lang
     * @return mixed
     */
    public function chooseLanguage(string $lang) {
        try {
            if (!file_exists($this->dir . "\\locales\\$lang.json")) throw new \Exception();
            $locale = file_get_contents($this->dir . "\\locales\\".$lang.".json");
            $this->locales = json_decode($locale, true);
        } catch (\Exception $e) {
            if (class_exists(Core::class)) { //calls the error UI incase Core exists
                Core::error($e);
            }
        }
    }

    /**
     * Grabs the localization key from the json.
     * @param string $key
     */
    public function getLocale(string $key): string {
        if (array_key_exists($key, $this->locales)) return $this->locales[$key];
        return ""; //fallback incase the key doesn't exist
    }
}
