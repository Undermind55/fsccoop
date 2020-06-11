<?php
class Information extends CI_Model {
    
    public function get_province() {
        return $this->db->select('*')->from('coop_province')->get()->result_array();
    }

    public function get_province_by_id($id) {
        return $this->db->select('*')->from('coop_province')->where("province_id = '".$id."'")->get()->row();
    }
}