<?php

namespace App\Entity;

use App\Repository\BeneficiairesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BeneficiairesRepository::class)]
class Beneficiaires
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $telephone = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $cause = null;

    #[ORM\Column(length: 255)]
    private ?string $est_elle_association = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    /**
     * @var Collection<int, Dons>
     */
    #[ORM\OneToMany(targetEntity: Dons::class, mappedBy: 'beneficiaire')]
    private Collection $beneficiaire;

    public function __construct()
    {
        $this->beneficiaire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getCause(): ?string
    {
        return $this->cause;
    }

    public function setCause(string $cause): static
    {
        $this->cause = $cause;

        return $this;
    }

    public function getEstElleAssociation(): ?string
    {
        return $this->est_elle_association;
    }

    public function setEstElleAssociation(string $est_elle_association): static
    {
        $this->est_elle_association = $est_elle_association;

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

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection<int, Dons>
     */
    public function getBeneficiaire(): Collection
    {
        return $this->beneficiaire;
    }

    public function addBeneficiaire(Dons $beneficiaire): static
    {
        if (!$this->beneficiaire->contains($beneficiaire)) {
            $this->beneficiaire->add($beneficiaire);
            $beneficiaire->setBeneficiaire($this);
        }

        return $this;
    }

    public function removeBeneficiaire(Dons $beneficiaire): static
    {
        if ($this->beneficiaire->removeElement($beneficiaire)) {
            // set the owning side to null (unless already changed)
            if ($beneficiaire->getBeneficiaire() === $this) {
                $beneficiaire->setBeneficiaire(null);
            }
        }

        return $this;
    }
}
