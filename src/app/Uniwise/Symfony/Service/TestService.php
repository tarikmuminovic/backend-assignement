<?php
namespace Uniwise\Symfony\Service;

class TestService {
    public function helloWorld() {
        var_dump($_SERVER);
        return "hello world";
    }
}