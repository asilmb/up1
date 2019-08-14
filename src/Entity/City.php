<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CityRepository")
 */
class City
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
     * @ORM\ManyToOne(targetEntity="App\Entity\region", inversedBy="cities")
     * @ORM\JoinColumn(nullable=false)
     */
    private $region;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\country", inversedBy="cities")
     * @ORM\JoinColumn(nullable=false)
     */
    private $country;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Auto", mappedBy="registered")
     */
    private $registeredAutos;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Auto", mappedBy="assembly")
     */
    private $assemblyAutos;



    public function __construct()
    {
        $this->registeredAutos = new ArrayCollection();
        $this->assemblyAutos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountryId(): ?int
    {
        return $this->country_id;
    }

    public function setCountryId(int $country_id): self
    {
        $this->country_id = $country_id;

        return $this;
    }

    public function getRegionId(): ?int
    {
        return $this->region_id;
    }

    public function setRegionId(int $region_id): self
    {
        $this->region_id = $region_id;

        return $this;
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

    public function getRegion(): ?region
    {
        return $this->region;
    }

    public function setRegion(?region $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getCountry(): ?country
    {
        return $this->country;
    }

    public function setCountry(?country $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Collection|Auto[]
     */
    public function getRegisteredAutos(): Collection
    {
        return $this->registeredAutos;
    }

    public function addRegisteredAuto(Auto $registeredAuto): self
    {
        if (!$this->registeredAutos->contains($registeredAuto)) {
            $this->registeredAutos[] = $registeredAuto;
            $registeredAuto->setRegistered($this);
        }

        return $this;
    }

    public function removeRegisteredAuto(Auto $registeredAuto): self
    {
        if ($this->registeredAutos->contains($registeredAuto)) {
            $this->registeredAutos->removeElement($registeredAuto);
            // set the owning side to null (unless already changed)
            if ($registeredAuto->getRegistered() === $this) {
                $registeredAuto->setRegistered(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Auto[]
     */
    public function getAssemblyAutos(): Collection
    {
        return $this->assemblyAutos;
    }

    public function addAssemblyAuto(Auto $assemblyAuto): self
    {
        if (!$this->assemblyAutos->contains($assemblyAuto)) {
            $this->assemblyAutos[] = $assemblyAuto;
            $assemblyAuto->setAssembly($this);
        }

        return $this;
    }

    public function removeAssemblyAuto(Auto $assemblyAuto): self
    {
        if ($this->assemblyAutos->contains($assemblyAuto)) {
            $this->assemblyAutos->removeElement($assemblyAuto);
            // set the owning side to null (unless already changed)
            if ($assemblyAuto->getAssembly() === $this) {
                $assemblyAuto->setAssembly(null);
            }
        }

        return $this;
    }


}
