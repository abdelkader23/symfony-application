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

class LoadGroups extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $data = Yaml::parse(file_get_contents(__DIR__.'/../../Resources/fixtures/groups.yml'));

        foreach ($data['groups'] as $id => $groupData) {
            $group = $this->createGroup($groupData);
            $manager->persist($group);
            $this->addReference($id, $group);
        }

        $manager->flush();
    }

    /**
     * Creates a group.
     *
     * @param array $groupData
     *
     * @return UserInterface
     */
    protected function createGroup(array $groupData)
    {
        $group = new Group($groupData['name']);

        foreach ($groupData['roles'] as $role) {
            $group->addRole($role);
        }

        return $group;
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 10;
    }
}
