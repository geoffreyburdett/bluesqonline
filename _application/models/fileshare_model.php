<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Fileshare Model Class
 *
 * @name       Fileshare Model
 * @package    BlueSqOnline
 * @subpackage Models
 * @license    http://choosealicense.com/licenses/gpl-3.0/
 * @author     Geoffrey Burdett
 * @link       http://geoffreyburdett.com
 */
class FileShare_model extends ODD_Model 
{

     
    function __construct()
    {
        parent::__construct();
        $this->table = 'files';
    }
    
    
    /**
    * Get all files, or all files for a specified client
    * and join the information with the user data
    *
    * @param  int $client_id (optional) user_id in `users` database
    * @return obj List of files
    */
    function get_all($client_id = FALSE)
    {
        // Build select Query
        // Query all columns from files, and first and
        // last name of updated_by and visibility from users
        $this->db->select('files.*, updatedby.first_name AS updatedby_first, updatedby.last_name AS updatedby_last, visibility.first_name AS visibility_first, visibility.last_name AS visibility_last');
        $this->db->join('users AS updatedby', "{$this->table}.updated_by = updatedby.id", 'left');
        $this->db->join('users AS visibility', "{$this->table}.visibility = visibility.id", 'left');
        
        // only retrieve the files that the client has permission to see 
        if (@$client_id)
        {
            $this->db->where("(visibility=$client_id OR visibility='all')");
        }
        
        // Get query results
        $query = $this->db->get($this->table);
        return $query->result();
    }
    
    
    /**
    * Set the name of a file to be uploaded
    *
    * @param  int $id   id of file
    * @param  str $name base name of file to return
    * @return str location and name of file.
    */
    public function file_location($id,$name)
    {
        $file_name = $id . '_' . uniqid();
        $file_extention = $this->file_extention($name);
        return $file_name . $file_extention;
    }
    
    
    /**
    * Get the extention of a filename
    *
    * @param  str $name full name of file to return
    * @return str extention of filename (test.pdf returns pdf)
    */
    public function file_extention($name)
    {
        return '.' . end((explode(".", $name)));
    }
    
}

/* End of file fileshare_model.php */
/* Location: application/models/fileshare_model.php */