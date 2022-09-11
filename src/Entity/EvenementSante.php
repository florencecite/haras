<?php

namespace App\Entity;

use App\Repository\EvenementSanteRepository;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=EvenementSanteRepository::class)
 * @Vich\Uploadable
 */
class EvenementSante
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
     * @ORM\Column(type="string", length=255)
     */
    private $soin;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateEntree;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateFin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hospitalisation;
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

    public function getSoin(): ?string
    {
        return $this->soin;
    }

    public function setSoin(string $soin): self
    {
        $this->soin = $soin;

        return $this;
    }

    public function getDateEntree(): ?\DateTimeInterface
    {
        return $this->dateEntree;
    }

    public function setDateEntree(\DateTimeInterface $dateEntree): self
    {
        $this->dateEntree = $dateEntree;

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

    public function getHospitalisation(): ?string
    {
        return $this->hospitalisation;
    }

    public function setHospitalisation(string $hospitalisation): self
    {
        $this->hospitalisation = $hospitalisation;

        return $this;
    }
}
