<?php


namespace App\Validator\Constraints;

use ReflectionException;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

/**
 * Class CarModelValidator
 * @package App\Validator\Constraints
 */
class CarModelValidator extends ConstraintValidator
{
    /**
     * @param $value
     * @return bool
     * @throws ReflectionException
     */
    private function isValidCarModel($value)
    {
        return array_key_exists($value, ValidCarModels::getConstants());
    }

    /**
     * @param mixed $value
     * @param Constraint $constraint
     * @throws ReflectionException
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof CarModel) {
            throw new UnexpectedTypeException($constraint, CarModel::class);
        }

        // custom constraints should ignore null and empty values to allow
        // other constraints (NotBlank, NotNull, etc.) take care of that
        if (null === $value || '' === $value) {
            return;
        }

        if (!is_string($value)) {
            throw new UnexpectedValueException($value, 'string');
        }

        if (!$this->isValidCarModel($value)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ model }}', $value)
                ->setParameter('{{ validCarModels }}', implode(', ', array_keys(ValidCarModels::getConstants())))
                ->addViolation();
        }
    }
}
