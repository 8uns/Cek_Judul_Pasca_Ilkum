<?php
class Papers extends Controller
{

    public function index()
    {
        $data['judul'] = 'papers';
        $data['gambar'] = 'img/img';
        $data['nama'] = $_SESSION['name'];

        $this->view('templates/head', $data);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);

        $data['papers'] = $this->model('Paper_model')->getPapersAll($_SESSION['user_id']);
        $this->view('fitur/papers', $data);
        $this->view('templates/foot');
    }


    public function file($file_name)
    {
        echo $file_name;

        $data['judul'] = 'papers';

        $this->view('templates/head', $data);

        $this->readPdf($file_name, $data);
        // $this->view('templates/foot');
    }

    public function create()
    {



        $filename = md5($_FILES['document']['name'] . date('m/d/Y h:i:s a', time()));
        // print_r($_FILES);
        $upload = Bunlib::UploadFileTo('document', "file/", $filename,  ['pdf'], 5120000, '', 0755);
        if ($upload == 'empty') {
            $upload = '';
            if ($this->model('Paper_model')->addData($_POST, $upload) > 0) {
                Flasher::setFlash('berhasil', '', 'success');
                header('Location: ' . BASEURL . 'papers');
                exit;
            } else {
                Flasher::setFlash('gagal', '', 'danger');
                header('Location: ' . BASEURL . 'papers');
                exit;
            }
        } elseif ($upload == 'ext') {
            Flasher::setFlash('Failed', 'format file harus pdf.', 'danger');
            header('Location: ' . BASEURL . 'pelaporandurk');
            exit;
        } elseif ($upload == 'oversize') {
            Flasher::setFlash('Failed', 'maksimum file 2Mb', 'danger');
            header('Location: ' . BASEURL . 'pelaporandurk');
            exit;
        } elseif ($upload == 'failed') {
            Flasher::setFlash('Failed', 'gagal upload file', 'danger');
            header('Location: ' . BASEURL . 'pelaporandurk');
            exit;
        } else {

            try {
                // Create an API client instance.
                $client = new \Pdfcrowd\PdfToTextClient("demo", "ce544b6ea52a5621fb9d55f8b542d14d");

                // Run the conversion and save the result to a file.
                $client->convertFileToFile("file/$upload", "file/paperekstrak.txt");
            } catch (\Pdfcrowd\Error $why) {
                error_log("Pdfcrowd Error: {$why}\n");
                throw $why;
            }
            $tekspaper = file_get_contents("file/paperekstrak.txt", true);

            if ($this->model('Paper_model')->addData($_POST, $upload, $tekspaper) > 0) {
                Flasher::setFlash('berhasil', '', 'success');
                header('Location: ' . BASEURL . 'papers');
                exit;
            } else {
                Flasher::setFlash('gagal', '', 'danger');
                header('Location: ' . BASEURL . 'papers');
                exit;
            }
        }
    }


    public function update($id)
    {
        $filename = md5($_FILES['document']['name'] . date('m/d/Y h:i:s a', time()));
        $upload = Bunlib::UploadFileTo('document', "file/", $filename,  ['pdf'], 5120000, '', 0755);
        if ($upload == 'empty') {
            if ($this->model('Paper_model')->updateData($_POST, $id, $upload) > 0) {
                Flasher::setFlash('berhasil', '', 'success');
                header('Location: ' . BASEURL . 'papers');
                exit;
            } else {
                Flasher::setFlash('gagal', '', 'danger');
                header('Location: ' . BASEURL . 'papers');
                exit;
            }
        } elseif ($upload == 'ext') {
            Flasher::setFlash('Failed', 'format file harus pdf.', 'danger');
            header('Location: ' . BASEURL . 'pelaporandurk');
            exit;
        } elseif ($upload == 'oversize') {
            Flasher::setFlash('Failed', 'maksimum file 2Mb', 'danger');
            header('Location: ' . BASEURL . 'pelaporandurk');
            exit;
        } elseif ($upload == 'failed') {
            Flasher::setFlash('Failed', 'gagal upload file', 'danger');
            header('Location: ' . BASEURL . 'pelaporandurk');
            exit;
        } else {
            try {
                // Create an API client instance.
                $client = new \Pdfcrowd\PdfToTextClient("demo", "ce544b6ea52a5621fb9d55f8b542d14d");

                // Run the conversion and save the result to a file.
                $client->convertFileToFile("file/$upload", "file/paperekstrak.txt");
            } catch (\Pdfcrowd\Error $why) {
                error_log("Pdfcrowd Error: {$why}\n");
                throw $why;
            }
            $tekspaper = file_get_contents("file/paperekstrak.txt", true);

            if ($this->model('Paper_model')->updateData($_POST, $id, $upload, $tekspaper) > 0) {
                Flasher::setFlash('berhasil', '', 'success');
                header('Location: ' . BASEURL . 'papers');
                exit;
            } else {
                Flasher::setFlash('gagal', '', 'danger');
                header('Location: ' . BASEURL . 'papers');
                exit;
            }
        }

        // if ($this->model('Paper_model')->updateData($_POST, $id) > 0) {
        //     // Flasher::setFlash('berhasil', '', 'success');
        //     // header('Location: ' . BASEURL . 'papers');
        //     exit;
        // } else {
        //     // Flasher::setFlash('gagal', '', 'danger');
        //     // header('Location: ' . BASEURL . 'papers');
        //     exit;
        // }
    }

    public function delete($id)
    {
        if ($this->model('Paper_model')->deleteData($id) > 0) {
            Flasher::setFlash('berhasil', '', 'success');
            header('Location: ' . BASEURL . 'papers');
            exit;
        } else {
            Flasher::setFlash('gagal', '', 'danger');
            header('Location: ' . BASEURL . 'papers');
            exit;
        }
    }
}
