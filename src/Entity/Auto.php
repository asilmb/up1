<?php

namespace App\Entity;

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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $price;
    /**
     * @ORM\Column(type="decimal", length=255, nullable=true)
     */
    private $desc;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $engine;
    /**
     * @ORM\Column(type="integer", length=255, nullable=true)
     */
    private $type;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $colors;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $features;

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

    }
//ABS AM/FM Radio Air Bags Air Conditioning Alloy Rims CD Player Immobilizer Key Keyless Entry Power Locks Power Mirrors Power Steering Power Windows