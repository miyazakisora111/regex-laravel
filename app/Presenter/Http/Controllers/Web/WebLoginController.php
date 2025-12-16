<?php

declare(strict_types=1);

namespace App\Presenter\Http\Controllers\Web;

use App\Application\User\Login\LoginUserCommandHandler;
use App\Presenter\Http\Requests\LoginRequest;

class WebLoginController
{
    public function __construct(
        private readonly LoginUserCommandHandler $commandHandler
    ) {}

    public function index()
    {
        return view('user.login');
    }

    public function __invoke(LoginRequest $request)
    {
        $this->commandHandler->handle($request->toCommand());
        return redirect('/home');
    }
}
