<?php
declare(strict_types=1);

namespace App\Behat\Page\Post;


use FriendsOfBehat\PageObjectExtension\Page\SymfonyPage;

class EditPage extends SymfonyPage implements EditPageInterface
{
    public function getRouteName(): string
    {
        return 'post_edit';
    }
}
