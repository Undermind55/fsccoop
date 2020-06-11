<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invest extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Invest_libraies', 'invest');
	}
	public function index() {
		$arr_data = array();

		$invest_types = $this->db->select("*")->from("coop_invest_type")->where("status = 1")->order_by("order")->get()->result_array();
		$invests = $this->db->select("*")->from("coop_invest")->where("status != 2")->order_by("start_date DESC")->get()->result_array();
		$invest_data = array();
		foreach($invests as $invest) {
			$invest_data[$invest['type']][] = $invest;
		}
		$arr_data['invest_types'] = $invest_types;
		$arr_data['invests'] = $invest_data;

		if(!empty($_POST['invest_id'])) {
			$arr_data['invest_id'] = $_POST['invest_id'];
		} else {
			foreach($invest_types as $type) {
				if(!empty($invest_data[$type['id']])) {
					$arr_data['invest_id'] = $invest_data[$type['id']][0]['id'];
					break;
				}
			}
		}

		$total_data = $this->invest->get_total_data();
		$arr_data['total_data'] = $total_data;

		$this->libraries->template('invest/index',$arr_data);
	}

	public function edit() {
		$arr_data = array();

		$invest_type = !empty($_POST['invest_type']) ? $_POST['invest_type'] : $_POST['invest_type_sub'];

		if($invest_type == 1) {
			$sav_c = $_POST['sav_c'];
			$start_date = !empty($sav_c['start_date']) ? $this->center_function->ConvertToSQLDate($sav_c['start_date']) : NULL;
			$due_date = !empty($sav_c['due_date']) ? $this->center_function->ConvertToSQLDate($sav_c['due_date']) : NULL;
			$invest_id = $this->invest->edit_saving_coop($_POST['invest_id'], $sav_c['name'], $sav_c['amount'], $due_date, $sav_c['interest'], $sav_c['period'], $start_date);
		} else if ($invest_type == 2) {
			$share_c = $_POST['share_c'];
			$invest_id = $this->invest->edit_share_coop($_POST['invest_id'], $share_c['name'], $share_c['period']);
		} else if ($invest_type == 3) {
			$bond = $_POST['bond'];
			$start_date = !empty($bond['start_date']) ? $this->center_function->ConvertToSQLDate($bond['start_date']) : NULL;
			$due_date = !empty($bond['due_date']) ? $this->center_function->ConvertToSQLDate($bond['due_date']) : NULL;
			$invest_id = $this->invest->edit_bond($_POST['invest_id'], $bond['aver_profit'], $bond['credit_rating'], $start_date, $due_date, $bond['invest_rate_text'], $bond['name'], $bond['department_name'], $bond['payment_method_text'], $bond['unit'], $bond['value_per_unit']);
		} else if ($invest_type == 4) {
			$bond = $_POST['bond'];
			$start_date = !empty($bond['start_date']) ? $this->center_function->ConvertToSQLDate($bond['start_date']) : NULL;
			$due_date = !empty($bond['due_date']) ? $this->center_function->ConvertToSQLDate($bond['due_date']) : NULL;
			$invest_id = $this->invest->edit_private_share($_POST['invest_id'], $bond['aver_profit'], $bond['credit_rating'], $start_date, $due_date, $bond['invest_rate_text'], $bond['name'], $bond['department_name'], $bond['payment_method_text'], $bond['unit'], $bond['value_per_unit']);
		} else if ($invest_type == 5) {
			$share_c = $_POST['share_s'];
			$invest_id = $this->invest->edit_set_share($_POST['invest_id'], $share_c['name'], $share_c['period']);
		}

		$arr_data['invest_id'] = $invest_id;
		echo json_encode($arr_data);
	}

	public function get_invest_by_id() {
		$arr_data = array();

		$data = $this->invest->get_invest_data($_GET['id'], 1, 1, 1, 1);
		$arr_data['data'] = $data;

		if($data['type'] == 5)  {
			$arr_data['share_value'] = $this->invest->get_invest_share_value($_GET['id'], NULL);
		}

		$total_data = $this->invest->get_total_data();
		$arr_data['total_data'] = $total_data;

		echo json_encode($arr_data);
	}

	public function add_interest() {
		$arr_data = array();
		$date = !empty($_POST['date']) ? $this->center_function->ConvertToSQLDate($_POST['date']) : NULL;

		$data = $this->invest->add_profit_transaction($_POST['id'], $_POST['invest_id'], $date, $_POST['rate'], $_POST['amount'], $_POST['note']);
		$arr_data['return'] = $data;

		echo json_encode($arr_data);
	}

	public function get_profit_transaction() {
		$arr_data = array();
		$transaction = $this->invest->get_profit_transaction_by_id($_GET['id']);
		$arr_data['data'] = $transaction;
		echo json_encode($arr_data);
	}

	public function add_transaction() {
		$date = !empty($_POST['date']) ? $this->center_function->ConvertToSQLDate($_POST['date']) : NULL;
		$data = $this->invest->add_transaction($_POST['id'], $_POST['invest_id'], $date, $_POST['unit'], $_POST['rate'], $_POST['amount'], $_POST['note'], $_POST['tran_type']);
		$arr_data['return'] = $data;
		echo json_encode($arr_data);
	}

	public function get_transaction() {
		$arr_data = array();

		$data = $this->invest->get_transaction($_GET['id']);
		$arr_data['data'] = $data;
		echo json_encode($arr_data);
	}

	public function add_invest_share_value() {
		$arr_data = array();

		$invest_id = $_POST['invest_id'];
		$date = !empty($_POST['date']) ? $this->center_function->ConvertToSQLDate($_POST['date']) : NULL;
		$value = $_POST['amount'];
		$data = $this->invest->add_invest_share_value($invest_id, $date, $value);

		echo json_encode($arr_data);
	}

	public function get_invest_share_value() {
		$arr_data = array();

		$invest_id = $_GET['id'];
		$date = !empty($_GET['date']) ? $this->center_function->ConvertToSQLDate($_GET['date']) : NULL;
		$data = $this->invest->get_invest_share_value($invest_id, $date);
		$arr_data['share_val'] = $data;

		echo json_encode($arr_data);
	}

	public function remove_profit() {
		$arr_data = array();

		$data = $this->invest->remove_profit($_POST['id']);
		$arr_data['data'] = $data;
		echo json_encode($arr_data);
	}

	public function remove_transactrion() {
		$arr_data = array();

		$data = $this->invest->remove_transactrion($_POST['id']);
		$arr_data['data'] = $data;
		echo json_encode($arr_data);
	}
}
