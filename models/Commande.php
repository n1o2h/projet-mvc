<?php

namespace App\models;

use App\enums\Status;
use DateTime;

class Commande
{
    private ?int $id;
    private float $total;
    private Status $status;
    private  DateTime $createdAt;
    private array $listItem;
    private array $listProducts;
    private CommandesItem $commandeItem;
    private Client $client;


    public function __construct(Status $status, DateTime $createdAt, Client $client)
    {
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->client = $client;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getTotal(): float
    {
        return $this->total;
    }

    public function setTotal(float $total): void
    {
        $this->total = $total;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function setStatus(Status $status): void
    {
        $this->status = $status;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getListItem(): array
    {
        return $this->listItem;
    }

    public function setListItem(array $listItem): void
    {
        $this->listItem = $listItem;
    }

    public function getListProducts(): array
    {
        return $this->listProducts;
    }

    public function setListProducts(array $listProducts): void
    {
        $this->listProducts = $listProducts;
    }

    public function getCommandeItem(): CommandesItem
    {
        return $this->commandeItem;
    }

    public function setCommandeItem(CommandesItem $commandeItem): void
    {
        $this->commandeItem = $commandeItem;
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