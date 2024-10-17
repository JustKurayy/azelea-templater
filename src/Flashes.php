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
            $session = new Session();
            $session = $session->get('flashes'); 
        } else {
            $session = $_SESSION['flashes'];
        }
        if ($session == null) return ""; //fallback
        foreach ($session as $flash) {
            array_push($flashes, "<div class='".str_replace("'", "", stripcslashes($styles))." alert-".$flash['type']."'>".$flash['message']."</div>");
        }
        return implode("", $flashes);
    }
}
