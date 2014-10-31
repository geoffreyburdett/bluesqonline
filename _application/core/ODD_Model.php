<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Model Class
 *
 * @name       BlueSqOnline Model
 * @package    BlueSqOnline
 * @subpackage Core
 * @license    http://choosealicense.com/licenses/gpl-3.0/
 * @author     Geoffrey Burdett
 * @link       http://geoffreyburdett.com
 */
class ODD_Model extends CI_Model {

    protected $table;
    
    
    function __construct()
    {
        parent::__construct();
    }
    
    
    /**
    * Get All
    *
    * Get all rows of the table
    *
    * @return obj $query->result()
    */
    function get_all(){
        $query = $this->db->get($this->table);
        return $query->result();
    }
    
    
    /**
    * Get Single
    *
    * Get single row based on search criteria
    * ie. ... WHERE `column` = 'value' ...
    * Matches the row by id column by default
    *
    * @param  int  $value  (optional) value to query for
    * @param  int  $column (optional) column to query within
    * @return obj $query->row()
    */
    function get_single($value = '', $column = 'id'){
        $query = $this->db->get_where($this->table, array($column => $value), 1);
        return $query->row();
    }
    
    
    /**
    * Insert
    *
    * Insert data into a new database row
    *
    * @param  array $data [column=>value] ie. array('first_name'=>'bob')
    * @return obj   $this->db->insert_id() id of new row
    */
    function insert($data){
        foreach ($data AS $key => $value){
            $this->$key = $value;
        }
        $this->db->insert($this->table, $this);
        return $this->db->insert_id();
    }
    
    
    /**
    * Update
    *
    * Update existing data in a new database row
    * Matches the row by id column by default
    *
    * @param  array $data [column=>value] ie. array('first_name'=>'bob')
    * @param  int  $value  (optional) value to query for
    * @param  int  $column (optional) column to query within
    * @return bool  Confirmation of update
    */
    function update($data, $value = '', $column = 'id'){
        foreach ($data AS $key => $value){
            $this->$key = $value;
        }
        $this->db->update($this->table, $this, array($column => $value));
        return TRUE;
    }
    
    
    /**
    * Delete
    *
    * Delete database row
    * Matches the row by id column by default
    *
    * @param  int  $value  (optional) value to query for
    * @param  int  $column (optional) column to query within
    * @return bool Confirmation of delete
    */
    function delete($value = '', $column = 'id'){
        $this->db->delete($this->table, array($column => $value)); 
        return TRUE;
    }
}

/* End of file ODD_Model.php */
/* Location: application/core/ODD_Model.php */