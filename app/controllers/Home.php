<?php
class Home extends Controller
{
    public function index()
    {
        $data['judul'] = 'Pascasarjaan Program Studi Ilmu Hukum';
        // $data['gambar'] = 'img/img';



        $this->view('templates/head-template', $data);
        $this->view('templates/header-template', $data);
        $this->view('fitur/home', $data);

        $this->view('templates/footer-template');
        $this->view('templates/foot-template');
    }

    public function staff()
    {
        $data['judul'] = 'Pascasarjaan Program Studi Ilmu Hukum';
        // $data['gambar'] = 'img/img';



        $this->view('templates/head-template', $data);
        $this->view('templates/header-template', $data);
        $this->view('fitur/staff', $data);

        $this->view('templates/footer-template');
        $this->view('templates/foot-template');
    }

    public function about()
    {
        $data['judul'] = 'Pascasarjaan Program Studi Ilmu Hukum';
        // $data['gambar'] = 'img/img';



        $this->view('templates/head-template', $data);
        $this->view('templates/header-template', $data);
        $this->view('fitur/about', $data);

        $this->view('templates/footer-template');
        $this->view('templates/foot-template');
    }

    public function contact()
    {
        $data['judul'] = 'Pascasarjaan Program Studi Ilmu Hukum';
        // $data['gambar'] = 'img/img';


        $this->view('templates/head-template', $data);
        $this->view('templates/header-template', $data);
        $this->view('fitur/contact', $data);

        $this->view('templates/footer-template');
        $this->view('templates/foot-template');
    }

    public function cektitle()
    {
        $data['judul'] = 'Pascasarjaan Program Studi Ilmu Hukum';
        // $data['gambar'] = 'img/img';


        $this->view('templates/head-template', $data);
        $this->view('templates/header-template', $data);
        $this->view('fitur/cektitle', $data);

        $this->view('templates/footer-template');
        $this->view('templates/foot-template');
    }

    public function searchtitle()
    {
        // var_dump($_POST);
        $data['judul_dicari'] = $_POST['title'];
        $paper = $this->model('Paper_model')->getPapersAll();
        if ($paper > 0) {
            $lengtSearch = strlen($_POST['title']);
            foreach ($paper as $key => $papers) {
                $jarak = $this->model('Search_model')->levenshteinDistance($_POST['title'], $papers['title']);
                if ($jarak <= ($lengtSearch / 2)) {
                    $data['judulmirip'][$key]['title'] = $papers['title'];
                }
            }

            foreach ($paper as $key => $papers) {
                $resultBM = $this->model('Search_model')->boyerMoore($papers['title'], $_POST['title']);
                if ($resultBM != -1) {
                    $data['judulmirip'][$key]['title'] = $papers['title'];
                }
            }

            if (!isset($data['judulmirip'])) {
                Flasher::setFlash('Pencarian Selesai. </br>', 'Tidak ditemukan judul <b>"' . $data['judul_dicari'] . '"</b> atau yang mirip didalam database.', 'success');
                header('Location: ' . BASEURL . 'home/cektitle');
                exit;
            } else {
                Flasher::setFlash('Pencarian Selesai. </br>', 'Judul <b>"' . $data['judul_dicari'] . '"</b> ditemukan memiliki kemiripan dengan beberapa judul penelitian.', 'warning');
                // $data['judul'] = 'dashboard';
                // $data['gambar'] = 'img/img';
                // $data['papers'] = $this->model('Paper_model')->getPapersAll();
                $data['judul'] = 'Pascasarjaan Program Studi Ilmu Hukum';

                $this->view('templates/head-template', $data);
                $this->view('templates/header-template', $data);
                $this->view('fitur/cektitle', $data);

                $this->view('templates/footer-template');
                $this->view('templates/foot-template');
            }
        } else {
            Flasher::setFlash('Pencarian Selesai', 'basis data karya ilmiah kosong', 'success');
            header('Location: ' . BASEURL . 'home/cektitle');
            exit;
        }
    }
}
