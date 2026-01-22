<?php

namespace App\models;

use App\core\DBModel;
use App\core\Model;
use App\core\UserModel;

class User extends  UserModel
{
    const ROLE_INACTIVE = 0;
    const ROLE_ACTIVE = 1;
    const ROLE_DELETED = 2;
    public string $firstName = '';
    public string $lastName = '';
    public  string $email = '';
    public  int $role = self::ROLE_INACTIVE;
    public string $password = '';
    public bool $status = false;
    public string $passwordConfirm = '';

    public function __construct()
    {
    }

    public function save()
    {
        $this->role = self::ROLE_INACTIVE;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function rules(): array
    {
        return [
            'firstName' => [self::RULE_REQUIRED],
            'lastName' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class]],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min'=> 8], [ self::RULE_MAX, 'max' => 10]],
            'passwordConfirm' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }

    public static function tableName(): string
    {
        return 'users';
    }

    public function attributes(): array
    {
        return ['firstName', 'lastName', 'email', 'password', 'role'];
    }

    public function labels(): array
    {
        return [
            'firstName' => 'first name',
            'lastName' => 'last name',
            'email' => 'Email',
            'password' => 'Password',
            'passwordConfirm' => 'confirm password ',
        ];
    }

    public static function primaryKey(): string
    {
        return 'id';
    }

    public function getDisplayName(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }
}