<?php

namespace App\Entity;

use App\Repository\DataRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DataRepository::class)
 */
class Data
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
    private $url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tag;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="float")
     */
    private $estimatedRevenue;

    /**
     * @ORM\Column(type="integer")
     */
    private $adImpressions;

    /**
     * @ORM\Column(type="float")
     */
    private $adEcpm;

    /**
     * @ORM\Column(type="integer")
     */
    private $clicks;

    /**
     * @ORM\Column(type="float")
     */
    private $adCtr;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getTag(): ?string
    {
        return $this->tag;
    }

    public function setTag(string $tag): self
    {
        $this->tag = $tag;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getEstimatedRevenue(): ?float
    {
        return $this->estimatedRevenue;
    }

    public function setEstimatedRevenue(float $estimatedRevenue): self
    {
        $this->estimatedRevenue = $estimatedRevenue;

        return $this;
    }

    public function getAdImpressions(): ?int
    {
        return $this->adImpressions;
    }

    public function setAdImpressions(int $adImpressions): self
    {
        $this->adImpressions = $adImpressions;

        return $this;
    }

    public function getAdEcpm(): ?float
    {
        return $this->adEcpm;
    }

    public function setAdEcpm(float $adEcpm): self
    {
        $this->adEcpm = $adEcpm;

        return $this;
    }

    public function getClicks(): ?int
    {
        return $this->clicks;
    }

    public function setClicks(int $clicks): self
    {
        $this->clicks = $clicks;

        return $this;
    }

    public function getAdCtr(): ?float
    {
        return $this->adCtr;
    }

    public function setAdCtr(float $adCtr): self
    {
        $this->adCtr = $adCtr;

        return $this;
    }
}
