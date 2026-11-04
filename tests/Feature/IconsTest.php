<?php

declare(strict_types=1);

use Simtabi\Laranail\Ichava\Services\IconRegistry;
use Simtabi\Laranail\Ichava\IconSetsHeroicons\Enums\Variant;
use Simtabi\Laranail\Ichava\IconSetsHeroicons\Constants\IconsConstants;
use Simtabi\Laranail\Ichava\IconSetsHeroicons\Providers\IconsServiceProvider;

it(description: 'boots the provider without error', closure: function () {
    $providers = array_keys($this->app->getLoadedProviders());

    expect($providers)->toContain(IconsServiceProvider::class);
});

it(description: 'resolves constants from config json', closure: function () {
    expect(IconsConstants::getVendorPackage())->toBe('ichava/icon-sets-heroicons')
        ->and(IconsConstants::getTitle())->toBe('Heroicons')
        ->and(IconsConstants::getPrefix())->toBe('heroicon')
        ->and(IconsConstants::getDefaultVariant())->toBe('outline');
});

it(description: 'uses the config prefix in enum class helpers', closure: function () {
    expect(Variant::OUTLINE->getClass())->toBe('heroicon-outline')
        ->and(Variant::SOLID->getClass())->toBe('heroicon-solid')
        ->and(Variant::MINI->getClass())->toBe('heroicon-mini')
        ->and(Variant::MICRO->getClass())->toBe('heroicon-micro');
});

it(description: 'matches the default variant to config json', closure: function () {
    expect(Variant::default())->toBe(Variant::OUTLINE)
        ->and(Variant::OUTLINE->isDefault())->toBeTrue()
        ->and(Variant::SOLID->isDefault())->toBeFalse()
        ->and(Variant::MINI->isDefault())->toBeFalse()
        ->and(Variant::MICRO->isDefault())->toBeFalse();
});

it(description: 'ships each variant in its own directory, at the measured count', closure: function () {
    $files = dirname(__DIR__, 2) . '/resources/assets/svg/files';
    $expected = [
        'outline' => 324,
        'solid'   => 324,
        'mini'    => 324,
        'micro'   => 316,
    ];

    $dirs = array_map(basename(...), glob($files . '/*', GLOB_ONLYDIR) ?: []);
    sort($dirs);
    $names = array_keys($expected);
    sort($names);
    expect($dirs)->toBe($names);

    foreach ($expected as $variant => $count) {
        expect(count(glob("{$files}/{$variant}/*.svg") ?: []))->toBe($count, "files/{$variant}");
    }

    expect(array_sum($expected))->toBe(1288);
});

it(description: 'picks up the package in the icon registry', closure: function () {
    $registry = $this->app->make(IconRegistry::class);

    expect($registry->isRegistered('ichava/icon-sets-heroicons'))->toBeTrue(
        'IconRegistry should have ichava/icon-sets-heroicons registered after boot.',
    );
});
