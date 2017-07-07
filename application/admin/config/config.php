<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Base Site URL
|--------------------------------------------------------------------------
|
| URL to your CodeIgniter root. Typically this will be your base URL,
| WITH a trailing slash:
|
|	http://example.com/
|
| If this is not set then CodeIgniter will guess the protocol, domain and
| path to your installation.
|
*/
if ($_SERVER['HTTP_HOST'] == "localhost") {
    $config['base_url'] = 'http://localhost/aileensoul-new/admin/';
} else {
    $config['base_url']	= '';
}

/*
|--------------------------------------------------------------------------
| Index File
|--------------------------------------------------------------------------
|
| Typically this will be your index.php file, unless you've renamed it to
| something else. If you are using mod_rewrite to remove the page set this
| variable so that it is blank.
|
*/
$config['index_page'] = '';


if($_SERVER['HTTP_HOST']=="localhost")
{
    $config['MAIN_SITE_URL'] = 'http://localhost/aileensoul-new/';
}
else
{
    $config['MAIN_SITE_URL'] = '';
}



/*
|--------------------------------------------------------------------------
| URI PROTOCOL
|--------------------------------------------------------------------------
|
| This item determines which server global should be used to retrieve the
| URI string.  The default setting of 'AUTO' works for most servers.
| If your links do not seem to work, try one of the other delicious flavors:
|
| 'AUTO'			Default - auto detects
| 'PATH_INFO'		Uses the PATH_INFO
| 'QUERY_STRING'	Uses the QUERY_STRING
| 'REQUEST_URI'		Uses the REQUEST_URI
| 'ORIG_PATH_INFO'	Uses the ORIG_PATH_INFO
|
*/
$config['uri_protocol']	= 'AUTO';

/*
|--------------------------------------------------------------------------
| URL suffix
|--------------------------------------------------------------------------
|
| This option allows you to add a suffix to all URLs generated by CodeIgniter.
| For more information please see the user guide:
|
| http://codeigniter.com/user_guide/general/urls.html
*/

$config['url_suffix'] = '';

/*
|--------------------------------------------------------------------------
| Default Language
|--------------------------------------------------------------------------
|
| This determines which set of language files should be used. Make sure
| there is an available translation if you intend to use something other
| than english.
|
*/
$config['language']	= 'english';

/*
|--------------------------------------------------------------------------
| Default Character Set
|--------------------------------------------------------------------------
|
| This determines which character set is used by default in various methods
| that require a character set to be provided.
|
*/
$config['charset'] = 'UTF-8';

/*
|--------------------------------------------------------------------------
| Enable/Disable System Hooks
|--------------------------------------------------------------------------
|
| If you would like to use the 'hooks' feature you must enable it by
| setting this variable to TRUE (boolean).  See the user guide for details.
|
*/
$config['enable_hooks'] = FALSE;


/*
|--------------------------------------------------------------------------
| Class Extension Prefix
|--------------------------------------------------------------------------
|
| This item allows you to set the filename/classname prefix when extending
| native libraries.  For more information please see the user guide:
|
| http://codeigniter.com/user_guide/general/core_classes.html
| http://codeigniter.com/user_guide/general/creating_libraries.html
|
*/
$config['subclass_prefix'] = 'MY_';


/*
|--------------------------------------------------------------------------
| Allowed URL Characters
|--------------------------------------------------------------------------
|
| This lets you specify with a regular expression which characters are permitted
| within your URLs.  When someone tries to submit a URL with disallowed
| characters they will get a warning message.
|
| As a security measure you are STRONGLY encouraged to restrict URLs to
| as few characters as possible.  By default only these are allowed: a-z 0-9~%.:_-
|
| Leave blank to allow all characters -- but only if you are insane.
|
| DO NOT CHANGE THIS UNLESS YOU FULLY UNDERSTAND THE REPERCUSSIONS!!
|
*/
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-=';


