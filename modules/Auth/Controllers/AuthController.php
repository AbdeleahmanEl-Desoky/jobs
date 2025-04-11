<?php

declare(strict_types=1);

namespace Modules\Auth\Controllers;

use App\Presenters\Json;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Auth\Presenters\AuthPresenter;
use Modules\Auth\Requests\RegisterAuthRequest;
use Modules\Auth\Requests\LoginRequest;
use Modules\Auth\Requests\ForgotPasswordRequest;
use Modules\Auth\Requests\ResetPasswordRequest;
use Modules\Auth\Requests\VerifyOtpRequest;
use Modules\Auth\Services\AuthService;

class AuthController extends Controller
{
    public function __construct(
        private AuthService $authService,
    ) {
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $authData = $this->authService->login($request->credentials());

        if (!$authData) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        return Json::item((new AuthPresenter($authData))->getData());
    }

    public function register(RegisterAuthRequest $request): JsonResponse
    {
        $createdItem = $this->authService->create($request->createCreateAuthDTO());

        $presenter = new AuthPresenter($createdItem);

        return Json::item($presenter->getData());
    }
    public function forgotPassword(ForgotPasswordRequest $request): JsonResponse
    {
        try {
            $this->authService->generateAndSendOtp($request->email);
            // Correctly pass the item parameter with key-value pair.
            return Json::done("OTP sent to your email.",code: 200);
        } catch (\Exception $e) {
            // Correctly pass the error message and HTTP status code.
            return Json::error( $e->getMessage(),400);
        }
    }
    public function verifyOtp(VerifyOtpRequest $request): JsonResponse
    {
        try {
            $this->authService->verifyOtp($request->credentials());
            // Correctly pass the item parameter with key-value pair.
            return Json::done("OTP sent to your email.",code: 200);
        } catch (\Exception $e) {
            // Correctly pass the error message and HTTP status code.
            return Json::error( $e->getMessage(),400);
        }
    }
    public function resetPassword(ResetPasswordRequest $request)//: JsonResponse
    {
        try {

          return  $this->authService->updatePassword($request->credentials());

            return Json::done("Password reset successful.", code: 200);
        } catch (\Exception $e) {
            // Handle any errors and return a proper response
            return Json::error($e->getMessage(), 500); // You can use 400 for user errors like invalid OTP or email
        }
    }
}
