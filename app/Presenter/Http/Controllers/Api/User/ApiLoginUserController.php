<?php

declare(strict_types=1);

namespace App\Presenter\Http\Controllers\Api\User;

use App\Application\User\Login\LoginUserCommandHandler;
use App\Presenter\Http\Requests\User\LoginUserRequest;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ApiLoginUserController
{
    public function __construct(
        private readonly LoginUserCommandHandler $loginUserCommandHandler
    ) {}

    public function __invoke(LoginUserRequest $request): JsonResponse | Response
    {
        try {
            $this->loginUserCommandHandler->handle($request->toCommand());
        } catch (UnauthorizedException $e) {
            return new Response(null, Response::HTTP_FORBIDDEN);
        }
        $token = $request->user()->createToken('login')->plainTextToken;

        return new JsonResponse([
            'token' => $token
        ], Response::HTTP_CREATED);
    }
}
