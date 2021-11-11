<?php
declare(strict_types=1);

namespace App\Behat\Page\Post;


use FriendsOfBehat\PageObjectExtension\Page\SymfonyPage;

class ShowPage extends SymfonyPage implements ShowPageInterface
{
    public function getRouteName(): string
    {
        return 'post_show';
    }
}
