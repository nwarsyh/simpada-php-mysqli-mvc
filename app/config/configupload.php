<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 06/06/2026
 * Time: 15.53
 */

/**
 * Catatan Saat Upload dan Update Untuk Foto :
 * $Foto = UploadMedia('name_input_foto', 'public/img/profil');
 * $FotoBaru = UpdateMedia('name_input_foto', 'public/img/profil', $POSTprofilLama);
 */
define('ALLOW_IMAGE', ['jpg', 'jpeg', 'png']);
define('MAX_IMAGE_SIZE', 1000000);
/**
 * Catatan Saat Upload dan Update Untuk File :
 * $File = UploadMedia('name_input_file', 'public/file/dokumen', MAX_DOCUMENT_SIZE, ALLOW_DOCUMENT);
 * $FileBaru = UpdateMedia('name_input_file', 'public/file/dokumen', $POSTfileLama, MAX_DOCUMENT_SIZE, ALLOW_DOCUMENT);
 */
define('ALLOW_DOCUMENT', ['pdf', 'doc', 'docx']);
define('MAX_DOCUMENT_SIZE', 5000000);
/**
 * Catatan Saat Upload dan Update  Untuk Campur Foto dan File :
 * $Attachment = UploadMedia('name_input_attachmet', 'public/bukti/attachmet', MAX_ATTACHMENT_SIZE, ALLOW_ATTACHMENT);
 * $AttachmentBaru = UpdateMedia('name_input_attachmet', 'public/bukti/attachmet', $POSTattachmentLama, MAX_ATTACHMENT_SIZE, ALLOW_ATTACHMENT);
 */
define('ALLOW_ATTACHMENT', ['jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx']);
define('MAX_ATTACHMENT_SIZE', 5000000);

/**
 * UNTUK DELETE SEPERTI BIASA
 * 1. Buat dulu method yang punay file atua foto di model
 * 2. lalu di controller panggil dan jalankan proses hapus foto di direktory beserta datanya
 */