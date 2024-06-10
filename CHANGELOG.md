<!--- BEGIN HEADER -->
# Changelog

All notable changes to this project will be documented in this file.
<!--- END HEADER -->

## [0.3.1](https://github.com/mateusmacedo/febrafar-back-php/compare/v0.3.0...v0.3.1) (2024-06-10)

### Features

* :sparkles: add auth controller and routes for API authentication ([91b0e6](https://github.com/mateusmacedo/febrafar-back-php/commit/91b0e617be21ab7c88671d05f676d419372795a5))
* :sparkles: add sanctum driver for api authentication ([157390](https://github.com/mateusmacedo/febrafar-back-php/commit/157390ea87b9d4f16ca4bc8321eb366fd99e6d1d))
* :sparkles: add validation and filtering to activities ([4bda38](https://github.com/mateusmacedo/febrafar-back-php/commit/4bda38f91122d81c7c5ce053c29a964f9e7bd5a7))

### Bug Fixes

* :bug: correct password field access error during login ([a3b421](https://github.com/mateusmacedo/febrafar-back-php/commit/a3b4213873970f2b682ae9d10f5fa787fe8bd4b4))
* :bug: improve date and overlap validation in activity ([76c969](https://github.com/mateusmacedo/febrafar-back-php/commit/76c9695a10ba2e8c8f94e4ff33d646ce13ad5175))

### Code Refactoring

* :gear: restructure auth routes for clarity ([27b0b7](https://github.com/mateusmacedo/febrafar-back-php/commit/27b0b702f8d3ad2a173b551a1cd4ff0633d4b3b1))
* :hammer: add type hints and doc comments for activity ([81c800](https://github.com/mateusmacedo/febrafar-back-php/commit/81c800b34e707af3c7c6efaeebddfc891b00be17))
* :hammer: improve request input handling and typing ([1e2b55](https://github.com/mateusmacedo/febrafar-back-php/commit/1e2b55201bf393f441ef9cdf0bc5b606923b9c3f))
* :hammer: improve user model docblocks and array types ([e85230](https://github.com/mateusmacedo/febrafar-back-php/commit/e852302b929ae70b2b517d09b92edeb0a51dfb0d))
* :hammer: update code for consistency and clarity ([fda1da](https://github.com/mateusmacedo/febrafar-back-php/commit/fda1da35eba54fcac788b09ea21f8c82f78ef53d))
* ♻️ update auth routes in tests ([2cb545](https://github.com/mateusmacedo/febrafar-back-php/commit/2cb54577a6e5e5e57ec9566845ff58c31fbf1ed4))

### Tests

* :test_tube: add auth controller tests for user endpoints ([25234e](https://github.com/mateusmacedo/febrafar-back-php/commit/25234ea5304a6e14629fab1dce32fba9418288b3))
* :test_tube: add weekend and overlap activity tests ([b13467](https://github.com/mateusmacedo/febrafar-back-php/commit/b13467fff2ab9d408459d1862bd57e9d3900c891))
* :test_tube: enhance auth tests with faker integration ([bfd1ff](https://github.com/mateusmacedo/febrafar-back-php/commit/bfd1ff3695e6c09ab474a7db9d757d120da72665))
* :test_tube: improve email generation in login test ([075320](https://github.com/mateusmacedo/febrafar-back-php/commit/075320bde751ff6d421bc15959dd5257e1d8c46f))
* :test_tube: improve weekend validation messages ([7305ca](https://github.com/mateusmacedo/febrafar-back-php/commit/7305cada59be23cdd29dfc867cc60c5692eb3891))
* :test_tube: remove outdated example test files ([2d2108](https://github.com/mateusmacedo/febrafar-back-php/commit/2d2108f8d568c05067c25ac208ba25a65ada95b3))

### Continuous Integrations

* :construction_worker: exclude vendor directory from phpstan ([e6f8d8](https://github.com/mateusmacedo/febrafar-back-php/commit/e6f8d82f07e8c1ed8b2c63d0131cf59a31bfb798))
* :construction_worker: fix phpstan and phpunit config paths ([0bcc4a](https://github.com/mateusmacedo/febrafar-back-php/commit/0bcc4a6cf1d11a0f1ef1b3cb466e70a8fb6efc63))

### Documentation

* :books: add missing property annotations in User model ([75bb4d](https://github.com/mateusmacedo/febrafar-back-php/commit/75bb4d54dddde808cbbaa549e4ada465e2bf7150))

### Chores

* :wrench: remove unused sanctum middleware from api group ([f1866a](https://github.com/mateusmacedo/febrafar-back-php/commit/f1866a25ca38a1df073ea4983c479f57f6c9abc0))
* :wrench: update phpstan config for stricter checks ([9662f0](https://github.com/mateusmacedo/febrafar-back-php/commit/9662f0fbd62ade99bfe1c1ea65ca069a754747dc))


---

## [0.3.0](https://github.com/mateusmacedo/febrafar-back-php/compare/v0.2.0...v0.3.0) (2024-06-10)

### Features

* :sparkles: add auth controller and routes for API authentication ([60f298](https://github.com/mateusmacedo/febrafar-back-php/commit/60f2984f9c7349016236a7a17b19b14a05678518))
* :sparkles: add sanctum driver for api authentication ([285cfe](https://github.com/mateusmacedo/febrafar-back-php/commit/285cfe91d7aee187c67a60c69f876c7ac4b8ca23))

### Bug Fixes

* :bug: correct password field access error during login ([9247b3](https://github.com/mateusmacedo/febrafar-back-php/commit/9247b3120a4de4d961880b4d6f6f5df257a41484))

### Code Refactoring

* :gear: restructure auth routes for clarity ([5a64b6](https://github.com/mateusmacedo/febrafar-back-php/commit/5a64b6d985f123efb69c771f33e3a1346b7ec141))
* :hammer: improve request input handling and typing ([312975](https://github.com/mateusmacedo/febrafar-back-php/commit/3129757b91833b6464054058469b55e419a74feb))
* :hammer: improve user model docblocks and array types ([77feb6](https://github.com/mateusmacedo/febrafar-back-php/commit/77feb66fff9fce956c004b8e0b53515fa8925a41))
* :hammer: update code for consistency and clarity ([5787ec](https://github.com/mateusmacedo/febrafar-back-php/commit/5787ec1c051b078f538dac1097bef59668e7bdd5))
* ♻️ update auth routes in tests ([2ba472](https://github.com/mateusmacedo/febrafar-back-php/commit/2ba47272330c95fb908baa7edbdfaa90a01c3f20))

### Tests

* :test_tube: add auth controller tests for user endpoints ([84e56d](https://github.com/mateusmacedo/febrafar-back-php/commit/84e56d1716c79a7c428fe9855e7cbdd5ba52f1f6))
* :test_tube: enhance auth tests with faker integration ([66298e](https://github.com/mateusmacedo/febrafar-back-php/commit/66298e4d9e3e5ee7cd007aa08cf8c196b3411a57))
* :test_tube: improve email generation in login test ([e638c0](https://github.com/mateusmacedo/febrafar-back-php/commit/e638c055e9ea2b9ead5943e873dbb812740d37a9))
* :test_tube: remove outdated example test files ([80fb91](https://github.com/mateusmacedo/febrafar-back-php/commit/80fb91419f29fd068e28e79606daf4f6789fd24b))

### Continuous Integrations

* :construction_worker: exclude vendor directory from phpstan ([8d944d](https://github.com/mateusmacedo/febrafar-back-php/commit/8d944d8a79972343d03a7b620bb1f8b76c559293))

### Documentation

* :books: add missing property annotations in User model ([fb5d1e](https://github.com/mateusmacedo/febrafar-back-php/commit/fb5d1e2865f27bf8fc6fdf6caf3597df259456ef))

### Chores

* :wrench: remove unused sanctum middleware from api group ([fcd51d](https://github.com/mateusmacedo/febrafar-back-php/commit/fcd51dcc26cefbbb5624a3a999f06243adf667d4))
* :wrench: update phpstan config for stricter checks ([b472d8](https://github.com/mateusmacedo/febrafar-back-php/commit/b472d80256f930e709511bc473e55b9e94101145))


---

## [0.2.0](https://github.com/mateusmacedo/febrafar-back-php/compare/v0.1.0...v0.2.0) (2024-06-10)

### Features

* :sparkles: add activity management endpoints ([287f62](https://github.com/mateusmacedo/febrafar-back-php/commit/287f62cc492df02bf1a21187a847622210599bb7))
* :sparkles: add activity model and migrations ([e460a5](https://github.com/mateusmacedo/febrafar-back-php/commit/e460a5ac3ee01db2c369d67ca95840b7a6e272ab))

### Tests

* :test_tube: add feature tests for activities api ([fecc4e](https://github.com/mateusmacedo/febrafar-back-php/commit/fecc4e109c1eb8a46f54a392eab66d9354b2d842))


---

## [0.1.0](https://github.com/mateusmacedo/febrafar-back-php/compare/v0.0.0...v0.1.0) (2024-06-10)

### Features

* :sparkles: add docker-compose setup for project ([25fc8b](https://github.com/mateusmacedo/febrafar-back-php/commit/25fc8b801c4a044bc64e5e87501eaba287fde84b))
* :sparkles: add ide-helper for better ide support ([ab24ba](https://github.com/mateusmacedo/febrafar-back-php/commit/ab24baba40b5dfcdbdb2cf81d86d023985a77769))

### Continuous Integrations

* :construction_worker: integrate phpstan for static analysis ([43a6b4](https://github.com/mateusmacedo/febrafar-back-php/commit/43a6b42c7e1660a31f68c14caade6db10bc89fee))

### Documentation

* :books: add mit license for open source use ([56c463](https://github.com/mateusmacedo/febrafar-back-php/commit/56c463987ed30ab7272eb970e2676be970665f54))
* :books: rewrite readme to reflect agenda api usage ([8e3447](https://github.com/mateusmacedo/febrafar-back-php/commit/8e3447e7b809506ba97e4f14742e26774643ddc7))

### Chores

* :wrench: add laravel-ide-helper for ide support ([95ddbb](https://github.com/mateusmacedo/febrafar-back-php/commit/95ddbb1022dc4073d8c668244834a5dae5655f41))
* :wrench: add PHP CS Fixer configuration ([38f629](https://github.com/mateusmacedo/febrafar-back-php/commit/38f629a842dfbcdd0d1fcb66fd4c26a675acb464))
* :wrench: move api docs ignoring logic to its folder ([689681](https://github.com/mateusmacedo/febrafar-back-php/commit/689681751eccc51df8ce3a67c2e3df47a60ddae0))
* :wrench: update .env.example with project-specific defaults ([d5d978](https://github.com/mateusmacedo/febrafar-back-php/commit/d5d978ea3b60db75134a69fa27c5a8521a90fe3c))
* :wrench: update gitignore for docker, ide helpers, and api docs ([fb3b9c](https://github.com/mateusmacedo/febrafar-back-php/commit/fb3b9c45710b28dcb2fb8ee72e0b46d9d05f8b51))
* Update .changelog configuration file ([f84bb6](https://github.com/mateusmacedo/febrafar-back-php/commit/f84bb6a2d92856ee8482023d7805f5e226456eb2))


---

