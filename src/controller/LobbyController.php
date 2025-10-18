<?php

class LobbyController
{
    private $model;

    private $renderer;

    public function __construct($model, $renderer)
    {
        $this->model = $model;
        $this->renderer = $renderer;
    }

    public function base()
    {
        $this->renderer->render("lobby");
        $this->redirectIfNotAdmin();
    }



    private function redirectIfNotAdmin()
    {
        if (!$this->estaLogueado())
            $this->redirectToIndex();
    }

    private function redirectToIndex()
    {
        header("Location:/pregUnlam/src/login/login");
        exit();
    }

    private function estaLogueado(): bool
    {
        return isset($_SESSION["usuario"]);
    }
}
