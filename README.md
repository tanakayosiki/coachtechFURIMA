# フリマアプリ　coachtechフリマ
商品の出品、購入を行うことができるサービスです。
<img width="890" alt="スクリーンショット 2024-03-05 15 32 01" src="https://github.com/tanakayosiki/coachtechFURIMA/assets/135409428/3ce209c7-76ce-491b-b458-7315fa5964a4">



## 概要
商品の出品、購入はもちろん、気になる商品のお気に入り登録や、商品の値下げ交渉などに活用できるコメント機能もできる仕様となっております。（出品、購入はプロフィール登録が必要となります。)  
また、ショップ出店機能では、ショップとしての商品の出品、コメント、ユーザーをメールにてスタッフとして招待、スタッフの登録解除をすることができます。招待されたユーザーは、ショップとしての商品の出品、コメントをすることができます。  
管理人は、ユーザー削除、全ユーザーにメール、ショップの商品ごとのコメントのやり取りを確認することができます。    
購入の際、住所変更も可能です。また、コンビニ払い、クレジットカード払い、代引き払いから選択していただくようになっております。クレジットカード払いは、マイページにて支払い可能です。  
商品一覧ページの閲覧、商品の詳細は、会員登録無しでもご利用できます。


## 機能一覧
全ユーザー共通
・ユーザー新規登録機能  
・ログイン機能  
・商品一覧閲覧  
・商品詳細確認  
ユーザー用機能  
・プロフィール登録機能  
・お気に入り登録機能  
・お気に入り解除機能  
・コメント機能  
・コメント削除機能（出品者のみ）  
・新規ショップ登録機能  
・出品機能（プロフィール登録後）  
・購入機能（プロフィール登録後）  
 -住所変更機能  
・マイページ機能  
 -購入商品一覧(クレジットカード払いの場合、手続き可能）   
 -出品商品一覧  
管理人機能  
・ユーザー削除機能  
・ショップ商品別コメント確認機能  
・ユーザーへのメール送信機能  
ショップ機能  
・ショップオーナー  
 -スタッフ招待  
 -スタッフ登録解除  
 -出品機能  
 -コメント機能  
 -コメント削除機能  
・招待スタッフ  
 -出品機能  
 -コメント機能  
 -コメント削除機能  


## 使用技術  
nginx:1.21.1  
mysql:8.0.26   
php:7.4.9  
laravel 8.83.27  
AWS  
 -EC2  
 -RDS  
 -S3  

## 環境構築  
1.git cloneを作成する  
git clone git@github.com:tanakayosiki/coachtechFURIMA.git  
2.ファイルに移動  
cd coachtechFURIMA  
3.dockerを構築する  
$ docker-compose up -d --build  
$ code .  
4.laravelパッケージをインストール  
$ docker-compose exec php bash  
$ composer install  
5..env ファイルの作成  
$ cp .env.example .env  
$ exit  
.envファイル内  
DB_CONNECTION=mysql  
DB_HOST=mysql  
DB_PORT=3306  
DB_DATABASE=laravel_db  
DB_USERNAME=laravel_user  
DB_PASSWORD=laravel_pass  
6.ユーザー登録
<img width="890" alt="スクリーンショット 2024-03-05 15 32 01" src="https://github.com/tanakayosiki/coachtechFURIMA/assets/135409428/f7f05ea8-76a8-4353-8c1b-d76d2aaf36e3">
上記の画像の右上の会員登録から会員登録する。（初回登録のユーザーのみ管理人の権限が付与されます）

## ER図
<img width="744" alt="スクリーンショット 2024-03-02 19 25 03" src="https://github.com/tanakayosiki/coachtechFURIMA/assets/135409428/ff8178e5-3846-4a5d-be4d-d46fc381739a">





