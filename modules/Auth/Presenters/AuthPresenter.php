<?php

declare(strict_types=1);

namespace Modules\Auth\Presenters;

use Modules\Auth\Models\Auth;
use BasePackage\Shared\Presenters\AbstractPresenter;

class AuthPresenter extends AbstractPresenter
{
    private array $auth;
    public function __construct(array $auth)
    {
        $this->auth = $auth;
    }

    protected function present(bool $isListing = false): array
    {
        return [
            'access_token' => $this->auth['token'],
            'token_type'   => 'bearer',
            'name'         => $this->auth['name'],
            'email'        => $this->auth['email'],
            'phone'        => $this->auth['phone'],
            'type'         => $this->auth['type'],

        ];
    }
}
