<html>
<head>
    <title>Database Error</title>
<?php
//$url = 'http://localhost/trabajos/mendozaandes.git/';
$url = 'http://www.mendozaandes.com/';
?>
    <base href="<?=$url?>" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="images/favicon.ico" rel="stylesheet icon" type="image/ico" />

    <!-- Framework CSS -->
    <link rel="stylesheet" href="css/blueprint/screen.min.css" type="text/css" media="screen, projection"/>
    <link rel="stylesheet" href="css/blueprint/print.min.css" type="text/css" media="print"/>
    <!--[if lt IE 8]><link rel="stylesheet" href="css/blueprint/ie.css" type="text/css" media="screen, projection"/><![endif]-->

    <link href="css/style.min.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.cycle.all.min.js"></script>
    <script type="text/javascript" src="js/global.js"></script>

    <!--[if IE 6]>
    <script type="text/javascript">
        var IE6UPDATE_OPTIONS = {
            icons_path: "js/plugins/ie6update/ie6update/images/"
        }
    </script>
    <script type="text/javascript" src="js/plugins/ie6update/ie6update/ie6update.js"></script>
    <![endif]-->

    <!--[if IE 6]>
    <script type="text/javascript" src="js/helpers/DD_belatedPNG.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container">
        <div class="span-24 last header"> 
            <!-- =============== TOP HEADER =============== -->
            <div class="span-24 last"> 
                <div class="logo"><a href="<?=$url?>"><img src="images/logo.png" alt="Mendoza Andes" width="256" height="181" /></a></div>
            </div>

            <!-- =============== MENU =============== -->
            <div class="clear span-24 last"> 
                <div class="menu">
                    <ul>
                        <li><a href="<?=$url.'who-whe-are/';?>">Who Whe Are</a></li>
                        <li><a href="<?=$url.'our-products/'?>">Our Products</a></li>
                        <li><a href="<?=$url.'advise/'?>">Advise</a></li>
                        <li><a href="<?=$url.'travel-tips/'?>">Travel Tips</a></li>
                        <li class="no-line"><a href="<?=$url.'contact-us/'?>">Contact Us</a></li>
                    </ul>
                </div>
            </div>

            <div class="banner">
                <div class="mask"></div>
                <div id="slider">
                    <img src="images/banner/passion-for-wines.jpg" alt="Passion for wines" width="960" height="350" />
                    <img src="images/banner/personalized-tour.jpg" alt="Personalized tour" width="960" height="350" />
                    <img src="images/banner/we-can-do-it.jpg" alt="We can do it" width="960" height="350" />
                </div>
            </div>
            <div class="header-bottom"></div>
        </div>

        <div class="clear span-24 last main-container"> 
            <div class="content-error">
                <h1><?php echo $heading; ?></h1>
                <?php echo $message; ?>
            </div>
        </div>

        <div class="clear span-24 last footer"> 
            <p>Copyright &copy; 2010 - Todos los derechos reservados - <a href="http://www.mydesign.com.ar" target="_blank"><b>Dise&ntilde;o web</b></a> <a href="http://www.mydesign.com.ar" target="_blank"><img src="images/mydesign_logo.png" alt="www.mydesign.com.ar" width="83" height="9" /></a></p>
            <a href="http://validator.w3.org/check?uri=referer"><img src="images/xhtml.jpg" alt="Valid XHTML 1.0 Strict" width="75" height="16" /></a>&nbsp;&nbsp;
            <a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="images/cssvalid.jpg" alt="¡CSS Válido!" width="75" height="16" /></a>
        </div>
    </div>
</body>
</html>