<?php

namespace App\models;

class Panier
{
    private ?int  $id;
    private float $totalPrice;
    private array $items;
    private Client $client;

    //composition
    public function __construct(PanierItem $panierItem)
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getTotalPrice(): float
    {
        return $this->totalPrice;
    }

    public function setTotalPrice(float $totalPrice): void
    {
        $this->totalPrice = $totalPrice;
    }

    public function getItems(): PanierItem
    {
        return $this->items;
    }

    public function setItems(PanierItem $items): void
    {
        $this->items = $items;
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function setClient(Client $client): void
    {
        $this->client = $client;
    }


}