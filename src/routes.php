<?php
namespace Azelea\Core;
use Azelea\Core\Standard\Router;

class Routes extends Router {
    public function __construct() {
        $this->addRoute(["GET", "POST"], "/", "HomeController::home");
        $this->addRoute(["GET", "POST"], "/login", "SecurityController::login");
        $this->addRoute(["GET"], "/api/v1", "ApiController::v1intro");
        $this->load();
    }
}
