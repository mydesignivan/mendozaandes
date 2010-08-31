<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Products_model extends Model {

    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct() {
        parent::Model();
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
     public function save(){

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

    
}
?>