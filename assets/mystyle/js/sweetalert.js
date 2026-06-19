/**
 * Created by user on 04/09/2025.
 */
// bagian untuk sweetalerrt
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.alert-confirm-hapus').forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const href = this.getAttribute('href'); // ambil URL dari tombol yang diklik
            Swal.fire({
                title: 'Yakin hapus data?',
                text: 'Data ini tidak bisa dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#198754',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                window.location.href = href; // otomatis ke URL sesuai tombol
            }
        });
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.alert-aktif').forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire(
                {
                    title: 'Sweet Alert Terkoneksi',
                    icon: 'success',
                    confirmButtonText: 'Baik',
                    confirmButtonColor: '#198754'});
        });
    });
});
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.alert-sukses').forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire(
                {
                    title: 'Suksess',
                    text: 'Data Dokter Berhasil Disi',
                    icon: 'success',
                    confirmButtonText: 'Baik',
                    confirmButtonColor: '#198754'});
        });
    });
});
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.alert-gagal').forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire(
                {
                    title: 'Oppss...',
                    text: 'Data Dokter Gagal Disimpan',
                    icon: 'error',
                    confirmButtonText: 'OKEY',
                    confirmButtonColor: '#dc3545'});
        });
    });
});
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.alert-question').forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire(
                {
                    title: 'Data Tidak Lengkap',
                    text: 'Periksa Kembali Inputan Anda',
                    icon: 'question',
                    confirmButtonText: 'OKEY',
                    confirmButtonColor: '#6610f2'});
        });
    });
});
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.alert-ulasan').forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: "<strong>HTML <u>example</u></strong>",
                icon: "info",
                html: `
    You can use <b>bold text</b>,
    <a href="#" autofocus>links</a>,
    and other HTML tags
  `,
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: `
    <i class="fa fa-thumbs-up"></i> Great!
  `,
                confirmButtonAriaLabel: "Thumbs up, great!",
                cancelButtonText: `
    <i class="fa fa-thumbs-down"></i>
  `,
                cancelButtonAriaLabel: "Thumbs down"
            });
        });
    });
});
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.alert-pilihan').forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: "Do you want to save the changes?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Save",
                denyButtonText: `Don't save`
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                Swal.fire("Saved!", "", "success");
            } else if (result.isDenied) {
                Swal.fire("Changes are not saved", "", "info");
            }
        });
        });
    });
});

// bagian toast
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.toast-gagal').forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
        });
            Toast.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Data Dokter Gagal Disimpan',
                width: '400px' // Atur panjang toast di sini (bisa pakai '50%' atau '600px')
            });
        });
    });
});
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.toast-sukses').forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
        });
            Toast.fire({
                icon: 'success',
                title: 'Suksess',
                text: 'Data Dokter Berhasil Disimpan',
                width: '400px' // Atur panjang toast di sini (bisa pakai '50%' atau '600px')
            });
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.toast-warning').forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
        });
            Toast.fire({
                icon: 'warning',
                title: 'Ops!!',
                text: 'Data Dokter Tidak Lengkap',
                width: '400px' // Atur panjang toast di sini (bisa pakai '50%' atau '600px')
            });
        });
    });
});
