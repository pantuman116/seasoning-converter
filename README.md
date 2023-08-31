# seasoning-converter

## コマンド備忘録
### ローカル環境：Dockerイメージのビルド、コンテナ起動、プッシュ
```bash
# Docker イメージのビルド
docker-compose build

# Docker コンテナの起動
docker-compose up -d

# Docker コンテナ内でコマンドを実行する
docker-compose exec app php -v

# Docker コンテナの停止・削除
docker-compose down
```
### 開発環境：Dockerイメージのプル、コンテナ起動
