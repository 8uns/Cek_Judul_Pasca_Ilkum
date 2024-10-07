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
        // include 'pdfparser-master/alt_autoload.php';

        // // Parse PDF file and build necessary objects.
        // $parser = new \Smalot\PdfParser\Parser();

        // $pdf = $parser->parseFile($_FILES['document']['tmp_name']);
        // // .. or ...
        // // $pdf = $parser->parseContent(file_get_contents($_FILES['document']['tmp_name']));
        // // Mengambil semua halaman
        // $pages = $pdf->getPages();
        // $text = '';

        // // Loop melalui setiap halaman untuk mengumpulkan teks
        // foreach ($pages as $page) {
        //     $text .= $page->getText() . "\n"; // Menambahkan newline untuk memisahkan halaman
        // }

        // // // Memisahkan teks per paragraf
        // // $paragraphs = preg_split('/\n\s*\n/', $text); // Memisahkan berdasarkan newline ganda

        // // // Menampilkan hasil
        // // foreach ($paragraphs as $paragraph) {
        // //     echo trim($paragraph) . "\n\n"; // Menampilkan paragraf dengan jarak antar paragraf
        // //     echo "<br>";
        // //     echo "<br>";
        // // }

        // // Memisahkan teks berdasarkan newline ganda
        // $paragraphs = preg_split('/\n\s*\n/', $text);

        // // Menyiapkan array untuk menyimpan paragraf terpisah
        // $final_paragraphs = [];

        // // Kondisi untuk mengenali judul
        // foreach ($paragraphs as $paragraph) {
        //     $lines = explode("\n", $paragraph); // Memisahkan berdasarkan newline

        //     foreach ($lines as $line) {
        //         $line = trim($line);
        //         if (!empty($line)) {
        //             // Pola untuk mengenali judul dengan atau tanpa angka
        //             if (
        //                 preg_match('/^\d+\.\s+[A-Z]+(?:\s+[A-Z]+)*$/', $line) ||  // Judul dengan huruf kapital seluruhnya dan angka di depan
        //                 preg_match('/^\d+\.\s+[A-Z][a-z]+(?:\s+[A-Z][a-z]+)*$/', $line) || // Judul dengan kapital di awal dan angka di depan
        //                 preg_match('/^[A-Z]+(?:\s+[A-Z]+)*$/', $line) || // Judul tanpa angka dengan huruf kapital seluruhnya
        //                 preg_match('/^[A-Z][a-z]+(?:\s+[A-Z][a-z]+)*$/', $line) || // Judul tanpa angka dengan kapital di awal
        //                 preg_match('/^[A-Z][a-z]+\s*:\s*$/', $line)
        //             ) { // Judul dengan tanda titik dua, seperti "Kata Kunci:"

        //                 // Pisahkan judul dari deskripsi jika ada teks setelah judul
        //                 $matches = [];
        //                 if (
        //                     preg_match('/^(\d+\.\s+[A-Z]+(?:\s+[A-Z]+)*)\s+(.*)$/', $line, $matches) || // Judul dengan angka di depan
        //                     preg_match('/^([A-Z]+(?:\s+[A-Z]+)*)\s+(.*)$/', $line, $matches) || // Judul tanpa angka dan kapital seluruhnya
        //                     preg_match('/^([A-Z][a-z]+(?:\s+[A-Z][a-z]+)*)\s+(.*)$/', $line, $matches)
        //                 ) { // Judul tanpa angka dan kapital di awal

        //                     $judul = $matches[1]; // Bagian judul
        //                     $deskripsi = $matches[2]; // Bagian deskripsi

        //                     $final_paragraphs[] = "\n\n" . $judul; // Tambahkan judul sebagai paragraf baru
        //                     $final_paragraphs[] = $deskripsi; // Tambahkan deskripsi sebagai paragraf terpisah
        //                 } else {
        //                     $final_paragraphs[] = "\n\n" . $line; // Tambahkan judul tanpa deskripsi
        //                 }
        //             } else {
        //                 // Jika bukan judul, tambahkan ke paragraf sebelumnya
        //                 if (!empty($final_paragraphs)) {
        //                     $final_paragraphs[count($final_paragraphs) - 1] .= " " . $line;
        //                 } else {
        //                     $final_paragraphs[] = $line;
        //                 }
        //             }
        //         }
        //     }
        // }

        // // Menampilkan hasil
        // foreach ($final_paragraphs as $paragraph) {
        //     echo trim($paragraph) . "\n\n"; // Menampilkan paragraf dengan jarak antar paragraf
        //     echo "<br>";
        //     echo "<br>";
        // }




        $filename = md5($_FILES['document']['name'] . date('m/d/Y h:i:s a', time()));
        print_r($_FILES);
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
            if ($this->model('Paper_model')->addData($_POST, $upload) > 0) {
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
            if ($this->model('Paper_model')->updateData($_POST, $id, $upload) > 0) {
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
