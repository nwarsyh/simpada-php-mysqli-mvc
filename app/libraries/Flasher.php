<?php
class Flasher
{
    public static function setFlasherToast($kategoriAlert, $pesanAlert, $aksiAlert, $tipeAlert = 'success')
    {
        $_SESSION['alerttoast'] = [
            'kategoriAlert' => $kategoriAlert,
            'pesanAlert'    => $pesanAlert,
            'aksiAlert'     => $aksiAlert,
            'tipeAlert'     => $tipeAlert
        ];
    }
    public static function flasherToast()
    {
        if (isset($_SESSION['alerttoast'])) {
            $kategoriAlert = $_SESSION['alerttoast']['kategoriAlert'];
            $pesanAlert    = $_SESSION['alerttoast']['pesanAlert'];
            $aksiAlert     = $_SESSION['alerttoast']['aksiAlert'];
            $tipeAlert     = $_SESSION['alerttoast']['tipeAlert'];
            echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
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
                        icon: '$tipeAlert',
                        title: '$kategoriAlert',
                        text: '$pesanAlert $aksiAlert',
                         width: '400px'
                    });
                });
            </script>
            ";
            unset($_SESSION['alerttoast']);
        }
    }
}