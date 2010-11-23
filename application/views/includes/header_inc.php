<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<!-- =============== TOP HEADER =============== -->
<div class="span-24 last"> 
    <div class="logo"><a href="<?=$this->config->item('base_url');?>"><img src="images/logo.png" alt="Mendoza Andes" width="209" height="152" /></a></div>
</div>

<!-- =============== MENU =============== -->
<?php if( $this->session->userdata('logged_in') && $this->uri->segment(1)=="panel" ) {
    $page = $this->uri->segment(2);

    // "PANEL"
?>

<div class="clear span-24 last"> 
    <div class="menu">
        <ul>
            <li <?php if( $page=="") echo 'class="current"';?>><a href="<?=$this->config->item('base_url');?>" target="_blank">Home</a></li>
            <li <?php if( $page=="myaccount" ) echo 'class="current"';?>><a href="<?=site_url('/panel/myaccount/')?>">Mi Cuenta</a></li>
            <li <?php if( $page=="products" ) echo 'class="current"';?>><a href="<?=site_url('/panel/products/')?>">Productos</a></li>
            <li class="<?php if( $page=="contents" ) echo 'current';?>"><a href="<?=site_url('/panel/contents/')?>">P&aacute;ginas</a></li>
            <li class="no-line"><a href="<?=site_url('/panel/logout/')?>">Salir</a></li>
        </ul>
    </div>
</div>

<?php }else{ // "FRONTPAGE"
    $page = $this->uri->segment(1);
?>

<div class="clear span-24 last"> 
    <div class="menu">
        <ul>
            <li <?php if( $page=="" || $page=="our-goals-and-believes" ) echo 'class="current"';?>><a href="<?=site_url('our-goals-and-believes');?>">Our goals and believes</a></li>
            <li <?php if( $page=="our-products" && $this->uri->segment(2)!="tailor-made-mendoza" ) echo 'class="current"';?>><a href="<?=site_url('/our-products/')?>">Our Products</a></li>
            <li <?php if( $page=="our-products" && $this->uri->segment(2)=="tailor-made-mendoza" ) echo 'class="current"';?>><a href="<?=site_url('/our-products/tailor-made-mendoza/')?>">Tailor made Mendoza</a></li>
            <li class="no-line <?php if( $page=="contact-us" ) echo 'current';?>"><a href="<?=site_url('/contact-us/')?>">Contact Us</a></li>
        </ul>
    </div>
</div>

<?php }?>

<?php if( $this->uri->segment(1)!="panel" ) {?>
<div class="banner">
    <div class="mask"></div>
    <div id="slider">
<?php
switch($this->uri->segment(2)){
    default:
        echo '<img src="images/banner/passion-for-wines.jpg" alt="Passion for wines" width="960" height="350" />';
        echo '<img src="images/banner/personalized-tour.jpg" alt="Personalized tour" width="960" height="350" />';
        echo '<img src="images/banner/we-can-do-it.jpg" alt="We can do it" width="960" height="350" />';
    break;
    case 'personalized-wine-tour':
        echo '<img src="images/banner/personalized-wine-tour-FOTO.jpg" alt="Personalized Wine Tour" width="960" height="350" />';
    break;
    case 'gaucho-day':
        echo '<img src="images/banner/gaucho-day.jpg" alt="Gaucho Day" width="960" height="350" />';
    break;
    case 'dakar-day-aconcagua':
        echo '<img src="images/banner/dakar-day-aconcagua.jpg" alt="Dakar Day Aconcagua" width="960" height="350" />';
    break;
    case 'dakar-day-intensive':
        echo '<img src="images/banner/dakar-intensive.jpg" alt="Dakar Intensive" width="960" height="350" />';
    break;
    case 'dakar-photography':
        echo '<img src="images/banner/dakar-photography.jpg" alt="Dakar Photography" width="960" height="350" />';
    break;
    case 'dakar-trekking':
        echo '<img src="images/banner/trekking.jpg" alt="Dakar trekking" width="960" height="350" />';
    break;
    case 'dakar-mix':
        echo '<img src="images/banner/dakar-mix.jpg" alt="Dakar Mix" width="960" height="350" />';
    break;
    case 'tailor-made-mendoza':
        echo '<img src="images/banner/tailor-made.jpg" alt="Tailor made mendoza" width="960" height="350" />';
    break;
}
?>
    </div>
</div>
<?php }?>
<div class="header-bottom"></div>