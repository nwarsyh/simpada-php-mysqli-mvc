<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 06/06/2026
 * Time: 16.36
 */

/**
 * Setingan Fungsi Deafault untuk foto
 * jika foto otomatis, jika dokuemn atau campuan perlu extensi dan ukuran di controller
 * untuk keterangan MAS_SIZE dan ALLOW require ke file uploadconfig.php
 */
function UploadMedia($inputName, $targetDir, $maxSize = MAX_IMAGE_SIZE, $allowedExt = ALLOW_IMAGE)
{
    /** ini buat cek ekstensi file yang lolos upload
     * echo '<pre>';
     * var_dump($allowedExt);
     * echo '</pre>';
     * die();
     */
    if (!isset($_FILES[$inputName])) {
        return false;
    }
    /**
     * dekripsikan detail nama file, ukuran, jenis error dan tempat simpan file
     */
    $NamaFile = $_FILES[$inputName]['name'];
    $UkuranFile = $_FILES[$inputName]['size'];
    $ErrorUpload = $_FILES[$inputName]['error'];
    $TempatSimpan = $_FILES[$inputName]['tmp_name'];

    /**
     * Ini untuk cek upload jika error
     */
    if ($ErrorUpload === 4) {
        return [
            'status' => false,
            'message' => 'Media Tidak Ada Yang diplih'
        ];
    }

    /**
     * ini bagian validasi error upload
     */
    if ($ErrorUpload !== UPLOAD_ERR_OK) {
        return [
            'status' => false,
            'message' => 'Media Error Upload'
        ];
    }

    /**
     * Bagian Ini cek ukuran Validasi ukuran
     */
    if ($UkuranFile > $maxSize) {
        return [
            'status' => false,
            'message' => 'Ukuran Media Terlalu Besar'
        ];
    }
    /**
     * ini bagian utuk cek dan mbil ekstensi file
     */
    $EkstensiFile = strtolower(pathinfo($NamaFile, PATHINFO_EXTENSION));
    $allowedExt = array_map('strtolower', $allowedExt);
    /**
     * ini buat cek nama file yg lolos
     * var_dump($NamaFile);
     * var_dump($EkstensiFile);
     * var_dump($allowedExt);
     * die();*/
    if (!in_array($EkstensiFile, $allowedExt, true)) {
        return [
            'status' => false,
            'message' => 'Format Media tidak diizinkan'
        ];
    }

    /**
     * Untuk gambar gunakan getimagesize()
     * Kalau ekstensi yang diizinkan gambar:
     * Supaya file .php yang diubah nama jadi .jpg gak lolos begitu aja.
     */
    if (in_array($EkstensiFile, ['jpg', 'jpeg', 'png'], true)) {
        if (getimagesize($TempatSimpan) === false) {
            return [
                'status' => false,
                'message' => 'File Media tidak valid'
            ];

        }
    }
    /**
     * Bersihkan nama file asli dan buat nama baru
     */
    $NamaBersih = preg_replace('/[^a-zA-Z0-9_-]/', '_', pathinfo($NamaFile, PATHINFO_FILENAME));

    /**
     * Gabungkan nama bersih + unik id + ekstensi
     */
    $NamaFileBaru = $NamaBersih . '_' . uniqid() . '.' . $EkstensiFile;
    /**
     * Pindahkan file ke folder tujuan, pastikan filder tujuan ada
     * buat folder jika belum ada
     * beda 077 dan 075 :
     * Karena 0777 memberi izin tulis penuh ke semua user.
     * Untuk aplikasi web biasanya 0755 sudah cukup.
     */
    if (!is_dir($targetDir)) {
        /**
         * mkdir($targetDir, 0777, true);
         */
        mkdir($targetDir, 0755, true);
    }

    /**
     * Cek hasil upload file
     */
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
    // Tidak upload file baru
    if ($_FILES[$fieldName]['error'] === 4) {
        return [
            'status' => true,
            'dokumen'   => $fileLama
        ];
    }
    // Upload file baru
    $fileBaru = UploadMedia($fieldName, $targetDir, $maxSize, $allowedExt);
    // Jika upload gagal
    if (!$fileBaru['status']) {
        return $fileBaru;
    }
    // Upload berhasil -> hapus file lama
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
