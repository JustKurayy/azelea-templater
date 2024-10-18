<?php
namespace Azelea\Core;

class LoginForm extends Forms {
    public function init() {
        $form = [
            "email" => [
                "type" => "email",
                "name" => "email",
                "classes" => "mb-2",
                "options" => [
                    "wrapped" => "hello", //needs to be implemented. wraps the field in a div
                    "required" => true,
                ],
            ],
            "password" => [
                "type" => "password",
                "name" => "password",
                "classes" => "mb-2",
                "options" => [
                    "required" => true,
                ]
            ],
            "submitbtn" => [
                "type" => "submit",
                "name" => "Enter",
                "classes" => "btn border-fuchsia-50 mt-2",
            ],
        ];

        $this->generateFields($form);
    }
}
