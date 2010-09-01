<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Products_model extends Model {

    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct() {
        parent::Model();
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
     public function create(){

         print_array($_POST);

         echo "<br><br>";

         print_array(json_decode($_POST['json']), true);

         $order = @$_POST['cboOrder'];
         $json = json_decode($_POST['json']);
         $gallery = $json->gallery;
         $reference = normalize($_POST['txtName']);

         $data = array(
            'products_name' => $_POST['txtName'],
            'reference'     => $reference,
            'content'       => $_POST['txtContent'],
            'image'         => $json->image_thumb['href_image_full'],
            'order'         => empty($order) ? 1 : ((int)$_POST['cboOrder']+1),
            'date_added'    => date('Y-m-d H:i:s')
         );

         $this->db->trans_start(); // INICIO TRANSACCION

         if( $this->db->insert(TBL_PRODUCTS, $data) ){
            $id = $this->db->insert_id();
            if( !$this->_copy_images($gallery->images_new, $id, $reference) ) return false;
         }

         $this->_delete_images_tmp(); //Elimina todas las imagenes temporales

         $this->db->trans_complete(); // COMPLETO LA TRANSACCION

     }

     public function get_list(){
         $this->db->select('products_id, products_name, order');
         $this->db->order_by('order', 'asc');
         return $this->db->get_where(TBL_PRODUCTS);
     }

     public function get_list_productsname(){
         $this->db->select('products_name, order');
         $this->db->order_by('order', 'asc');
         $query = $this->db->get_where(TBL_PRODUCTS);
         if( $query->num_rows==0 ) return false;
         else{
             return $query->result_array();
         }
     }

    /* PRIVATE FUNCTIONS
     **************************************************************************/
    private function _delete_images_tmp(){
        $dir = UPLOAD_DIR_OBRAS.".tmp/";
        $d = opendir($dir);
        while( $file = readdir($d) ){
            if( $file!="." AND $file!=".." ){
                @unlink($dir.$file);
            }
        }
    }

    private function _copy_images($json, $id, $dirname){

        mkdir(UPLOAD_PATH_GALLERY . $dirname);

        $n=0;
        foreach( $json as $row ){
            $n++;
            $cp1 = @copy(UPLOAD_PATH_GALLERY.".tmp/".$row->image_full, UPLOAD_PATH_GALLERY . $dirname . $row->image_full);
            $cp2 = @copy(UPLOAD_PATH_GALLERY.".tmp/".$row->image_thumb, UPLOAD_PATH_GALLERY . $dirname . $row->image_thumb);

            if( $cp1 && $cp2 ){
                $data = array(
                    'products_id' => $id,
                    'image'       => $row->image_full,
                    'thumb'       => $row->image_thumb,
                    'width'       => $row->width,
                    'height'      => $row->height,
                    'date_added'  => date('Y-m-d H:i:s')
                );

                if( is_numeric($_POST['products_id']) ) $data['order'] = $n;

                if( !$this->db->insert(TBL_GALLERY, $data) ) return false;
            }else return false;
        }

        return true;
    }
    
}
?>