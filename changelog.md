# Change Log

## 0.0.4 - 10.29.2026
### Breaking
These affect child themes and custom code; the theme's own settings carry over.
- Requires WordPress 5.9 or later (ClassicPress 2.0 or later) and PHP 7.4 or later.
- `backdrop-dev/customize` is now part of `backdrop-dev/framework`, and `backdrop-dev/mix` is no longer included. Child themes calling `Backdrop\Mix\asset()` need their own asset loading; the parent theme's assets load through `Generosity\Vite\asset()`.
- Assets are built with Vite (`npm run build`, Node 20.19 or 22.12 and later) and have content-hashed file names. Enqueue them by source path through `Generosity\Vite\asset()`, for example `asset( 'resources/scss/screen.scss' )`. The script and style handles are unchanged; `generosity-admin-styles` and `generosity-customize-preview` (style) were empty and are no longer loaded.

### Fixed
- Updated for the framework's develop branch, where the theme's service providers caused a fatal error on every page.
- The Layout picker in the customizer showed broken images, and its radio buttons couldn't be reached with the keyboard.
- Custom Credit is hidden while "Enable random credit text" is on, since it isn't used then.
- The customizer no longer reports "WP_Scripts::localize was called incorrectly".
- The menu toggles' screen reader text was empty, and focusing a menu link with the keyboard caused a JavaScript error.
- The settings page's Customize button link and tab classes were empty, and opening an unknown tab caused a fatal error; it now falls back to the General tab.
- Featured images use the Landscape: Medium size until another size is chosen, instead of full size.
- The emoji styles are restored while emoji are enabled in the theme settings.
- If the theme's `vendor` folder is missing, administrators see a notice explaining how to fix it, and visitors get a 503 page, instead of a fatal error.

### Added
- A translation template, `public/lang/generosity.pot`, and translator comments for the strings with placeholders.

### Changed
- Updated to the `develop` branch of `backdrop-dev/framework`. `backdrop-dev/framework` and `backdrop-dev/fonts` are pinned to the commits this release was tested with.
- Replaced Laravel Mix with Vite. Laravel Mix and its webpack toolchain pull in packages with known vulnerabilities; the build now needs only `vite` (7.3.7 or later) and `sass`, with Rollup and Immutable kept at patched versions. `package-lock.json` pins the build tools.
- The release workflow no longer needs the `PRIVATE_KEY` or `TOKEN` secrets; it uses GitHub's built-in token, installs exactly what `package-lock.json` pins, checks that the release tag matches the `style.css` version, and stops if `npm audit` finds a high or critical vulnerability. The coding standards check runs on pull requests too, and pins a version that accepts the ClassicPress rules.
- `style.css` declares `Requires at least`, `Domain Path` and tags for the theme's features. `composer.json` described Creativity; it now describes Generosity. The readme's child theme example now uses `Template: generosity`.

### Removed
- Composer dev dependencies (`wptrt/wpthemereview` is abandoned and blocked `composer install`).

## 0.0.3 - 05.06.2025
### Bug
* Fixed add_theme_support( 'html5', $args );

## 0.0.2 - 05.06.2025
### Bug
* Wrap add_theme_support( 'html5', $args ); with is_classicpress
* Update screenshot.png
* Make sure we add #[\ReturnTypeWillChange] for PHP 8.4

## 0.0.1 - 05.02.2025
- Theme launch, Everything's new!