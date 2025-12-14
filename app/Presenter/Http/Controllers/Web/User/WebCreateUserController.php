<?php

declare(strict_types=1);

namespace App\Presenter\Http\Controllers\Web\User;

use App\Application\User\Create\CreateUserCommandHandler;
use App\Presenter\Http\Requests\User\CreateUserRequest;
use Symfony\Component\HttpFoundation\Response;

class WebCreateUserController
{
    public function __construct(
        private readonly CreateUserCommandHandler $createHandler
    ) {}

    public function __invoke(CreateUserRequest $request): Response
    {
        $this->createHandler->handle($request->toCommand());

        return new Response(null, Response::HTTP_CREATED);
    }
}
