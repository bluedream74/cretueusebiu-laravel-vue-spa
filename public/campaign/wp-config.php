<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * データベース設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link https://ja.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** データベース設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define( 'DB_NAME', 'hojyokin0001_wp1' );

/** データベースのユーザー名 */
define( 'DB_USER', 'hojyokin0001_wp1' );

/** データベースのパスワード */
define( 'DB_PASSWORD', 'psvz68x766' );

/** データベースのホスト名 */
define( 'DB_HOST', 'localhost' );

/** データベースのテーブルを作成する際のデータベースの文字セット */
define( 'DB_CHARSET', 'utf8' );

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define( 'DB_COLLATE', '' );

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'N*eKbKa/j[G`Wn}{OvOv,rnd3z0:R,TkyNUu|-=CB:Sa6D@Dhs` upG~{|{9h]uQ' );
define( 'SECURE_AUTH_KEY',  'l`o-B==e4.aRK-?I2|3_cfSlS6Q;Gbl$1KC. n^N5.8,Tf6#oy}DhbNc(a)}$:wi' );
define( 'LOGGED_IN_KEY',    'l5x]t*;L(.zr0{qqbG$ogG=>Gz(U},s&dNdGi:(90mA%*GkjpE],kM*1kZ8 AQ8B' );
define( 'NONCE_KEY',        '[Zp?/T+vr:p~<57xcf`,54^0Xt{ZW?AMXN~B;~s&;{*E8yG2CRPRyZ3R7GSc=Ce)' );
define( 'AUTH_SALT',        'zKuiU+~<UXCD@DX$lN[c3)0/TKUSiR=]*Z?,9>M_&2M C8G,5;GBABT$BJ;yRxhC' );
define( 'SECURE_AUTH_SALT', '=mgF!$91%,9`rTg7Q:Yya/i%G3Op,rg4I%n/8!VV_|yxm5da-MuuOd-3o<-fEBnJ' );
define( 'LOGGED_IN_SALT',   'nf<?DWJzGD=#`ox>uv$@ADV>V=6!yc2]Mg7&3>L0JP>@g}5z-=.KW~qS4#OO2AyU' );
define( 'NONCE_SALT',       'Bl4Q|Z|ZKS~8gn]C6EyAZNMrF/v[4d:WO~ejIlx%P>|T%r^&6>TOuj#?9LLXb>A4' );
define( 'WP_CACHE_KEY_SALT','`A_ @C@gb@hR#mAbA#Ss6BExFu>JhrEnfR.8vm{%[7C|`l9XD:7T-0j_)+L2r0Y|' );

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数についてはドキュメンテーションをご覧ください。
 *
 * @link https://ja.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* カスタム値は、この行と「編集が必要なのはここまでです」の行の間に追加してください。 */



/* 編集が必要なのはここまでです ! WordPress でのパブリッシングをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
