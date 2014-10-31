<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * User Controller Class
 *
 * @name       CodeIgniter User Controller
 * @package    BlueSqOnline
 * @subpackage Controllers
 * @license    http://choosealicense.com/licenses/gpl-3.0/
 * @author     Geoffrey Burdett
 * @link       http://geoffreyburdett.com
 *
 * TO DO:
 * Redirect unauth users from other people's account
 * Logout on users page
 * Seperate Redirect Stuff into Library
 * Seperate not_me into Helper
 * Extend email classto include type of email
 */
 
class User extends ODD_Controller
{
    
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }
    
    
    /**
    * Controller for /user
    */
    public function index()
    {
        $this->login();   
    }
    
    
    /**
    * Controller for /user/login
    */
    public function login()
    {
        $this->session->keep_flashdata('redirect_current');
        $this->session->keep_flashdata('redirect_last');
        $this->data['title'] = 'User Login';
        $this->get_messages(); 
        $this->layout->render('user/login', $this->data);
    }
    
    
    /**
    * Controller for processing login form
    */
    public function process()
    {
        $result = $this->user_model->validate();
        
        // Keep redirect flash data
        $this->session->keep_flashdata('redirect_current');
        $this->session->keep_flashdata('redirect_last');
        
        // Invalid Username/Password
        if( ! $result)
        {
            $this->messages->add("Invalid username or password.", "error");
            redirect('/user/login');
        } 
        
        // A Password update is required
        elseif($this->session->userdata('pw_update_req') == TRUE )
        {
            $this->messages->add('Welcome, ' . $this->session->userdata('first_name') . 'Please update your password.','success');
            redirect('/user/password');
        } 
        
        // Everything is good to go
        else 
        {
            $this->messages->add('Welcome, ' . $this->session->userdata('first_name') . '.','success');
            $redirect = $this->session->flashdata('redirect_current');
            redirect($redirect);
        }        
    }
    
    
    /**
    * Controller to logout
    */
    public function logout()
    {
        $this->session->sess_destroy();
        $this->messages->add('You have successfully logged out.','success');
        redirect('user/login');
    }
    
    
    /**
    * Controller for /user/manage
    */
    public function manage()
    {
        $this->session->redirect_unauth(40);
        $data['users'] = $this->user_model->get_all();
        $data['title'] = 'Manage Users';
        $this->get_messages(); 
        $this->layout->render('user/manage', $data);
    }
    
    
    /**
    * Controller for /user/edit
    *
    * @param int  $id (optional) user id to be edited
    */
    public function edit($id = FALSE)
    {
        
        $this->load->helper('form'); 
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('first_name',   'First Name',    'trim|required');
        $this->form_validation->set_rules('last_name',    'Last Name',     'trim|required');
        $this->form_validation->set_rules('username',     'Username',      'trim|required|min_length[5]|is_unique[users.username.id.' . $id . ']');
        $this->form_validation->set_rules('email',        'Email Address', 'trim|required|valid_email|is_unique[users.email.id.' . $id . ']');
        $this->form_validation->set_rules('access_level', 'Access Level',  'trim|required');
        
        $user_data = $_POST;
        
        if ($this->form_validation->run() === TRUE)
        {
            
            //Edit User
            if ($id)
            { 
                if (@$user_data['resetPassword'])
                {
                    
                    //So that we don't try to put resetPassword in the database.
                    unset($user_data['resetPassword']);
                    $password = $this->user_model->set_password($user_data['id']);
                    
                    //Update Password Email
                    $this->load->library('email');
                    $email_data = array(
                        'to_name' => $user_data['first_name'],
                        'username' => $user_data['username'],
                        'password' => $password,
                        'header_title' => 'Password Reset',
                        'mailtype' => 'html'
                    );
                    $this->email->from($this->config->item('admin_email'), 'Blue Square Construction')
                                ->to($user_data['email'])
                                ->subject($email_data['header_title'])
                                ->message($this->layout->render('email/password_reset', $email_data, 'templates/email', TRUE))
                                ->send();
                    $this->messages->add('An email with the new password has been sent to the address below.','success');
                }
                $this->user_model->update($user_data);
                $this->messages->add($user_data['username'] . ' has been updated.','success');
                redirect("user/edit/$id");
                
            } 
            
            //New User
            else 
            { 
                $insert_id = $this->user_model->insert($user_data);
                $rand_password = $this->user_model->set_password($insert_id);
                
                $this->load->library('email');
                $email_data = array(
                    'to_name' => $user_data['first_name'],
                    'username' => $user_data['username'],
                    'password' => $rand_password,
                    'header_title' => 'Welcome to Blue Square Construction',
                );
                $this->email->from($this->config->item('admin_email'), 'Blue Square Construction')
                            ->to($user_data['email'])
                            ->subject($email_data['header_title'])
                            ->message($this->layout->render('email/new_user', $email_data, 'templates/email', TRUE))
                            ->send();
                $this->messages->add($user_data['username'] . ' has been added','success');

                redirect("user/edit/$insert_id");
            }
        } // END $this->form_validation->run() === TRUE 
        if ($id)
        {
            $this->data['user'] = $this->user_model->get_single($id);
            $this->data['title'] = 'Edit User';
        } 
        else 
        {
            $this->data['title'] = 'Add User';
        }
        $this->get_messages(); 
        $this->layout->render('user/edit', $this->data);
        
    }
    
    
    /**
    * Controller for /user/delete
    *
    * @param int  $id (optional) user id to be deleted
    */
    public function delete($id)
    {
        $this->session->redirect_unauth(40);
                 
        if (! $id)
        {
            redirect('user/manage');
        }
                 
        if (@$_POST['confirm_delete_' . $id])
        {
            $this->user_model->delete('id',$id);
            redirect('user/manage');
        }
        
        $this->load->helper('form'); 
        $data['user'] = $this->user_model->get_single($id);
        $data['title'] = 'Delete User';
        $this->get_messages(); 
        $this->layout->render('user/delete', $data);
    }
    
    
    /**
    * Controller for /user/password
    *
    * Manually update password when required
    */
    public function password()
    { 
        if (@$_POST)
        {
            $user_data = $_POST;
            
            $this->load->helper('form'); 
            $this->load->library('form_validation');
                
            $this->form_validation->set_rules('old_pass',     'Old Password',         'trim|required');
            $this->form_validation->set_rules('new_pass',     'New Password',         'trim|required|matches[confirm_pass]');
            $this->form_validation->set_rules('confirm_pass', 'Confirm New Password', 'trim|required');

            if ($this->form_validation->run() === TRUE)
            {
        
                $this->user_model->set_password($this->session->userdata('id'), $user_data['new_pass'], FALSE);
                
                $redirect = $this->session->flashdata('redirect_current');
                redirect($redirect);
            }
        }
        
        $this->session->keep_flashdata('redirect_current');
        $this->session->keep_flashdata('redirect_last');
        
        $this->get_messages();
        $this->layout->render('user/password', @$user_data);
    }
    
}

/* End of file user.php */
/* Location: application/controllers/user.php */