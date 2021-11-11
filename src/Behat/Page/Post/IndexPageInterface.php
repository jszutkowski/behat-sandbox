<?php

namespace App\Behat\Page\Post;

use App\Behat\Dto\Post\Index\Post;
use FriendsOfBehat\PageObjectExtension\Page\SymfonyPageInterface;

interface IndexPageInterface extends SymfonyPageInterface
{
    public function clickCreatePostLink(): void;

    /**
     * @param string $title
     * @return Post[]
     */
    public function postsWithTitle(string $title): array;

    /**
     * @return Post[]
     */
    public function allPostsOnPage(): array;

    public function clickActionButtonNearFirstPost(string $button): void;
}
