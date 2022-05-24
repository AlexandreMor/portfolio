<?php

namespace App\Entity;

use App\Repository\GalleryRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=GalleryRepository::class)
 * @Vich\Uploadable
 */
class Gallery
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max= 255)
     * @Assert\Type("string")
     */
    private $link;

    /**

     * @Vich\UploadableField(mapping="projects_files", fileNameProperty="link")
     * @Assert\File(

     *     maxSize = "3M",

     *     mimeTypes = {"image/jpeg", "image/png", "image/webp"},

     * )
     * @var File

     */

    private $imageFile;

    /**
  
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     * @Assert\DateTime
     * @Assert\Type("DateTime")
     * @var \DateTime
     */

    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=Project::class, inversedBy="images")
     * @ORM\JoinColumn(nullable=true)
     */
    private $project;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): self
    {
        $this->project = $project;

        return $this;
    }

    public function setImageFile(File $link = null): Gallery
    {
        $this->imageFile = $link;
        if ($link) {
            $this->updatedAt = new DateTime('now');
        }

        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
