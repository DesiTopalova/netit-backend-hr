<?php


namespace App\Service\UserService;


use App\Entity\User;

interface UserServiceInterface
{
public function save(User $user):bool;
public function currentUser(User $user):?User;
}