<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`', schema: 'm1249_users')]
class User extends BaseUser
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column]
    protected $id = null;


    #[ORM\Column]
    #[Assert\Length(min: 3, max: 128, groups: ["edit"], minMessage: "form.errors.lastname", maxMessage: "form.errors.lastname")]
    #[Assert\NotBlank]
    private string $lastname;

    public function getLastname()
    {
        return $this->lastname;
    }
}
