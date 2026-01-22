<?php

namespace App\models;

class Admin extends User
{
    private array $listProduct;

    public function getListProduct(): array
    {
        return $this->listProduct;
    }

    public function setListProduct(array $listProduct): void
    {
        $this->listProduct = $listProduct;
    }

}