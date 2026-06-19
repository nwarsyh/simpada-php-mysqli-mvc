<?php
function UploadMedia($inputName, $targetDir, $maxSize = MAX_IMAGE_SIZE, $allowedExt = ALLOW_IMAGE)
{
    if (!isset($_FILES[$inputName])) {
        return false;
    }
    $NamaFile = $_FILES[$inputName]['name'];
    $UkuranFile = $_FILES[$inputName]['size'];
    $ErrorUpload = $_FILES[$inputName]['error'];
    $TempatSimpan = $_FILES[$inputName]['tmp_name'];
    if ($ErrorUpload === 4) {
        return [
            'status' => false,
            'message' => 'Media Tidak Ada Yang diplih'
        ];
    }
    if ($ErrorUpload !== UPLOAD_ERR_OK) {
        return [
            'status' => false,
            'message' => 'Media Error Upload'
        ];
    }
    if ($UkuranFile > $maxSize) {
        return [
            'status' => false,
            'message' => 'Ukuran Media Terlalu Besar'
        ];
    }
    $EkstensiFile = strtolower(pathinfo($NamaFile, PATHINFO_EXTENSION));
    $allowedExt = array_map('strtolower', $allowedExt);
    if (!in_array($EkstensiFile, $allowedExt, true)) {
        return [
            'status' => false,
            'message' => 'Format Media tidak diizinkan'
        ];
    }
    if (in_array($EkstensiFile, ['jpg', 'jpeg', 'png'], true)) {
        if (getimagesize($TempatSimpan) === false) {
            return [
                'status' => false,
                'message' => 'File Media tidak valid'
            ];
        }
    }
    $NamaBersih = preg_replace('/[^a-zA-Z0-9_-]/', '_', pathinfo($NamaFile, PATHINFO_FILENAME));
    $NamaFileBaru = $NamaBersih . '_' . uniqid() . '.' . $EkstensiFile;
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }
    if (move_uploaded_file($TempatSimpan, $targetDir . '/' . $NamaFileBaru)) {
        return [
            'status' => true,
            'dokumen'   => $NamaFileBaru
        ];
    }
    return [
        'status' => false,
        'message' => 'Gagal memindahkan Media'
    ];
}
function UpdateMedia($fieldName, $targetDir, $fileLama, $maxSize = MAX_IMAGE_SIZE, $allowedExt = ALLOW_IMAGE) {
    if ($_FILES[$fieldName]['error'] === 4) {
        return [
            'status' => true,
            'dokumen'   => $fileLama
        ];
    }
    $fileBaru = UploadMedia($fieldName, $targetDir, $maxSize, $allowedExt);
    if (!$fileBaru['status']) {
        return $fileBaru;
    }
    if (!empty($fileLama)) {
        $oldFile = rtrim($targetDir, '/') . '/' . $fileLama;
        if (file_exists($oldFile)) {
            unlink($oldFile);
        }
    }
    return $fileBaru;
}
function DeleteMedia($fileName, $targetDir)
{
    if (!empty($fileName)) {
        $filePath = rtrim($targetDir, '/') . '/' . $fileName;
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }
}