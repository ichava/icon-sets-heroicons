<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Heroicons -- localisable strings
|--------------------------------------------------------------------------
|
| An overlay, not a second source of truth. `name` and `description` are
| deliberately absent: IconRegistry::fromDirectory() reads those from
| resources/assets/svg/config.json, which is canonical. A non-English locale
| may add them to override; `en` must not.
|
| Variant keys match Simtabi\Laranail\Ichava\IconSetsHeroicons\Enums\Variant.
|
*/

return [
    'variants' => [
        'outline' => 'Outline',
        'solid'   => 'Solid',
        'mini'    => 'Mini',
        'micro'   => 'Micro',
    ],

    'variant_descriptions' => [
        'outline' => '24px, 1.5px stroke',
        'solid'   => '24px, filled',
        'mini'    => '20px, filled, for smaller UI',
        'micro'   => '16px, filled, for dense UI',
    ],
];