/*
|--------------------------------------------------------------------------
| Enable Query Strings
|--------------------------------------------------------------------------
|
| By default CodeIgniter uses search-engine friendly segment based URLs:
| example.com/who/what/where/
|
| By default CodeIgniter enables access to the $_GET array.  If for some
| reason you would like to disable it, set 'allow_get_array' to FALSE.
|
| You can optionally enable standard query string based URLs:
| example.com?who=me&what=something&where=here
|
| Options are: TRUE or FALSE (boolean)
|
| The other items let you set the query string 'words' that will
| invoke your controllers and its functions:
| example.com/index.php?c=controller&m=function
|
| Please note that some of the helpers won't work as expected when
| this feature is enabled, since CodeIgniter is designed primarily to
| use segment based URLs.
|
*/
$config['allow_get_array']		= TRUE;
$config['enable_query_strings'] = FALSE;
$config['controller_trigger']	= 'c';
$config['function_trigger']		= 'm';
$config['directory_trigger']	= 'd'; // experimental not currently in use

/*
|--------------------------------------------------------------------------
| Error Logging Threshold
|--------------------------------------------------------------------------
|
| If you have enabled error logging, you can set an error threshold to
| determine what gets logged. Threshold options are:
| You can enable error logging by setting a threshold over zero. The
| threshold determines what gets logged. Threshold options are:
|
|	0 = Disables logging, Error logging TURNED OFF
|	1 = Error Messages (including PHP errors)
|	2 = Debug Messages
|	3 = Informational Messages
|	4 = All Messages
|
| For a live site you'll usually only enable Errors (1) to be logged otherwise
| your log files will fill up very fast.
|
*/
$config['log_threshold'] = 0;

/*
|--------------------------------------------------------------------------
| Error Logging Directory Path
|--------------------------------------------------------------------------
|
| Leave this BLANK unless you would like to set something other than the default
| application/logs/ folder. Use a full server path with trailing slash.
|
*/
$config['log_path'] = '';

/*
|--------------------------------------------------------------------------
| Date Format for Logs
|--------------------------------------------------------------------------
|
| Each item that is logged has an associated date. You can use PHP date
| codes to set your own date formatting
|
*/
$config['log_date_format'] = 'Y-m-d H:i:s';

/*
|--------------------------------------------------------------------------
| Cache Directory Path
|--------------------------------------------------------------------------
|
| Leave this BLANK unless you would like to set something other than the default
| system/cache/ folder.  Use a full server path with trailing slash.
|
*/
$config['cache_path'] = '';

/*
|--------------------------------------------------------------------------
| Encryption Key
|--------------------------------------------------------------------------
|
| If you use the Encryption class or the Session class you
| MUST set an encryption key.  See the user guide for info.
|
*/
$config['encryption_key'] = 'AILLENSOUL123654adminWEBcontent';

/*
|--------------------------------------------------------------------------
| Session Variables
|--------------------------------------------------------------------------
|
| 'sess_cookie_name'		= the name you want for the cookie
| 'sess_expiration'			= the number of SECONDS you want the session to last.
|   by default sessions last 7200 seconds (two hours).  Set to zero for no expiration.
| 'sess_expire_on_close'	= Whether to cause the session to expire automatically
|   when the browser window is closed
| 'sess_encrypt_cookie'		= Whether to encrypt the cookie
| 'sess_use_database'		= Whether to save the session data to a database
| 'sess_table_name'			= The name of the session database table
| 'sess_match_ip'			= Whether to match the user's IP address when reading the session data
| 'sess_match_useragent'	= Whether to match the User Agent when reading the session data
| 'sess_time_to_update'		= how many seconds between CI refreshing Session Information
|
*/
$config['sess_cookie_name']		= 'aillensoul_admin';
$config['sess_expiration']		= 7200;
$config['sess_expire_on_close']	= FALSE;
$config['sess_encrypt_cookie']	= TRUE;
$config['sess_use_database']	= FALSE;
$config['sess_table_name']		= 'aillensoul_session';
$config['sess_match_ip']		= FALSE;
$config['sess_match_useragent']	= TRUE;
$config['sess_time_to_update']	= 300;

/*
|--------------------------------------------------------------------------
| Cookie Related Variables
|--------------------------------------------------------------------------
|
| 'cookie_prefix' = Set a prefix if you need to avoid collisions
| 'cookie_domain' = Set to .your-domain.com for site-wide cookies
| 'cookie_path'   =  Typically will be a forward slash
| 'cookie_secure' =  Cookies will only be set if a secure HTTPS connection exists.
|
*/
$config['cookie_prefix']	= "";
$config['cookie_domain']	= "";
$config['cookie_path']		= "/";
$config['cookie_secure']	= FALSE;

