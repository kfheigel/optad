<?php

namespace App\Infrastructure\Entity;

use App\Infrastructure\Repository\DataRepository;
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
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $tag;

    /**
     * @ORM\Column(type="date")
     */
    private \DateTime $date;

    /**
     * @ORM\Column(type="float")
     */
    private float $estimatedRevenue;

    /**
     * @ORM\Column(type="integer")
     */
    private int $adImpressions;

    /**
     * @ORM\Column(type="float")
     */
    private float $adEcpm;

    /**
     * @ORM\Column(type="integer")
     */
    private int $clicks;

    /**
     * @ORM\Column(type="float")
     */
    private float $adCtr;

    public function __construct(
        string $url,
        string $tag,
        \DateTime $date,
        float $estimatedRevenue,
        int $adImpressions,
        float $adEcpm,
        int $clicks,
        float $adCtr
    ) {
        $this->url = $url;
        $this->tag = $tag;
        $this->date = $date;
        $this->estimatedRevenue = $estimatedRevenue;
        $this->adImpressions = $adImpressions;
        $this->adEcpm = $adEcpm;
        $this->clicks = $clicks;
        $this->adCtr = $adCtr;
    }

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
