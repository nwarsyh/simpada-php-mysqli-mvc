# SIMPADA (Sistem Manajemen Peminjaman dan Arsip Digital)
![PHP](https://img.shields.io/badge/PHP-7%2B-blue)
![MySQL](https://img.shields.io/badge/MySQL-Database-orange)
![MVC](https://img.shields.io/badge/Architecture-MVC-green)
![License](https://img.shields.io/badge/License-MIT-yellow)

## Ringkasan
SIMPADA merupakan aplikasi manajemen arsip dan peminjaman dokumen digital yang mendukung pengelolaan arsip aktif maupun tidak aktif, peminjaman dokumen antar departemen, laporan arsip, laporan transaksi, serta pengelolaan user berdasarkan hak akses.
Role yang tersedia:
- Admin
- Arsiparis
- Staff

## Status Project
🚧 Project ini dibuat untuk tujuan pembelajaran dan pengembangan kemampuan pemrograman PHP dengan arsitektur MVC. Pengembangan fitur masih dapat dilakukan di masa mendatang.

## Teknologi yang digunakan (Built With)
1. PHP 7 ke atas ;
2. MySQLi (PDO) ;
3. Bootstrap ;
4. Bootstrap Icon ;
5. Chart JS ;
6. DataTable ;
7. JQuery ;
8. SB-Admin ;
9. SeetAlert ;
10. Serta Teknologi tambahan lainnya

## Struktur Folder Project
```text
simpada/
├── app/
│   ├── auth/
│   ├── config/
│   ├── controllers/
│   ├── global/
│   ├── helpers/
│   ├── libraries/
│   ├── models/
│   ├── requests/
│   ├── services/
│   ├── views/
│   └── init.php
│
├── assets/
│   ├── mystyle/
│   └── vendor/
│
├── public/
│   ├── img/
│   ├── database/
│   └── media/
│
├── .htaccess
└── index.php
```

## Prasyarat menjalankan aplikasi (Prerequisites)
1. Pastikan XAMPP Versi terbaru ;
2. PHP Versi 7 Ke atas

## Instalasi (Installation & Setup)
1. Setelah berhasil mendownload file .zip dari github ;
2. Simpan project ke dalam direktori lokal, jika menggunakan XAMPP simpan di folder htdocs ;
3. Jalankan XAMPP, lalu masuk ke localhost/phpmyadmin dan buat database dengan nama: `simpada`;
3. Import database yang ada di: public/database/simpada.sql ;
4. Selanjutnya pada bagian script ubah file **.htaccess** pada baris: RewriteBase /simpada/;; `Sesuaikan dengan lokasi project.` ;
5. Ubah juga file **app/config/config.php** pada baris: define('BASEURL', 'http://simpada') ; `Sesuaikan dengan lokasi project.` ;

## Cara Penggunaan (Usage)
1. Setelah database, htaccess file config disesuaikan, silahkan jalanakan aplikasi di local browser;
2. bisa gunakan akun berikut untuk tester ;
3. silahkan explore fitur aplikasi ;

## Akun Demo
```text
Admin
Username : admin
Password : admin
Arsiparis
Username : arsiparis
Password : arsiparis
Staff
Username : staff
Password : staff
```

## Fitur
1. **Libraries** untuk stuktur routing aplikasi seperti pada folder libraries seperti : `(BaseController)`, `(BaseModel)`, `(Controller)`, `(Database)` , `(Routing)`, `(Validasi)` ;
2. **Models** Untuk logika dan proses database;
3. **Controlers** Untuk logika bisnis aplikasi ; 
4. **views** Untuk tampilan laman dan input data;
5. **auth** Untuk menampung Middleware dan security user dan role ;
6. **config** Untuk menampung konkeis database dan configurasi seperti SESSION, dan config untuk fungsi upload ;
7. **global** Untuk menampung data global yang akan digunakan di laman tertentu ;
8. **helpers** Untuk menampung fungsi upload dan fungsi tanggal ;
9. **requests** Untuk menampung data input sebelum dikirim ke models ;
10. **services** Untuk mengelola hasil datatabse dari models sebelum diambil oleh controllers ;
11. ada fitur login untuk beberapa role user seperti : Admin, Arsiparis, dan Staff ;
12. Kelola data Karyawan , Accounts Login Karyawan, Departemen, Kategori Dokumen, Lokasi Dokumen ;
13. Kelola data Arsip yang meliputi :
- Input, Ubah dan hapus dokumen ;
- status dokumen : Aktif, Tidak Aktif, Permanen dna Dimusnahkan ;
- masa retensi dokumen ;
- priview dokumen ;
- wilayah dokumen menggunakan wilayah indonesia ;
- laporan arsip 
- dan lainnya
14. Penimjaman dokumen yang meliputi :
- cari dokumen untuk dipinjam ;
- ketesediaan dokumen untuk dipinjam ;
- status pinjaman : Menunggu Konfirmasi, Diterima, Ditolak, Peminjaman Aktif, Peminjaman Selesai, Peminjaman Melewati batas Waktu ;
- invoice peminjaman ;
- laporan peminjaman ;
- dan lainnya
15. Kelola Transaksi yang meliputi :
- Kelola peminjaman staff ;
- Laporan Transaksi
16. Identitas aplikasi dan perusahaan, untuk kop surat pada laporan ;
17. Profil masing" user yang bnisa ubah data dan ubah password ;
18. Dan lainnya yang bisa di explore dalam aplikasi.

## Screenshot
### Laman Dashboard Admin dan Arsiparis
![Laman Dashboard Admin dan Arsiparis](public/img/img_github/01.Laman Dashboard Admin dan Arsiparis.png)
### Laman Dashboard Staff
![Laman Dashboard Staff](public/img/img_github/02.Laman Dashboard Staff.png)
### Laman Kelola Departemen
![Laman Kelola Departemen](public/img/img_github/03.Laman Kelola Departemen.png)
### Laman Kelola Kategori
![Laman Kelola Kategori](public/img/img_github/04.Laman Kelola Kategori.png)
### Laman Kelola Lokasi
![Laman Kelola Lokasi](public/img/img_github/05.Laman Kelola Lokasi.png)
### Laman Kelola Karyawan
![Laman Kelola Karyawan](public/img/img_github/06.Laman Kelola Karyawan.png)
### Laman Kelola Accounts
![Laman Kelola Accounts](public/img/img_github/07.Laman Kelola Accounts.png)
### Laman Kelola Arsip
![Laman Kelola Arsip](public/img/img_github/08.Laman Kelola Arsip.png)
### Laman Priview Arsip
![Laman Priview Arsip](public/img/img_github/09.Laman Priview Arsip.png)
### Laman Laporan Arsip
![Laman Laporan Arsip](public/img/img_github/10.Laman Laporan Arsip.png)
### Laman Cetak Laporan Arsip
![Laman Cetak Laporan Arsip](public/img/img_github/11.Laman Cetak Laporan Arsip.png)
### Laman Peminjaman 
![Laman Peminjaman](public/img/img_github/12.Laman Peminjaman.png)
### Laman Tambah Peminjaman 
![Laman Tambah Peminjaman](public/img/img_github/13.Laman Tambah Peminjaman.png)
### Laman Cetak Invoice Peminjaman 
![Laman Cetak Invoice Peminjaman](public/img/img_github/14.Laman Invoice Peminjaman.png)
### Laman Laporan Peminjaman 
![Laman Laporan Peminjaman](public/img/img_github/15.Laman Laporan Peminjaman.png)
### Laman Cetak Laporan Peminjaman 
![Laman Cetak Laporan Peminjaman](public/img/img_github/16Laman Cetak Laporan Peminjaman.png)
### Laman Transaksi 
![Laman Transaksi](public/img/img_github/17.Laman Transaksi.png)
### Laman Laporan Transaksi 
![Laman Login](public/img/img_github/18.Laman Laporan  Transaksi.png)
### Laman Cetak Laporan Transaksi 
![Laman Cetak Laporan Transaksi](public/img/img_github/19.Laman Cetak Laporan Transaksi.png)
### Laman Identitas Aplikasi
![Laman Identitas Aplikasi](public/img/img_github/20.Laman Profil.png)
### Laman Profil User
![Laman Profil User](public/img/img_github/21.Laman Identitas Aplikasi.png)

## Sumber Referensi
- Template refrensi dari : [SB-Admin 2](https://startbootstrap.com/theme/sb-admin-2)
- Foto laman profil menggunakan referensi dari: [codepen.io](https://codepen.io/atulcodex/pen/ZPgPQQ) 
- Logika PHP, Javascrip, HTML, CSS dari  dokumentasi resmi, Youtube, Artikel, Website dan lainnya
- Tutorial PHP, Javascrip, HTML, CSS dari Buku
- Serta hasil belajar dari berbagai sumber lainnya

## Tujuan
Repository ini dibuat untuk **pembelajaran serta pemahaman PHP** dan **latihan menggunakan GitHub**.
Semoga bisa bermanfaat bagi yang mau belajar 🙌
Semua data, foto, nomor yang tersedia di aplikasi bersifat dummy dan bukan data asli, seperti foto artis terkenal, nama karyawan, data-data karyawan, nomor dokumen dan lainnya digunakan untuk tujuan belajar

## Kontribusi (Contributing)
Masukan, saran, dan perbaikan sangat terbuka untuk membantu pengembangan project ini.
Jika menemukan bug atau kesalahan implementasi, silakan membuat Issue atau Pull Request.
Mari belajar dan berkembang bersama 🙌

## License
Proyek ini dirilis dengan lisensi **MIT**, dan dibuat khusus untuk tujuan pembelajaran.  
Boleh dipelajari, digunakan, dan dikembangkan lebih lanjut selama tetap mencantumkan kredit.  

Lihat file [LICENSE](LICENSE) untuk detail lengkap.

### Terima Kasih 🙌
