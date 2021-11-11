<?php
declare(strict_types=1);

namespace App\Behat\Context\Ui;


use App\Behat\Page\Post\EditPageInterface;
use App\Behat\Page\Post\IndexPageInterface;
use App\Behat\Page\Post\NewPageInterface;
use App\Behat\Page\Post\ShowPageInterface;
use Behat\Behat\Context\Context;
use PHPUnit\Framework\Assert;

class PostsContext implements Context
{
    public function __construct(
        private IndexPageInterface $indexPage,
        private NewPageInterface   $newPage,
        private EditPageInterface  $editPage,
        private ShowPageInterface  $showPage,
    ) {}


    /**
     * @When /^I click create new post link$/
     */
    public function iClickCreateNewPostLink(): void
    {
        $this->indexPage->clickCreatePostLink();
    }

    /**
     * @Given  /^I am on posts page$/
     */
    public function iAmOnPostsPage(): void
    {
        $this->indexPage->open();
    }

    /**
     * @Given /^I am on new post page$/
     */
    public function iAmOnNewPostPage(): void
    {
        $this->newPage->open();
    }

    /**
     * @Then /^I should be on posts page$/
     */
    public function iShouldBeOnPostsPage(): void
    {
        $this->indexPage->verify();
    }

    /**
     * @Then /^I should be on new post page$/
     */
    public function iShouldBeOnNewPostPage(): void
    {
        $this->newPage->verify();
    }

    /**
     * @Then /^I should be on edit post page$/
     */
    public function iShouldBeOnEditPostPage(): void
    {
        $this->editPage->verify(['id' => 1]);
    }

    /**
     * @Then /^I should be on show post page$/
     */
    public function iShouldBeOnShowPostPage(): void
    {
        $this->showPage->verify(['id' => 1]);
    }

    /**
     * @Then /^On the posts list I can see post with title "([^"]*)" (\d+) times$/
     * @Then /^On the posts list I can see post with title "([^"]*)" (\d+) time$/
     */
    public function onThePostsListICanSeeTitleTime(string $title, int $count): void
    {
        $posts = $this->indexPage->postsWithTitle($title);

        Assert::assertCount($count, $posts);
    }

    /**
     * @Then /^The first posts title is "([^"]*)"$/
     */
    public function theFirstPostsTitleIs(string $title): void
    {
        $posts = $this->indexPage->allPostsOnPage();

        Assert::assertEquals($title, $posts[0]->getTitle());
    }

    /**
     * @When /^I click "([^"]*)" button near first post title$/
     */
    public function iClickButtonNearFirstPostTitle(string $button): void
    {
        $this->indexPage->clickActionButtonNearFirstPost($button);
    }
}
