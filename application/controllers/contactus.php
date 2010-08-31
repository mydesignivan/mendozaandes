<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Contactus extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->model('users_model');
        $this->load->model('contents_model');

        $this->load->library('dataview', array(
            'tlp_title'            =>  TITLE_CONTACTUS,
            'tlp_meta_description' => META_DESCRIPTION_CONTACTUS,
            'tlp_meta_keywords'    => META_KEYWORDS_CONTACTUS
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
            'tlp_section'        => 'frontpage/contactus_view.php',
            'tlp_title_section'  => 'Contact Us',
            'tlp_script'         => array('plugins_validator', 'class_account'),
            'tlp_content_footer' => $this->contents_model->get_content('footer'),
            'info'               => $this->users_model->get_info(array('username'=>'admin')),
            'content'            => $this->contents_model->get_content('contact-us')
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }

    public function send(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $this->load->library('email');

            $message = EMAIL_CONTACT_MESSAGE;
            $message = str_replace('{name}', $_POST['txtName'], $message);
            $message = str_replace('{mail}', $_POST['txtEmail'], $message);
            $message = str_replace('{message}', $_POST['txtMessage'], $message);

            $datauser = $this->users_model->get_info(array('username'=>'mydesignadmin'));
            //$datauser = $this->users_model->get_info(array('username'=>'admin'));
            $to = $datauser['email'];

            $this->email->from($_POST['txtEmail'], $_POST['txtName']);
            $this->email->to($to);
            $this->email->subject(EMAIL_CONTACT_SUBJECT);
            $this->email->message(nl2br($message));
            $status = $this->email->send();
            $this->session->set_flashdata('status_sendmail', $status ? "ok" : "error");

            redirect('/contact-us/');
        }
    }


    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}