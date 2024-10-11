# Azelea Templater

### What is this repo?
This templater library is for the core of the lightweight PHP framework named Azelea. Can be used as standalone.

### How do I run this?
This repo is for the composer package, which you can install 
with ```composer require azelea/templater```.

You are not required to use the Azelea Framework to use the templater.
There are two things you need to do to load this.
 1. You need to create the Loom class and call the render function
    - An example:
        ```php
        $loom = new Loom($data);
        return $loom->render($view);
        ```

### How do I contribute to this?
Currently I have no idea if others can contribute to this repo. If you can, any help is appreciated. You can also contribute to the azelea-core repo in my profile.
