<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div id="gallery" class="ad-gallery">
    <div class="ad-image-wrapper" style="border-color: <?=$info['color']?>"></div>
    <div class="ad-nav" style="background-color: <?=$info['color']?>">
        <div class="ad-thumbs">
            <ul class="ad-thumb-list">
        <?php
        $n=-1;
        foreach( $info['gallery'] as $row ){$n++;?>
                <li><a href="<?=UPLOAD_PATH_GALLERY.$row['image']?>"><img src="<?=UPLOAD_PATH_GALLERY.$row['thumb']?>" alt="" width="<?=$row['width']?>" height="<?=$row['height']?>" class="image<?=$n?>"></a></li>
        <?php }?>
            </ul>
        </div>
    </div>
    <!--<div class="line" style="background-color: <?=$info['color']?>"></div>-->
</div>

<div class="content-column1">
<?=$info['content']?>

    <hr style="width:150px" />
    <a href="javascript:void(Products.popup('<?=$info['reference']?>'))" class="clear link-icon"><img src="images/icon_print.png" alt="" width="32" height="32" /> Print</a>
</div>
<div class="content-column2">
    <ul class="list">
        <?php foreach( $listProductsName as $row ){?>
        <li>
            <a href="<?=site_url('our-products/'.$row['reference'])?>" class="link-title"><?=$row['products_name']?></a><br />
            <div class="line" style="background-color: <?=$row['color']?>"></div>
        </li>
        <?php }?>
    </ul>
</div>

<script type="text/javascript">
<!--
    Products.initializer();
-->
</script>
