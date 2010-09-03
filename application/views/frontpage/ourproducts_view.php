<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?=$content?>

<ul class="products">
<?php foreach( $listProducts->result_array() as $row ) {
    $url = site_url('/our-products/'.$row['reference']);
?>
    <li>
        <a href="<?=$url?>" class="link-product"><?=$row['products_name']?></a>
        <div class="line" style="background-color:<?=$row['color']?>"></div>
        <p class="clear"><img src="<?=UPLOAD_PATH_PRODUCTS.$row['image_name']?>" alt="<?=$row['image_name']?>" width="168" height="68" /></p>
        <div class="text">
            <p><?=$row['description']?></p>
        </div>
        <a href="<?=$url?>" class="link-moreinfo">Read more</a>
    </li>
<?php }?>
</ul>