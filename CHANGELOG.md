# Changelog

All notable changes to `ichava/icon-sets-heroicons` follow [Keep a Changelog](https://keepachangelog.com/en/1.0.0/) and [Semantic Versioning](https://semver.org/).

## [Unreleased]

## [0.1.0] - 2026-11-13

First release of `ichava/icon-sets-heroicons`.

### Added

- **Heroicons 2.2.0**, from the npm package `heroicons`: 1,288 SVGs in 4 variant directories (`outline` from `24/outline`, 324, `solid` from `24/solid`, 324, `mini` from `20/solid`, 324, `micro` from `16/solid`, 316), addressed as `ichava/icon-sets-heroicons::<variant>/<name>`. Every file was run through icon-sets-sync's sanitiser and satisfies core's SVG policy unchanged; `tests/Unit/SanitisedSvgTest.php` and `tests/Unit/NoStrayTextNodesTest.php` fail otherwise.
- **The upstream licence is recorded and pinned.** `config.json` names it under `license` (`spdx` `MIT`, the file, its SHA-256, and the version and date it was checked), the text ships at `resources/assets/svg/licenses/heroicons/LICENSE` and in `ATTRIBUTION.md`, and `tests/Unit/AttributionTest.php` fails if the copy no longer matches the recorded hash or was checked at a different version than the one vendored.
- **The root `data-slot="icon"` attribute is removed** from every SVG by the sanitiser (core's policy does not admit it in file content); nothing else changes.
- **`package.kind` is `icon`**, with no category, item or rule kind; `tests/Feature/SvgKindTest.php` pins it against `config.json` and against core's resolver.
- **The sibling guards**: `SiblingConstraintsTest`, `NoPersonalContactTest`, `DocsShapeTest`, `ResourceShapeTest`, `ReleaseVersionTest`, `PhpstanLevelTest`, `WorkflowPermissionsTest` and `SyncWorkflowCallerTest`, as in `icon-sets-tabler`.
- **`sync-upstream.yml`** is a caller of icon-sets-sync's reusable `sync-pack.yml`, pinned to commit `5fa93a6`, with `contents: read` and `issues: write` only.

### Changed

- **This pack requires `ichava/core` and nothing else.** `composer.json` `require` is now `php` and `ichava/core`; `illuminate/support` and `laranail/package-tools` were dropped from it and still arrive through core. The provider extends core's `IconPackServiceProvider` and declares its constants class and component class, so `src/` imports no `laranail/*` namespace; it registers the same name, path, Blade component and icon directory as before. The composer `type` is `ichava-icon-set`, which core's pack discovery reads. The README and `docs/installation.md` no longer restate the `laranail/*` repositories: they link to core's installation guide, the one place that lists them, and no longer say the pack is on Packagist, which no Ichava package is yet. `tests/Unit/CoreOnlyDependencyTest.php` fails if any of it comes back.
- **The upstream sync runs icon-sets-sync `06b17d7`** (icon-sets-sync#88), up from `5fa93a6`, which adds this pack's recipe, the `split-variants` and `exclude` transforms, and the `licence_sha256` pin on the upstream licence text. The `uses:` pin and `toolkit-ref` move together; the reusable workflow's inputs did not change between the two commits, so the caller's `with:` block is untouched.

