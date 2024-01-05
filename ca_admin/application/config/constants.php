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
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

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
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


/**** USER DEFINED CONSTANTS **********/

define('ROLE_ADMIN', '1');
define('ROLE_MANAGER', '2');
define('ROLE_EMPLOYEE', '3');

define('SEGMENT', 2);

/************************** EMAIL CONSTANTS *****************************/


define('EMAIL_FROM', 'booking@sewaktravels.com');		// e.g. email@example.com
define('EMAIL_BCC', '');		// e.g. email@example.com
define('FROM_NAME', 'Sewak Travels');	// Your system name
define('EMAIL_PASS', 'b@gI6RKGL');	// Your email password
define('PROTOCOL', 'smtp');				// mail, sendmail, smtp
define('SMTP_HOST', 'smtp.hostinger.com');		// your smtp host e.g. smtp.gmail.com
define('SMTP_PORT', '465');					// your smtp port e.g. 25, 587
define('SMTP_USER', 'booking@sewaktravels.com');		// your smtp user
define('SMTP_PASS', 'b@gI6RKGL');	// your smtp password
define('MAIL_PATH', '/usr/sbin/sendmail');

define('ORDER_EMAIL_FROM', 'booking@sewaktravels.com');		// e.g. email@example.com
define('ORDER_EMAIL_BCC', '');		// e.g. email@example.com
define('ORDER_FROM_NAME', 'Sewak Travels');	// Your system name
define('ORDER_EMAIL_PASS', '^b@gI6RKGL');	// Your email password
define('ORDER_PROTOCOL', 'smtp');				// mail, sendmail, smtp
define('ORDER_SMTP_HOST', 'smtp.hostinger.com');		// your smtp host e.g. smtp.gmail.com
define('ORDER_SMTP_PORT', '465');					// your smtp port e.g. 25, 587
define('ORDER_SMTP_USER', 'booking@sewaktravels.com');		// your smtp user
define('ORDER_SMTP_PASS', 'b@gI6RKGL');	// your smtp password
define('ORDER_MAIL_PATH', '/usr/sbin/sendmail');



define('API_AUTH_TYPE', 'Active'); //Local, Live
define('AUTH_TYPE', 'Live'); //Local, Live

define('MERCHANT_KEY', 'XE9hipgg');
define('SALT', 'iqMuHPBkbq');
define('CHANNEL_ID', 'WEB');


define('CONTACT_NO_URL', '+918800312400');
define('CONTACT_NO', '880-031-2400');
define('ADDRESS', 'Plot No. 804, Ashok Vihar, Phase 1, Gurgaon - 122001');
//define('ADDRESS_1', 'Plot No. 491 Street No. 4, Noble Enclave, Sector 22, Gurugram, Haryana 122017');
define('ADDRESS_1', 'FF-10, Spanish Court,<br>Bajghera Rd, Sector 2, Palam Vihar,<br> Gurugram, Haryana 122017');
define('REGISTERED_ADDRESS', 'F-301, Plot No. 804 Gali No.8, Ashok Vihar-1, Gurugram, Hr-122001, India');

define('FACEBOOK_URL', 'https://www.facebook.com/sewaktravel');
define('TWITTER_URL', 'https://twitter.com/sewaktravels');
define('INSTAGRAM_URL', '');
define('LINKEDIN_URL', '');
define('PINTEREST_URL', 'https://www.pinterest.com/sewaktravels');

define('MOBILE', '83778-28828');
define('MOBILE_URL', '+918377828828');


