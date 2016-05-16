<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Categories_model extends CI_Model{
    
    var $cat_id;
    var $cat_nameth;
    var $cat_nameeng;
    var $cat_date;
    
    public function __construct() {
        parent::__construct();
    }

    public function getDataAll() {
        $query = $this->db->get('category');
        return $query->result_array();
    }
    
}
