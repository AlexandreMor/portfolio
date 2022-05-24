<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\AboutMeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AboutMeRepository::class)
 */
class AboutMe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Type("string")
     * @Assert\Length(max= 255)
     */
    private $githubLink;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Type("string")
     * @Assert\Length(max= 255)
     */
    private $linkedinLink;

    /**
     * @ORM\Column(type="text")
     * @Assert\Type("text")
     * @Assert\NotBlank
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGithubLink(): ?string
    {
        return $this->githubLink;
    }

    public function setGithubLink(string $githubLink): self
    {
        $this->githubLink = $githubLink;

        return $this;
    }

    public function getLinkedinLink(): ?string
    {
        return $this->linkedinLink;
    }

    public function setLinkedinLink(string $linkedinLink): self
    {
        $this->linkedinLink = $linkedinLink;

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
}
