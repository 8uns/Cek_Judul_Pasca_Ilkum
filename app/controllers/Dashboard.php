<?php
class Dashboard extends Controller
{
    public function index()
    {
        $data['judul'] = 'dashboard';
        $data['gambar'] = 'img/img';
        $data['papers'] = $this->model('Paper_model')->getPapersAll();

        $this->view('templates/head', $data);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('fitur/dashboard', $data);

        // $this->view('templates/footer');
        $this->view('templates/foot');
    }

    public function cekjudul()
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
                header('Location: ' . BASEURL);
                exit;
            } else {
                $data['papersresult'] = $this->model('Paper_model')->getPapersResultTitle($data['judulmirip']);
                Flasher::setFlash('Pencarian Selesai. </br>', 'Judul <b>"' . $data['judul_dicari'] . '"</b> ditemukan memiliki kemiripan dengan beberapa judul penelitian.', 'warning');
                $data['judul'] = 'dashboard';
                $data['gambar'] = 'img/img';
                // $data['papers'] = $this->model('Paper_model')->getPapersAll();
                $this->view('templates/head', $data);
                $this->view('templates/header', $data);
                $this->view('templates/sidebar', $data);
                $this->view('fitur/dashboard', $data);
                $this->view('templates/foot');
            }
        } else {
            Flasher::setFlash('Pencarian Selesai', 'basis data karya ilmiah kosong', 'success');
            header('Location: ' . BASEURL);
            exit;
        }
    }
}
