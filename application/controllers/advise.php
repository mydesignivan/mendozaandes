<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Advise extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->model('users_model');

        $this->load->library('dataview', array(
            'tlp_title'            =>  TITLE_ADVISE,
            'tlp_meta_description' => META_DESCRIPTION_ADVISE,
            'tlp_meta_keywords'    => META_KEYWORDS_ADVISE
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
            'tlp_section'   =>  'frontpage/advise_view.php',
            'tlp_title_section' => 'Advise'
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }


    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}