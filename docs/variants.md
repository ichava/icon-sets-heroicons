# Variants

*Reference.* How this pack's icons are laid out and addressed.

`ichava/icon-sets-heroicons` ships **1,288 icons across 4 variants**. Each variant is a directory under
`resources/assets/svg/files/`, and the directory is the first segment of the path.

| Variant | Path prefix | Upstream directory | Icons | Style |
|---|---|---|---|---|
| `outline` | `outline/<name>` | `24/outline` | 324 | 24px, 1.5px stroke |
| `solid` | `solid/<name>` | `24/solid` | 324 | 24px, filled |
| `mini` | `mini/<name>` | `20/solid` | 324 | 20px, filled, for smaller UI |
| `micro` | `micro/<name>` | `16/solid` | 316 | 16px, filled, for dense UI |

The default variant is `outline`. Always include the variant in the path: `ichava/icon-sets-heroicons::outline/home`,
`ichava/icon-sets-heroicons::solid/home`.

`outline` is the 24px stroked set (1.5px stroke, `stroke="currentColor"`); `solid`, `mini` and `micro` are filled with `currentColor` and drawn for 24px, 20px and 16px. Use `outline` for navigation and controls, `solid` for emphasis, `mini` for small buttons and form controls, and `micro` for dense UI such as table rows. `micro` has 316 icons, eight fewer than the other three: upstream draws no micro form for those.

## Examples

```blade
<x-ichava::icon name="ichava/icon-sets-heroicons::outline/home" class="w-6 h-6" />
<x-ichava::icon name="ichava/icon-sets-heroicons::solid/home" class="w-6 h-6" />
<x-ichava::icon name="ichava/icon-sets-heroicons::mini/home" class="w-5 h-5" />
<x-ichava::icon name="ichava/icon-sets-heroicons::micro/home" class="w-4 h-4" />
```

## Variant enum (PHP)

```php
use Simtabi\Laranail\Ichava\IconSetsHeroicons\Enums\Variant;

Variant::OUTLINE->value;     // 'outline'
Variant::SOLID->value;       // 'solid'
Variant::MINI->value;        // 'mini'
Variant::MICRO->value;       // 'micro'
Variant::OUTLINE->isDefault();  // true
Variant::default();             // Variant::OUTLINE
```

The enum implements `IconSetVariantInterface` from core, so it works wherever core's registry expects a variant.

## See also

- [Customisation](customization.md)
- [Icon path format](https://github.com/ichava/core/blob/main/docs/tools/icon-path-format.md)

---

[← Docs index](../README.md#documentation)
