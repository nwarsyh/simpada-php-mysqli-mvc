<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 06/06/2026
 * Time: 15.55
 */
class Flasher
{
    /** ini jika makai sweet alert toast*/
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
                         width: '400px' // Atur panjang toast di sini (bisa pakai '50%' atau '600px')
                    });
                });
            </script>
            ";
            unset($_SESSION['alerttoast']);
        }
    }

    /** ini jika makai Sweet Alert Basic*/
    public static function setBasicFlasher(
        $kategoriAlert, $pesanAlert, $aksiAlert, $tipeAlert) {
        $_SESSION['alertbasic'] = [
            'kategoriAlert' => $kategoriAlert,
            'pesanAlert' => $pesanAlert,
            'aksiAlert' => $aksiAlert,
            'tipeAlert' => $tipeAlert
        ];
    }
    public static function flasherBasic()
    {
        if (isset($_SESSION['alertbasic'])){
            echo "
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: '".$_SESSION['alertbasic']['kategoriAlert']."',
                        text: '".$_SESSION['alertbasic']['pesanAlert']." ".$_SESSION['alertbasic']['aksiAlert']."',
                        icon: '".$_SESSION['alertbasic']['tipeAlert']."',
                        confirmButtonText: 'Baik',
                         confirmButtonColor: '#198754'
                    });
                });
            </script>
            ";
            unset($_SESSION['alertbasic']);
        }
    }
}