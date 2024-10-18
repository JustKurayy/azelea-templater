<?php
namespace Azelea\Core;
use Azelea\Core\Standard\Controller;
use Azelea\Core\Database\DatabaseManager;

class HomeController extends Controller {
    public function home(DatabaseManager $db) {
        $user = new Users();
        $form = $this->buildForm(LoginForm::class);

        if ($form->submitForm()) {
            $user->setEmail($form->getData("email"));
            $user->setPassword($form->getData("password"));
            $user->setUsername('testuser');
            $db->parse($user);
            $db->push();
            return $this->routeToUri("/");
        }

        $personf = $db->getModel(Persons::class, 28);
        Core::dd(["1", "2", [0, 1, "person" => $personf]]);

        return $this->render("home.loom.php", [
            'form' => $form,
            'items' => ["1", "2", "2"]
        ]);
    }
}
