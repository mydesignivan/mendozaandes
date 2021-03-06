<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ', 				'rb');
define('FOPEN_READ_WRITE',			'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 	'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 			'ab');
define('FOPEN_READ_WRITE_CREATE', 		'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 		'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',	'x+b');


/*
|--------------------------------------------------------------------------
| NOMBRE DE LAS TABLAS (BASE DE DATO)
|--------------------------------------------------------------------------
*/
define('TBL_USERS',              'users');
define('TBL_PRODUCTS',           'products');
define('TBL_GALLERY',            'gallery');
define('TBL_CONTENTS',           'contents');

/*
|--------------------------------------------------------------------------
| MENSAJES DE ERROR PARA UPLOAD
|--------------------------------------------------------------------------
*/
define('ERR_UPLOAD_NOTUPLOAD', 'El archivo no ha podido llegar al servidor.');
define('ERR_UPLOAD_MAXSIZE', 'El tamaño del archivo debe ser menor a {size} MB.');
define('ERR_UPLOAD_FILETYPE', 'El tipo de archivo es incompatible.');

/*
|--------------------------------------------------------------------------
| EMAIL FORM CONTACTO
|--------------------------------------------------------------------------
*/
$msg = '<b>Name:</b> {name}<br /><br />';
$msg.= '<b>E-mail:</b> {mail}<br /><br />';
$msg.= '<b>Message:</b><hr color="#000000" />{message}';
define('EMAIL_CONTACT_SUBJECT', 'Mendoza Andes - Contact Form');
define('EMAIL_CONTACT_MESSAGE', $msg);


/*
|--------------------------------------------------------------------------
| UPLOAD FILE
|--------------------------------------------------------------------------
*/
define('UPLOAD_FILETYPE', 'gif|jpg|png');
define('UPLOAD_MAXSIZE', 2048); //Expresado en Kylobytes

define('UPLOAD_PATH_GALLERY', './uploads/gallery/');
define('UPLOAD_PATH_PRODUCTS', './uploads/products/');

define('IMAGE_THUMB_GALLERY_WIDTH', 150);
define('IMAGE_THUMB_GALLERY_HEIGHT', 100);
define('IMAGE_FULL_GALLERY_WIDTH', 960);
define('IMAGE_FULL_GALLERY_HEIGHT', 425);
define('IMAGE_THUMB_PRODUCTS_WIDTH', 168);
define('IMAGE_THUMB_PRODUCTS_HEIGHT', 68);

/*
|--------------------------------------------------------------------------
| METADATA TITLE
|--------------------------------------------------------------------------
*/
define('TITLE_GLOBAL', 'Mendoza Andes Personalized Tourism - ');
define('TITLE_INDEX', 'Our goals and believes');
define('TITLE_OURPRODUCTS', 'Our Products');
define('TITLE_CONTACTUS', 'Contact Us');

/*
|--------------------------------------------------------------------------
| METADATA KEYWORDS
|--------------------------------------------------------------------------
*/
define('META_KEYWORDS_GLOBAL', '');
define('META_KEYWORDS_INDEX', '');
define('META_KEYWORDS_OURPRODUCTS', '');
define('META_KEYWORDS_CONTACTUS', '');


/*
|--------------------------------------------------------------------------
| METADATA DESCRIPTIONS
|--------------------------------------------------------------------------
*/
define('META_DESCRIPTION_GLOBAL', '');
define('META_DESCRIPTION_INDEX', '');
define('META_DESCRIPTION_OURPRODUCTS', '');
define('META_DESCRIPTION_CONTACTUS', '');

/*
|--------------------------------------------------------------------------
| CONFIGURACION GENERAL
|--------------------------------------------------------------------------
*/
define('CACHE_TIME', 5);


/* End of file constants.php */
/* Location: ./system/application/config/constants.php */