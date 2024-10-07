<?php

class Bunlib
{
    public static function UploadFileTo($namepost, $location, $filename = null, $extend = ['pdf'], $size = 10240000, $folder = null,  $permission = 0777)
    {
        if ($filename == null) {
            $filename = $_FILES[$namepost]['name'];
        }
        $pisah = explode(".", $_FILES[$namepost]['name']);
        $exFile = strtolower(end($pisah));

        if (empty($_FILES[$namepost]['name'])) {
            return 'empty';
        } elseif (!in_array($exFile, $extend)) {
            return "ext";
        } elseif (intval($_FILES[$namepost]['size']) > $size) {
            return 'oversize';
        } else {
            if ($folder != null) {
                if (!file_exists($location . $folder)) {
                    mkdir($location . $folder, $permission, true);
                }
                $location = $location . $folder . "/";
            }
            if (move_uploaded_file($_FILES[$namepost]['tmp_name'], $location . $filename . "." . $exFile)) {
                return $filename . "." . $exFile;
            } else {
                return 'failed';
            }
        }
    }
}



