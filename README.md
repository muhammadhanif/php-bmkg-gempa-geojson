# php-bmkg-gempa-geojson

Aplikasi ini dibangun dengan tujuan untuk melakukan konversi data gempa BMKG yang tersedia di [https://data.bmkg.go.id/gempabumi/](https://data.bmkg.go.id/gempabumi/) dengan format XML. Dengan aplikasi ini, data berformat XML tersebut diubah ke dalam format [GeoJSON](https://tools.ietf.org/html/rfc7946).

#### Data Gempa

Berikut ini data gempa yang bersumber dari BMKG yang dikonversi dari XML ke [GeoJSON](https://tools.ietf.org/html/rfc7946):

| No. |                               Data Gempa BMKG (XML)                               |                              Status                               |                                GeoJSON                                 |
| :-: | :-------------------------------------------------------------------------------: | :---------------------------------------------------------------: | :--------------------------------------------------------------------: |
| 1.  |        [ Gempabumi M 5.0+ Terkini ](https://data.bmkg.go.id/autogempa.xml)        | <img src = "https://img.shields.io/badge/progres-100%25-green" /> |   [Lihat](https://bmkg-geojson.herokuapp.com/gempa?data=m-5-terkini)   |
| 2.  | [ Gempabumi Berpotensi Tsunami Terkini ](https://data.bmkg.go.id/lasttsunami.xml) | <img src = "https://img.shields.io/badge/progres-100%25-green" /> | [Lihat](https://bmkg-geojson.herokuapp.com/gempa?data=tsunami-terkini) |
| 3.  |         [ 60 Gempabumi M 5.0+ ](https://data.bmkg.go.id/gempaterkini.xml)         | <img src = "https://img.shields.io/badge/progres-100%25-green" /> |       [Lihat](https://bmkg-geojson.herokuapp.com/gempa?data=m-5)       |
| 4.  |      [ 20 Gempabumi Dirasakan ](https://data.bmkg.go.id/gempadirasakan.xml)       | <img src = "https://img.shields.io/badge/progres-100%25-green" /> |    [Lihat](https://bmkg-geojson.herokuapp.com/gempa?data=dirasakan)    |

#### Donasi

Jika kalian ingin berdonasi, silahkan menghubungi kami melalui jalur berikut ini:

- Email: moehammadhanif@gmail.com
- Telegram: [t.me/muhammad_hanif](https://t.me/muhammad_hanif)
