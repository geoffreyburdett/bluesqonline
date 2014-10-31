<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Access to String
 *
 * Returns a string describing the user access_level
 *
 * @param  int access_level User access Level
 * @return str              Name of user access level
 */
function access_to_string($access_level){
    switch ($access_level) {
        case 10:
            return 'client';     // Can Download there own
        case 20:
            return 'staff';      // Can Download All
        case 30:
            return 'management'; // Can Upload and Add users
        case 40:
            return 'admin';      // Can Change Admin Settings
        case 50:
            return 'super user'; // For Testing and Development Only
    }
    return 'unknown';
}


/**
 * User by ID
 *
 * Returns a string describing the user access_level
 *
 * @param  int $id User id
 * @return obj     Database Row of user
 */
function user_by_id($id){
    return $this->user_model->get_single($id);
}


/**
 * Is Authorized
 *
 * Checks to make sure user acces_level is 
 * at least as high as the required access level
 *
 * @param  int $user             User id
 * @param  int $req_access_level Required Access Level
 * @return obj                   Database Row of user
 */
function is_auth($user, $req_access_level = 1){
    if ($user['access_level'] >= $req_access_level) {
        return TRUE;
    }
    return FALSE;
}


/* End of file user_helper.php */
/* Location: ./application/helpers/user_helper.php */