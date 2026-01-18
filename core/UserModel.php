<?php

namespace App\core;

abstract class UserModel extends DBModel
{
    abstract public function getDisplayName(): string;

}