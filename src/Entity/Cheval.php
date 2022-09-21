<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ChevalRepository;
use Doctrine\Common\Collections\Collection;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ChevalRepository::class)
 * @Vich\Uploadable
 */
class Cheval
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
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $alimentation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $veto;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageName;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $updatedAt;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="cheval", fileNameProperty="imageName")
     * 
     * @var File|null
     */
    private $imageFile;

    /**
     * @ORM\ManyToMany(targetEntity=Cavalier::class, mappedBy="chevaux")
     */
    private $cavaliers;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="cheval",cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=EvenementSante::class, mappedBy="cheval", orphanRemoval=true)
     */
    private $evenementSante;

    // ====================================================== //
    // ===================== CONTRUCTEUR ==================== //
    // ====================================================== //

    public function __construct()
    {
        $this->cavaliers = new ArrayCollection();
        $this->evenementSante = new ArrayCollection();
    }

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

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getAlimentation(): ?string
    {
        return $this->alimentation;
    }

    public function setAlimentation(?string $alimentation): self
    {
        $this->alimentation = $alimentation;

        return $this;
    }

    public function getVeto(): ?string
    {
        return $this->veto;
    }

    public function setVeto(string $veto): self
    {
        $this->veto = $veto;

        return $this;
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
    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }


    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, Cavalier>
     */
    public function getCavaliers(): Collection
    {
        return $this->cavaliers;
    }

    public function addCavalier(Cavalier $cavalier): self
    {
        if (!$this->cavaliers->contains($cavalier)) {
            $this->cavaliers[] = $cavalier;
            $cavalier->addChevaux($this);
        }

        return $this;
    }

    public function removeCavalier(Cavalier $cavalier): self
    {
        if ($this->cavaliers->removeElement($cavalier)) {
            $cavalier->removeChevaux($this);
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, EvenementSante>
     */
    public function getEvenementSante(): Collection
    {
        return $this->evenementSante;
    }

    public function addEvenementSante(EvenementSante $evenementSante): self
    {
        if (!$this->evenementSante->contains($evenementSante)) {
            $this->evenementSante[] = $evenementSante;
            $evenementSante->setCheval($this);
        }

        return $this;
    }

    public function removeEvenementSante(EvenementSante $evenementSante): self
    {
        if ($this->evenementSante->removeElement($evenementSante)) {
            // set the owning side to null (unless already changed)
            if ($evenementSante->getCheval() === $this) {
                $evenementSante->setCheval(null);
            }
        }

        return $this;
    }
}
