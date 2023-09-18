# **Seasoning Converter　　〜調味料別体積重量変換器〜**

## 課題設定

## 要件定義
<details>
<summary>業務フロー</summary>
  
![ポートフォリオ](https://github.com/pantuman116/seasoning-converter/assets/80459750/f3c489f0-70e4-4662-8975-869e37d0c38d)
</details>

<details>
<summary>ページ遷移図</summary>
  
  ![ページ遷移図](https://github.com/pantuman116/seasoning-converter/assets/80459750/02c3d5e3-33d6-4d48-86b1-654243cd0313)
</details>

<details>
<summary>WF・機能・データ (変換)</summary>

  ![WF1](https://github.com/pantuman116/seasoning-converter/assets/80459750/031b4739-e27c-48e0-b6f3-e0be2e55a18e)
</details>

<details>
<summary>WF・機能・データ (重量表)</summary>

  ![WF2](https://github.com/pantuman116/seasoning-converter/assets/80459750/1bad6426-884c-40bc-8ed4-5f5d10cbb6d3)
</details>

<details>
<summary>WF・機能・データ (調味料新規追加)</summary>

  ![WF3](https://github.com/pantuman116/seasoning-converter/assets/80459750/88a4fd7d-e5f8-48f5-b630-c82efb5a9b12)
</details>

## インフラ
<details>
<summary>インフラ構成図</summary>

  ![インフラ構築](https://github.com/pantuman116/seasoning-converter/assets/80459750/abe17ba7-d87d-4a69-b6e4-1c1d96c27d09)
</details>

## 開発環境

## パッケージ、クラス

## 参考

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
ssh -i /Users/yuu/programming/aws/pantuman-ssh-key.cer ec2-user@54.95.11.14

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
