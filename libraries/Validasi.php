<?php
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
                if ($value === 'required' && empty($fieldValue)) {
                    $this->errors[$field] = "$label Wajib Diisi";
                }
                if ($value === 'number' && !empty($fieldValue) && !is_numeric($fieldValue)) {
                    $this->errors[$field] = "$label Harus berupa angka";
                }
                if ($value === 'email' && !empty($fieldValue) && !filter_var($fieldValue, FILTER_VALIDATE_EMAIL)) {
                    $this->errors[$field] = "$label Wajib Makai @";
                }
                if ($value === 'date' && !empty($fieldValue) && strtotime($fieldValue) === false) {
                    $this->errors[$field] = "$label Tidak Valid";
                }
            }
        }
        return empty($this->errors);
    }
    public function getErrors(): array
    {
        return $this->errors;
    }
    public function firstError(): ?string
    {
        return reset($this->errors) ?: null;
    }
    public function hasErrors(): bool
    {
        return !empty($this->errors);
    }
}