# **Seasoning Converter　　〜調味料別体積重量変換器〜**

## 課題設定

## 要件定義
<details>
<summary>業務フロー</summary>

aaaaaaaaaaaaaaaaaaaaa
bbbbbbbbbbbbbbbbbbb
ccccccccccccccccccccc
## テスト
</details>

## インフラ
<details>
<summary>インフラ構成図</summary>

aaaaaaaaaaaaaaaaaaaaa
bbbbbbbbbbbbbbbbbbb
ccccccccccccccccccccc
</details>

## 開発環境

## パッケージ、クラス




## デプロイまでのコマンド（コピペ用）
### ローカル環境
```bash
# Docker イメージのビルド（本番環境用）
docker compose -f docker-compose_deploy.yml build

# AWS CLIログイン
aws ecr get-login-password --region ap-northeast-1 | docker login --username AWS --password-stdin 970168658714.dkr.ecr.ap-northeast-1.amazonaws.com

# Docker イメージをAWS ECRへプッシュ
docker compose -f docker-compose_deploy.yml push
```
### 開発環境：Dockerイメージのプル、コンテナ起動
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

## css関連
### scssのコンパイル
```bash
vendor/scssphp/scssphp/bin/pscss < stylesheets/scss/app.scss > stylesheets/css/app.css
```
