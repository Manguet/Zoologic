<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnimalRepository")
 */
class Animal
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $race;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isAlive;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\LivingZone", inversedBy="animals")
     */
    private $livingZone;

    public function __construct()
    {
        $this->livingZone = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getRace(): ?string
    {
        return $this->race;
    }

    public function setRace(string $race): self
    {
        $this->race = $race;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIsAlive(): ?bool
    {
        return $this->isAlive;
    }

    public function setIsAlive(bool $isAlive): self
    {
        $this->isAlive = $isAlive;

        return $this;
    }

    /**
     * @return Collection|LivingZone[]
     */
    public function getLivingZone(): Collection
    {
        return $this->livingZone;
    }

    public function addLivingZone(LivingZone $livingZone): self
    {
        if (!$this->livingZone->contains($livingZone)) {
            $this->livingZone[] = $livingZone;
        }

        return $this;
    }

    public function removeLivingZone(LivingZone $livingZone): self
    {
        if ($this->livingZone->contains($livingZone)) {
            $this->livingZone->removeElement($livingZone);
        }

        return $this;
    }
}
