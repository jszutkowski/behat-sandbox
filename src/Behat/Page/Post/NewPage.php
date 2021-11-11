<?php
declare(strict_types=1);

namespace App\Behat\Page\Post;


use FriendsOfBehat\PageObjectExtension\Page\SymfonyPage;

class NewPage extends SymfonyPage implements NewPageInterface
{
    public function getRouteName(): string
    {
        return 'post_new';
    }
}
