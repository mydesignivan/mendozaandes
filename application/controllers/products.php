<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Products extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->model('products_model');

        $this->load->library('dataview', array(
            'tlp_title'            =>  TITLE_OURPRODUCTS,
            'tlp_meta_description' => META_DESCRIPTION_OURPRODUCTS,
            'tlp_meta_keywords'    => META_KEYWORDS_OURPRODUCTS
        ));
        $this->_data = $this->dataview->get_data();
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_data;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $this->_data = $this->dataview->set_data(array(
            'tlp_section'       =>  'frontpage/ourproducts_view.php',
            'tlp_title_section' => 'Our Products'
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }

    public function show(){
        $ref = $this->uri->segment(1);
        if( $ref ){
            $info = $this->products_model->get(array('reference'=>$ref));

            $this->_data = $this->dataview->set_data(array(
                'tlp_section'       => 'frontpage/product_view.php',
                'tlp_title_section' => $info['product_name'],
                'info'              => $info
            ));
            $this->load->view('template_frontpage_view', $this->_data);
        }
    }


    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}