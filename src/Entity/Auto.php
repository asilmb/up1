<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AutoRepository")
 */


class Auto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $model;

    /**
     * @ORM\Column(type="integer", length=255, nullable=true)
     */
    private $company;
    /**
     * @ORM\Column(type="integer", length=255, nullable=true)
     */
    private $year;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pic;


    /**
     * @ORM\Column(type="decimal", length=255, nullable=true)
     */
    private $price;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $desc;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $transmission;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fuel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $gear;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $engine;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $colors;

    /**
     * @ORM\Column(type="datetimetz")
     */
    private $createdAt;
    /**
     * @ORM\Column(type="datetimetz")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\type", inversedBy="autos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\feature", inversedBy="autos")
     */
    private $feature;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\user", inversedBy="autos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user_id;



    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\city", inversedBy="registeredAutos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $registered;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\city", inversedBy="assemblyAuto")
     * @ORM\JoinColumn(nullable=false)
     */
    private $assembly;

    public function __construct()
    {
        $this->feature = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getCompany(): ?int
    {
        return $this->company;
    }

    public function setCompany(?int $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(?string $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getPic(): ?int
    {
        return $this->pic;
    }

    public function setPic(?int $pic): self
    {
        $this->pic = $pic;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDesc()
    {
        return $this->desc;
    }

    public function setDesc($desc): self
    {
        $this->desc = $desc;

        return $this;
    }

    public function getEngineCapacity(): ?string
    {
        return $this->engineCapacity;
    }

    public function setEngineCapacity(?string $engineCapacity): self
    {
        $this->engineCapacity = $engineCapacity;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(?int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getAvailableColors(): ?string
    {
        return $this->availableColors;
    }

    public function setAvailableColors(?string $availableColors): self
    {
        $this->availableColors = $availableColors;

        return $this;
    }

    public function getCarFeatures(): ?string
    {
        return $this->carFeatures;
    }

    public function setCarFeatures(?string $carFeatures): self
    {
        $this->carFeatures = $carFeatures;

        return $this;
    }


    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updatedTimestamps(): void
    {
        $this->setUpdatedAt(new \DateTime('now'));
        if ($this->getCreatedAt() === null) {
            $this->setCreatedAt(new \DateTime('now'));
        }
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }


    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }


    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }


    public function setUpdatedAt($updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }


    public function getFeatures()
    {
        return $this->features;
    }


    public function setFeatures($features): void
    {
        $this->features = $features;
    }


    public function getColors()
    {
        return $this->colors;
    }


    public function setColors($colors): void
    {
        $this->colors = $colors;
    }


    public function getEngine()
    {
        return $this->engine;
    }


    public function setEngine($engine): void
    {
        $this->engine = $engine;
    }


    public function getGear()
    {
        return $this->gear;
    }


    public function setGear($gear): void
    {
        $this->gear = $gear;
    }


    public function getFuel()
    {
        return $this->fuel;
    }


    public function setFuel($fuel): void
    {
        $this->fuel = $fuel;
    }

    public function getRegistered()
    {
        return $this->registered;
    }

    public function setRegistered($registered): void
    {
        $this->registered = $registered;
    }

    public function getTransmission()
    {
        return $this->transmission;
    }

    public function setTransmission($transmission): void
    {
        $this->transmission = $transmission;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return Collection|feature[]
     */
    public function getFeature(): Collection
    {
        return $this->feature;
    }

    public function addFeature(feature $feature): self
    {
        if (!$this->feature->contains($feature)) {
            $this->feature[] = $feature;
        }

        return $this;
    }

    public function removeFeature(feature $feature): self
    {
        if ($this->feature->contains($feature)) {
            $this->feature->removeElement($feature);
        }

        return $this;
    }


    public function getAssembly()
    {
        return $this->assembly;
    }


    public function setAssembly($assembly): void
    {
        $this->assembly = $assembly;
    }
}
//ABS AM/FM Radio Air Bags Air Conditioning Alloy Rims CD Player Immobilizer Key Keyless Entry Power Locks Power Mirrors Power Steering Power Windows