/*
|--------------------------------------------------------------------------
| Global XSS Filtering
|--------------------------------------------------------------------------
|
| Determines whether the XSS filter is always active when GET, POST or
| COOKIE data is encountered
|
*/
$config['global_xss_filtering'] = FALSE;

/*
|--------------------------------------------------------------------------
| Cross Site Request Forgery
|--------------------------------------------------------------------------
| Enables a CSRF cookie token to be set. When set to TRUE, token will be
| checked on a submitted form. If you are accepting user data, it is strongly
| recommended CSRF protection be enabled.
|
| 'csrf_token_name' = The token name
| 'csrf_cookie_name' = The cookie name
| 'csrf_expire' = The number in seconds the token should expire.
*/
$config['csrf_protection'] = TRUE;
$config['csrf_token_name'] = 'aillensouladmincsrf';
$config['csrf_cookie_name'] = 'aillensouladmincsrfcookie';
$config['csrf_expire'] = 7200;

/*
|--------------------------------------------------------------------------
| Output Compression
|--------------------------------------------------------------------------
|
| Enables Gzip output compression for faster page loads.  When enabled,
| the output class will test whether your server supports Gzip.
| Even if it does, however, not all browsers support compression
| so enable only if you are reasonably sure your visitors can handle it.
|
| VERY IMPORTANT:  If you are getting a blank page when compression is enabled it
| means you are prematurely outputting something to your browser. It could
| even be a line of whitespace at the end of one of your scripts.  For
| compression to work, nothing can be sent before the output buffer is called
| by the output class.  Do not 'echo' any values with compression enabled.
|
*/
$config['compress_output'] = FALSE;

/*
|--------------------------------------------------------------------------
| Master Time Reference
|--------------------------------------------------------------------------
|
| Options are 'local' or 'gmt'.  This pref tells the system whether to use
| your server's local time as the master 'now' reference, or convert it to
| GMT.  See the 'date helper' page of the user guide for information
| regarding date handling.
|
*/
$config['time_reference'] = 'local';


/*
|--------------------------------------------------------------------------
| Rewrite PHP Short Tags
|--------------------------------------------------------------------------
|
| If your PHP installation does not have short tag support enabled CI
| can rewrite the tags on-the-fly, enabling you to utilize that syntax
| in your view files.  Options are TRUE or FALSE (boolean)
|
*/
$config['rewrite_short_tags'] = FALSE;


/*
|--------------------------------------------------------------------------
| Reverse Proxy IPs
|--------------------------------------------------------------------------
|
| If your server is behind a reverse proxy, you must whitelist the proxy IP
| addresses from which CodeIgniter should trust the HTTP_X_FORWARDED_FOR
| header in order to properly identify the visitor's IP address.
| Comma-delimited, e.g. '10.0.1.200,10.0.1.201'
|
*/
$config['proxy_ips'] = '';


//page photo 
$config['page_main_upload_path'] = '../uploads/pages/main/';
$config['page_allowed_types'] = 'gif|jpg|png|JPG';
$config['page_main_max_size'] = '500000'; //in KB
$config['page_main_max_width'] = '3000';
$config['page_main_max_height'] = '700';

//Path to upload page's Thumbnail File
$config['page_thumb_upload_path'] = '../uploads/pages/thumbs/';
$config['page_thumb_width'] = '300';
$config['page_thumb_height'] = '300';

//page app photo 
$config['page_app_main_upload_path'] = '../uploads/pages_app/main/';
$config['page_app_allowed_types'] = 'gif|jpg|png|JPG';
$config['page_app_main_max_size'] = '500000'; //in KB
$config['page_app_main_max_width'] = '2500';
$config['page_app_main_max_height'] = '600';

//Path to upload page's Thumbnail File
$config['page_app_thumb_upload_path'] = '../uploads/pages_app/thumbs/';
$config['page_app_thumb_width'] = '300';
$config['page_app_thumb_height'] = '300';


//Category photo 
$config['category_main_upload_path'] = '../uploads/category/main/';
$config['category_allowed_types'] = 'gif|jpg|png|JPG';
$config['category_main_max_size'] = '500000'; //in KB
$config['category_main_max_width'] = '2500';
$config['category_main_max_height'] = '600';

