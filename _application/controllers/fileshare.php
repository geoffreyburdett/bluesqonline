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
 * Refactor edit controller
 * Test for visibility on download controller
 */
class Fileshare extends ODD_Controller
{
    
    protected $data;
    protected $uploads_folder;
    
	public function __construct()
    {
        parent::__construct();
        $this->load->model('fileshare_model');
	}
    
    
    /**
     * Controller for /fileshare
     *
     * Lists all files visible to that user
     */
	public function index()
    {
        $this->session->redirect_unauth(10);
        
        if ($this->data['me']['access_level'] == 10){
            $client_id = $this->data['me']['id'];
        } 
        else 
        {
            $client_id = FALSE  ; 
        }
        
        $this->data['files'] = $this->fileshare_model->get_all($client_id);
        $this->get_messages(); 
        $this->layout->render('fileshare/index', $this->data);
	}
    
    
    /**
     * Controller for /fileshare/edit
     */
	public function edit($id = FALSE)
    {
        $this->session->redirect_unauth(30);
        
        $this->load->helper('form'); 
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('filename', 'File Name', 'required|is_unique[files.filename.id.' . $id . ']');
        if ($this->form_validation->run() === TRUE)
        {
            
            if ($_FILES['upload']['error'] === 0)
            // IF no upload error
            {
                //Prepare file for upload
                $_POST['file_location'] = $this->fileshare_model->file_location($_POST['id'], $_FILES['upload']['name']);
                $config = array(
                    'upload_path'   => $this->config->item('uploads_folder'),
                    'allowed_types' => '*',
                    'file_name' => $_POST['file_location']
                );
		         $this->load->library('upload', $config);
                 
                if ( $this->upload->do_upload('upload'))
                {
                    $this->messages->add('Your file has been uploaded.','success');
                } 
                else 
                {
                    $this->messages->add($this->upload->display_errors(),'error');
                }
            } 
            
            elseif ($_FILES['upload']['error'] !== 4) 
            // If upload error (Other than no file at all)
            {

                $this->messages->add('There was a problem upoading your file.','error');
            }
            
            if ($id)
            // If edit valid existing file
            {
                if ( $this->fileshare_model->update($_POST) )
                {
                    $this->messages->add('The file information was updated.','success');
                    redirect("fileshare/edit/$id");
                } 
                else 
                {
                    $this->messages->add('There was a problem saving your file information.','error');
                }
            } 
            
            else 
            // If new valid file
            {
                if ($insert_id = $this->fileshare_model->insert($_POST))
                {
                    $this->messages->add('Your file has been created.','success');
                    redirect("fileshare/edit/$insert_id");
                } 
                else 
                {
                    $this->messages->add('There was a problem saving your file information.','error');
                }
            }
        } 
        
        elseif ($_POST) 
        //if form is NOT valid and HAS post data
        {
            $this->messages->add($this->form_validation->error_array(),'error');
        }
        
        if ($id)
        //if editing a file
        {
            $this->data['filedata'] = $this->fileshare_model->get_single($id);
            $this->data['title'] = 'Edit File';
        } 
        
        else 
        // If adding a file
        {
            $this->data['title'] = 'Add File';   
        }
        
        $this->load->model('user_model');
        $this->data['clients'] = $this->user_model->get_all_access_level(10);
        $this->get_messages(); 
        $this->layout->render('fileshare/edit', $this->data);
	}
    
    
    /**
     * Controller for file download
     *
     * Forces the download of a file 
     *
     * @param int  $id file id to be downloaded
     */
	public function download($id)
    {
        $filedata = $this->fileshare_model->get_single($id);
        $this->load->helper('download');
        
        // Get location within file system and filename
        $file_location = $this->config->item('uploads_folder') . $filedata->file_location;
        $file_name = $filedata->filename . $this->fileshare_model->file_extention($file_location);
        
        // Download file
        $file = file_get_contents($file_location);
        force_download($file_name, $file);
    }
}


/* End of file fileshare.php */
/* Location: application/controllers/fileshare.php */