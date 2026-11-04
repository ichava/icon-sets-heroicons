<?php

declare(strict_types=1);

namespace Simtabi\Laranail\Ichava\IconSetsHeroicons\Enums;

use Simtabi\Laranail\Ichava\Traits\HasIconSetVariants;
use Simtabi\Laranail\Ichava\Contracts\IconSetVariantInterface;
use Simtabi\Laranail\Ichava\IconSetsHeroicons\Constants\IconsConstants;

/**
 * Type-safe variant selection for Heroicons (outline / solid / mini / micro).
 */
enum Variant: string implements IconSetVariantInterface
{
    use HasIconSetVariants;

    case OUTLINE = 'outline';
    case SOLID = 'solid';
    case MINI = 'mini';
    case MICRO = 'micro';

    public function getPath(): string
    {
        return IconsConstants::getSvgPath($this->value);
    }

    private static function getDefaultValue(): string
    {
        return IconsConstants::getDefaultVariant() ?? self::OUTLINE->value;
    }

    private static function getClassPrefix(): string
    {
        return IconsConstants::getPrefix();
    }
}
