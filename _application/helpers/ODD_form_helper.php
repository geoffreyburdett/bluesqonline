<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
  
  /**
  * set_edit_value
  *
  * Sets the value of a form field
  * Uses CodeIgniter's set_value method to
  * return submitted value after post if it's available.
  * If no $_POST value is available, it will return data
  * passed from the controller.
  * 
  * @param  obj $orignal_data [column=>value] ie. array('first_name'=>'bob')
  * @return obj   $this->db->insert_id() id of new row
  */
function set_edit_value($form_element, $orignal_data)
{   
    // Return submitted value after post if it's available
    if( $value = set_value($form_element) )
    {
        return $value;
    } 
    
    // If not, return the data passed from the controller
    elseif ($value = @$orignal_data->$form_element)
    {
        return $value;
    } 
    
    // Otherwise, don't do squat
    else
    {
        return false;
    }
}


/* End of file ODD_form_helper.php */
/* Location: ./application/helpers/ODD_form_helper.php */