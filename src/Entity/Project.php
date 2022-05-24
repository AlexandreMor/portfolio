<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 */
class Project
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     * @Assert\NotBlank
     * @Assert\Type("string")
     * @Assert\Length(max= 40)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     * @Assert\Type("string")
     * @Assert\NotBlank
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank
     * @Assert\Type("string")
     * @Assert\Length(max= 50)
     */
    private $slug;

    /**
     * @ORM\ManyToMany(targetEntity=Techno::class, inversedBy="projects",cascade={"persist"})
     */
    private $technos;

    /**
     * @ORM\OneToMany(targetEntity=Gallery::class, mappedBy="project",cascade={"persist"})
     */
    private $images;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Type("string")
     * @Assert\Length(max= 255)
     */
    private $link;


    public function __construct()
    {
        $this->technos = new ArrayCollection();
        $this->images = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection|Techno[]
     */
    public function getTechnos(): Collection
    {
        return $this->technos;
    }

    public function addTechno(Techno $techno): self
    {
        if (!$this->technos->contains($techno)) {
            $this->technos[] = $techno;
        }

        return $this;
    }

    public function removeTechno(Techno $techno): self
    {
        $this->technos->removeElement($techno);

        return $this;
    }

    /**
     * @return Collection|Gallery[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Gallery $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setProject($this);
        }

        return $this;
    }

    public function removeImage(Gallery $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getProject() === $this) {
                $image->setProject(null);
            }
        }

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }
}
