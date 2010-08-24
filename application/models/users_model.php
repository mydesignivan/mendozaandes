<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Users_model extends Model {

    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct() {
        parent::Model();
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
     public function save(){

     }

     public function get_info($where=array()){
        $query = $this->db->get_where(TBL_USERS, $where);
        if( $query->num_rows>0 ){
            $row = $query->row_array();
            return $row;
        }else return false;
     }
    
}
?>