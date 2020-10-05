<?php


namespace App\Validator\Constraints;


use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

/**
 * Class HexColorValidator
 * @package App\Validator\Constraints
 */
class HexColorValidator extends ConstraintValidator
{
    /**
     * @param $value
     * @return false|int
     */
    private function isValidHexColor($value)
    {
        return preg_match('^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$^', $value);
    }

    /**
     * @param mixed $value
     * @param Constraint $constraint
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof HexColor) {
            throw new UnexpectedTypeException($constraint, HexColor::class);
        }

        // custom constraints should ignore null and empty values to allow
        // other constraints (NotBlank, NotNull, etc.) take care of that
        if (null === $value || '' === $value) {
            return;
        }

        if (!is_string($value)) {
            throw new UnexpectedValueException($value, 'string');
        }

        if (!$this->isValidHexColor($value)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ color }}', $value)
                ->addViolation();
        }
    }
}
