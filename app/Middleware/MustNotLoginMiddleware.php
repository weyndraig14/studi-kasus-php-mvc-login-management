<?php

namespace Sinaga\Belajar\PHP\MVC\Middleware;

use Sinaga\Belajar\PHP\MVC\App\View;
use Sinaga\Belajar\PHP\MVC\Config\Database;
use Sinaga\Belajar\PHP\MVC\Repository\SessionRepository;
use Sinaga\Belajar\PHP\MVC\Repository\UserRepository;
use Sinaga\Belajar\PHP\MVC\Service\SessionService;

class MustNotLoginMiddleware implements Middleware
{
    private SessionService $sessionService;

    public function __construct()
    {
        $sessionRepository = new SessionRepository(Database::getConnection());
        $userRepository = new UserRepository(Database::getConnection());
        $this->sessionService = new SessionService($sessionRepository, $userRepository);
    }

    function before(): void
    {
        $user = $this->sessionService->current();
        if ($user != null) {
            View::redirect('/');
        }
    }
}