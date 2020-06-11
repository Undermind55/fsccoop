<?php
// class Customers_model extends CI_Model {
//     public function get_customer($id) {
//         $data['id'] = 3;
//         $data['first_name'] = 'John';
//         $data['last_name'] = 'Doe';
//         $data['address'] = 'Kingstone';

//         return $data;
//     }
// }

class N_TEST2 extends CI_Model 
{
    public function get_profile()
        {
			$get_model ='test_model';
			$arr_data = array();
			$this->db->select('*');
			$this->db->from('coop_mem_apply');
			$this->db->where("member_id = '000008'");
			// $row = $this->db->get()->result_array(); //ใช้ก้อนใหญ่
			$row = $this->db->get()->row_array();
			$arr_data['user'] =  $row;
			return $arr_data['user'];
		}
	public function fscoop_getloan_amount()
	{
			$arr_data = array();
			$this->db->select('*');
			$this->db->from('coop_loan as N1');
			$this->db->join("coop_mem_apply as N2","N1.member_id = N2.member_id","left");
			$this->db->WHERE("N1.member_id = '000008'");
			$row = $this->db->get()->row_array();
			$arr_data['loan_amount'] =  $row;
			return $arr_data['loan_amount'];
	}
	public function fscoop_province()
	{
			$arr_data = array();
			$this->db->select('*');
			$this->db->from('coop_mem_apply as N1');
			$this->db->join("coop_province as N2","N1.province_id = N2.province_id","left");
			$this->db->WHERE("N1.member_id = '000008'");
			$row = $this->db->get()->row_array();
			$arr_data['province'] =  $row;
			return $arr_data['province'];
	}
	public function fscoop_amphur()
	{
			$arr_data = array();
			$this->db->select('*');
			$this->db->from('coop_mem_apply as N1');
			$this->db->join("coop_amphur as N2","N1.amphur_id = N2.amphur_id","left");
			$this->db->WHERE("N1.member_id = '000008'");
			$row = $this->db->get()->row_array();
			$arr_data['amphur'] =  $row;
			return $arr_data['amphur'];
	}
	public function fscoop_district()
	{
			$arr_data = array();
			$this->db->select('*');
			$this->db->from('coop_mem_apply as N1');
			$this->db->join("coop_district as N2","N1.district_id = N2.district_id","left");
			$this->db->WHERE("N1.member_id = '000008'");
			$row = $this->db->get()->row_array();
			$arr_data['district'] =  $row;
			return $arr_data['district'];
	}
	public function fscoop_share()
	{
			$arr_data = array();
			$this->db->select('*');
			$this->db->from('coop_mem_share as N1');
			$this->db->join("coop_mem_apply as N2","N1.member_id = N2.member_id","left");
			$this->db->WHERE("N1.member_id = '000008'");
			$row = $this->db->get()->row_array();
			$arr_data['share'] =  $row;
			return $arr_data['share'];
	}

}
