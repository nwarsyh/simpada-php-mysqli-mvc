<?php
class AccountRequest
{
    public static function createRequestAccount()
    {
        return [
            'role_accounts' => 'required',
            'user_accounts' => 'required',
            'pass_accounts' => 'required',
            'ulangi_pass_accounts' => 'required'];
    }
    public static function updateRequestAccount()
    {
        return [
            'role_accounts' => '',
            'user_accounts' => '',
            'pass_accounts' => '',
            'ulangi_pass_accounts' => ''];
    }
    public static function attributesRequestAccount()
    {
        return [
            'role_accounts' => 'Role',
            'user_accounts' => 'Username',
            'pass_accounts' => 'Password',
            'ulangi_pass_accounts' => 'Konfirmasi Password'];
    }
}