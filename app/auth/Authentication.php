<?php
class Authentication
{
    public function handle()
    {
        if (!isset($_SESSION['loginsistem'])) {
            header("Location: " . BASEURL . "/SignIn");
            exit;
        }
    }
}