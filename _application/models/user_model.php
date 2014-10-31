<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Fileshare Model Class
 *
 * @name       CodeIgniter Fileshare Model
 * @package    BlueSqOnline
 * @subpackage Models
 * @license    http://choosealicense.com/licenses/gpl-3.0/
 * @author     Geoffrey Burdett
 * @link       http://geoffreyburdett.com
 */
class User_model extends ODD_Model
{
    
    function __construct()
    {
        parent::__construct();
        $this->table = 'users';
    }
    
    
    /**
    * Validates a username and password and creates session
    *
    * @return bool validation
    */
    public function validate()
    {
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean(md5($this->input->post('password')));
        
        //Check username and password
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('users');
        
        // Create session if user is valid
        if($query->num_rows == 1)
        {
            $row = $query->row();
            foreach ($row AS $key => $value)
            {
                $data[$key] = $value;
            }   
            $data['validated'] = TRUE;
            $this->session->set_userdata($data);
            return true;
        }
        return FALSE;
    }
    
    
    /**
    * Creates a random Password
    *
    * @return str random password
    */
    public function random_password() 
    {
        $alphabet = "abcdefghjkmnpqrstuwxyzABCDEFGHJKLMNPQRSTUWXYZ23456789";
        $alphaLength = strlen($alphabet) - 1;
        $password = '';
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $password .= $alphabet[$n];
        }
        return $password;
    }
    
    
    /**
    * Update Password in database (set by user)
    * 
    * @param  array $user_id       id of user to be update
    * @param  array $password      (optional) new password
    * @param  array $pw_update_req (optional) password update required
    * @return str   new password
    */
    public function set_password($user_id, $password = '', $pw_update_req = TRUE) 
    {
        
        // Make a password if one is not specified
        if ($password === '')
        {
            $password = $this->random_password();
        }
        
        $user_data['id'] = $user_id;
        $user_data['pw_update_req'] = $pw_update_req;
        $user_data['password'] = md5($password);
        $this->update($user_data);
        return $password;
    }
    
    
    /**
    * Get all users at a specific access level
    * 
    * @param  array $access_level    access level
    * @return obj   $query->result() 
    */
    public function get_all_access_level($access_level)
    {
        $query = $this->db->get_where($this->table, array('access_level' => $access_level));
        return $query->result();
    }

}

/* End of file user_model.php */
/* Location: application/models/user_model.php */