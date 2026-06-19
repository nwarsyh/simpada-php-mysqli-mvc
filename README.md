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
![Laman Dashboard Admin dan Arsiparis](public/media/screenpicture/01.Laman_Dashboard_Admin_dan_Arsiparis.png)
### Laman Dashboard Staff
![Laman Dashboard Staff](public/media/screenpicture/02.Laman_Dashboard_Staff.png)
### Laman Kelola Departemen
![Laman Kelola Departemen](public/media/screenpicture/03.Laman_Kelola_Departemen.png)
### Laman Kelola Kategori
![Laman Kelola Kategori](public/media/screenpicture/04.Laman_Kelola_Kategori.png)
### Laman Kelola Lokasi
![Laman Kelola Lokasi](public/media/screenpicture/05.Laman_Kelola_Lokasi.png)
### Laman Kelola Karyawan
![Laman Kelola Karyawan](public/media/screenpicture/06.Laman_Kelola_Karyawan.png)
### Laman Kelola Accounts
![Laman Kelola Accounts](public/media/screenpicture/07.Laman_Kelola_Accounts.png)
### Laman Kelola Arsip
![Laman Kelola Arsip](public/media/screenpicture/08.Laman_Kelola_Arsip.png)
### Laman Priview Arsip
![Laman Priview Arsip](public/media/screenpicture/09.Laman_Priview_Arsip.png)
### Laman Laporan Arsip
![Laman Laporan Arsip](public/media/screenpicture/10.Laman_Laporan_Arsip.png)
### Laman Cetak Laporan Arsip
![Laman Cetak Laporan Arsip](public/media/screenpicture/11.Laman_Cetak_Laporan_Arsip.png)
### Laman Peminjaman 
![Laman Peminjaman](public/media/screenpicture/12.Laman_Peminjaman.png)
### Laman Tambah Peminjaman 
![Laman Tambah Peminjaman](public/media/screenpicture/13.Laman_Tambah_Peminjaman.png)
### Laman Cetak Invoice Peminjaman 
![Laman Cetak Invoice Peminjaman](public/media/screenpicture/14.Laman_Invoice_Peminjaman.png)
### Laman Laporan Peminjaman 
![Laman Laporan Peminjaman](public/media/screenpicture/15.Laman_Laporan_Peminjaman.png)
### Laman Cetak Laporan Peminjaman 
![Laman Cetak Laporan Peminjaman](public/media/screenpicture/16.Laman_Cetak_Laporan_Peminjaman.png)
### Laman Transaksi 
![Laman Transaksi](public/media/screenpicture/17.Laman_Transaksi.png)
### Laman Laporan Transaksi 
![Laman Login](public/media/screenpicture/18.Laman_Laporan_Transaksi.png)
### Laman Cetak Laporan Transaksi 
![Laman Cetak Laporan Transaksi](public/media/screenpicture/19.Laman_Cetak_Laporan_Transaksi.png)
### Laman Identitas Aplikasi
![Laman Identitas Aplikasi](public/media/screenpicture/20.Laman_Profil.png)
### Laman Profil User
![Laman Profil User](public/media/screenpicture/21.Laman_Identitas_Aplikasi.png)

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
