<?php
declare(strict_types=1);

namespace App\Behat\Page;


use FriendsOfBehat\PageObjectExtension\Page\SymfonyPage;

class LoginPage extends SymfonyPage implements LoginPageInterface
{
    public function getRouteName(): string
    {
        return 'app_login';
    }
}
