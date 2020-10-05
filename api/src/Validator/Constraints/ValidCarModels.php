<?php


namespace App\Validator\Constraints;

use ReflectionException;

/**
 * Class ValidCarModels
 * Enum like class
 * @package App\Validator\Constraints
 */
class ValidCarModels
{
    private const FIAT_CINQUECENTO = 0;
    private const FERRARI_F40 = 1;
    private const BMW_M3 = 2;
    private const HONDA_ACCORD = 3;
    private const FORD_MUSTANG = 4;
    private const FORD_FOCUS = 5;
    private const TOYOTA_COROLLA = 6;
    private const CHEVROLET_IMPALA = 7;
    private const NISSAN_ALTIMA = 8;

    /**
     * @return array
     * @throws ReflectionException
     * @todo should be cached or not use ReflectionClass
     */
    public static function getConstants()
    {
        $reflection = new \ReflectionClass(__CLASS__);

        return $reflection->getConstants();
    }
}
