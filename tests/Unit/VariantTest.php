<?php

declare(strict_types=1);

use Simtabi\Laranail\Ichava\IconSetsHeroicons\Enums\Variant;

/**
 * Pure-enum behaviour tests. Anything that touches config.json (default(),
 * isDefault(), getClass(), getPath()) lives in the Feature suite where the
 * Laravel container is bootstrapped.
 */
it(description: 'exposes the outline case value', closure: function () {
    expect(Variant::OUTLINE->getValue())->toBe('outline');
});

it(description: 'exposes the solid case value', closure: function () {
    expect(Variant::SOLID->getValue())->toBe('solid');
});

it(description: 'exposes the mini case value', closure: function () {
    expect(Variant::MINI->getValue())->toBe('mini');
});

it(description: 'exposes the micro case value', closure: function () {
    expect(Variant::MICRO->getValue())->toBe('micro');
});

it(description: 'returns every case from values', closure: function () {
    expect(Variant::values())->toBe(['outline', 'solid', 'mini', 'micro']);
});

it(description: 'resolves known values and rejects unknown ones', closure: function () {
    expect(Variant::tryFromValue('outline'))->toBe(Variant::OUTLINE)
        ->and(Variant::tryFromValue('not-a-real-variant'))->toBeNull();
});
