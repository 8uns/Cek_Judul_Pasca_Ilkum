<?php
class Controller
{
    protected function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }

    protected function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }

    protected function readPdf($file_name, $data = [])
    {

        // Header content type 
        header('Content-type: application/pdf');

        header('Content-Disposition: inline; filename="' . $file_name . '"');

        header('Content-Transfer-Encoding: binary');

        header('Accept-Ranges: bytes');

        // Read the file 
        @readfile('../public/file/' . $file_name);
    }
}
