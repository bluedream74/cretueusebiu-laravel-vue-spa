<?php
/**
 * WordPress �δ�������
 *
 * ���Υե�����ϡ����󥹥ȡ������ wp-config.php �������������ɤ����Ѥ��ޤ���
 * ���������ɤ�𤵤��ˤ��Υե������ "wp-config.php" �Ȥ���̾���ǥ��ԡ�����
 * ľ���Խ������ͤ����Ϥ��Ƥ⤫�ޤ��ޤ���
 *
 * ���Υե�����ϡ��ʲ��������ޤߤޤ���
 *
 * * �ǡ����١�������
 * * ��̩��
 * * �ǡ����١����ơ��֥���Ƭ��
 * * ABSPATH
 *
 * @link https://ja.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ���:
// Windows �� "���Ģ" �Ǥ��Υե�������Խ����ʤ��Ǥ������� !
// ����ʤ��Ȥ���ƥ����ȥ��ǥ���
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF ����)
// ����Ѥ���ɬ�� UTF-8 �� BOM �ʤ� (UTF-8N) ����¸���Ƥ���������

// ** �ǡ����١������� - ���ξ���ϥۥ��ƥ����褫�����ꤷ�Ƥ��������� ** //
/** WordPress �Τ���Υǡ����١���̾ */
define( 'DB_NAME', 'hojyokin0001_wp1' );

/** �ǡ����١����Υ桼����̾ */
define( 'DB_USER', 'hojyokin0001_wp1' );

/** �ǡ����١����Υѥ���� */
define( 'DB_PASSWORD', 'psvz68x766' );

/** �ǡ����١����Υۥ���̾ */
define( 'DB_HOST', 'localhost' );

/** �ǡ����١����Υơ��֥���������ݤΥǡ����١�����ʸ�����å� */
define( 'DB_CHARSET', 'utf8' );

/** �ǡ����١����ξȹ��� (�ۤȤ�ɤξ���ѹ�����ɬ�פϤ���ޤ���) */
define( 'DB_COLLATE', '' );

/**#@+
 * ǧ���ѥ�ˡ�������
 *
 * ���줾���ۤʤ��ˡ��� (���) ��ʸ������ѹ����Ƥ���������
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org ����̩�������ӥ�} �Ǽ�ư�������뤳�Ȥ�Ǥ��ޤ���
 * ��Ǥ��ĤǤ��ѹ����ơ���¸�Τ��٤Ƥ� cookie ��̵���ˤǤ��ޤ�������ˤ�ꡢ���٤ƤΥ桼��������Ū�˺ƥ����󤵤��뤳�Ȥˤʤ�ޤ���
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
 * WordPress �ǡ����١����ơ��֥����Ƭ��
 *
 * ���줾��˥�ˡ��� (���) ����Ƭ����Ϳ���뤳�Ȥǰ�ĤΥǡ����١�����ʣ���� WordPress ��
 * ���󥹥ȡ��뤹�뤳�Ȥ��Ǥ��ޤ���Ⱦ�ѱѿ����Ȳ����Τߤ���Ѥ��Ƥ���������
 */
$table_prefix = 'wp_';

/**
 * ��ȯ�Ԥ�: WordPress �ǥХå��⡼��
 *
 * �����ͤ� true �ˤ���ȡ���ȯ������ (notice) ��ɽ�����ޤ���
 * �ơ��ޤ���ӥץ饰����γ�ȯ�Ԥˤϡ����γ�ȯ�Ķ��ˤ����Ƥ��� WP_DEBUG ����Ѥ��뤳�Ȥ򶯤��侩���ޤ���
 *
 * ����¾�ΥǥХå������ѤǤ�������ˤĤ��Ƥϥɥ�����ơ�������������������
 *
 * @link https://ja.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* ���������ͤϡ����ιԤȡ��Խ���ɬ�פʤΤϤ����ޤǤǤ��פιԤδ֤��ɲä��Ƥ��������� */



/* �Խ���ɬ�פʤΤϤ����ޤǤǤ� ! WordPress �ǤΥѥ֥�å��󥰤򤪳ڤ��ߤ��������� */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
