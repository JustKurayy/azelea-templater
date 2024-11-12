<?php
namespace Azelea\Templater;
use Azelea\Core\Session;

/**
 * Returns the session stored flashes into html
 */
class Flashes {
    static function getFlashes(string $styles) {
        $flashes = [];
        //checks if the templater is a standalone or bundled
        if (class_exists(\Azelea\Core\Core::class)) {
            $session = Session::getSessionKey('flashes'); 
        } else {
            $session = $_SESSION['flashes'];
        }
        if ($session == null) return ""; //fallback
        // \Azelea\Core\Core::dd($session);
        foreach ($session as $flash) {
            \Azelea\Core\Core::dd($session);
            array_push($flashes, "<div class='".str_replace("'", "", stripcslashes($styles))." alert-".$flash['type']."'>".$flash['message']."</div>");
        }
        return implode("", $flashes);
    }
}
