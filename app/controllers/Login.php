<?php
class Login extends Controller
{
    public function index()
    {
        $data['judul'] = 'Login';
        $this->view('templates/head', $data);
        $this->view('templates/headerfront');
        $this->view('templates/login');
        // $this->view('templates/footer');
        $this->view('templates/foot');

    }

    public function loggedin($user)
    {
        if ($this->model('Login_model')->login($user, $_POST)) {
            header('Location: ' . BASEURL);
            exit;
        } else {
            if ($user == 'admin') {
                Flasher::setFlash('Failed', 'The username or password you entered is wrong', 'danger');
                header('Location: ' . BASEURL . 'admin');
                exit;
            } else {
                Flasher::setFlash('Failed', 'The username or password you entered is wrong', 'danger');
                header('Location: ' . BASEURL . 'login');
                exit;
            }
        }
    }

}
