<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=EvenementRepository::class)
 * @Vich\Uploadable
 */
class Evenement
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
    private $interne;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $externe;

   



    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $texte;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateFin;
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

    public function getInterne(): ?string
    {
        return $this->interne;
    }

    public function setInterne(?string $interne): self
    {
        $this->interne = $interne;

        return $this;
    }

    public function getExterne(): ?string
    {
        return $this->externe;
    }

    public function setExterne(?string $externe): self
    {
        $this->externe = $externe;

        return $this;
    }

    

    

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(?string $texte): self
    {
        $this->texte = $texte;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    
}
