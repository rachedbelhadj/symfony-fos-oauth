<?php
/**
 *  * @author      Rached BELHADJ <belhadj.rached@gmail.com>
 *  * @copyright   Copyright (c) ShortCut
 *  * @license     Proprietary
 *
 */

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use FOS\UserBundle\Doctrine\UserManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class UserData extends Fixture implements ContainerAwareInterface
{
    const USER_MANAGER = 'fos_user.user_manager';

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @var UserManager
     */
    private $userManager;

    /**
     * @param ContainerInterface|null $container
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
        $this->userManager = $this->container->get(static::USER_MANAGER);
    }

    public function load(ObjectManager $manager)
    {
        /** @var User $user */
        $user = $this->userManager->createUser();

        $user
            ->setFirstName("Admin")
            ->setLastName("admin")
            ->setEnabled(true)
            ->setRoles(array(User::ROLE_SUPER_ADMIN))
            ->setUsername("admin")
            ->setPlainPassword("admin")
            ->setEmail("admin@gmail.com")
        ;
        $manager->persist($user);
        $manager->flush();
    }
}