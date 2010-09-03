<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Products extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->model('products_model');
        $this->load->model('contents_model');

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
            'tlp_section'        => 'frontpage/ourproducts_view.php',
            'tlp_title_section'  => 'Our Products',
            'tlp_content_footer' => $this->contents_model->get_content('footer'),
            'content'            => $this->contents_model->get_content('our-products'),
            'listProducts'       => $this->products_model->get_list2()
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }

    public function show(){
        $ref = $this->uri->segment(2);
        if( $ref ){
            $info = $this->products_model->get_info($ref);

            $this->_data = $this->dataview->set_data(array(
                'tlp_section'        => 'frontpage/products_view.php',
                'tlp_title_section'  => $info['products_name'],
                'tlp_script'         => array('plugins_adgallery', 'class_products'),
                'tlp_content_footer' => $this->contents_model->get_content('footer'),
                'info'               => $info,
                'listProductsName'   => $this->products_model->get_list_productsname($ref)
            ));
            $this->load->view('template_frontpage_view', $this->_data);
        }
    }

    public function showcontent(){
        $ref = $this->uri->segment(3);
        if( $ref ){
            $info = $this->products_model->get_info2($ref);
            $data = array(
                'tlp_title' => $info['products_name'],
                'content'   => $info['content']
            );
            $this->load->view('template_contentprint_view', $data);
        }
    }

    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}