<?php

declare(strict_types=1);

namespace Modules\Auth\Services;

use Carbon\Carbon;
use Modules\CoreUser\User\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Modules\Auth\DTO\CreateAuthDTO;
use Modules\CoreCompany\Company\Repositories\CompanyRepository;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Ichtrojan\Otp\Otp;
use Modules\Auth\Repositories\OtpRepository;

class AuthService
{
    public function __construct(
        private UserRepository $userRepository,
        private CompanyRepository $companyRepository,
        private OtpRepository $otpRepository
    ) {
    }

    public function login(array $credentials): ?array
    {
        $guard = $this->userRepository->getUserByEmail($credentials['email'])
            ? 'api_user'
            : 'api_company';

        if (!$token = Auth::guard($guard)->attempt($credentials)) {
            return null;
        }

        return $this->buildAuthResponse(Auth::guard($guard)->user(), $guard);
    }

    public function create(CreateAuthDTO $createAuthDTO)
    {
        $type = $createAuthDTO->type;

        if ($type == 'user') {
            $repository = $this->userRepository->createUser($createAuthDTO->toArray());
            $guard = 'api_user';
        } else {
            $repository = $this->companyRepository->createCompany($createAuthDTO->toArray());
            $guard = 'api_company';
        }

        return $this->buildAuthResponse($repository, $guard);

    }

    private function buildAuthResponse($repository, string $guard): array
    {
        $token = Auth::guard($guard)->login($repository);

        return [
            'token' => $token,
            'name'  => $repository->name,
            'email' => $repository->email,
            'phone' => $repository->phone,
            'type'  => $repository->type,
        ];
    }

    public function generateAndSendOtp(string $email)//: void
    {
        $repository = $this->userRepository->getUserByEmail($email);

        if (!$repository) {
            $repository = $this->companyRepository->getCompanyByEmail($email);
        }

        if (!$repository) {
            throw new \Exception('Email not found');
        }
        $otp = (new Otp)->generate($email, 'numeric', 6, 15);

        try {
            Mail::send('emails.forgot_password', ['otp' => $otp->token], function ($message) use ($repository) {
                $message->to($repository->email)
                        ->subject('Your OTP for password reset');
            });
        } catch (\Exception $e) {
            throw new \Exception('Failed to send OTP email: ' . $e->getMessage());
        }
    }

    public function verifyOtp(array $credentials){
        $otp = new Otp();
        if ((new Otp)->validate($credentials['identifier'], $credentials['otp'])->status == true) {
            return 'done';
        }
        throw new \Exception('Invalid OTP');
    }
    public function updatePassword(array $credentials)
    {
        // Verify OTP Validity
        $otp = $this->otpRepository->getOtpDataByIdentifier($credentials['identifier']);

        if (!$otp || $otp->token !== $credentials['otp']) {
            throw new \Exception('Invalid OTP', 400);
        }

        if (Carbon::parse($otp->created_at)->diffInMinutes(Carbon::now()) > 15) {
            throw new \Exception('OTP expired', 400);
        }

        // Get User or Company
        $repository = $this->userRepository->getUserByEmail($credentials['identifier']);

        $isUser = true;

        if (!$repository) {
            $repository = $this->companyRepository->getCompanyByEmail($credentials['identifier']);
            $isUser = false;
        }

        if (!$repository) {
            throw new \Exception('Email not found', 404);
        }

        // Update Password
        $data = ['password' => bcrypt($credentials['password'])];

        if ($isUser) {
            $this->userRepository->updateData(['email' => $credentials['identifier']], $data);
        } else {
            $this->companyRepository->updateData(['email' => $credentials['identifier']], $data);
        }

        return true;
    }



}
