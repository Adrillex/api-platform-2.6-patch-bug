<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ResourceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"resource", "subResource"}},
 *     denormalizationContext={"groups"={"resource", "subResource"}}
 * )
 * @ORM\Entity(repositoryClass=ResourceRepository::class)
 */
class Resource
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups({"resource"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups({"resource"})
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=SubResource::class, mappedBy="resource", orphanRemoval=true, cascade={"persist"})
     * @Serializer\Groups({"resource"})
     */
    private $subResources;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Serializer\Groups({"resource"})
     */
    private $optional;

    public function __construct()
    {
        $this->subResources = new ArrayCollection();
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

    /**
     * @return Collection|SubResource[]
     */
    public function getSubResources(): Collection
    {
        return $this->subResources;
    }

    public function addSubResource(SubResource $subResource): self
    {
        if (!$this->subResources->contains($subResource)) {
            $this->subResources[] = $subResource;
            $subResource->setResource($this);
        }

        return $this;
    }

    public function removeSubResource(SubResource $subResource): self
    {
        if ($this->subResources->removeElement($subResource)) {
            // set the owning side to null (unless already changed)
            if ($subResource->getResource() === $this) {
                $subResource->setResource(null);
            }
        }

        return $this;
    }

    public function getOptional(): ?string
    {
        return $this->optional;
    }

    public function setOptional(?string $optional): self
    {
        $this->optional = $optional;

        return $this;
    }
}
