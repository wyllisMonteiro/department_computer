<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\DepartmentRepository;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass=DepartmentRepository::class)
 */
class Department
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $domaine;
    
    /**
     * @ORM\OneToMany(targetEntity=Computer::class, mappedBy="departement")
     */
    private $computer;


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

    public function getDomaine(): ?string
    {
        return $this->domaine;
    }

    public function setDomaine(string $domaine): self
    {
        $this->domaine = $domaine;

        return $this;
    }

    /**
     * @return Collection|Computer[]
     */
    public function getComputer(): Collection
    {
        return $this->computer;
    }

    public function addComputer(Computer $computer): self
    {
        if (!$this->computer->contains($computer)) {
            $this->computer[] = $computer;
            $computer->setDepartment($this);
        }

        return $this;
    }

    public function removeComputer(Computer $computer): self
    {
        if ($this->computer->removeElement($computer)) {
            // set the owning side to null (unless already changed)
            if ($computer->getDepartment() === $this) {
                $computer->setDepartment(null);
            }
        }

        return $this;
    }
}
