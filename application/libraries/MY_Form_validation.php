<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation{

    public $CI;

    public function __construct($config = array())
    {
        parent::__construct($config);
        $this->CI =& get_instance();
        $this->_config_rules = $config;
    }

}