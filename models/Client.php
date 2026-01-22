<?php

namespace App\models;

class Client extends User
{
    private array $listCommandes;
    private  Panier $panier;

    public function getListCommandes(): array
    {
        return $this->listCommandes;
    }

    public function setListCommandes(array $listCommandes): void
    {
        $this->listCommandes = $listCommandes;
    }

    public function getPanier(): Panier
    {
        return $this->panier;
    }

    public function setPanier(Panier $panier): void
    {
        $this->panier = $panier;
    }

}