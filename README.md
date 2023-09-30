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
AWS上に構築したインフラ構成を示します。なるべくコストを抑えつつ、AWSやDocker、CICDについて学べて、常時閲覧可能なWebサイトにしました。
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

## 参考
### GitHub

GitHub Actions ⇆ AWS連携
* [GitHub Docs：アマゾン ウェブ サービスでの OpenID Connect の構成](https://docs.github.com/ja/actions/deployment/security-hardening-your-deployments/configuring-openid-connect-in-amazon-web-services)
* [GitHub Actions と AWS で実現する DevOps 実践講座](https://ricoh.udemy.com/course/devops-gha-aws-infra/learn/lecture/34306760#overview
)
## 開発用
### デプロイまでのコマンド（コピペ用）
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