//Path to upload category's Thumbnail File
$config['category_thumb_upload_path'] = '../uploads/category/thumbs/';
$config['category_thumb_width'] = '350';
$config['category_thumb_height'] = '250';


//Global photo 
$config['global_main_upload_path'] = '../uploads/global/main/';
$config['global_allowed_types'] = 'gif|jpg|png|JPG';
$config['global_main_max_size'] = '500000'; //in KB
$config['global_main_max_width'] = '2500';
$config['global_main_max_height'] = '600';

//Path to upload global's Thumbnail File
$config['global_thumb_upload_path'] = '../uploads/global/thumbs/';
$config['global_thumb_width'] = '350';
$config['global_thumb_height'] = '250';


//testimonial photo 
$config['testimonial_main_upload_path'] = '../uploads/testimonial/main/';
$config['testimonial_allowed_types'] = 'gif|jpg|png|JPG';
$config['testimonial_main_max_size'] = '500000'; //in KB
$config['testimonial_main_max_width'] = '1500';
$config['testimonial_main_max_height'] = '600';

//Path to upload testimonial's Thumbnail File
$config['testimonial_thumb_upload_path'] = '../uploads/testimonial/thumbs/';
$config['testimonial_thumb_width'] = '250';
$config['testimonial_thumb_height'] = '250';

//product photo 
$config['product_main_upload_path'] = '../uploads/product/main/';
$config['product_allowed_types'] = 'gif|jpg|jpeg|png|pdf|bmp|jpe';
$config['product_main_max_size'] = '800000'; //in KB
$config['product_main_max_width'] = '3000';
$config['product_main_max_height'] = '2000';

//Path to upload product's Thumbnail File
$config['product_thumb_upload_path'] = '../uploads/product/thumbs/';
$config['product_thumb_width'] = '250';
$config['product_thumb_height'] = '250';

//banner photo 
$config['banner_main_upload_path'] = '../uploads/banner/main/';
$config['banner_allowed_types'] = 'gif|jpg|jpeg|png|pdf|bmp|jpe';
$config['banner_main_max_size'] = '800000'; //in KB
$config['banner_main_max_width'] = '3000';
$config['banner_main_max_height'] = '2000';

//Path to upload banner's Thumbnail File
$config['banner_thumb_upload_path'] = '../uploads/banner/thumbs/';
$config['banner_thumb_width'] = '250';
$config['banner_thumb_height'] = '250';

//deals promotions photo 
$config['deals_main_upload_path'] = '../uploads/deals/main/';
$config['deals_allowed_types'] = 'gif|jpg|jpeg|png|pdf|bmp|jpe';
$config['deals_main_max_size'] = '800000'; //in KB
$config['deals_main_max_width'] = '2500';
$config['deals_main_max_height'] = '1800';

//Path to upload product's Thumbnail File
$config['deals_thumb_upload_path'] = '../uploads/deals/thumbs/';
$config['deals_thumb_width'] = '250';
$config['deals_thumb_height'] = '250';

//local community photo 
$config['local_main_upload_path'] = '../uploads/local/main/';
$config['local_allowed_types'] = 'gif|jpg|jpeg|png|pdf|bmp|jpe';
$config['local_main_max_size'] = '800000'; //in KB
$config['local_main_max_width'] = '2500';
$config['local_main_max_height'] = '1800';

//Path to upload local community's Thumbnail File
$config['local_thumb_upload_path'] = '../uploads/local/thumbs/';
$config['local_thumb_width'] = '250';
$config['local_thumb_height'] = '250';


//Why choose photo 
$config['why_main_upload_path'] = '../uploads/why/main/';
$config['why_allowed_types'] = 'gif|jpg|jpeg|png|pdf|bmp|jpe';
$config['why_main_max_size'] = '800000'; //in KB
$config['why_main_max_width'] = '2500';
$config['why_main_max_height'] = '1800';

//Path to upload why choose Thumbnail File
$config['why_thumb_upload_path'] = '../uploads/why/thumbs/';
$config['why_thumb_width'] = '250';
$config['why_thumb_height'] = '250';



/* End of file config.php */
/* Location: ./application/config/config.php */
