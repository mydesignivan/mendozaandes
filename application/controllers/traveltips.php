<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Traveltips extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->model('users_model');
        $this->load->model('contents_model');

        $this->load->library('dataview', array(
            'tlp_title'            =>  TITLE_TRAVELTIPS,
            'tlp_meta_description' => META_DESCRIPTION_TRAVELTIPS,
            'tlp_meta_keywords'    => META_KEYWORDS_TRAVELTIPS
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
            'tlp_section'        => 'frontpage/traveltips_view.php',
            'tlp_title_section'  => 'Travel Tips',
            'tlp_content_footer' => $this->contents_model->get_content('footer'),
            'content'            => $this->contents_model->get_content('travel-tips')
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }


    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}