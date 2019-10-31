<?php

namespace App\Entity;


use App\Entity\Interfaces\ModelInterface;

class ModelBase implements ModelInterface
{
    /**
     * @var array
     */
    protected $attributes = [];

    /**
     * @param array $values
     */
    public function setAttributes(array $values): void
    {
        if (empty($values)) {
            return ;
        }

        foreach ($this->attributes as $attribute)
        {
            if (!array_key_exists($attribute, $values)) {
                continue;
            }

            if (!property_exists($this, $attribute)) {
                continue;
            }

            $this->setAttribute($attribute, $values[$attribute]);
        }
    }

    /**
     * @param string $key
     * @param        $value
     */
    public function setAttribute(string $key, $value): void
    {
        $this->$key = $value;
    }
}