<?php
class Routing
{
    protected $Controller = 'SignIn/SignIn';
    protected $Method = 'index';
    protected $Params = [];
    public function __construct()
    {
        $url = $this->parseURL();
        $routeMiddleware = [
            'Admin' => [
                ['middleware' => 'Authentication'], [
                    'middleware' => 'Authorization',
                    'roles' => ['Admin']
                ]
            ],
            'BackupDatabase' => [
                ['middleware' => 'Authentication'], [
                    'middleware' => 'Authorization',
                    'roles' => ['Admin']
                ]
            ],
            'Dokumen' => [
                ['middleware' => 'Authentication'], [
                    'middleware' => 'Authorization',
                    'roles' => ['Admin', 'Arsiparis']
                ]
            ],
            'Identitas' => [
                ['middleware' => 'Authentication'], [
                    'middleware' => 'Authorization',
                    'roles' => ['Admin', 'Arsiparis']
                ]
            ],
            'Peminjaman' => [
                ['middleware' => 'Authentication'], [
                    'middleware' => 'Authorization',
                    'roles' => ['Admin', 'Arsiparis', 'Staff']
                ]
            ],
            'Profil' => [
                ['middleware' => 'Authentication'], [
                    'middleware' => 'Authorization',
                    'roles' => ['Admin', 'Arsiparis', 'Staff']
                ]
            ],
            'Transaksi' => [
                ['middleware' => 'Authentication'], [
                    'middleware' => 'Authorization',
                    'roles' => ['Admin', 'Arsiparis']
                ]
            ],
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
            $firstSegment = $url[0];
            if (isset($routeMiddleware[$firstSegment])) {
                $roleFolder = $firstSegment;
                if (isset($url[1]) && file_exists(CONTROLLER_PATH . $roleFolder . '/' . ucfirst($url[1]) . '.php'))
                {$this->Controller = $roleFolder . '/' . ucfirst($url[1]);
                    unset($url[0], $url[1]);
                } else {
                    $this->Controller = $roleFolder . '/' . $roleFolder;
                    unset($url[0]);
                }
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
            elseif (file_exists(CONTROLLER_PATH . ucfirst($url[0]) . '/' . ucfirst($url[0]) . '.php'))
            {
                $this->Controller = ucfirst($url[0]) . '/' . ucfirst($url[0]);
                unset($url[0]);
            } else {
                return $this->redirectToError();
            }
            require_once CONTROLLER_PATH . $this->Controller . '.php';
            $controllerName = basename($this->Controller);
            $this->Controller = new $controllerName;
            $url = array_values($url);
            if (isset($url[0]) && method_exists($this->Controller, $url[0])) {
                $this->Method = $url[0];
                unset($url[0]);
            }
            $this->Params = array_values($url);
        } else {
            require_once CONTROLLER_PATH . $this->Controller . '.php';
            $controllerName = basename($this->Controller);
            $this->Controller = new $controllerName;
        }
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