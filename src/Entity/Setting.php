<?php

namespace App\Entity;

use App\Repository\SettingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SettingRepository::class)
 */
class Setting
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $currency;

    /**
     * @ORM\Column(type="integer")
     */
    private int $periodLength;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $groupBy;

    public function __construct(string $currency, int $periodLength, string $groupBy)
    {
        $this->currency = $currency;
        $this->periodLength = $periodLength;
        $this->groupBy = $groupBy;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getPeriodLength(): ?int
    {
        return $this->periodLength;
    }

    public function setPeriodLength(int $periodLength): self
    {
        $this->periodLength = $periodLength;

        return $this;
    }

    public function getGroupBy(): ?string
    {
        return $this->groupBy;
    }

    public function setGroupBy(string $groupBy): self
    {
        $this->groupBy = $groupBy;

        return $this;
    }
}
