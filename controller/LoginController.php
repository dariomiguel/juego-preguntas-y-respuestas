<?php

class LoginController
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
        $this->login();
    }

    public function loginForm()
    {
        $this->renderer->render("login");
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
            $password = isset($_POST["password"]) ? $_POST["password"] : "";

            $resultado = $this->model->getUserWith($usuario, $password);

            if (sizeof($resultado) > 0) {
                $_SESSION["usuario"] = $_POST["usuario"];
                $this->redirectToIndex();
            } else {
                $this->renderer->render("login", ["error" => "Usuario o clave incorrecta"]);
            }
        } else {
            $this->renderer->render("login");
        }
    }

    public function logout()
    {
        session_destroy();
        $this->redirectToIndex();
    }

    public function redirectToIndex()
    {
        header("Location:/pregUnlam/lobby/lobby");
        exit;
    }

}