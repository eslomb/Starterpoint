<?php
require_once 'db-config.php';

define( 'ITSEC_ENCRYPTION_KEY', 'eGJZOHJTbllneioyYGhAbWpYKzs7ZGIjLS5TJC92dztZe2xHPmtFUjYsdSAre0crKil6e1c7OipkQCFGW34xQw==' );

define('AUTOSAVE_INTERVAL', 300 ); // seconds
define('WP_POST_REVISIONS', 10);


/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

// cuando se elimina Woocommerce, que se eliminen las tablas y datos.
// define ('WC_REMOVE_ALL_DATA', true);


/**#@+
 * Claves únicas de autentificación.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '&126o_b.V$DHi&Azn6[/{!$/Ui#=TR&a-nH5j#+sU;S?5EnJvJD&)fR6og!GL:4?');
define('SECURE_AUTH_KEY',  'L@2_8i_0zX|+6#&6Ve|%AqegjV58X`d+V@&TE+XCvGP_@Z+,Nr>ZDQ1]=.q$Dl3-');
define('LOGGED_IN_KEY',    'zv4>;;V,/-x$c>>K(Q|w+dc9WrHG721#9W]qhsTYYsBHcRm4OPmUQ-|AbH^f!ToS');
define('NONCE_KEY',        ')8lDbrHR6c^+);WEcFFy%:UKFKgu{Kt_jUhk!GB,Knx#FS3?AU<>sw*+WF25w7~A');
define('AUTH_SALT',        'tU{5`Q4-|}pu>K?!|4o+iFd~GxaEV-77BnoA`nc4<4H|`/APR(O:KzmN:|drAXN+');
define('SECURE_AUTH_SALT', 'zI=N)@->X[8VMwx]Vib|3_v*7=_*{)~qiD`wx~%U9&:5vvI+85;<n/hB_5Y!HerB');
define('LOGGED_IN_SALT',   'JK+sQ7o4uC80-C!^_I1`DxNgcd#XsrejCLa(&?8Ner`X]R+T2/u-S2s4+)CNH&.J');
define('NONCE_SALT',       '+~4`@C-+q~+^)0~ZBaGy%?wo5AQ,yAiX*d;>PnF4j_Au6F/9;XJDF`/v{v8Ne$Op');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