if(AUTH_TYPE == 'Local') {
    #------------------------- Local ----------------------------------------------
	define('API_URL', 'http://localhost:8060');
	define('COOKIE_DOMAIN', 'localhost');
	define('IMAGE_DIR', 'http://localhost/programming/ci/sewakcabs/cabadmin/upload/vehicle/images/');
	define('HTTP_SECURE_UNSECURE', 'http://');
	define('PAYU_URL', 'https://sandboxsecure.payu.in/_payment');
	define('WEBSITE_URL', 'http://localhost/programming/ci/scms/');

	define('SMS_URL', 'https://www.businesssms.co.in/smsaspx');
	define('SMS_USERNAME', 'sewakcabs@gmail.com');
	define('SMS_PASSWORD', 'Shriganesh@123');
	//define('SMS_SENDER_ID', '88889');
	define('SMS_SENDER_ID', 'SWCABS');
	define('HB_PAYU_URL', 'https://sandboxsecure.payu.in/_payment');
	define('HB_MERCHANT_KEY', 'XE9hipgg');
	define('HB_SALT', 'iqMuHPBkbq');
	define('SW_GOOGLE_API', 'AIzaSyC45T_MeNSGE2z806l2FqQzxrT1qDSjZUA');
	
	
}
elseif(AUTH_TYPE == 'Live') {
    #---------------------- Live ------------------------------------------
	define('API_URL', 'https://api.sewaktravels.com/public');
	define('COOKIE_DOMAIN', '.sewaktravels.com');
	define('IMAGE_DIR', 'https://www.sewaktravels.com/ca_admin/upload/vehicle/images/');
	define('HTTP_SECURE_UNSECURE', 'https://');
	define('PAYU_URL', 'https://secure.payu.in/_payment');
	define('WEBSITE_URL', 'https://www.sewaktravels.com/');
	define('SMS_URL', 'https://www.businesssms.co.in/smsaspx');
	define('SMS_USERNAME', 'sewakcabs@gmail.com');
	define('SMS_PASSWORD', 'Shriganesh@123');
	//define('SMS_SENDER_ID', '88889');
	define('SMS_SENDER_ID', 'SWCABS');
	define('HB_PAYU_URL', 'https://secure.payu.in/_payment');	
	define('HB_MERCHANT_KEY', 'XE9hipgg');
	define('HB_SALT', 'iqMuHPBkbq');
	define('SW_GOOGLE_API', 'AIzaSyArNyTWJEQJTrJ5oGi1f5Yi5z5fJOGhL0U');
	
	
	
		// razorpay keys
	define('RP_MERCHANT_KEY','JmStGT3o792wC0');
	define('RP_KEY_ID','rzp_live_EeRnadU1BUMdxW');
	define('RP_SECRET_KEY', '3fXAzM74PwQJIYnI3o9YPQYO');
	// define('RP_KEY_ID','rzp_live_9o9z5aurIv6v6k'); //Old key id
	
	
	
	//AIzaSyASouLkN1w9q5p4qlu0f038_wL6mW0zMAg
}


// Old code
// elseif(AUTH_TYPE == 'Live') {
//     #---------------------- Live ------------------------------------------
// 	define('API_URL', 'https://api.sewakcabs.com/public');
// 	define('COOKIE_DOMAIN', '.sewakcabs.com');
// 	define('IMAGE_DIR', 'https://www.sewakcabs.com/sw_admin/upload/vehicle/images/');
// 	define('HTTP_SECURE_UNSECURE', 'https://');
// 	define('PAYU_URL', 'https://secure.payu.in/_payment');
// 	define('WEBSITE_URL', 'https://www.sewakcabs.com/');
// 	define('SMS_URL', 'https://www.businesssms.co.in/smsaspx');
// 	define('SMS_USERNAME', 'sewakcabs@gmail.com');
// 	define('SMS_PASSWORD', 'Shriganesh@123');
// 	//define('SMS_SENDER_ID', '88889');
// 	define('SMS_SENDER_ID', 'SWCABS');
// 	define('HB_PAYU_URL', 'https://secure.payu.in/_payment');	
// 	define('HB_MERCHANT_KEY', 'XE9hipgg');
// 	define('HB_SALT', 'iqMuHPBkbq');
// 	define('SW_GOOGLE_API', 'AIzaSyArNyTWJEQJTrJ5oGi1f5Yi5z5fJOGhL0U');
// 	//AIzaSyASouLkN1w9q5p4qlu0f038_wL6mW0zMAg
// }
// Old code