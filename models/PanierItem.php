<?php

namespace App\models;

class PanierItem
{
    private ?int  $id;
    private int $quantity;
    private Panier $panier;
    private Product $product;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getPanier(): Panier
    {
        return $this->panier;
    }

    public function setPanier(Panier $panier): void
    {
        $this->panier = $panier;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }


}