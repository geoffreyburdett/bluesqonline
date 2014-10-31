<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Controller Class
 *
 * @name       BlueSqOnline Controller
 * @package    BlueSqOnline
 * @subpackage Core
 * @license    http://choosealicense.com/licenses/gpl-3.0/
 * @author     Geoffrey Burdett
 * @link       http://geoffreyburdett.com
 */
class ODD_Controller extends CI_Controller {
    
    protected $data;

    function __construct()
    {
        parent::__construct();
        
        // create 'me' (current session)
        $session = array($this->session->all_userdata());
        $this->data['me'] = $session[0];
    }
    
    protected function get_messages(){
        $this->data['messages'] = $this->messages->get();  
    }
    
}

/* End of file ODD_Controller.php */
/* Location: application/core/ODD_Controller.php */