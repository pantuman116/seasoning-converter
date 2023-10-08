# **Seasoning Converter　　〜調味料別体積重量変換器〜**
## サイトリンク
[Seasoning Converter](http://pantuman.com/)

## 課題設定
1. 背景
    * 料理レシピにおいて、調味料の量の表示単位は重量（グラム）や体積（大さじ小さじ）などが混在しています。
    * 調味料の計量方法は調味料の種類、調理工程、および使用可能な調理器具に依存します。そのため、必要に応じて重量と体積の単位変換を行いたいことがよくあります。
    * 単位変換を行う際、単位変換表のWebサイトを閲覧したり、重量から体積への変換のためのWebサイトを利用したり、体積から重量への変換のためのWebサイトを利用するなど、異なるWebサイトを使い分ける必要があり、手間がかかります。
3. 目的
    * 調味料の単位変換において、異なるWebサイトを使い分ける手間を解消するため、単位変換表の閲覧、重量→体積変換、体積→重量変換ができるWebアプリケーションを作成します。
4. ゴール
    * 調味料の単位変換（重量⇆体積）ができる
    * 調味料の重量表（単位体積あたりの重量）が閲覧できる
    * 調味料の新規追加ができる
## 要件定義
要件定義として、業務要件（業務フロー）、機能要件（ページ遷移図、WF：ワイヤーフレーム・機能・データ）を示します。
<details>
<summary>業務フロー</summary>

![業務フロー](https://github.com/pantuman116/seasoning-converter/assets/80459750/8112c873-659b-4709-b918-46ad7710503a)
</details>

<details>
<summary>ページ遷移図</summary>
   
![ページ遷移図](https://github.com/pantuman116/seasoning-converter/assets/80459750/dfd5ec42-d843-4c01-9347-06bcb97ab93a)
</details>

<details>
<summary>WF・機能・データ (変換)</summary>

![WF・機能・データ (変換)](https://github.com/pantuman116/seasoning-converter/assets/80459750/b62df2be-f836-47b6-af90-170b641abdc3)
</details>

<details>
<summary>WF・機能・データ (重量表)</summary>

![WF・機能・データ (重量表) ](https://github.com/pantuman116/seasoning-converter/assets/80459750/b1b1ee52-f216-49a5-ae6c-c381b5f3e004)
</details>

<details>
<summary>WF・機能・データ (調味料新規追加)</summary>

![WF・機能・データ (調味料新規追加) ](https://github.com/pantuman116/seasoning-converter/assets/80459750/b0aafbaa-760e-43ed-8af6-b49e72efad2b)
</details>

## インフラ
AWS上に構築したインフラ構成を示します。
* VPC、Public Subnet、Security Group（SSH,HTTP）を設定
* EC2インスタンス（インスタンスタイプ：t2.micro）を起動
* EC2インスタンス上にDocker環境構築
* 独自ドメインをお名前.comから取得
* Route53のホストゾーン作成、ネームサーバー、Aレコードの登録
<details>
<summary>インフラ構成図</summary>

![インフラ構築 ](https://github.com/pantuman116/seasoning-converter/assets/80459750/8264de92-7aef-40e2-abe2-b1923585ca66)
</details>

## 開発環境
コンテナ上のアプリケーション、静的解析＆テストツール、CICDの流れを示します。
* Webサーバー用コンテナ: PHP + Apache
* DBサーバー用コンテナ: MySQL
* 静的解析&テスト: PHP CodeSniffer, PHP Md, PHP Stan, PHP Unitを実施してGitHubへPush
* ビルド: GitHub ActionsにてDocker Imageをビルドし、Docker ImageをAWS ECRへPush
* デプロイ: GitHub ActionsにてAWS EC2インスタンスにSSH接続し、Docker ImageのPullとDockerコンテナの再起動

<details>
<summary>開発環境</summary>

![開発環境](https://github.com/pantuman116/seasoning-converter/assets/80459750/1fca5c49-ea19-4fac-85a7-cc986a6b7a8c)
</details>

## パッケージ、クラス
Webサーバー用コンテナ上のサーバーサイドの処理におけるパッケージ、クラス構成を示します。
* framework: 単位変換のフレームワークとなるインターフェースクラスをまとめています。
* unit/volume: 体積の単位となるクラス及び、体積単位クラスのオブジェクトを生成するクラスをまとめています。新しい体積単位を増やす場合は、Volumeクラスをインターフェースとした新規クラスを作成します。
* unit/weight: 重量の単位となるクラス及び、重量単位クラスのオブジェクトを生成するクラスをまとめています。新しい重量単位を増やす場合は、Weightクラスをインターフェースとした新規クラスを作成します。
* converter: 単位変換を行うクラスをまとめています。新たな単位変換パターンを増やす場合は、Converterクラスをインターフェースとした新規クラスを作成する。
* unit: 体積や重量といった単位の性質ごとにパッケージしたものをまとめています。新たな単位の性質（例えばエネルギーなど）を増やす場合は、新規パッケージを作成します。
<details>
<summary>パッケージ、クラス</summary>
   
![パッケージ、クラス構成](https://github.com/pantuman116/seasoning-converter/assets/80459750/de148c2f-df84-43cd-9044-00e21dd9ab61)
</details>

## 参考
### 全体
* [独学エンジニア](https://dokugaku-engineer.com/)

### AWS

* [ざっくりAWS](https://aws-rough.cc/ec2/)

### Docker

### GitHub

GitHub Actions ⇆ AWS連携
* [GitHub Docs：アマゾン ウェブ サービスでの OpenID Connect の構成](https://docs.github.com/ja/actions/deployment/security-hardening-your-deployments/configuring-openid-connect-in-amazon-web-services)
* [GitHub Actions と AWS で実現する DevOps 実践講座](https://www.udemy.com/course/devops-gha-aws-infra/?utm_source=adwords&utm_medium=udemyads&utm_campaign=LongTail_la.JA_cc.JP&utm_content=deal4584&utm_term=_._ag_107181210924_._ad_452531407122_._kw__._de_c_._dm__._pl__._ti_dsa-930814701079_._li_1009216_._pd__._&matchtype=&gclid=CjwKCAjw9-6oBhBaEiwAHv1QvMzwY5DP2t-pFfH0P3Eeyg5dOxsyngJdHNXi_9Nm2hSgDfSyph4RmxoCP5oQAvD_BwE)

### バックエンド（PHP）

* [PHP マニュアル](https://www.php.net/manual/ja/index.php)

Composer
* [Composer](https://getcomposer.org/)

静的解析＆テストツール
* [PHP CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer)
* [PHP Mess Detector](https://phpmd.org/)
* [PHPStan](https://phpstan.org/)
* [PHPStan GitHub](https://github.com/phpstan/phpstan)
* [PHP Unit](https://phpunit.de/index.html)

### フロントエンド（HTML, CSS, JavaScript）
* [HTML](https://developer.mozilla.org/ja/docs/Web/HTML)
* [Sass](https://sass-lang.com/)
* [BootStrap](https://getbootstrap.jp/docs/4.5/getting-started/introduction/)
* [scssphp](https://scssphp.github.io/scssphp/)


## 開発用
### 手動でのデプロイまでのコマンド（コピペ用）
ローカル環境
```bash
# Docker イメージのビルド（本番環境用）
docker compose -f docker-compose_deploy.yml build

# AWS CLIログイン
aws ecr get-login-password --region ap-northeast-1 | docker login --username AWS --password-stdin 970168658714.dkr.ecr.ap-northeast-1.amazonaws.com

# Docker イメージをAWS ECRへプッシュ
docker compose -f docker-compose_deploy.yml push
```
開発環境：Dockerイメージのプル、コンテナ起動
```bash
# EC2にターミナルからSSH接続
ssh -i <key file> <userName@serverIP>

# AWS CLIログイン
aws ecr get-login-password --region ap-northeast-1 | docker login --username AWS --password-stdin 970168658714.dkr.ecr.ap-northeast-1.amazonaws.com

# Docker イメージのプル
docker compose pull

# Docker コンテナ停止
docker compose down

# Docker コンテナ起動
docker compose up -d
```
### CSS関連
scssのコンパイル
```bash
vendor/scssphp/scssphp/bin/pscss < stylesheets/scss/app.scss > stylesheets/css/app.css
```
