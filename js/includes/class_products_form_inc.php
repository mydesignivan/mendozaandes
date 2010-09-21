<?php
if( isset($_modejs) ){
    $script_js[] = "plugins/picturegallery/picturegallery".$this->config->item('sufix_pack_js');
    $script_js[] = "class/products_form_class".$this->config->item('sufix_pack_js');
}else{
    echo '<script type="text/javascript" src="js/plugins/jscolor/jscolor.pack.js"></script>';
}
?>