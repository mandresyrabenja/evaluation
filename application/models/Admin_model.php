<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Admin_model<br>
 * Model du table Admin
 */
class Admin_model extends CI_Model
{

    public function isValidLogin($login, $password) :bool
    {
        $query = $this->db->query("SELECT * FROM admin WHERE login = '$login' AND password = '$password'");
        if($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        };
    }
}