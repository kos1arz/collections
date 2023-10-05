<?php

namespace App\Entity;

use App\Repository\UserRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`', schema: 'm1249_users')]
#[UniqueEntity('email')]
class User implements PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(type: "bigint", options: ["unsigned" => true])]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $username = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $lastname = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $usernameCanonical = null;

    #[ORM\Column(type: "string", length: 255, nullable: false)]
    private string $email;

    #[ORM\Column(type: "string", length: 255, nullable: false)]
    private string $emailCanonical;

    #[ORM\Column(type: "boolean", nullable: false)]
    private bool $enabled;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $salt = null;

    #[ORM\Column(type: "string", length: 255, nullable: false)]
    private string $password;

    #[ORM\Column(type: "datetime", nullable: true)]
    private ?DateTime $lastLogin = null;

    #[ORM\Column(type: "boolean", options: ["default" => '0'])]
    private bool $locked = false;

    #[ORM\Column(type: "boolean", options: ["default" => '0'])]
    private bool $expired = false;

    #[ORM\Column(type: "datetime", nullable: true)]
    private ?DateTime $expiresAt = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $confirmationToken = null;

    #[ORM\Column(type: "datetime", nullable: true)]
    private ?DateTime $passwordRequestedAt = null;

    #[ORM\Column(type: "text", nullable: false)]
    private string $roles;

    #[ORM\Column(type: "decimal", precision: 8, scale: 2, nullable: true, options: ["unsigned" => true])]
    private ?float $budget = null;

    #[ORM\Column(type: "boolean", options: ["default" => '0'])]
    private bool $credentialsExpired = false;

    #[ORM\Column(type: "datetime", nullable: true)]
    private ?DateTime $credentialsExpireAt = null;

    #[ORM\Column(type: "timestamp", nullable: false, options: ["default" => "CURRENT_TIMESTAMP"])]
    private ?DateTime $createdAt = null;

    #[ORM\Column(type: "integer", nullable: true, options: ["unsigned" => true])]
    private ?int $idCity = null;

    #[ORM\Column(type: "integer", nullable: true, options: ["unsigned" => true])]
    private ?int $idProvince = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $street = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $postalCode = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $homeNumber = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $apartmentNumber = null;

    #[ORM\Column(type: "bigint", nullable: true, options: ["unsigned" => true])]
    private ?int $facebookId = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $facebookAccessToken = null;

    #[ORM\Column(type: "char", length: 1, nullable: true)]
    private ?string $createdBy = '0';

    #[ORM\Column(type: "char", length: 1, nullable: true)]
    private ?string $agreeMarketing = null;

    #[ORM\Column(type: "char", length: 1, nullable: true)]
    private ?string $agreeRules = null;

    #[ORM\Column(type: "datetime", nullable: true)]
    private ?\DateTimeInterface $passwordChangedAt = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $avatar = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $avatarAbsolutePath = null;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $aboutMe = null;

    #[ORM\Column(type: "char", length: 1, nullable: false, options: ["default" => '0'])]
    private string $publishEmailAddress = '0';

    #[ORM\Column(type: "char", length: 1, nullable: false, options: ["default" => '0'])]
    private string $publishTimetable = '0';

    #[ORM\Column(type: "string", length: 64, nullable: true)]
    private ?string $phone = null;

    #[ORM\Column(type: "char", length: 1, nullable: false, options: ["default" => '0'])]
    private string $publishPhone = '0';

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $lastnameCanonical = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $instagramUrl = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $facebookUrl = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $slug = null;

    #[ORM\Column(type: "char", length: 1, nullable: false, options: ["default" => '0'])]
    private string $isTrusted = '0';

    #[ORM\Column(type: "string", length: 64, nullable: true)]
    private ?string $identityCardNumber = null;

    #[ORM\Column(type: "int", nullable: true)]
    private ?int $parentId = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $teamName = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $city = null;

    #[ORM\Column(type: "datetime", nullable: true)]
    private ?\DateTimeInterface $isRefereeAt = null;

    #[ORM\Column(type: "int", nullable: true)]
    private ?int $idRefereeGrade = null;

    #[ORM\Column(type: "tinyint", options: ["default" => '0'])]
    private bool $isStaffMember = false;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $youtubeUrl = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $siteUrl = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $twitterUrl = null;

    #[ORM\Column(type: "int", nullable: true)]
    private ?int $countryId = null;

    #[ORM\Column(type: "tinyint", options: ["default" => '0'])]
    private bool $shallowRemoved = false;

    #[ORM\Column(type: "date", nullable: true)]
    private ?\DateTimeInterface $bornDate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;
        return $this;
    }

    public function getUsernameCanonical(): ?string
    {
        return $this->usernameCanonical;
    }

    public function setUsernameCanonical(?string $usernameCanonical): self
    {
        $this->usernameCanonical = $usernameCanonical;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getEmailCanonical(): string
    {
        return $this->emailCanonical;
    }

    public function setEmailCanonical(string $emailCanonical): self
    {
        $this->emailCanonical = $emailCanonical;
        return $this;
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;
        return $this;
    }

    public function getSalt(): ?string
    {
        return $this->salt;
    }

    public function setSalt(?string $salt): self
    {
        $this->salt = $salt;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function getLastLogin(): ?DateTime
    {
        return $this->lastLogin;
    }

    public function setLastLogin(?DateTime $lastLogin): self
    {
        $this->lastLogin = $lastLogin;
        return $this;
    }

    public function isLocked(): bool
    {
        return $this->locked;
    }

    public function setLocked(bool $locked): self
    {
        $this->locked = $locked;
        return $this;
    }

    public function isExpired(): bool
    {
        return $this->expired;
    }

    public function setExpired(bool $expired): self
    {
        $this->expired = $expired;
        return $this;
    }

    public function getExpiresAt(): ?DateTime
    {
        return $this->expiresAt;
    }

    public function setExpiresAt(?DateTime $expiresAt): self
    {
        $this->expiresAt = $expiresAt;
        return $this;
    }

    public function getConfirmationToken(): ?string
    {
        return $this->confirmationToken;
    }

    public function setConfirmationToken(?string $confirmationToken): self
    {
        $this->confirmationToken = $confirmationToken;
        return $this;
    }

    public function getPasswordRequestedAt(): ?DateTime
    {
        return $this->passwordRequestedAt;
    }

    public function setPasswordRequestedAt(?DateTime $passwordRequestedAt): self
    {
        $this->passwordRequestedAt = $passwordRequestedAt;
        return $this;
    }

    public function getRoles(): string
    {
        return $this->roles;
    }

    public function setRoles(string $roles): self
    {
        $this->roles = $roles;
        return $this;
    }

    public function getBudget(): ?float
    {
        return $this->budget;
    }

    public function setBudget(?float $budget): self
    {
        $this->budget = $budget;
        return $this;
    }

    public function isCredentialsExpired(): bool
    {
        return $this->credentialsExpired;
    }

    public function setCredentialsExpired(bool $credentialsExpired): self
    {
        $this->credentialsExpired = $credentialsExpired;
        return $this;
    }

    public function getCredentialsExpireAt(): ?DateTime
    {
        return $this->credentialsExpireAt;
    }

    public function setCredentialsExpireAt(?DateTime $credentialsExpireAt): self
    {
        $this->credentialsExpireAt = $credentialsExpireAt;
        return $this;
    }

    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getIdCity(): ?int
    {
        return $this->idCity;
    }

    public function setIdCity(?int $idCity): self
    {
        $this->idCity = $idCity;
        return $this;
    }

    public function getIdProvince(): ?int
    {
        return $this->idProvince;
    }

    public function setIdProvince(?int $idProvince): self
    {
        $this->idProvince = $idProvince;
        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): self
    {
        $this->street = $street;
        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): self
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    public function getHomeNumber(): ?string
    {
        return $this->homeNumber;
    }

    public function setHomeNumber(?string $homeNumber): self
    {
        $this->homeNumber = $homeNumber;
        return $this;
    }

    public function getApartmentNumber(): ?string
    {
        return $this->apartmentNumber;
    }

    public function setApartmentNumber(?string $apartmentNumber): self
    {
        $this->apartmentNumber = $apartmentNumber;
        return $this;
    }

    public function getFacebookId(): ?int
    {
        return $this->facebookId;
    }

    public function setFacebookId(?int $facebookId): self
    {
        $this->facebookId = $facebookId;
        return $this;
    }

    public function getFacebookAccessToken(): ?string
    {
        return $this->facebookAccessToken;
    }

    public function setFacebookAccessToken(?string $facebookAccessToken): self
    {
        $this->facebookAccessToken = $facebookAccessToken;
        return $this;
    }

    public function getCreatedBy(): ?string
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?string $createdBy): self
    {
        $this->createdBy = $createdBy;
        return $this;
    }

    public function getAgreeMarketing(): ?string
    {
        return $this->agreeMarketing;
    }

    public function setAgreeMarketing(?string $agreeMarketing): self
    {
        $this->agreeMarketing = $agreeMarketing;
        return $this;
    }

    public function getAgreeRules(): ?string
    {
        return $this->agreeRules;
    }

    public function setAgreeRules(?string $agreeRules): self
    {
        $this->agreeRules = $agreeRules;
        return $this;
    }

    public function getPasswordChangedAt(): ?\DateTimeInterface
    {
        return $this->passwordChangedAt;
    }

    public function setPasswordChangedAt(?\DateTimeInterface $passwordChangedAt): self
    {
        $this->passwordChangedAt = $passwordChangedAt;
        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): self
    {
        $this->avatar = $avatar;
        return $this;
    }

    public function getAvatarAbsolutePath(): ?string
    {
        return $this->avatarAbsolutePath;
    }

    public function setAvatarAbsolutePath(?string $avatarAbsolutePath): self
    {
        $this->avatarAbsolutePath = $avatarAbsolutePath;
        return $this;
    }

    public function getAboutMe(): ?string
    {
        return $this->aboutMe;
    }

    public function setAboutMe(?string $aboutMe): self
    {
        $this->aboutMe = $aboutMe;
        return $this;
    }

    public function getPublishEmailAddress(): string
    {
        return $this->publishEmailAddress;
    }

    public function setPublishEmailAddress(string $publishEmailAddress): self
    {
        $this->publishEmailAddress = $publishEmailAddress;
        return $this;
    }

    public function getPublishTimetable(): string
    {
        return $this->publishTimetable;
    }

    public function setPublishTimetable(string $publishTimetable): self
    {
        $this->publishTimetable = $publishTimetable;
        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;
        return $this;
    }

    public function getPublishPhone(): string
    {
        return $this->publishPhone;
    }

    public function setPublishPhone(string $publishPhone): self
    {
        $this->publishPhone = $publishPhone;
        return $this;
    }

    public function getLastnameCanonical(): ?string
    {
        return $this->lastnameCanonical;
    }

    public function setLastnameCanonical(?string $lastnameCanonical): self
    {
        $this->lastnameCanonical = $lastnameCanonical;
        return $this;
    }

    public function getInstagramUrl(): ?string
    {
        return $this->instagramUrl;
    }

    public function setInstagramUrl(?string $instagramUrl): self
    {
        $this->instagramUrl = $instagramUrl;
        return $this;
    }

    public function getFacebookUrl(): ?string
    {
        return $this->facebookUrl;
    }

    public function setFacebookUrl(?string $facebookUrl): self
    {
        $this->facebookUrl = $facebookUrl;
        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;
        return $this;
    }

    public function getIsTrusted(): string
    {
        return $this->isTrusted;
    }

    public function setIsTrusted(string $isTrusted): self
    {
        $this->isTrusted = $isTrusted;
        return $this;
    }

    public function getIdentityCardNumber(): ?string
    {
        return $this->identityCardNumber;
    }

    public function setIdentityCardNumber(?string $identityCardNumber): self
    {
        $this->identityCardNumber = $identityCardNumber;
        return $this;
    }

    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    public function setParentId(?int $parentId): self
    {
        $this->parentId = $parentId;
        return $this;
    }

    public function getTeamName(): ?string
    {
        return $this->teamName;
    }

    public function setTeamName(?string $teamName): self
    {
        $this->teamName = $teamName;
        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;
        return $this;
    }

    public function getIsRefereeAt(): ?\DateTimeInterface
    {
        return $this->isRefereeAt;
    }

    public function setIsRefereeAt(?\DateTimeInterface $isRefereeAt): self
    {
        $this->isRefereeAt = $isRefereeAt;
        return $this;
    }

    public function getIdRefereeGrade(): ?int
    {
        return $this->idRefereeGrade;
    }

    public function setIdRefereeGrade(?int $idRefereeGrade): self
    {
        $this->idRefereeGrade = $idRefereeGrade;
        return $this;
    }

    public function getIsStaffMember(): bool
    {
        return $this->isStaffMember;
    }

    public function setIsStaffMember(bool $isStaffMember): self
    {
        $this->isStaffMember = $isStaffMember;
        return $this;
    }

    public function getYoutubeUrl(): ?string
    {
        return $this->youtubeUrl;
    }

    public function setYoutubeUrl(?string $youtubeUrl): self
    {
        $this->youtubeUrl = $youtubeUrl;
        return $this;
    }

    public function getSiteUrl(): ?string
    {
        return $this->siteUrl;
    }

    public function setSiteUrl(?string $siteUrl): self
    {
        $this->siteUrl = $siteUrl;
        return $this;
    }

    public function getTwitterUrl(): ?string
    {
        return $this->twitterUrl;
    }

    public function setTwitterUrl(?string $twitterUrl): self
    {
        $this->twitterUrl = $twitterUrl;
        return $this;
    }

    public function getCountryId(): ?int
    {
        return $this->countryId;
    }

    public function setCountryId(?int $countryId): self
    {
        $this->countryId = $countryId;
        return $this;
    }

    public function getShallowRemoved(): bool
    {
        return $this->shallowRemoved;
    }

    public function setShallowRemoved(bool $shallowRemoved): self
    {
        $this->shallowRemoved = $shallowRemoved;
        return $this;
    }

    public function getBornDate(): ?\DateTimeInterface
    {
        return $this->bornDate;
    }

    public function setBornDate(?\DateTimeInterface $bornDate): self
    {
        $this->bornDate = $bornDate;
        return $this;
    }
}
