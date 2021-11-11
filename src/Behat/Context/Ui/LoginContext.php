<?php
declare(strict_types=1);

namespace App\Behat\Context\Ui;


use App\Behat\Page\LoginPageInterface;
use Behat\Behat\Context\Context;

class LoginContext implements Context
{
    public function __construct(
        private LoginPageInterface $loginPage
    ) {}
}
