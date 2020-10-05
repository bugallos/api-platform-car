<?php


namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class CarModel extends Constraint
{
    public $message = 'Car model: {{ model }} is not available and cannot be added.
     Available models: {{ validCarModels }}';
}
