<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`', schema: 'm1249_users')]
class User extends BaseUser
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column]
    protected $id = null;

}
