<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Validator\Constraints as CarAssert;

/**
 * @ApiResource()
 * @ORM\Entity()
 */
class Car
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @CarAssert\CarModel()
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=7)
     * @CarAssert\HexColor()
     */
    private $color;

    /**
     * @ORM\Column(type="integer", length=14)
     * @Assert\Currency()
     */
    private $price;

    /**
     * @ORM\Column(type="date")
     * @Assert\Type("\DateTimeInterface")
     */
    private $productionDate;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getModel(): ?string
    {
        return $this->model;
    }

    /**
     * @param string $model
     * @return $this
     */
    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getColor(): ?string
    {
        return $this->color;
    }

    /**
     * @param string $color
     * @return $this
     */
    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPrice(): ?string
    {
        return $this->price;
    }

    /**
     * @param string $price
     * @return $this
     */
    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getProductionDate(): ?DateTimeInterface
    {
        return $this->productionDate;
    }

    /**
     * @param DateTimeInterface $productionDate
     * @return $this
     */
    public function setProductionDate(DateTimeInterface $productionDate): self
    {
        $this->productionDate = $productionDate;

        return $this;
    }
}
