<?php


namespace App\Service\UserService;


use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Security\Core\Security;

class UserService implements UserServiceInterface
{
    private $security;
    private $userRepository;

public function __construct(Security $security, UserRepository $userRepository)
{
    $this->security=$security;
    $this->userRepository=$userRepository;
}

    public function save(User $user): bool
    {
       return $this->userRepository->insert($user);
    }

    /**
     * @param User $user
     * @return null|User|object
     */
    public function currentUser(User $user): ?User
    {
        return $this->security->getUser();
    }
}