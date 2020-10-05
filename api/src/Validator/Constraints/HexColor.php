<?php


namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class HexColor extends Constraint
{
    public $message = 'Value: {{ color }} is not a valid hex color. Please, use hex color format, e.g. #4ae1d8 / #fff';
}
