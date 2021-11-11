<?php
declare(strict_types=1);

namespace App\Behat\Page\Post;


use App\Behat\Dto\Post\Index\Post;
use App\Behat\Service\Accessor\TableAccessorInterface;
use Behat\Mink\Element\NodeElement;
use Behat\Mink\Session;
use FriendsOfBehat\PageObjectExtension\Page\SymfonyPage;
use Symfony\Component\Routing\RouterInterface;
use Webmozart\Assert\Assert;

class IndexPage extends SymfonyPage implements IndexPageInterface
{
    private TableAccessorInterface $tableAccessor;

    public function __construct(Session $session,
                                $minkParameters,
                                RouterInterface $router,
                                TableAccessorInterface $tableAccessor)
    {
        parent::__construct($session, $minkParameters, $router);

        $this->tableAccessor = $tableAccessor;
    }

    public function getRouteName(): string
    {
        return 'post_index';
    }

    public function clickCreatePostLink(): void
    {
        $this->getDocument()->clickLink('Create new');
    }

    /**
     * @inheritDoc
     */
    public function postsWithTitle(string $title): array
    {
        $table = $this->getDocument()->findById('posts-table');

        $rows = $this->tableAccessor->getRowsWithFields($table, ['title' => $title]);

        return array_map(fn(NodeElement $row) => new Post(
            $this->tableAccessor->getFieldFromRow($table, $row, 'title')->getText(),
            $this->tableAccessor->getFieldFromRow($table, $row, 'content')->getText(),
        ), $rows);
    }

    /**
     * @inheritDoc
     */
    public function allPostsOnPage(): array
    {
        $table = $this->getDocument()->findById('posts-table');

        $rows = $this->tableAccessor->getBodyRows($table);

        return array_map(fn(NodeElement $row) => new Post(
            $this->tableAccessor->getFieldFromRow($table, $row, 'title')->getText(),
            $this->tableAccessor->getFieldFromRow($table, $row, 'content')->getText(),
        ), $rows);
    }

    public function clickActionButtonNearFirstPost(string $button): void
    {
        $table = $this->getDocument()->findById('posts-table');

        $rows = $this->tableAccessor->getBodyRows($table);

        Assert::notEmpty('No rows found');

        $rows[0]->clickLink($button);
    }
}
