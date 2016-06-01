<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Fanpage_model extends CI_Model {

    var $array_fanpage = array();
    var $fan_id;
    var $fan_name;
    var $fan_pageid;
    var $fan_date;
    var $cat_id;

    public function __construct() {
        parent::__construct();
    }

    public function getDataSingle($id) {
        $this->db->from('fanpage')->where('fan_id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function setData($data) {
        $this->code_id = $data['fan_id'];
        $this->array_fanpage = array(
            'fan_name' => $data['fan_name'],
            'fan_pageid' => $data['fan_pageid'],
            'fan_date' => $data['fan_date'],
            'cat_id' => $data['cat_id']
        );
    }

    public function getData() {
        return $this;
    }

    public function deleteData($id) {
        $this->db->where('fan_id', $id);
        return $this->db->delete('m_fine');
    }

    public function insertData() {
        return $this->db->insert('fanpage', $this->array_fanpage);
    }

    public function updateData() {
        $this->db->where('fan_id', $this->code_id);
        return $this->db->update('fanpage', $this->array_fanpage);
    }

    public function getDataAll() {
        $query = $this->db->get('fanpage');
        return $query->result_array();
    }

}
