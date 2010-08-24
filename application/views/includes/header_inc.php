<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<!-- =============== TOP HEADER =============== -->
<div class="span-24 last"> 
    <div class="logo"><a href="<?=$this->config->item('base_url');?>"><img src="images/logo.png" alt="Mendoza Andes" width="256" height="181" /></a></div>
</div>

<!-- =============== MENU =============== -->
<?php if( $this->session->userdata('logged_in') && $this->uri->segment(1)=="panel" ) {
    $page = $this->uri->segment(2);

    // "PANEL"
?>

<div class="clear span-24 last"> 
    <div class="menu">
        <ul>
            <li <?php if( $page=="panel") echo 'class="current"';?>><a href="<?=$this->config->item('base_url');?>" target="_blank">Home</a></li>
            <li <?php if( $page=="my-account" ) echo 'class="current"';?>><a href="<?=site_url('/my-account/')?>">My Account</a></li>
            <li <?php if( $page=="products" ) echo 'class="current"';?>><a href="<?=site_url('/products/')?>">Products</a></li>
            <li class="no-line <?php if( $page=="pages" ) echo 'current';?>"><a href="<?=site_url('/pages/')?>">Pages</a></li>
        </ul>
    </div>
</div>

<?php }else{ // "FRONTPAGE"
    $page = $this->uri->segment(1);?>

<div class="clear span-24 last"> 
    <div class="menu">
        <ul>
            <li <?php if( $page=="" || $page=="who-whe-are" ) echo 'class="current"';?>><a href="<?=site_url('who-whe-are');?>">Who Whe Are</a></li>
            <li <?php if( $page=="our-products" ) echo 'class="current"';?>><a href="<?=site_url('/our-products/')?>">Our Products</a></li>
            <li <?php if( $page=="advise" ) echo 'class="current"';?>><a href="<?=site_url('/advise/')?>">Advise</a></li>
            <li <?php if( $page=="travel-tips" ) echo 'class="current"';?>><a href="<?=site_url('/travel-tips/')?>">Travel Tips</a></li>
            <li class="no-line <?php if( $page=="contact-us" ) echo 'current';?>"><a href="<?=site_url('/contact-us/')?>">Contact Us</a></li>
        </ul>
    </div>
</div>

<?php }?>

<div class="banner">
    <div class="mask"></div>
    <div id="slider">
        <img src="images/banner/passion-for-wines.jpg" alt="Passion for wines" width="960" height="350" />
        <img src="images/banner/personalized-tour.jpg" alt="Personalized tour" width="960" height="350" />
        <img src="images/banner/we-can-do-it.jpg" alt="We can do it" width="960" height="350" />
    </div>
</div>
<div class="header-bottom"></div>