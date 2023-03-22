<?php

namespace App\Utils;

use Doctrine\DBAL\Platforms\AbstractPlatform;

class EnumType
{
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $enumClass = $this->getEnum();
    
        return $enumClass::from($value);
    }
    
    
    public function convertToDatabaseValue($enum, AbstractPlatform $platform)
    {
        return $enum->value;
    }
}
