<?php

namespace App\Entity;

use App\Repository\DestructionSiteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DestructionSiteRepository::class)
 */
class DestructionSite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $execution;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExecution(): ?int
    {
        return $this->execution;
    }

    public function setExecution(?int $execution): self
    {
        $this->execution = $execution;

        return $this;
    }
}
