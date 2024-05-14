<?php

require './core/Config.php';

class ConfigController extends Config
{

    private string $url;
    private array $urlArray;
    private string $urlController;
    private string $urlMetodo;
    private string $urlParameter;


    public function __construct()
    {
        $this->configAdm();
        if (!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))) {
            $this->url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);
            var_dump($this->url);
            $this->urlArray = explode("/", $this->url);
            var_dump($this->urlArray);

            if (isset($this->urlArray[0])) {
                $this->urlController = $this->urlArray[0];
            } else {
                $this->urlController = CONTROLLER;
            }

            if (isset($this->urlArray[1])) {
                $this->urlMetodo = $this->urlArray[1];
            } else {
                $this->urlMetodo = METODO;
            }

            if (isset($this->urlArray[2])) {
                $this->urlParameter = $this->urlArray[2];
            } else {
                $this->urlParameter = "";
            }
        } else {
            $this->urlController = CONTROLLERERRO;
            $this->urlMetodo = METODO;
            $this->urlParameter = "";
        }
        echo "Controller: {$this->urlController} <br>";
        echo "Metodo: {$this->urlMetodo} <br>";
        echo "Paramentro: {$this->urlParameter} <br>";
    }
     public function loadPage() {
         require './app/adms/Controllers/Login.php';
         $login=new Login();
         $login->index();

         require'./app/adms/Controllers/Users.php';
         $users=new Users();
         $users->index();
     }
}
