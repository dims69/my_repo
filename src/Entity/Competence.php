<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompetenceRepository")
 */
class Competence
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=1000)
     */
    private $audiovisuel;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=1000)
     */
    private $infographie;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=1000)
     */
    private $communication;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAudiovisuel(): ?string
    {
        return $this->audiovisuel;
    }

    public function setAudiovisuel(string $audiovisuel): self
    {
        $this->audiovisuel = $audiovisuel;

        return $this;
    }

    public function getInfographie(): ?string
    {
        return $this->infographie;
    }

    public function setInfographie(string $infographie): self
    {
        $this->infographie = $infographie;

        return $this;
    }

    public function getCommunication(): ?string
    {
        return $this->communication;
    }

    public function setCommunication(string $communication): self
    {
        $this->communication = $communication;

        return $this;
    }
}
