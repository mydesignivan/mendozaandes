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

         /*print_array($_POST);

         echo "<br><br>";

         print_array(json_decode($_POST['json']), true);*/

         $order = @$_POST['cboOrder'];
         $json = json_decode($_POST['json']);
         $gallery = $json->gallery;
         $reference = normalize($_POST['txtName']);

         $data = array(
            'products_name' => $_POST['txtName'],
            'reference'     => $reference,
            'description'   => $_POST['txtDescription'],
            'content'       => $_POST['txtContent'],
            'image_name'    => $json->image_thumb->filename_image,
            'image_width'   => $json->image_thumb->thumb_width,
            'image_height'  => $json->image_thumb->thumb_height,
            'order'         => empty($order) ? 1 : ((int)$_POST['cboOrder']+1),
            'date_added'    => date('Y-m-d H:i:s')
         );

         $this->db->trans_start(); // INICIO TRANSACCION

         if( $this->db->insert(TBL_PRODUCTS, $data) ){
            $id = $this->db->insert_id();

            //Copia la imagen del producto
            if( !@copy($json->image_thumb->href_image_full, UPLOAD_PATH_PRODUCTS.$json->image_thumb->filename_image) ) return false;
            
            if( !$this->_copy_images($gallery->images_new, $id) ) return false;

         }else return false;

         $this->_delete_images_tmp(); //Elimina todas las imagenes temporales

         $this->db->trans_complete(); // COMPLETO LA TRANSACCION
         
         return true;
     }

     public function edit(){

         /*print_array($_POST);

         echo "<br><br>";

         print_array(json_decode($_POST['json']), true);*/

         $order = @$_POST['cboOrder'];
         $json = json_decode($_POST['json']);
         $gallery = $json->gallery;
         $reference = normalize($_POST['txtName']);
         $id = $_POST['products_id'];

         $data = array(
            'products_name'  => $_POST['txtName'],
            'reference'      => $reference,
            'description'    => $_POST['txtDescription'],
            'content'        => $_POST['txtContent'],
            'last_modified'  => date('Y-m-d H:i:s')
         );

         if( $json->image_thumb ){
            $data['image_name'] = $json->image_thumb->filename_image;
            $data['image_width'] = $json->image_thumb->thumb_width;
            $data['image_height'] = $json->image_thumb->thumb_height;
         }

         if( $_POST['cboOrder']!=0 ){
            //$data['order'] = $_POST['cboOrder'];
         }


         $this->db->trans_start(); // INICIO TRANSACCION

         $this->db->where('products_id', $id);
         if( $this->db->update(TBL_PRODUCTS, $data) ){

            //Copia la imagen del producto
            if( $json->image_thumb ){
                @unlink($_POST['image_old']);
                if( !@copy($json->image_thumb->href_image_full, UPLOAD_PATH_PRODUCTS.$json->image_thumb->filename_image) ) {
                    die("pase1");
                    return false;
                }
            }

            //Copia las nuevas imagenes de la galeria
            if( count($gallery->images_new)>0 ){
                if( !$this->_copy_images($gallery->images_new, $id) ) {
                    die("pase2");
                    return false;
                }
            }
         }else{
             die("pase3");
             return false;
         }

         $this->_delete_images_tmp(); //Elimina todas las imagenes temporales

        // Elimina las imagenes quitadas
         if( count($gallery->images_del)>0 ){
            foreach( $gallery->images_del as $row ){

                if( $this->db->delete(TBL_GALLERY, array('image'=>$row->image_full)) ){
                    @unlink(UPLOAD_PATH_GALLERY . $row->image_full);
                    @unlink(UPLOAD_PATH_GALLERY . $row->image_thumb);
                }else return false;
            }
         }

        // Reordena los thumbs
        foreach( $gallery->images_order as $row ){
            $this->db->where('image', $row->image_full);
            $this->db->update(TBL_GALLERY, array('order' => $row->order));
        }

         $this->db->trans_complete(); // COMPLETO LA TRANSACCION

         return true;
     }

     public function delete($id){
         $info = $this->get_info($id);

         if( $this->db->delete(TBL_PRODUCTS, array('products_id'=>$id)) && $this->db->delete(TBL_GALLERY, array('products_id'=>$id)) ){
             @unlink(UPLOAD_PATH_PRODUCTS . $info['image_name']);

             foreach( $info['gallery'] as $row ){
                @unlink(UPLOAD_PATH_GALLERY . $row['image']);
                @unlink(UPLOAD_PATH_GALLERY . $row['thumb']);
             }
         }else return false;
         return true;
     }

     public function get_list(){
         $this->db->select('products_id, products_name, order');
         $this->db->order_by('order', 'asc');
         return $this->db->get_where(TBL_PRODUCTS);
     }

     public function get_info($id){
         $info = $this->db->get_where(TBL_PRODUCTS, array('products_id'=>$id))->row_array();
         $this->db->order_by('order', 'asc');
         $info['gallery'] = $this->db->get_where(TBL_GALLERY, array('products_id'=>$id))->result_array();
         return $info;
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

    /* PUBLIC FUNCTIONS (LLAMADAS POR AJAX)
     **************************************************************************/
     public function check_exists($name, $id=null){
         $where = is_null($id) ? array('products_name'=>$name) : array('id<>'=>$id, 'products_name'=>$name);
         return $this->db->get_where(TBL_PRODUCTS, $where)->num_rows>0;
     }

    /* PRIVATE FUNCTIONS
     **************************************************************************/
    private function _delete_images_tmp(){
        // Elimina archivos temporales de la galeria
        $dir = UPLOAD_PATH_GALLERY.".tmp/";
        $d = opendir($dir);
        while( $file = readdir($d) ){
            if( $file!="." AND $file!=".."  ){
                if( preg_replace('/_.*$/', '', $file)==$this->session->userdata('users_id') )
                    @unlink($dir.$file);
            }
        }
        // Elimina archivos temporales de los productos
        $dir = UPLOAD_PATH_PRODUCTS.".tmp/";
        $d = opendir($dir);
        while( $file = readdir($d) ){
            if( $file!="." AND $file!=".." ){
                if( preg_replace('/_.*$/', '', $file)==$this->session->userdata('users_id') )
                    @unlink($dir.$file);
            }
        }
    }

    private function _copy_images($json, $id){
        $n=0;
        foreach( $json as $row ){
            $n++;
            $cp1 = @copy(UPLOAD_PATH_GALLERY.".tmp/".$row->image_full, UPLOAD_PATH_GALLERY . $row->image_full);
            $cp2 = @copy(UPLOAD_PATH_GALLERY.".tmp/".$row->image_thumb, UPLOAD_PATH_GALLERY . $row->image_thumb);

            if( $cp1 && $cp2 ){
                $data = array(
                    'products_id' => $id,
                    'image'       => $row->image_full,
                    'thumb'       => $row->image_thumb,
                    'width'       => $row->width,
                    'height'      => $row->height
                );

                if( !is_numeric($_POST['products_id']) ) $data['order'] = $n;
                if( !$this->db->insert(TBL_GALLERY, $data) ) return false;
            }else {
                die("pase10");
                return false;
            }
        }

        return true;
    }
    
}
?>