<?php

namespace App\Entity;

use App\Repository\AtelierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AtelierRepository::class)]
class Atelier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $lieu = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?int $participants_max = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\Column]
    private ?bool $visible = null;

    #[ORM\Column(length: 50)]
    private ?string $statut = null;

    #[ORM\ManyToOne(inversedBy: 'ateliers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $createur = null;

    /**
     * @var Collection<int, InscriptionAtelier>
     */
    #[ORM\OneToMany(targetEntity: InscriptionAtelier::class, mappedBy: 'atelier')]
    private Collection $inscriptionAteliers;

    public function __construct()
    {
        $this->inscriptionAteliers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): static
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getParticipantsMax(): ?int
    {
        return $this->participants_max;
    }

    public function setParticipantsMax(int $participants_max): static
    {
        $this->participants_max = $participants_max;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function isVisible(): ?bool
    {
        return $this->visible;
    }

    public function setVisible(bool $visible): static
    {
        $this->visible = $visible;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getCreateur(): ?User
    {
        return $this->createur;
    }

    public function setCreateur(?User $createur): static
    {
        $this->createur = $createur;

        return $this;
    }

    /**
     * @return Collection<int, InscriptionAtelier>
     */
    public function getInscriptionAteliers(): Collection
    {
        return $this->inscriptionAteliers;
    }

    public function addInscriptionAtelier(InscriptionAtelier $inscriptionAtelier): static
    {
        if (!$this->inscriptionAteliers->contains($inscriptionAtelier)) {
            $this->inscriptionAteliers->add($inscriptionAtelier);
            $inscriptionAtelier->setAtelier($this);
        }

        return $this;
    }

    public function removeInscriptionAtelier(InscriptionAtelier $inscriptionAtelier): static
    {
        if ($this->inscriptionAteliers->removeElement($inscriptionAtelier)) {
            // set the owning side to null (unless already changed)
            if ($inscriptionAtelier->getAtelier() === $this) {
                $inscriptionAtelier->setAtelier(null);
            }
        }

        return $this;
    }
}
