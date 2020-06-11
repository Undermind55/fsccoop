<?php

class Fsccoop_data extends CI_Model 
{
	public function fscoop_full($loan_id)
	{
		$arr_data = array();
		$this->db->select('N1.*,N2.*,N13.*,N14.*,
				N4.district_code as district_code,
				N4.district_name as district_name,
				N4.district_name_eng as district_name_eng,
				N5.district_code as c_district_code,
				N5.district_name as c_district_name,
				N5.district_name_eng as c_district_name_eng,
				N6.district_code as m_district_code,
				N6.district_name as m_district_name,
				N6.district_name_eng as m_district_name_eng,
		
				N7.amphur_code as amphur_code , 
				N7.amphur_name as amphur_name , 
				N7.amphur_name_eng as amphur_name_eng , 
				N8.amphur_code as c_amphur_code , 
				N8.amphur_name as c_amphur_name , 
				N8.amphur_name_eng as c_amphur_name_eng , 
				N9.amphur_code as m_amphur_code , 
				N9.amphur_name as m_amphur_name , 
				N9.amphur_name_eng as m_amphur_name_eng , 

				N10.province_code as province_code , 
				N10.province_name as province_name , 
				N10.province_name_eng as province_name_eng , 
				N11.province_code as c_province_code , 
				N11.province_name as c_province_name , 
				N11.province_name_eng as c_province_name_eng ,
				N12.province_code as m_province_code , 
				N12.province_name as m_province_name , 
				N12.province_name_eng as m_province_name_eng ,
				N15.mem_group_name as mem_group_name_level ,
				N15.mem_group_full_name as mem_group_full_name_level ,
				N16.mem_group_name as mem_group_name_faction ,
				N16.mem_group_full_name as mem_group_full_name_faction ,
		');
		$this->db->from('coop_loan as N1');
		$this->db->join("coop_mem_apply as N2","N1.member_id = N2.member_id","left");
		$this->db->join("coop_district as N4","N2.district_id = N4.district_id","left");
		$this->db->join("coop_district as N5","N2.c_district_id = N5.district_id","left");
		$this->db->join("coop_district as N6","N2.m_district_id = N6.district_id","left");
		$this->db->join("coop_amphur as N7","N2.amphur_id = N7.amphur_id","left");
		$this->db->join("coop_amphur as N8","N2.c_amphur_id = N8.amphur_id","left");
		$this->db->join("coop_amphur as N9","N2.m_amphur_id = N9.amphur_id","left");
		$this->db->join("coop_province as N10","N2.province_id = N10.province_id","left");
		$this->db->join("coop_province as N11","N2.c_province_id = N11.province_id","left");
		$this->db->join("coop_province as N12","N2.m_province_id = N12.province_id","left");
		$this->db->join("coop_prename as N13","N2.prename_id = N13.prename_id","left");
		$this->db->join("coop_mem_position as N14","N2.position_id = N14.position_id","left");
		$this->db->join("coop_mem_group as N15","N2.level = N15.id","left");
		$this->db->join("coop_mem_group as N16","N2.faction = N16.id","left");
		$this->db->WHERE("N1.id = '$loan_id'");
		// $row = $this->db->get()->row_array();
		$row = $this->db->get()->result_array();
		$level = $row[0]['level'];
		$member_id = $row[0]['member_id'];
		// $this->db->select('*');
		// $this->db->from('coop_mem_group');
		// $this->db->WHERE("id = '$level'");
		// $coop_mem_group_row = $this->db->get()->row_array();
		$this->db->select('*');
		$this->db->from('coop_mem_share');
		$this->db->WHERE("member_id = '$member_id'");
		$coop_mem_share_row = $this->db->get()->result_array();

		$this->db->select('N1.loan_id,N1.member_id,N1.guarantee_type,
				N2.firstname_th,N2.lastname_th,N2.prename_id,
				N3.*,
				N4.mem_group_name,
				N5.mem_group_name as mem_group_name_faction');
		$this->db->from('coop_loan_guarantee as N1');
		$this->db->join("coop_mem_apply as N2","N1.member_id = N2.member_id","left");
		$this->db->join("coop_prename as N3","N2.prename_id = N3.prename_id","left");
		$this->db->join("coop_mem_group as N4","N2.level = N4.id","left");
		$this->db->join("coop_mem_group as N5","N2.faction = N5.id","left");
		$this->db->WHERE("N1.loan_id = '$loan_id'");
		$coop_loan_guarantee_row = $this->db->get()->result_array();
		foreach($coop_loan_guarantee_row as $key => $value){
			$coop_loan_guarantee_row[$key]['full_name_th'] = $coop_loan_guarantee_row[$key]['prename_full'].$coop_loan_guarantee_row[$key]['firstname_th'].' '.$coop_loan_guarantee_row[$key]['lastname_th'];
		}
		$this->db->select('*');
		$this->db->from('coop_profile');
		$this->db->WHERE("profile_id = '1'");
		$coop_profile = $this->db->get()->row_array();
		$arr_data['full'] =  $row[0];
		// $arr_data['full']['coop_mem_group'] = $coop_mem_group_row;
		$arr_data['full']['coop_loan_guarantee'] = $coop_loan_guarantee_row;
		// $arr_data['full']['coop_mem_share'] = $coop_mem_share_row;
		$arr_data['full']['coop_profile'] = $coop_profile;
		// echo '<pre>';print_r($arr_data); exit;
		return $arr_data['full'];
		
	}

}
