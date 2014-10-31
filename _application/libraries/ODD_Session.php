<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 


class ODD_Session extends CI_Session
{
    
    public function __construct()
    {
        parent::__construct();
        $this->CI =& get_instance();
	}
    
    
    public function is_validated($req_access_level = 1)
    {
        if ($this->CI->session->userdata('access_level') >= $req_access_level) 
        {
            return $this->CI->session->userdata('validated');
        }
    }
    

    public function redirect_unauth($access_level = 0,$redirect = FALSE)
    {
        $this->CI =& get_instance();
        
        if ($redirect)
        {
            $this->CI->session->set_flashdata(array(
                'redirect_last' => $this->CI->input->server('HTTP_REFERER'),
                'redirect_current' => $redirect
            ));
        } else 
        {
            $this->CI->session->set_flashdata(array(
                'redirect_last' => $this->CI->input->server('HTTP_REFERER'),
                'redirect_current' => $this->CI->input->server('REQUEST_URI')
            ));
        }
        
        if( ! $this->CI->session->is_validated($access_level))
        {
            if ( strpos($this->CI->input->server('HTTP_REFERER'),'user/login') !== FALSE ) 
            {
                redirect( $this->CI->session->flashdata('redirect_last'));
            } 
            else 
            {
                redirect( 'user/login/restricted' );
            }
        }
        return FALSE;
    }
}

/* End of file ODD_Session.php */
/* Location: application/libraries/ODD_Session.php */