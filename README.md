# TYPO3 FC BIGFOOT

## Setup

In order to setup the extension you need to install the extension with composer or via the extension manager in TYPO3

- ```composer req typo3-incubator/theme-fcbigfoot```
- add dependency to ```config.yaml```
```
dependencies:
  - typo3-incubator/theme-fcbigfoot
```
- ...

## Frontend build process
Run into the root of the project the following command to install all required Node dependencies
```sh
ddev composer npm-install
```

_(This is also executed automatically after running `composer install`)_

Run the following commands to compile SCCS/JS or to watch assets:
```sh
ddev composer watch-assets
ddev composer compile-css
ddev composer compile-js
ddev composer compile-assets
```

## Development Setup

```bash
ddev start
ddev composer install
ddev exec .build/bin/typo3 setup
```
