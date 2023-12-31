<?php

namespace App\Entity;

use App\Repository\LocateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocateurRepository::class)]
class Locateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $age = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $adresse = null;

    #[ORM\ManyToOne(inversedBy: 'locateurs')]
    private ?Voiture $voiture = null;

    #[ORM\ManyToMany(targetEntity: Modele::class, inversedBy: 'locateurs')]
    private Collection $locateur;

    public function __construct()
    {
        $this->locateur = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(string $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVoiture(): ?voiture
    {
        return $this->voiture;
    }

    public function setVoiture(?Voiture $voiture): static
    {
        $this->voiture = $voiture;

        return $this;
    }

    /**
     * @return Collection<int, modele>
     */
    public function getLocateur(): Collection
    {
        return $this->locateur;
    }

    public function addLocateur(Modele $locateur): static
    {
        if (!$this->locateur->contains($locateur)) {
            $this->locateur->add($locateur);
        }

        return $this;
    }

    public function removeLocateur(Modele $locateur): static
    {
        $this->locateur->removeElement($locateur);

        return $this;
    }
}
