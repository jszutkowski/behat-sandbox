<?php
declare(strict_types=1);

namespace App\Behat\Dto\Post\Index;


class Post
{
    public function __construct(
        private string $title,
        private string $content
    ) {}

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
