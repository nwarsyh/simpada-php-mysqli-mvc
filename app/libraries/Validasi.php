<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 06/06/2026
 * Time: 15.55
 */
class Validasi
{
private array $errors = [];
    public function validasi(
        array $data,
        array $rules,
        array $attributes = []): bool
    {
        $this->errors = [];
        foreach ($rules as $field => $rule) {
            $fieldValue = $data[$field] ?? null;
            $label = $attributes[$field] ?? $field;
            $ruleList = explode('|', $rule);
            foreach ($ruleList as $value) {
                /** ini untuk valdasi input text, radio, select, checkbox*/
                if ($value === 'required' && empty($fieldValue))
                {
                    $this->errors[$field] = "$label Wajib Diisi";
                }

                if ($value === 'number' && !empty($fieldValue) && !is_numeric($fieldValue))
                {
                    $this->errors[$field] = "$label Harus berupa angka";
                }

                if ($value === 'email' && !empty($fieldValue) && !filter_var($fieldValue, FILTER_VALIDATE_EMAIL))
                {
                    $this->errors[$field] = "$label Wajib Makai @";
                }

                if ($value === 'date' && !empty($fieldValue) && strtotime($fieldValue) === false)
                {
                    $this->errors[$field] = "$label Tidak Valid";
                }
            }
        }
        return empty($this->errors);
    }
    /**
     * 1. getErrors() Mengambil semua error.
     * contoh hasil :
     * 'email' => 'Email tidak valid',
     * 'nama'  => 'Nama wajib diisi'
     * Pemakaian : print_r($validator->getErrors());
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
    /**
     * 2. firstError() Mengambil error pertama.
     * Contoh:
     * ['email' => 'Email tidak valid',
     * 'nama'  => 'Nama wajib diisi']
     * Hasil: Email tidak valid
     */
    public function firstError(): ?string
    {
        return reset($this->errors) ?: null;
    }
    /**
     * 3. hasErrors() Tujuannya buat ngecek:
     * Ada error? atau Tidak ada error?
     * Penjelasan: empty([])
     * hasil : true
     * Sedangkan: empty([ 'email' => 'Email tidak valid' ])
     * hasil : false
     * Makanya dibalik:
     * !empty(...)
     */
    public function hasErrors(): bool
    {
        return !empty($this->errors);
    }
}