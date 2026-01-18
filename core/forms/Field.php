<?php

namespace App\core\forms;

use App\core\Model;

class Field
{
    public const  TYPE_TEXT = 'text';
    public const  TYPE_PASSWORD = 'password';
    public const  TYPE_NUMBER= 'number';
    public Model $model;
    public string $attrtibute;
    public string $type;
    public function __construct(Model $model, string $attrtibute)
    {
        $this->type = self::TYPE_TEXT;
        $this->model = $model;
        $this->attrtibute = $attrtibute;

    }
    public function __toString(): string
    {
        /**
         * for the attribue i will make it dynamic  i chech if the attribute in camel case is true i will explode the attribute bu the uppercase caracter for label
         */
        return sprintf('
           <div class="mb-3 form-group">
               <label  class="form-label fw-bold fs-6">%s</label>
               <input type="%s" name="%s" value="%s" class="form-control %s" >
               <div class="invalid-feedback">
                    %s
               </div>
            </div>
    ', ucwords($this->model->labels()[$this->attrtibute] ?? $this->attrtibute, ' '),
            $this->type,
            $this->attrtibute,
            $this->model->{$this->attrtibute},
        $this->model->hasError($this->attrtibute) ? ' is-invalid' : '',
        $this->model->getFirstError($this->attrtibute)
        );
    }

    public function passwordField()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
        
    }

}