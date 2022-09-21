<?php

namespace App\Entity;

use App\Entity\Cheval;
use App\Entity\Cavalier;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
// ====================================================== //
// ====================== PROPRIETE ===================== //
// ====================================================== //
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $telephone;



    /**
     * @ORM\Column(type="boolean")
     */
    private $isVerified = false;

    /**
     * @ORM\OneToMany(targetEntity=Cheval::class, mappedBy="user")
     */
    private $cheval;

    /**
     * @ORM\OneToMany(targetEntity=Cavalier::class, mappedBy="user", orphanRemoval=true)
     */
    private $cavalier;

    // /**
    //  * @ORM\Column(type="string", length=255, nullable=true)
    //  */
    // private $imageName;
    // /**
    //  * NOTE: This is not a mapped field of entity metadata, just a simple property.
    //  * 
    //  * @Vich\UploadableField(mapping="cavalier", fileNameProperty="imageName")
    //  * 
    //  * @var File|null
    //  */
    // private $imageFile;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\OneToOne(targetEntity=Avatar::class, inversedBy="user", cascade={"persist", "remove"})
     */
    private $avatar;


    // ====================================================== //
    // ==================== CONSTRUCTEUR ==================== //
    // ====================================================== //
    public function __construct()
    {
        $this->cheval = new ArrayCollection();
        $this->cavalier = new ArrayCollection();
    }

    // ====================================================== //
    // =================== MAGIC FUCNTION =================== //
    // ====================================================== //

    public function _toString()
    {
        return $this->user_nom;
    }

    // ====================================================== //
    // =================GETTEUR/SETTEUR====================== //
    // ====================================================== //

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }



    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    /**
     * @return Collection<int, Cheval>
     */
    public function getCheval(): Collection
    {
        return $this->cheval;
    }

    public function addCheval(Cheval $cheval): self
    {
        if (!$this->cheval->contains($cheval)) {
            $this->cheval[] = $cheval;
            $cheval->setUser($this);
        }

        return $this;
    }

    public function removeCheval(Cheval $cheval): self
    {
        if ($this->cheval->removeElement($cheval)) {
            // set the owning side to null (unless already changed)
            if ($cheval->getUser() === $this) {
                $cheval->setUser(null);
            }
        }
        return $this;
    }
    public function __toString(): string
    {
        return $this->getNom() . " " . $this->getPrenom();
    }

    /**
     * @return Collection<int, Cavalier>
     */
    public function getCavalier(): Collection
    {
        return $this->cavalier;
    }

    public function addCavalier(Cavalier $cavalier): self
    {
        if (!$this->cavalier->contains($cavalier)) {
            $this->cavalier[] = $cavalier;
            $cavalier->setUser($this);
        }

        return $this;
    }

    public function removeCavalier(Cavalier $cavalier): self
    {
        if ($this->cavalier->removeElement($cavalier)) {
            // set the owning side to null (unless already changed)
            if ($cavalier->getUser() === $this) {
                $cavalier->setUser(null);
            }
        }

        return $this;
    }

    // public function getImageName(): ?string
    // {
    //     return $this->imageName;
    // }

    // public function setImageName(?string $imageName): self
    // {
    //     $this->imageName = $imageName;

    //     return $this;
    // }



    // /**
    //  * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
    //  * of 'UploadedFile' is injected into this setter to trigger the update. If this
    //  * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
    //  * must be able to accept an instance of 'File' as the bundle will inject one here
    //  * during Doctrine hydration.
    //  *
    //  * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
    //  */
    // public function setImageFile(?File $imageFile = null): void
    // {
    //     $this->imageFile = $imageFile;

    //     if (null !== $imageFile) {
    //         // It is required that at least one field changes if you are using doctrine
    //         // otherwise the event listeners won't be called and the file is lost
    //         $this->updatedAt = new \DateTimeImmutable();
    //     }
    // }

    // public function getImageFile(): ?File
    // {
    //     return $this->imageFile;
    // }


    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getAvatar(): ?Avatar
    {
        return $this->avatar;
    }

    public function setAvatar(?Avatar $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }
}
