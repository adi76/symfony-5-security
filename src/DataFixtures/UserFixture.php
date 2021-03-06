<?php

namespace App\DataFixtures;

use App\Entity\ApiToken;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 1; $i <= 10; ++$i) {
            $user = new User();
            $user->setEmail($faker->email);
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                'pass'
            ));
            // dd($user);

            $user->setFirstName($faker->firstName);
            if (true === (bool) rand(0, 1)) {
                $user->setTwitterUsername($faker->userName);
            }

            $apiToken1 = new ApiToken($user);
//            $apiToken2 = new ApiToken($user);
            $manager->persist($apiToken1);
//            $manager->persist($apiToken2);

            // $manager->persist($user);
        }

        for ($i = 1; $i <= 3; ++$i) {
            $user = new User();
            $user->setEmail($faker->email);
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                'pass'
            ));
            $user->setFirstName($faker->firstName);
            if (true === (bool) rand(0, 1)) {
                $user->setTwitterUsername($faker->userName);
            }
            $user->setRoles(['ROLE_ADMIN']);
            $manager->persist($user);
        }

        $manager->flush();
    }
}
