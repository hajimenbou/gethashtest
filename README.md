# geohashのphpパッケージ検証

## 概要

- firestoreで使われている[geofire-common](https://firebase.google.com/docs/firestore/solutions/geoqueries)とphpライブラリ[saikiran/geohash](https://github.com/skthon/geohash)のgeohash生成値が変わらないか比較検証する

## インストール

```
yarn install
composer install
```

## 検証

[Geolonia 住所データ](https://geolonia.github.io/japanese-addresses/)の位置情報をお借りして検証を行う

```
## 試しに東京都新宿区の住所データを取得
$ curl 'https://geolonia.github.io/japanese-addresses/api/ja/%E6%9D%B1%E4%BA%AC%E9%83%BD/%E6%96%B0%E5%AE%BF%E5%8C%BA.json' > src/position.json

## 住所名,緯度,経度,geohash のcsvを作成
$ php src/geohash.php > src/geohash-php.csv
$ node src/geohash.js > src/geohash-node.csv

## 差分比較
$ diff src/geohash-php.csv src/geohash-node.csv
```
差分が無いので、geohashも同じものが生成されているとなる