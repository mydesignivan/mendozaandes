<?php
if( isset($_modejs) ){
    $script_js[] = "plugins/picturegallery/picturegallery".$this->config->item('sufix_pack_js');
    $script_js[] = "plugins/jscolor/jscolor.pack";
    $script_js[] = "class/products_form_class".$this->config->item('sufix_pack_js');
}
?>