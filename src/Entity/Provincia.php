<?php

namespace App\Entity;

use App\Repository\ProvinciaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProvinciaRepository::class)]
class Provincia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $descripcion = null;

    #[ORM\OneToMany(mappedBy: 'provincia_id', targetEntity: Ciudad::class)]
    private Collection $ciudads;

    #[ORM\OneToMany(mappedBy: 'provincia', targetEntity: Ciudad::class)]
    private Collection $y;

    public function __construct()
    {
        $this->ciudads = new ArrayCollection();
        $this->y = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): static
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * @return Collection<int, Ciudad>
     */
    public function getCiudads(): Collection
    {
        return $this->ciudads;
    }

    public function addCiudad(Ciudad $ciudad): static
    {
        if (!$this->ciudads->contains($ciudad)) {
            $this->ciudads->add($ciudad);
            $ciudad->setProvinciaId($this);
        }

        return $this;
    }

    public function removeCiudad(Ciudad $ciudad): static
    {
        if ($this->ciudads->removeElement($ciudad)) {
            // set the owning side to null (unless already changed)
            if ($ciudad->getProvinciaId() === $this) {
                $ciudad->setProvinciaId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Ciudad>
     */
    public function getY(): Collection
    {
        return $this->y;
    }

    public function addY(Ciudad $y): static
    {
        if (!$this->y->contains($y)) {
            $this->y->add($y);
            $y->setProvincia($this);
        }

        return $this;
    }

    public function removeY(Ciudad $y): static
    {
        if ($this->y->removeElement($y)) {
            // set the owning side to null (unless already changed)
            if ($y->getProvincia() === $this) {
                $y->setProvincia(null);
            }
        }

        return $this;
    }
}
