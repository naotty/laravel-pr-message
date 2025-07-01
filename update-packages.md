# アップデートが必要なパッケージ一覧

このプロジェクトで現在使用しているパッケージのうち、新しいバージョンが利用可能なものの一覧です。

## 直接依存関係

### orchestra/testbench
- 現在のバージョン: `v8.36.0`
- 最新バージョン: `v10.4.0`
- リリース日: 2025年5月12日 → 2025年6月8日
- 説明: Laravel Testing Helper for Packages Development

### phpunit/phpunit
- 現在のバージョン: `v10.5.47`
- 最新バージョン: `v12.2.5`
- リリース日: 2025年6月20日 → 2025年6月27日
- 説明: The PHP Unit Testing framework.

## 間接依存関係（主要なもの）

### Laravel Framework
- 現在のバージョン: `v10.48.29`
- 最新バージョン: `v12.19.3`
- リリース日: 2025年3月12日 → 2025年6月18日
- 説明: The Laravel Framework.

### Carbon日付ライブラリ
- 現在のバージョン: `2.73.0`
- 最新バージョン: `3.10.1`
- リリース日: 2025年1月8日 → 2025年6月21日
- 説明: An API extension for DateTime that supports 281 different languages.

### Laravel関連パッケージ
- **laravel/prompts**: `v0.1.25` → `v0.3.5`
- **laravel/serializable-closure**: `v1.3.7` → `v2.0.4`

### Symfonyコンポーネント（主要なもの）
- **symfony/console**: `v6.4.23` → `v7.3.1`
- **symfony/error-handler**: `v6.4.23` → `v7.3.1`
- **symfony/http-foundation**: `v6.4.23` → `v7.3.1`
- **symfony/http-kernel**: `v6.4.23` → `v7.3.1`
- **symfony/mailer**: `v6.4.23` → `v7.3.1`
- **symfony/routing**: `v6.4.22` → `v7.3.0`
- **symfony/translation**: `v6.4.23` → `v7.3.1`
- **symfony/var-dumper**: `v6.4.23` → `v7.3.1`
- **symfony/yaml**: `v6.4.23` → `v7.3.1`

### PHPUnit関連コンポーネント
- **phpunit/php-code-coverage**: `10.1.16` → `12.3.1`
- **phpunit/php-file-iterator**: `4.1.0` → `6.0.0`
- **phpunit/php-invoker**: `4.0.0` → `6.0.0`
- **phpunit/php-text-template**: `3.0.1` → `5.0.0`
- **phpunit/php-timer**: `6.0.0` → `8.0.0`

### Sebastian Bergmann テスト関連ライブラリ
- **sebastian/cli-parser**: `2.0.1` → `4.0.0`
- **sebastian/code-unit**: `2.0.0` → `3.0.3`
- **sebastian/comparator**: `5.0.3` → `7.1.0`
- **sebastian/complexity**: `3.2.0` → `5.0.0`
- **sebastian/diff**: `5.1.1` → `7.0.0`
- **sebastian/environment**: `6.1.0` → `8.0.2`
- **sebastian/exporter**: `5.1.2` → `7.0.0`
- **sebastian/global-state**: `6.0.2` → `8.0.0`
- **sebastian/type**: `4.0.0` → `6.0.2`
- **sebastian/version**: `4.0.1` → `6.0.0`

### その他の主要パッケージ
- **brick/math**: `0.12.3` → `0.13.1`
- **carbonphp/carbon-doctrine-types**: `2.1.0` → `3.2.0`
- **nunomaduro/collision**: `v7.12.0` → `v8.8.2`
- **nunomaduro/termwind**: `v1.17.0` → `v2.3.1`

## アップデート時の注意事項

1. **メジャーバージョンアップデート**: Laravel Framework (`v10` → `v12`) や Carbon (`v2` → `v3`) など、メジャーバージョンが変わるパッケージがあります。これらは破壊的変更を含む可能性があります。

2. **PHP バージョン要件**: 新しいバージョンではより新しいPHPバージョンが必要になる場合があります。

3. **段階的アップデート**: 特にLaravelのようなフレームワークは段階的にアップデートすることを推奨します。

## アップデート方法

```bash
# 特定のパッケージをアップデート
php composer.phar update パッケージ名

# すべてのパッケージをアップデート
php composer.phar update

# アップデート前にテストを実行することを強く推奨
php composer.phar test
```

生成日時: 2025年6月30日