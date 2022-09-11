<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 * @Vich\Uploadable
 */
class Contact
{
// ====================================================== //
// ====================== PROPRIETE ===================== //
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;


    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numeroTelephone;
// ====================================================== //
// ===================== CONTRUCTEUR ==================== //
// ====================================================== //

// ====================================================== //
// =================== MAGIC FUCNTION =================== //
// ====================================================== //

// ====================================================== //
// =================GETTEUR/SETTEUR====================== //
// ====================================================== //

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNumeroTelephone(): ?int
    {
        return $this->numeroTelephone;
    }

    public function setNumeroTelephone(?int $numeroTelephone): self
    {
        $this->numeroTelephone = $numeroTelephone;

        return $this;
    }
}
