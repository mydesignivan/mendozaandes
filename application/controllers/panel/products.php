<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Products extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        if( !$this->session->userdata('logged_in') ) redirect($this->config->item('base_url'));
        
        $this->load->model("products_model");

        $this->load->library('dataview', array(
            'tlp_title'  =>  TITLE_INDEX
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
            'tlp_title_section'  => "Productos",
            'tlp_script'         =>  array('class_products_list'),
            'tlp_section'        =>  'panel/products_list_view.php',
            'listProducts'       =>  $this->products_model->get_list()
        ));
        $this->load->view('template_panel_view', $this->_data);
    }

    public function form(){
        $id = $this->uri->segment(3);
        $this->load->helper('form');

        $data = array(
            'tlp_section' =>  'panel/products_form_view.php',
            'tlp_script'  =>  array('plugins_validator', 'plugins_tinymce', 'plugins_fancybox', 'plugins_jqui_sortable', 'helpers_json', 'class_products_form'),
            'listProductsName' => $this->products_model->get_list_productsname()
        );

        if( is_numeric($id) ){ // Edit
            $data['tlp_title_section'] = "Editar Producto";
            $data['info'] = $this->products_model->get_info(array('products_id'=>$id));

        }else{  // New
            $data['tlp_title_section'] = "Nuevo Producto";
        }
        
        $this->_data = $this->dataview->set_data($data);
        $this->load->view('template_panel_view', $this->_data);
    }

    public function create(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){

            $res = $this->products_model->create();
            if( !$res ){
                $this->session->set_flashdata('status', "error");
                redirect('/panel/products/form/');
            }else redirect('/panel/products/');
                
        }
    }

    /* AJAX FUNCTIONS
     **************************************************************************/
    public function ajax_check_pass(){
        if( $_SERVER['REQUEST_METHOD']=="POST" && $_POST['txtPassOld'] ){
            $this->load->library('encpss');
            $res = $this->users_model->get_info(array('username'=>$this->session->userdata('username')));
            echo json_encode($this->encpss->decode($res['password'])==trim($_POST['txtPassOld']));
        }
    }

    public function ajax_upload_products(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){

            $this->load->library('superupload');

            $config = array(
                'path'          => UPLOAD_PATH_PRODUCTS.'.tmp/',
                'thumb_width'   => IMAGE_THUMB_PRODUCTS_WIDTH,
                'thumb_height'  => IMAGE_THUMB_PRODUCTS_HEIGHT,
                'maxsize'       => UPLOAD_MAXSIZE,
                'filetype'      => UPLOAD_FILETYPE,
                'resize_image_original' => false,
                'master_dim'            => 'width',
                'filename_prefix'       => $this->session->userdata('users_id')."_"
            );
            $this->superupload->initialize($config);
            echo json_encode($this->superupload->upload('txtImage'));
        }        
    }
    public function ajax_upload_gallery(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){

            $this->load->library('superupload');

            $config = array(
                'path'            => UPLOAD_PATH_GALLERY.'.tmp/',
                'thumb_width'     => IMAGE_THUMB_GALLERY_WIDTH,
                'thumb_height'    => IMAGE_THUMB_GALLERY_HEIGHT,
                'image_width'     => IMAGE_FULL_GALLERY_WIDTH,
                'image_height'    => IMAGE_FULL_GALLERY_HEIGHT,
                'maxsize'         => UPLOAD_MAXSIZE,
                'filetype'        => UPLOAD_FILETYPE,
                'filename_prefix' => $this->session->userdata('users_id')."_"
            );
            $this->superupload->initialize($config);
            echo json_encode($this->superupload->upload('txtUploadFile'));
        }
    }
    public function ajax_upload_delete(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            @unlink($_POST['au_filename_image']);
            @unlink($_POST['au_filename_thumb']);
            die("ok");
        }
    }


    /* PRIVATE FUNCTIONS
     **************************************************************************/
}