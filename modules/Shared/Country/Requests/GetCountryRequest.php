<?php

declare(strict_types=1);

namespace Modules\Shared\Country\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;

class GetCountryRequest extends FormRequest
{
    public function rules(): array
    {
        return [];
    }
}
