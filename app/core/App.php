<?php
class App
{
    protected $controller = "Dashboard";
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // controller
        $url[0] = ucfirst($url[0]);
        if (!empty($url[0])) {
            if (file_exists('../app/controllers/' . $url[0] . '.php')) {
                $this->controller = $url[0];
                unset($url[0]);
            } else {
                $this->controller = "NotFound";
            }
        }


        // filter user level    
        $this->filterUser($this->controller);

        // merequire controller
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // jalankan controller & method, serta kirimkan parameter
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        } else {
            return [0, 0];
        }
    }

    public function filterUser($controller)
    {

        if (!isset($_SESSION['username'])) {
            if ($this->controller == 'Admin') {
                $this->controller = "Admin";
            }
            // elseif ($this->controller == 'Login') {
            //     $this->controller =  $this->controller;
            // }
            else {
                $this->controller = "Home";
            }
        } else {
            if ($_SESSION['level'] == '0') {
                switch ($controller) {
                    case "Dashboard":
                        $this->controller = $controller;
                        break;
                    case "Beranda":
                        $this->controller = $controller;
                        break;
                    case "Profil":
                        $this->controller = $controller;
                        break;
                    case "Administrator":
                        $this->controller = $controller;
                        break;
                    case "Logout":
                        $this->controller = $controller;
                        break;
                    case "Papers":
                        $this->controller = $controller;
                        break;
                    default:
                        $this->controller = "Dashboard";
                }
            }
            //  elseif ($_SESSION['level'] > 0) {
            //     if ($_SESSION['ale'] == null && $this->controller != "Logout"  && $this->controller != "Instrumen") {
            //         $this->controller = "Instrumen";
            //         $this->method = "inputinstrumen";
            //     } else {
            //         switch ($controller) {
            //             case "Dashboard":
            //                 $this->controller = $controller;
            //                 break;
            //             case "Profil":
            //                 $this->controller = $controller;
            //                 break;
            //             case "Instrumen":
            //                 $this->controller = $controller;
            //                 break;
            //             case "Logout":
            //                 $this->controller = $controller;
            //                 break;
            //             case "Perangkingan":
            //                 $this->controller = $controller;
            //                 break;
            //             default:
            //                 $this->controller = "Dashboard";
            //         }
            //     }
            // }
        }
    }
}
