<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
  |--------------------------------------------------------------------------
  | Display Debug backtrace
  |--------------------------------------------------------------------------
  |
  | If set to TRUE, a backtrace will be displayed along with php errors. If
  | error_reporting is disabled, the backtrace will not display, regardless
  | of this setting
  |
 */
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
  |--------------------------------------------------------------------------
  | File and Directory Modes
  |--------------------------------------------------------------------------
  |
  | These prefs are used when checking and setting modes when working
  | with the file system.  The defaults are fine on servers with proper
  | security, but you may wish (or even need) to change the values in
  | certain environments (Apache running a separate process for each
  | user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
  | always be used to set the mode correctly.
  |
 */
defined('FILE_READ_MODE') OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE') OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE') OR define('DIR_WRITE_MODE', 0755);

/*
  |--------------------------------------------------------------------------
  | File Stream Modes
  |--------------------------------------------------------------------------
  |
  | These modes are used when working with fopen()/popen()
  |
 */
defined('FOPEN_READ') OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE') OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE') OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESCTRUCTIVE') OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE') OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE') OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT') OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT') OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
  |--------------------------------------------------------------------------
  | Exit Status Codes
  |--------------------------------------------------------------------------
  |
  | Used to indicate the conditions under which the script is exit()ing.
  | While there is no universal standard for error codes, there are some
  | broad conventions.  Three such conventions are mentioned below, for
  | those who wish to make use of them.  The CodeIgniter defaults were
  | chosen for the least overlap with these conventions, while still
  | leaving room for others to be defined in future versions and user
  | applications.
  |
  | The three main conventions used for determining exit status codes
  | are as follows:
  |
  |    Standard C/C++ Library (stdlibc):
  |       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
  |       (This link also contains other GNU-specific conventions)
  |    BSD sysexits.h:
  |       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
  |    Bash scripting:
  |       http://tldp.org/LDP/abs/html/exitcodes.html
  |
 */
defined('EXIT_SUCCESS') OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR') OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG') OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE') OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS') OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT') OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE') OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN') OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX') OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

if (defined('ENVIRONMENT')) {
    switch (ENVIRONMENT) {
        case 'development':
            define('SITE_URL', 'http://localhost/mlm/');
            define('SITE_PUBLIC_PATH', 'http://localhost/mlm/assets/');
            break;

        case 'testing':
            define('SITE_URL', 'http://localhost/mlm/');
            define('SITE_PUBLIC_PATH', 'http://localhost/mlm/assets/');
            break;

        case 'production':
            define('SITE_URL', 'http://localhost/mlm/');
            define('SITE_PUBLIC_PATH', 'http://localhost/mlm/assets/');
            break;
        default:
            exit('The application environment is not set correctly.');
    }
}

define('ADMIN_SITE_URL', SITE_URL.'admin/');
//database tables
$pre_table_name='';
define('ACTIVITY',$pre_table_name.'activity');
define('ACTIVITY_LOG',$pre_table_name.'activity_log');
define('ADMIN',$pre_table_name.'admin');
define('ADMIN_FUNCTIONS',$pre_table_name.'admin_functions');
define('AFFILIATE',$pre_table_name.'affiliate');
define('AFFILIATE_PACKAGE',$pre_table_name.'affiliate_package');
define('AFFILIATE_SETTING',$pre_table_name.'affiliate_setting');
define('BANK_DETAILS',$pre_table_name.'bank_details');
define('COAFFILIATE',$pre_table_name.'coaffiliate');
define('EMAIL_LOGS',$pre_table_name.'email_logs');
define('EMAIL_TEMPLATE',$pre_table_name.'email_template');
define('EPIN',$pre_table_name.'epin');
define('LOCATION',$pre_table_name.'location');
define('LOGIN_HISTORY',$pre_table_name.'login_history');
define('MONEY_TRANSACTION',$pre_table_name.'money_transaction');
define('PRODUCT',$pre_table_name.'product');
define('RANKING',$pre_table_name.'ranking');
define('RESTRICTED_ACTIVITY',$pre_table_name.'restricted_activity');
define('SETTINGS',$pre_table_name.'settings');
define('STATIC_PAGES',$pre_table_name.'static_pages');
define('EPIN_REQUEST',$pre_table_name.'epin_request');
define('MAIN_AFFILIATE',$pre_table_name.'main_affiliate');

// public resouces path
//site js,css and image path
define('USER_PUBLIC_PATH', SITE_PUBLIC_PATH . 'frontend/');
define('USER_JS_PATH', USER_PUBLIC_PATH . 'js/');
define('USER_CSS_PATH', USER_PUBLIC_PATH . 'css/');
define('USER_IMAGE_PATH', USER_PUBLIC_PATH . 'images/');
//for admin layout
define('ADMIN_PUBLIC_PATH', SITE_PUBLIC_PATH . 'admin/');
define('ADMIN_JS_PATH', ADMIN_PUBLIC_PATH . 'js/');
define('ADMIN_CSS_PATH', ADMIN_PUBLIC_PATH . 'css/');
define('ADMIN_IMAGE_PATH', ADMIN_PUBLIC_PATH . 'images/');

define('SITE_CONTACT_EMAIL', 'support@mlm.com');
define('EMAIL_SENT', 'TRUE');
define('EMAIL_BCC', '');

//site constant
define('EPIN_SR_NO_LENGTH',8); //epin sr no length
define('EPIN_LENGTH',8); //epin length