<?php

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\Yaml\Yaml;
use UserBundle\Entity\Group;
use UserBundle\Entity\User;

class LoadUsers extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $data = Yaml::parse(file_get_contents(__DIR__.'/../../Resources/fixtures/users.yml'));

        foreach ($data['users'] as $id => $userData) {
            $user = $this->createUser($userData);
            $manager->persist($user);
            $this->addReference($id, $user);
        }

        $manager->flush();
    }

    /**
     * Creates a user.
     *
     * @param array $userData
     *
     * @return UserInterface
     */
    protected function createUser(array $userData)
    {
        $user = new User();
        $user->setUsername($userData['username']);
        $user->setEmail($userData['email']);
        $user->setPlainPassword($userData['password']);
        $user->setEnabled($userData['enabled']);

        foreach ($userData['groups'] as $group) {
            $group = $this->getReference($group);
            if ($group instanceof Group) {
                $user->addGroup($group);
            }
        }

        return $user;
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 20;
    }
}
