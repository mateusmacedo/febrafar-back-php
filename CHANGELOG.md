<!--- BEGIN HEADER -->
# Changelog

All notable changes to this project will be documented in this file.
<!--- END HEADER -->

## [0.5.1](https://github.com/mateusmacedo/febrafar-back-php/compare/v0.5.0...v0.5.1) (2024-06-11)

### Code Refactoring

* :hammer: simplify `AuthCredentialsDTO` constructor with readonly properties ([3ad006](https://github.com/mateusmacedo/febrafar-back-php/commit/3ad006303a164c5a68bbc8ffc26f0b37aaffc807))


---

## [0.5.0](https://github.com/mateusmacedo/febrafar-back-php/compare/v0.4.0...v0.5.0) (2024-06-11)

### Features

* :sparkles: add activity repository interface implementation ([f0ee76](https://github.com/mateusmacedo/febrafar-back-php/commit/f0ee7665eef5debe6893e0833cf95a29d82b3c99))
* :sparkles: add activity service and interface ([0a7610](https://github.com/mateusmacedo/febrafar-back-php/commit/0a7610708a86335d199372382d1c820cc2bc1bc3))
* :sparkles: add bindings for activity and auth services ([aee669](https://github.com/mateusmacedo/febrafar-back-php/commit/aee6696852a59249a75d78507ea88245f5c61538))
* :sparkles: add DTO and request validation classes for Activity ([e3ef15](https://github.com/mateusmacedo/febrafar-back-php/commit/e3ef157f12f54f956c57db9d6ecde909cfab4479))
* :sparkles: add middleware for user ID injection ([34a9da](https://github.com/mateusmacedo/febrafar-back-php/commit/34a9dad4752d12cb751bf5b2f830199c24d2f193))
* :sparkles: add validation for activity dates and overlaps ([79e012](https://github.com/mateusmacedo/febrafar-back-php/commit/79e01265f284bbc886f813397c97ba1e07686de0))
* :sparkles: inject user id into request when authenticated ([750939](https://github.com/mateusmacedo/febrafar-back-php/commit/7509396e3206287ce53832715b1c5009c3ad9d67))
* :sparkles: introduce activity factory for DTO creation ([f3c5c7](https://github.com/mateusmacedo/febrafar-back-php/commit/f3c5c7569de4a25e87d4f221f9a2045fa042db23))

### Bug Fixes

* :bug: ensure user id is taken from request input ([eddadf](https://github.com/mateusmacedo/febrafar-back-php/commit/eddadf999cf0a280ddaf32a070083f9adf52e25e))

### Code Refactoring

* :hammer: make activity search more flexible ([6c42cb](https://github.com/mateusmacedo/febrafar-back-php/commit/6c42cbcb51332f9ed73ceaeb6c5e6b65c6b0edb4))
* :hammer: simplify activity controller DI management ([cee0ec](https://github.com/mateusmacedo/febrafar-back-php/commit/cee0ec9c96cba4fef96a0a2ff15ea0935ff7c9bf))
* :hammer: simplify activity service construction ([0d4e2f](https://github.com/mateusmacedo/febrafar-back-php/commit/0d4e2fb19024dc61ba654274736b908ae3cb94bf))
* :hammer: use dtos and services in activity controller ([e9bc99](https://github.com/mateusmacedo/febrafar-back-php/commit/e9bc993d7d969e46cf71c6ec60b18af6d6f85f30))

### Tests

* :test_tube: add phpstan ignore line for user mock ([eaca2a](https://github.com/mateusmacedo/febrafar-back-php/commit/eaca2a19cee649a80e3cc941b9ffce3d73208e74))

### Documentation

* :books: add OpenAPI annotations for activities endpoints ([1c3300](https://github.com/mateusmacedo/febrafar-back-php/commit/1c3300a94ce3645a709fee91542b6e1a148f9eb9))
* :books: add OpenAPI schema for Activity model ([75c899](https://github.com/mateusmacedo/febrafar-back-php/commit/75c899510ee02a17057b44d67e82d6d0965e10e4))
* :books: add OpenAPI schemas for activity requests ([6f01f0](https://github.com/mateusmacedo/febrafar-back-php/commit/6f01f0daefbdd5bda4c71fb040df9f5101f31825))


---

## [0.4.0](https://github.com/mateusmacedo/febrafar-back-php/compare/v0.3.2...v0.4.0) (2024-06-11)

### Features

* :sparkles: add auth credentials dto factory interface ([07edf1](https://github.com/mateusmacedo/febrafar-back-php/commit/07edf18a7293549969917700f51c75b335d8dae8))
* :sparkles: add AuthCredentialsDTO for auth handling ([d758d2](https://github.com/mateusmacedo/febrafar-back-php/commit/d758d20f05beeeb69e9bd8d06dfd2837d122f477))
* :sparkles: add authorization for user operations ([0fbb2c](https://github.com/mateusmacedo/febrafar-back-php/commit/0fbb2c297088cdd226761246fb59a11a288a4ffe))
* :sparkles: add auth service for user management ([320034](https://github.com/mateusmacedo/febrafar-back-php/commit/32003418d1e4c6054ff2f2aaae029d358763cd2a))
* :sparkles: add factory for auth credentials dto ([661f5c](https://github.com/mateusmacedo/febrafar-back-php/commit/661f5c72d38b8a54dd18e1e866df076c9fae8c13))
* :sparkles: add factory for creating RegisterUserDTO from request ([39f3e8](https://github.com/mateusmacedo/febrafar-back-php/commit/39f3e82ef02f34e6cb3d2590d676c8258ede45d6))
* :sparkles: add factory interface for user registration DTO ([470e20](https://github.com/mateusmacedo/febrafar-back-php/commit/470e20a06dee3042cd54f10aedd6791110eff256))
* :sparkles: add logout dto for structured auth handling ([9b2372](https://github.com/mateusmacedo/febrafar-back-php/commit/9b23721f8654a2f0f87b9a9203914f5e467d4259))
* :sparkles: add middleware to log requests ([367679](https://github.com/mateusmacedo/febrafar-back-php/commit/3676796e1684a26067e227f4129f8b9801761d23))
* :sparkles: add policies and service providers ([168576](https://github.com/mateusmacedo/febrafar-back-php/commit/1685762bfbad258502d2b2faf457eb354ba27fda))
* :sparkles: add register request form validation ([928bba](https://github.com/mateusmacedo/febrafar-back-php/commit/928bbae78ef716ec89773405df17833503c147c1))
* :sparkles: add RegisterUserDTO for user registration ([c78b4b](https://github.com/mateusmacedo/febrafar-back-php/commit/c78b4b3b8f388f1b5bf735e5e1bb01c07d45ef97))
* :sparkles: add swagger docs to auth endpoints ([bba528](https://github.com/mateusmacedo/febrafar-back-php/commit/bba528975e34d57f9232a35ac3096fbff066e1cf))
* :sparkles: add swagger UI template for API docs ([83a5a9](https://github.com/mateusmacedo/febrafar-back-php/commit/83a5a90d9f878995fc8f6ff605c6025def955bc4))
* :sparkles: add user factory interface and implementation ([0ff464](https://github.com/mateusmacedo/febrafar-back-php/commit/0ff46455cd5e9ebefff57a7ce94fd2b75ee71560))
* :sparkles: add user repository interface and implementation ([fcd5b7](https://github.com/mateusmacedo/febrafar-back-php/commit/fcd5b79eff69d96f25f871602a6630dab759ae13))
* :sparkles: include static Swagger UI in the doc build ([6c73dc](https://github.com/mateusmacedo/febrafar-back-php/commit/6c73dc8855aaa54dd19b719cc43cd3923c258861))
* ✨ add log request middleware and update kernel ([072a60](https://github.com/mateusmacedo/febrafar-back-php/commit/072a6049b9dc10194f13b86b28fbf573fbe0b393))

### Code Refactoring

* :hammer: remove user deletion method ([7b9ddc](https://github.com/mateusmacedo/febrafar-back-php/commit/7b9ddcc608624d93e1484822297c3f2176837784))
* :hammer: reorder middleware for readability ([1757fc](https://github.com/mateusmacedo/febrafar-back-php/commit/1757fc13394dfe0713ad0649ac7943fed5d7588f))
* :hammer: update auth controller for better abstraction ([2002c6](https://github.com/mateusmacedo/febrafar-back-php/commit/2002c6141c59c26332980c1e37375136b0ade1b2))

### Tests

* :test_tube: add unit test for auth credentials factory ([1269a0](https://github.com/mateusmacedo/febrafar-back-php/commit/1269a07872ca46395c83d208cacd9e0d383d5c41))
* :test_tube: add unit test for UserFactory creation from DTO ([94370d](https://github.com/mateusmacedo/febrafar-back-php/commit/94370d53391f20c577f5f02267293ec672656317))
* :test_tube: add unit tests for AuthCredentialsDTO ([07b139](https://github.com/mateusmacedo/febrafar-back-php/commit/07b1395e12fb51403674e13054b2b3953b7eae67))
* :test_tube: add unit tests for auth service ([134ccd](https://github.com/mateusmacedo/febrafar-back-php/commit/134ccd839396bb83e23a1ed0af59f37e18fcb467))
* :test_tube: add unit tests for RegisterUserDTO ([332de5](https://github.com/mateusmacedo/febrafar-back-php/commit/332de55e9d973f6d92f9bd840fe3f17122eb7f46))
* :test_tube: add unit tests for RegisterUserDTOFactory ([8cabec](https://github.com/mateusmacedo/febrafar-back-php/commit/8cabec05bbb184e4af463463a603eed36737fda8))
* :test_tube: add unit tests for UserPolicy methods ([3439e4](https://github.com/mateusmacedo/febrafar-back-php/commit/3439e4f3bc22eacd45e65bd12011801f75ff90d9))
* :test_tube: enable previously commented unit tests ([42f024](https://github.com/mateusmacedo/febrafar-back-php/commit/42f024fb6607d93ed69528449ca18a027adf2469))
* :test_tube: fix class name case in unit test ([0e156b](https://github.com/mateusmacedo/febrafar-back-php/commit/0e156bd0b1145f1e8edc5e98935864268fe70a9c))
* :test_tube: improve auth tests for reliability and coverage ([eb48f7](https://github.com/mateusmacedo/febrafar-back-php/commit/eb48f78ffccd3515ab533c296413aa4d26669e25))
* :test_tube: reorganize unit tests for better structure ([0d84d0](https://github.com/mateusmacedo/febrafar-back-php/commit/0d84d06f18e6d320d29c86d94d92de7a8abf10aa))
* :test_tube: update logout test to use LogoutDTO ([95c432](https://github.com/mateusmacedo/febrafar-back-php/commit/95c43256c43c203a12e4cb4b28ad13d5ca0b069a))

### Builds

* :package: add l5-swagger to composer dependencies ([755b84](https://github.com/mateusmacedo/febrafar-back-php/commit/755b84c2cef3480bb3155cf0e0d3f8bc814207c0))

### Documentation

* :books: add bearer token support to swagger docs ([a9c7d3](https://github.com/mateusmacedo/febrafar-back-php/commit/a9c7d3e8ee8ec032980f77e3be62fd9fedda2c24))

### Chores

* :wrench: remove commented xdebug settings for cleanup ([6c5706](https://github.com/mateusmacedo/febrafar-back-php/commit/6c57062f7972591f62e7c95bb189ba6f2891d45c))


---

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

