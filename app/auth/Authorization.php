<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 06/06/2026
 * Time: 15.55
 */
class Authorization
{
    public function handle(array $roles)
    {
        if (
            !isset($_SESSION['role_accounts']) ||
            !in_array($_SESSION['role_accounts'], $roles)
        ) {

            header('Location: ' . BASEURL . '/Dashboard');
            exit;

        }
    }
}