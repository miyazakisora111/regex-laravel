<?php

declare(strict_types=1);

namespace App\Presenter\Http\Controllers\Web\User;

use App\Application\User\Login\LoginUserCommandHandler;
use App\Presenter\Http\Requests\User\LoginUserRequest;

class WebLoginUserController
{
    public function __construct(
        private readonly LoginUserCommandHandler $commandHandler
    ) {}

    public function index()
    {
        return view('user.login');
    }

    public function __invoke(LoginUserRequest $request)
    {
        $this->commandHandler->handle($request->toCommand());
        return redirect('/home');
    }
}
