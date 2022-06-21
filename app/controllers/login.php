<?php

class Login extends Controller
{
     public function index($nim = "0702193197", $jurusan = "Sistem Informasi", $judul = "Home")
     {
          $data["user"]       = $this->model("User_model")->getUser();

          $this->view("templates/header", $data);
          $this->view("login/index", $data);
     }

     function login()
     {
          if ($this->model("Login_model")->login($_POST) > 0) {
               Flasher::setFlash('Berhasil', 'Login', 'success');
               header("Location: " . BASEURL . "/home");
               exit;
          } else {
               Flasher::setFlash('Gagal', 'Login', 'danger');
               header("Location: " . BASEURL . "/login");
               exit;
          }
     }

     function logout()
     {
          session_destroy();
          header('location: index');
          exit;
     }
}
