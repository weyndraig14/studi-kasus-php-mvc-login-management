<?php

namespace Sinaga\Belajar\PHP\MVC\Controller;

use Sinaga\Belajar\PHP\MVC\App\View;
use Sinaga\Belajar\PHP\MVC\Config\Database;
use Sinaga\Belajar\PHP\MVC\Repository\SessionRepository;
use Sinaga\Belajar\PHP\MVC\Repository\UserRepository;
use Sinaga\Belajar\PHP\MVC\Service\SessionService;

class HomeController
{

    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $sessionRepository = new SessionRepository($connection);
        $userRepository = new UserRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $userRepository);
    }


    function index()
    {
        $user = $this->sessionService->current();
        if ($user == null) {
            View::render('Home/index', [
                "title" => "PHP Login Management"
            ]);
        } else {
            View::render('Home/dashboard', [
                "title" => "Dashboard",
                "user" => [
                    "name" => $user->name
                ]
            ]);
        }
    }

}