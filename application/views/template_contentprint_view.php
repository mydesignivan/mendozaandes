<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
    <title><?=$tlp_title;?></title>
    <meta name="robots" content="none" />
    <?php require('includes/head_inc.php');?>
</head>

<body>
    <div class="content-print">
        <?=$content?>
        <a href="javascript:void(window.print())" class="clear link-icon"><img src="images/icon_print.png" alt="" width="32" height="32" /> Print</a>
    </div>
</body>
</html>