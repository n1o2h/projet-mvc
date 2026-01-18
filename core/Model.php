<?php

namespace App\core;

use PDO;

abstract  class Model
{
    /**
     *Pourquoi déclarer les propriétés ?
     * réponds :
     *
     * « Depuis PHP 8.2, les propriétés dynamiques sont dépréciées.
     * Déclarer les attributs permet une meilleure encapsulation,
     * une meilleure lisibilité du modèle,
     * et évite les erreurs à l’exécution. »
     */
    public int $id;
    public string $email;
    public string $firstname;
    public string $lastname;
    public int $status;
    public string $created_at;
    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';
    public const RULE_UNIQUE= 'unique';


    public function loadData($data)
    {
        foreach ($data as $key => $value)
        {
            if(property_exists($this, $key)){
                $this->{$key} = $value;
            }
        }
        
    }
    abstract  public function  rules(): array;
    public function labels(): array
    {
        return [];

    }
    public  array $errors = [];

    public function validate(): bool
    {
        foreach ($this->rules() as $attribue => $rules){
            $value = $this->{$attribue};

            foreach ($rules as $rule){
                $ruleName = $rule;
                if(!is_string($ruleName)){
                    $ruleName = $rule[0];
                }
                if($ruleName === self::RULE_REQUIRED && !$value){
                    $this->addErrors($attribue, self::RULE_REQUIRED);
                }
                if($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)){
                    $this->addErrors($attribue,  self::RULE_EMAIL);
                }
                if($ruleName === self::RULE_MIN && strlen($value) < $rule['min']){

                    $this->addErrors($attribue,  self::RULE_MIN, $rule);
                }
                if($ruleName === self::RULE_MAX && strlen($value) > $rule['max']){
                    $this->addErrors($attribue,  self::RULE_MAX, $rule);
                }
                if($ruleName === self::RULE_MATCH && $value !== $this->{$rule['match']}){
                    $rule['match'] = $this->labels()[$rule['match']] ?? $attribue;
                    $this->addErrors($attribue,  self::RULE_MATCH, $rule);
                }
                if($ruleName === self::RULE_UNIQUE){
                    $className = $rule['class'];
                    $uniqueAttr = $rule['attribute'] ?? $attribue;
                    $tableName = $className::tableName();
                    $statement = Application::$app->db->prepare("SELECT * FROM $tableName WHERE $uniqueAttr = :attr");
                    $statement->bindValue(":attr", $value);
                    $statement->execute();
                    $record = $statement->setFetchMode(PDO::FETCH_CLASS, $className);
                    $record = $statement->fetchAll();
                    if($record){
                        $this->addErrors($attribue,  self::RULE_UNIQUE, ['field' => $this->labels()[$attribue] ?? $attribue]);
                    }
                }
            }
        }
        return empty($this->errors);

        
    }

    public function addErrors(string $attribue, string $rule, array $params = [])
    {
        $message = $this->errorMessages()[$rule] ?? '';
        #echo '<pre>';
        #var_dump($params);
        #echo '</pre>';
        foreach ($params as $key => $value){

          $message = str_replace("{{$key}}", $value, $message);
        }
        $this->errors[$attribue][] = $message;
    }

    public function errorMessages()
    {
        return [
            self::RULE_REQUIRED => 'This field is required',
            self::RULE_EMAIL => 'This field must be valid email address',
            self::RULE_MIN => 'Min length of this field must be {min}',
            self::RULE_MAX => 'Max length of this field must be {max}',
            self::RULE_MATCH => 'This field must not the same as {match}',
            self::RULE_UNIQUE => 'Record with this {field} already existe'
        ];
    }

    public function hasError($attribute)
    {
        return $this->errors[$attribute] ?? false;

    }

    public function getFirstError($attribue)
    {
        #echo'<pre>';
        #var_dump($this->errors);
        #echo '</pre>';
        return empty($this->errors[$attribue][0]) ? '': $this->errors[$attribue][0] ;
    }


}