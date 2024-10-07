<?php
class Profil extends Controller
{

    public function index()
    {

        $data['judul'] = 'profil';
        $data['gambar'] = 'img/img';
        $data['nama'] = $_SESSION['name'];

        $this->view('templates/head', $data);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        if ($_SESSION['level'] == 0) {
            $data['profile'] = $this->model('Profil_model')->getProfAdmin($_SESSION['user_id']);
            $this->view('profil/admin', $data);
        } else {
            $data['profile'] = $this->model('Profil_model')->getProfil($_SESSION['user_id']);
            $this->view('profil/index', $data);
        }
        $this->view('templates/foot');
    }

    public function ubahAdmin($id)
    {
        if ($this->model('Profil_model')->ubahDataProfilAdmin($_POST, $id) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . 'profil/admin');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . 'profil/admin');
            exit;
        }
    }


    public function ubah($id)
    {
        if ($_SESSION['level'] > 1) {
            if ($this->model('Mhs_model')->updatemhs($_POST, $id) > 0) {
                Flasher::setFlash('berhasil', 'diubah', 'success');
                header('Location: ' . BASEURL . 'profil');
                exit;
            } else {
                Flasher::setFlash('gagal', 'diubah', 'danger');
                header('Location: ' . BASEURL . 'profil');
                exit;
            }
        } elseif ($_SESSION['level'] == 0) {
            if ($this->model('Administrator_model')->ubahDataAdministrator($_POST, $id, true) > 0) {
                Flasher::setFlash('berhasil', 'diubah', 'success');
                header('Location: ' . BASEURL . 'profil');
                exit;
            } else {
                Flasher::setFlash('gagal', 'diubah', 'danger');
                header('Location: ' . BASEURL . 'profil');
                exit;
            }
        }
    }
}
