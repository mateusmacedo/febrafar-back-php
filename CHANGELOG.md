<!--- BEGIN HEADER -->
# Changelog

All notable changes to this project will be documented in this file.
<!--- END HEADER -->

## [0.3.2](https://github.com/mateusmacedo/febrafar-back-php/compare/v0.3.1...v0.3.2) (2024-06-10)

### Code Refactoring

* :hammer: improve type annotations and doc comments ([62774a](https://github.com/mateusmacedo/febrafar-back-php/commit/62774ab51542322756aa0c8047d0b50c361a5030))

### Continuous Integrations

* :construction_worker: add larastan extension to phpstan configuration ([022910](https://github.com/mateusmacedo/febrafar-back-php/commit/02291031b583989cd9e6d2cb8b8b1af219ab2d38))

### Chores

* :wrench: updated composer dependencies ([822fed](https://github.com/mateusmacedo/febrafar-back-php/commit/822fed5c56c2b55b2ee5a0707737f3a5328c033a))


---

## [0.3.1](https://github.com/mateusmacedo/febrafar-back-php/compare/v0.3.0...v0.3.1) (2024-06-10)

### Features

* :sparkles: add date filtering and validation to activities ([7b6854](https://github.com/mateusmacedo/febrafar-back-php/commit/7b68549669af6ae28fd2783e4db808e70d8b8e37))
* :sparkles: add date format constant for activity model ([579e31](https://github.com/mateusmacedo/febrafar-back-php/commit/579e319254d38f0c3254d2d6c98355ebdf4ce12f))

### Bug Fixes

* :bug: enforce user authorization on activities ([525596](https://github.com/mateusmacedo/febrafar-back-php/commit/5255965a269ec00ee8b52ac2ac2c27e8e957e12b))

### Code Refactoring

* :hammer: add typings and docblocks to activity model ([1d547d](https://github.com/mateusmacedo/febrafar-back-php/commit/1d547dd3e64233aaac166c6ff3fcefb0c17fc97d))
* :hammer: relocate activities route under api group ([bddc71](https://github.com/mateusmacedo/febrafar-back-php/commit/bddc716e7b75e74f6a1d7c671cbfa97d97855842))

### Tests

* :test_tube: add authorization and validation to tests ([043984](https://github.com/mateusmacedo/febrafar-back-php/commit/0439841d0dbddac88036c01a925981c4cf63a982))
* :test_tube: enhance activity API tests for clarity ([67b7e9](https://github.com/mateusmacedo/febrafar-back-php/commit/67b7e93360fc457bd09bc48fb88089ebda66b4f0))
* :test_tube: improve test robustness and clarity ([6dc5d3](https://github.com/mateusmacedo/febrafar-back-php/commit/6dc5d38a1cc02ccd09403c56ecef88f320bad6b7))

### Continuous Integrations

* :construction_worker: disable unit testsuite in phpunit config ([bbe8a8](https://github.com/mateusmacedo/febrafar-back-php/commit/bbe8a88fa6f4517390bbc592a628422091f5f22f))
* :construction_worker: re-enable sqlite database for testing ([d23453](https://github.com/mateusmacedo/febrafar-back-php/commit/d23453812f86795dae84a6bb8a835310b0d9e65e))

### Documentation

* :books: add properties, constants, and casts to Activity model ([58d5ca](https://github.com/mateusmacedo/febrafar-back-php/commit/58d5caecbc3866c824f0a6a02d2e612808aa5044))

### Chores

* :wrench: reorganize dependencies for pest and phpstan ([1a53c7](https://github.com/mateusmacedo/febrafar-back-php/commit/1a53c7ee71b47a595e46de544c13f18a250418b0))
* :wrench: update excluded vendor path in phpstan config ([e5486a](https://github.com/mateusmacedo/febrafar-back-php/commit/e5486a9fb45b76d8a14827a13c3fe3b5536e5f85))


---

## [0.3.1](https://github.com/mateusmacedo/febrafar-back-php/compare/v0.3.0...v0.3.1) (2024-06-10)

### Features

* :sparkles: add date filtering and validation to activities ([7b6854](https://github.com/mateusmacedo/febrafar-back-php/commit/7b68549669af6ae28fd2783e4db808e70d8b8e37))
* :sparkles: add date format constant for activity model ([579e31](https://github.com/mateusmacedo/febrafar-back-php/commit/579e319254d38f0c3254d2d6c98355ebdf4ce12f))

### Bug Fixes

* :bug: enforce user authorization on activities ([525596](https://github.com/mateusmacedo/febrafar-back-php/commit/5255965a269ec00ee8b52ac2ac2c27e8e957e12b))

### Code Refactoring

* :hammer: add typings and docblocks to activity model ([1d547d](https://github.com/mateusmacedo/febrafar-back-php/commit/1d547dd3e64233aaac166c6ff3fcefb0c17fc97d))
* :hammer: relocate activities route under api group ([bddc71](https://github.com/mateusmacedo/febrafar-back-php/commit/bddc716e7b75e74f6a1d7c671cbfa97d97855842))

### Tests

* :test_tube: add authorization and validation to tests ([043984](https://github.com/mateusmacedo/febrafar-back-php/commit/0439841d0dbddac88036c01a925981c4cf63a982))
* :test_tube: enhance activity API tests for clarity ([67b7e9](https://github.com/mateusmacedo/febrafar-back-php/commit/67b7e93360fc457bd09bc48fb88089ebda66b4f0))
* :test_tube: improve test robustness and clarity ([6dc5d3](https://github.com/mateusmacedo/febrafar-back-php/commit/6dc5d38a1cc02ccd09403c56ecef88f320bad6b7))

### Continuous Integrations

* :construction_worker: disable unit testsuite in phpunit config ([bbe8a8](https://github.com/mateusmacedo/febrafar-back-php/commit/bbe8a88fa6f4517390bbc592a628422091f5f22f))

### Documentation

* :books: add properties, constants, and casts to Activity model ([58d5ca](https://github.com/mateusmacedo/febrafar-back-php/commit/58d5caecbc3866c824f0a6a02d2e612808aa5044))

### Chores

* :wrench: update excluded vendor path in phpstan config ([e5486a](https://github.com/mateusmacedo/febrafar-back-php/commit/e5486a9fb45b76d8a14827a13c3fe3b5536e5f85))


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

