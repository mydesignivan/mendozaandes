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

     public function get($where=array()){
         $query = $this->db->get_where(TBL_PRODUCTS, $where);
         if( $query->num_rows==0 ) return false;
         else{

             $info = $query->row_array();
             

         }
     }
    
}
?>