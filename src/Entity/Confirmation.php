<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "confirmation")]
class Confirmation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 50)]
    private string $name;

    #[ORM\Column(type: "string", length: 50)]
    private string $firstname;

    #[ORM\Column(type: "string", length: 100)]
    private string $email;

    #[ORM\Column(type: "integer")]
    private int $adults_count;

    #[ORM\Column(type: "integer")]
    private int $children_count;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $additional_info = null;

    #[ORM\Column(type: "boolean")]
    private bool $sleep_on_site = false;

    #[ORM\Column(type: "boolean", nullable: true)]
    private ?bool $brunch_on_sunday = null;

    #[ORM\Column(type: "string", length: 50)]
    private string $accommodation_type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getAdultsCount(): int
    {
        return $this->adults_count;
    }

    public function getChildrenCount(): int
    {
        return $this->children_count;
    }

    public function getAdditionalInfo(): ?string
    {
        return $this->additional_info;
    }

    public function isSleepOnSite(): bool
    {
        return $this->sleep_on_site;
    }

    public function getAccommodationType(): string
    {
        return $this->accommodation_type;
    }
    
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }   

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;              
        
        return $this;
    }   

    public function setEmail(string $email): self
    {
        $this->email = $email;
        
        return $this;
    }

    public function setAdultsCount(int $adults_count): self
    {
        $this->adults_count = $adults_count;
        
        return $this;
    }

    public function setChildrenCount(int $children_count): self
    {
        $this->children_count = $children_count;
        
        return $this;
    }

    public function setAdditionalInfo(?string $additional_info): self
    {
        $this->additional_info = $additional_info;
        
        return $this;
    }

    public function setSleepOnSite(bool $sleep_on_site): self
    {
        $this->sleep_on_site = $sleep_on_site;
        
        return $this;
    }

    public function setAccommodationType(string $accommodation_type): self
    {
        $this->accommodation_type = $accommodation_type;
        
        return $this;
    }

    public function setBrunchOnSunday(bool $brunch_on_sunday): self
    {
        $this->brunch_on_sunday = $brunch_on_sunday;
        
        return $this;
    }

    public function isBrunchOnSunday(): bool
    {
        return $this->brunch_on_sunday;
    }
}