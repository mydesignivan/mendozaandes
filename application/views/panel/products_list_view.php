<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if( $this->session->flashdata('status')!='' ){?>
    <div class="<?=$this->session->flashdata('status')?>">
        <?=$this->session->flashdata('message')?>
    </div>
    <div class="clear"></div>
<?php }?>



<div class="trow">
    <button type="button" onclick="location.href='<?=site_url('panel/products/form')?>'" class="fright">Nuevo Producto</button>
</div>

<?php if( $listProducts->num_rows>0 ){?>
<table cellpadding="0" cellspacing="0" class="table-products">
    <thead>
        <tr>
            <td class="cell1">Producto</td>
            <td class="cell2">Ordenar</td>
            <td class="cell3">Modificar</td>
            <td class="cell4">Eliminar</td>
        </tr>
    </thead>
    <tbody>
<?php
$n=0;
foreach( $listProducts->result_array() as $row ) {
    $n++;
    $url = site_url('/panel/products/form/'.$row['products_id']);
    $class = $n%2 ? 'row-even' : '';
?>
        <tr class="<?=$class?>">
            <td class="cell1"><a href="<?=$url?>"><?=$row['products_name']?></a></td>
            <td class="cell2"><a href="javascript:void(0)" class="handle"><img src="images/icon_arrow_move.png" alt="" width="16" alt="16" /></a></td>
            <td class="cell3"><a href="<?=$url?>"><img src="images/icon_edit.png" alt="" width="16" alt="16" /><span>Modificar</span></a></td>
            <td class="cell4"><a href="javascript:Products.del(<?=$row['products_id']?>)"><img src="images/icon_delete.png" alt="" width="16" alt="16" /><span>Eliminar</span></a></td>
        </tr>
<?php }?>
    </tbody>
</table>
<?php }?>

<script type="text/javascript">
<!--
    Products.initializer();
-->
</script>