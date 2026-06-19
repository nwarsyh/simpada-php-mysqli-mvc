<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 06/06/2026
 * Time: 15.55
 */

/** Deklarasi class utama sebagai inti dari sistem libraries*/
class Routing
{
    /** Property default untuk controller, method, dan parameter */
    /**Default controller yang dipanggil jika URL kosong */
    /** Jika APlikasi Ga punya Laman Tanpa Login bisa ganti dengan protected $Controller = 'SignIn/SignIn';*/
    protected $Controller = 'Dashboard/Dashboard';
    /** Default method jika tidak ada method di URL */
    protected $Method = 'index';
    /** Parameter tambahan dari URL (jika ada) */
    protected $Params = [];

    /** Konstruktor class (otomatis dijalankan saat class ini diinstansiasi) */
    public function __construct()
    {
        /** Ambil data URL yang dipecah menjadi array */
        $url = $this->parseURL();
        /** ini bagian role dan akses user diapliakasi atau Mapping Middleware
         * jadi tentukan culu controller buat siapa aja
         * Route Middleware Mapping
         * Taruh di dalam __construct() atau nanti bisa dipindah ke file config khusus.
         */
        $routeMiddleware = [
            /** Jika user membuka area Admin*/
            'Admin' => [
                /** Pastikan sudah login*/
                ['middleware' => 'Authentication'], [
                    /**
                     * Pastikan role user adalah Admin
                     * Kalau ada Controller Dua user juag buat rolenya dua
                     */
                    'middleware' => 'Authorization',
                    'roles' => ['Admin']
                ]
            ],
            'BackupDatabase' => [
                /** Pastikan sudah login*/
                ['middleware' => 'Authentication'], [
                    /**
                     * Pastikan role user adalah Admin
                     * Kalau ada Controller Dua user juag buat rolenya dua
                     */
                    'middleware' => 'Authorization',
                    'roles' => ['Admin']
                ]
            ],
            'Dokumen' => [
                /** Pastikan sudah login*/
                ['middleware' => 'Authentication'], [
                    /**
                     * Pastikan role user adalah Admin
                     * Kalau ada Controller Dua user juag buat rolenya dua
                     */
                    'middleware' => 'Authorization',
                    'roles' => ['Admin', 'Arsiparis']
                ]
            ],
            'Identitas' => [
                /** Pastikan sudah login*/
                ['middleware' => 'Authentication'], [
                    /**
                     * Pastikan role user adalah Admin
                     * Kalau ada Controller Dua user juag buat rolenya dua
                     */
                    'middleware' => 'Authorization',
                    'roles' => ['Admin', 'Arsiparis']
                ]
            ],
            'Peminjaman' => [
                /** Pastikan sudah login*/
                ['middleware' => 'Authentication'], [
                    /**
                     * Pastikan role user adalah Admin
                     * Kalau ada Controller Dua user juag buat rolenya dua
                     */
                    'middleware' => 'Authorization',
                    'roles' => ['Admin', 'Arsiparis', 'Staff']
                ]
            ],
            'Profil' => [
                /** Pastikan sudah login*/
                ['middleware' => 'Authentication'], [
                    /**
                     * Pastikan role user adalah Admin
                     * Kalau ada Controller Dua user juag buat rolenya dua
                     */
                    'middleware' => 'Authorization',
                    'roles' => ['Admin', 'Arsiparis', 'Staff']
                ]
            ],
            'Transaksi' => [
                /** Pastikan sudah login*/
                ['middleware' => 'Authentication'], [
                    /**
                     * Pastikan role user adalah Admin
                     * Kalau ada Controller Dua user juag buat rolenya dua
                     */
                    'middleware' => 'Authorization',
                    'roles' => ['Admin', 'Arsiparis']
                ]
            ],
            /** nanti kalau ada: Manager / Direktur / SuperAdmin tinggal tambah.*/
            'Arsiparis' => [
                ['middleware' => 'Authentication'], [
                    'middleware' => 'Authorization',
                    'roles' => ['Arsiparis']
                ]
            ],
            'Staff' => [
                ['middleware' => 'Authentication'], [
                    'middleware' => 'Authorization',
                    'roles' => ['Staff']
                ]
            ]

        ];

        if (!empty($url)) {
            /** Tentukan Controller
             * Harus pakai $firstSegment agar Jadi:
             * Controller: /Admin/Karyawan $firstSegment = 'Admin';
             * lalu jalankan jalankan: AuthMiddleware dan AdminMiddleware
             * jika tidak ada $firstSegment berarti controller umum
             * contoh = 'Dashboard'; berarti rolenya $firstSegment = 'Dashboard';*/
            /**
             * $firstSegment = ucfirst(strtolower($url[0]));
             * ini dipakai jika controler satu kata dan Kapital depan aja
             * jika ada dua kapital ini akan merusak huruf kapital di tengah nama controller.
             */
            $firstSegment = $url[0];
            /**
             * echo '<pre>';
             * print_r($firstSegment);
             * die();
             */
            /** ini bagian Folder role*/
            if (isset($routeMiddleware[$firstSegment])) {
                $roleFolder = $firstSegment;
                if (isset($url[1]) && file_exists(CONTROLLER_PATH . $roleFolder . '/' . ucfirst($url[1]) . '.php'))
                {$this->Controller = $roleFolder . '/' . ucfirst($url[1]);
                    unset($url[0], $url[1]);
                } else {
                    $this->Controller = $roleFolder . '/' . $roleFolder;
                    unset($url[0]);
                }
                /**
                 * Jalankan Middleware Setelah controller ditemukan.*/
                foreach ($routeMiddleware[$firstSegment] as $config)
                {require_once AUTH_PATH . $config['middleware'] . '.php';
                    $middleware = new $config['middleware'];
                    if ($config['middleware'] === 'Authorization') {
                        $middleware->handle($config['roles']);
                    } else {
                        $middleware->handle();
                    }
                }
            }
            /** Cek controller publik */
            elseif (file_exists(CONTROLLER_PATH . ucfirst($url[0]) . '/' . ucfirst($url[0]) . '.php'))
            {
                /** Jika ada file controllernya, set sebagai controller yang akan dipanggil */
                $this->Controller = ucfirst($url[0]) . '/' . ucfirst($url[0]);
                unset($url[0]);
                /** Tidak ditemukan → redirect ke error*/
            } else {
                return $this->redirectToError();
            }
            /** Load controller */
            require_once CONTROLLER_PATH . $this->Controller . '.php';
            $controllerName = basename($this->Controller);
            $this->Controller = new $controllerName;
            $url = array_values($url);
            /** Set method*/
            if (isset($url[0]) && method_exists($this->Controller, $url[0])) {
                $this->Method = $url[0];
                unset($url[0]);
            }
            /** Set Params*/
            $this->Params = array_values($url);
        } else {
            /** COntroller Default sesuai protected $Controller*/
            require_once CONTROLLER_PATH . $this->Controller . '.php';
            $controllerName = basename($this->Controller);
            $this->Controller = new $controllerName;
        }
        /** Jalankan method*/
        call_user_func_array([$this->Controller, $this->Method], $this->Params);
    }
    private function parseURL()
    {
        if (isset($_GET['url']))
        {
            $link = rtrim($_GET['url'], '/');
            $link = filter_var($link, FILTER_SANITIZE_URL);
            return explode('/', $link);
        }
        return [];
    }
    private function redirectToError()
    {
        require_once CONTROLLER_PATH . 'Errors/Errors.php';
        $this->Controller = new Errors();
        $this->Method = 'errors';
        call_user_func_array([$this->Controller, $this->Method], []);
        exit;
    }
}