<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UniqueEmailOrPhone implements Rule
{
    private string $column;

    public function __construct(string $column = 'email')
    {
        $this->column = $column;
    }

    public function passes($attribute, $value): bool
    {
        $inUsers = DB::table('users')->where($this->column, $value)->exists();
        $inCompanies = DB::table('companies')->where($this->column, $value)->exists();

        return !($inUsers || $inCompanies);
    }

    public function message(): string
    {
        return 'The :attribute has already been taken.';
    }
}
