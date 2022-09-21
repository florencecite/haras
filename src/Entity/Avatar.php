<?php

namespace App\Entity;

use DateTime;
use Serializable;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AvatarRepository;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=AvatarRepository::class)
 * @Vich\Uploadable
 */
class Avatar implements Serializable
{
    // ====================================================== //
    // ===================== PROPRIETES ===================== //
    // ====================================================== //
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageName;

    /**
     * @Vich\UploadableField(mapping="user", fileNameProperty="imageName")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="avatar", cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    // /**
    //  * @ORM\OneToOne(targetEntity=User::class, inversedBy="avatar", cascade={"persist", "remove"})
    //  */
    // private $user;

    // ====================================================== //
    // ==================== CONSTRUCTEUR ==================== //
    // ====================================================== //

    // ====================================================== //
    // ====================== METHODES ====================== //
    // ====================================================== //
    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->imageName,

        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,

        ) = unserialize($serialized);
    }
    // ====================================================== //
    // =================== GETTERS/SETTERS ================== //
    // ====================================================== //

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(?string $imageName): self
    {
        $this->imageName = $imageName;

        return $this;
    }

    public function setImageFile(?File $imageFile = null)
    {
        $this->imageFile = $imageFile;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($imageFile) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }
    
    // public function getUser(): ?User
    // {
    //     return $this->user;
    // }

    // public function setUser(?User $user): self
    // {
    //     $this->user = $user;

    //     return $this;
    // }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        // unset the owning side of the relation if necessary
        if ($user === null && $this->user !== null) {
            $this->user->setAvatar(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getAvatar() !== $this) {
            $user->setAvatar($this);
        }

        $this->user = $user;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
