<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 06/06/2026
 * Time: 15.55
 */
class Controller extends BaseController
{
    // Loader View
    public function view($viewPath, $dataSimpanPinjam  = []) {
        $dataSimpanPinjam = array_merge($this->GlobalData, $dataSimpanPinjam);
        require_once VIEW_PATH . $viewPath . '.php';

    }
    // Loader Model
    public function model($modelPath) {
        $path = MODEL_PATH . $modelPath . '.php';
        if (file_exists($path)) {
            require_once $path;
            $parts = explode('/', $modelPath);
            $className = end($parts);
            if (class_exists($className)) {
                return new $className;
            } else {
                die("Class model <b>$className</b> tidak ditemukan di file <b>$path</b>");
            }
        } else {
            die("Model <b>$modelPath</b> tidak ditemukan di path <b>$path</b>");
        }
    }
}