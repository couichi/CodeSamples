*はじめに
このCodeSamplesは、様々な言語のサンプルソースコードを集積し、自己学習の糧とすることを目的として構築しました。
自分が必要とした機能は、
１．ソースコードの登録
２．ソースコードの検索
	タグでの検索
	言語での検索
	行数順表示
３．ソースコードのシンタックスハイライト
４．タグサジェスチョン
の4つでした。

１，２は実装済みです。ただテストケースを書いたりはしていないので、バグもありますし、
入力値チェックも不完全です。
３のシンタックスハイライトは
SyntaxHighlighterを利用しています。
http://alexgorbatchev.com/SyntaxHighlighter/
４はjQueryでの勉強に自分で実装しましたが、suggest.js
http://www.enjoyxstudy.com/javascript/suggest/
のような外部のライブラリの方が出来が良いので、何れリプレースするつもりです。


*制作者について
独学でプログラミングを勉強しています。PHPの使用歴は割と長く、初めて触ったのは数年前で、windowsのphpdevからでした。ブランクはありつつも、断続的に自分に必要なスクリプトを書くためにその都度学習して来ました。
オブジェクト指向プログラミングについて学び始めたのは2010年末からで、当時制作していた投下時間と見積もり時間を管理するゴール・Todo管理Webアプリケーションの制作に、コード量が3万行を超えたあたりから限界を感じたからです。
オブジェクト指向では、このCodeSamplesが初めての制作物です。
Gitは今年に入ってから使い始めました。現在はTDDを学ばなければと考えています。


*開発環境
XAMPP for Windows version 1.7.3を使用しました。
Apache 2.2.14 (IPv6 enabled) + OpenSSL 0.9.8l
MySQL 5.1.41 + PBXT engine
PHP 5.3.1
phpMyAdmin 3.2.4
Perl 5.10.1
FileZilla FTP Server 0.9.33
Mercury Mail Transport System 4.72


*ソースコードを読まれる方への注意
コメントはほぼ無いと思って下さい。済みません。
入力Formの変数は、データベースのフィールド名とほぼ一致していますが、
入力Formの変数'tags'に対応するフィールド名は'specialities'または'spec'となっています。
データベースのテーブル設計をした時には'specialities'が良い考えに思えたのです。


*データベース
バックエンドのデータベースはMySQLです。
テーブルは下記の5つです。
codes - サンプルソースコードを保存します
specialities - タグを保存します
langs - CodeSamplesが扱う言語のリストです
code_specs - ソースコードとタグを紐付けます
lang_specs - 言語とタグを紐付けます


CREATE TABLE `codes` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `code` text NOT NULL,
 `description` text NOT NULL,
 `linenum` tinyint(3) unsigned NOT NULL,
 `lang_id` int(10) unsigned NOT NULL,
 `created` datetime NOT NULL,
 `modified` datetime NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1



CREATE TABLE `specialities` (
 `speciality` varchar(64) NOT NULL,
 `id` int(11) NOT NULL AUTO_INCREMENT,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1


CREATE TABLE `langs` (
 `langname` varchar(20) NOT NULL,
 `id` int(11) NOT NULL AUTO_INCREMENT,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18446744073709551615 DEFAULT CHARSET=latin1


CREATE TABLE `code_specs` (
 `code_id` int(10) unsigned NOT NULL,
 `sp_id` int(10) unsigned NOT NULL,
 PRIMARY KEY (`code_id`,`sp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1


CREATE TABLE `lang_specs` (
 `lang_id` int(10) unsigned NOT NULL,
 `sp_id` int(10) unsigned NOT NULL,
 PRIMARY KEY (`lang_id`,`sp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1


*最後に
読んでくださってどうもありがとうございます。
お手数で無ければ是非フィードバックを下さい。
