<?php 

class ODD_Form_validation extends CI_Form_validation{

    public function error_array(){
        if (count($this->_error_array) === 0)
            return FALSE;
        else
            return $this->_error_array;
    }
  
   public function is_unique($str, $field)
   {
      $field = array_filter(explode('.', $field));
      if ( count($field) === 4)
      {
         list($search_table,$search_field,$comp_field,$comp_val) = $field;
         $query = $this->CI->db->limit(1)->where($search_field,$str)->where($comp_field.' != ',$comp_val)->get($search_table);
      } 
      else 
      {
         list($search_table, $search_field) = $field;
         $query = $this->CI->db->limit(1)->get_where($search_table, array($search_field => $str));
      }
      
      return $query->num_rows() === 0;
    }
    
  public function run($group = '')
  {
      if (! parent::run($group = '')){
          $this->CI->messages->add($this->CI->form_validation->error_array(), "error");
          return FALSE;
      }
      return TRUE;
  }
  
}