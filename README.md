## 目次

1. [プロジェクトについて](#プロジェクトについて)
2. [環境](#環境)
3. [ディレクトリ構成](#ディレクトリ構成)



## プロジェクトについて

ウイスキーショップのサイトを作成する
（同じ大学の人のみ利用可能な想定）

a.商品の注文
b.注文者一覧
c.在庫の追加
d.上記三つの画面にとべる全体画面

大きく分けて上記4つの操作が行える画面を作成する



## 環境

<!-- 言語を記載 -->

| 言語・フレームワーク  
| --------------------- | 
| HTML                  | 
| CSS                   | 
| PHP                   | 



## ディレクトリ構成

＜a：order（注文画面）＞
1.shop_service.php　  全体画面（dに該当）
2.shop_top.php    商品一覧
3.shohin.php  選択商品表示
4.cart223cj23.php  選択情報確認
5.input_jusho.php　個人情報入力
6.order_kakunin.php　最終確認
7.order_kiroku.php　注文完了画面

＜b：record（顧客情報確認画面）＞
1.order_yomu.php　  注文履歴一覧画面
2.input_rireki_kensaku.php    確認したい顧客情報入力
3.order_kensaku.php  　注文履歴表示


＜c：addition（在庫追加画面）＞
1.input_shop.php　  追加したい商品と個数入力
2.kakunin_shop.php    確定画面


＜picture＞
・商品写真
・背景写真


細かい機能
・在庫量を超える注文が来た際はエラー表示

