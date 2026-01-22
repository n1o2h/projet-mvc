<?php

namespace App\models;

class Product
{
    private ?int $id;
    private string $name;
    private string $description;
    private string $status;
    private float $price;
    private string $imagePath;
    private int $stock;
    private array $commandeItem;
    private Category $category;
    private Admin $createdBy;
    private array $pannierItem;

    public function __construct(string $name, string $description, float $price, string $imagePath, int $stock, Category $category, Admin $createdBy)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->imagePath = $imagePath;
        $this->stock = $stock;
        $this->category = $category;
        $this->createdBy = $createdBy;

    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getImagePath(): string
    {
        return $this->imagePath;
    }

    public function setImagePath(string $imagePath): void
    {
        $this->imagePath = $imagePath;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function setStock(int $stock): void
    {
        $this->stock = $stock;
    }

    public function getCommandeItem(): array
    {
        return $this->commandeItem;
    }

    public function setCommandeItem(array $commandeItem): void
    {
        $this->commandeItem = $commandeItem;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

    public function getCreatedBy(): Admin
    {
        return $this->createdBy;
    }

    public function setCreatedBy(Admin $createdBy): void
    {
        $this->createdBy = $createdBy;
    }

    public function getPannierItem(): array
    {
        return $this->pannierItem;
    }

    public function setPannierItem(array $pannierItem): void
    {
        $this->pannierItem = $pannierItem;
    }

}