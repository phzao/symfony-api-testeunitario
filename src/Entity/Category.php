<?php

namespace App\Entity;

use App\Entity\Interfaces\CategoryInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Category extends ModelBase implements CategoryInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     *
     * @Assert\NotBlank(message="Name is required!")
     * @Assert\Length(
     *      min = 2,
     *      max = 70,
     *      minMessage = "Name must be at least {{ limit }} characters long",
     *      maxMessage = "Name cannot be longer than {{ limit }} characters"
     * )
     * @ORM\Column(type="string", length=70)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $status;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $deleted_at;

    /**
     * @var array
     */
    protected $attributes = [
        "name",
        "description"
    ];

    /**
     * @return null|int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

//    public function getName(): ?string
//    {
//        return $this->name;
//    }
//
//    public function setName(string $name): self
//    {
//        $this->name = $name;
//
//        return $this;
//    }
//
//    public function getDescription(): ?string
//    {
//        return $this->description;
//    }
//
//    public function setDescription(?string $description): self
//    {
//        $this->description = $description;
//
//        return $this;
//    }
//
//    public function getStatus(): ?string
//    {
//        return $this->status;
//    }
//
//    public function setStatus(string $status): self
//    {
//        $this->status = $status;
//
//        return $this;
//    }
//
//    public function getCreatedAt(): ?\DateTimeInterface
//    {
//        return $this->created_at;
//    }
//
//    public function setCreatedAt(\DateTimeInterface $created_at): self
//    {
//        $this->created_at = $created_at;
//
//        return $this;
//    }
//
//    public function getUpdatedAt(): ?\DateTimeInterface
//    {
//        return $this->updated_at;
//    }
//
//    public function setUpdatedAt(?\DateTimeInterface $updated_at): self
//    {
//        $this->updated_at = $updated_at;
//
//        return $this;
//    }
//
//    public function getDeletedAt(): ?\DateTimeInterface
//    {
//        return $this->deleted_at;
//    }
//
//    public function setDeletedAt(?\DateTimeInterface $deleted_at): self
//    {
//        $this->deleted_at = $deleted_at;
//
//        return $this;
//    }
}
