<?php
namespace Azelea\Core;

class TestForm extends Forms {
    public function __construct() {
        $form = [
            "testinput" => [
                "type" => "text",
                "name" => "TestField",
                "classes" => "form-control",
            ],
            "submitbtn" => [
                "type" => "submit",
                "name" => "Test",
                "classes" => "btn border",
            ],
        ];

        $this->generateFields($form);
    }
}
