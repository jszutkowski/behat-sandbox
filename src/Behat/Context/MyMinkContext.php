<?php
declare(strict_types=1);

namespace App\Behat\Context;


use Behat\MinkExtension\Context\MinkContext;

class MyMinkContext extends MinkContext
{
    /**
     * @Given I am logged in as admin
     */
    public function iAmLoggedInAsAdmin(): void
    {
        $this->visit('/login');
        $this->fillField('email', 'admin@admin');
        $this->fillField('password', 'admin1');
        $this->pressButton('Sign in');

//        $driver = $this->getSession()->getDriver();
//        if (!$driver instanceof BrowserKitDriver) {
//            throw new UnsupportedDriverActionException('This step is only supported by the BrowserKitDriver');
//        }
//
//        $client = $driver->getClient();
//        $client->getCookieJar()->set(new Cookie(session_name(), true));
//
//        $session = $client->getContainer()->get('session');
//
//        $user = $this->kernel->getContainer()->get('doctrine')->getEm()->getRepository(User::class)
//            ->findOneBy(['email' => $email]);
//        $providerKey = $this->kernel->getContainer()->getParameter('fos_user.firewall_name');
//
//        $token = new UsernamePasswordToken($user, null, $providerKey, $user->getRoles());
//        $session->set('_security_'.$providerKey, serialize($token));
//        $session->save();
//
//        $cookie = new Cookie($session->getName(), $session->getId());
//        $client->getCookieJar()->set($cookie);
    }
}
