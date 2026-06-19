<?php
class Authorization
{
    public function handle(array $roles)
    {
        if (!isset($_SESSION['role_accounts']) || !in_array($_SESSION['role_accounts'], $roles))
        {
            header('Location: ' . BASEURL . '/SignIn');
            exit;
        }
    }
}