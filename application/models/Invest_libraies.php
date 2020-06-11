<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invest_libraies extends CI_Model {
    public function __construct() {
        parent::__construct();

    }

    public function get_total_data() {
        $result = array();
        $invest_payment = $this->db->select("SUM(amount) as sum")->from("coop_invest")->where("status = 1")->get()->row_array();
        $result['invest_payment'] = !empty($invest_payment) ? $invest_payment['sum'] : 0;
        $result['invest_payment_format'] = number_format($result['invest_payment'], 2);

        $profit = $this->db->select("SUM(amount) as sum")->from("coop_invest_profit_transaction")->where("status = 1")->get()->row_array();
        $result['profit'] = !empty($profit) ?  $invest_payment['sum'] : 0;
        $result['profit_format'] = number_format($result['profit'], 2);

        return $result;
    }

    /*
        for type = 1.
        id: if empty create / if not empty update
        amount: number 2 decimals
        due_date: dd/mm/yyyy
        interest: text
        name: text
        period: text
        start_date: dd/mm/yyyy
    */
    public function edit_saving_coop($id, $name, $amount, $due_date, $interest, $period, $start_date) {
        $process_timestamp = date('Y-m-d H:i:s');
        $data_insert = array();
        $data_insert['name'] = $name;
        $data_insert['amount'] = $amount;
        $data_insert['status'] = 1;
        $data_insert['start_date'] = $start_date;
        $data_insert['type'] = 1;
        $data_insert['user_id'] = $_SESSION['USER_ID'];
        if(!empty($id)) {
            $data_insert['update_date'] = $process_timestamp;
            $data_insert['updated_at'] = $process_timestamp;
            $this->db->where('id', $id);
            $this->db->update('coop_invest', $data_insert);
        } else {
            $data_insert['update_date'] = $process_timestamp;
            $data_insert['created_at'] = $process_timestamp;
            $data_insert['updated_at'] = $process_timestamp;
            $this->db->insert('coop_invest', $data_insert);
            $id = $this->db->insert_id();
        }

        $detail = $this->db->select("id")->from("coop_invest_detail")->where("invest_id = '".$id."' AND status = 1")->get()->row_array();

        $data_insert = array();
        $data_insert['invest_id'] = $id;
        $data_insert['invest_rate_text'] = $interest;
        $data_insert['invest_date'] = $start_date;
        $data_insert['end_date'] = $due_date;
        $data_insert['payment_method_text'] = $period;
        $data_insert['status'] = 1;
        $data_insert['user_id'] = $_SESSION['USER_ID'];
        if(!empty($detail)) {
            $data_insert['updated_at'] = $process_timestamp;
            $this->db->where('id', $detail['id']);
            $this->db->update('coop_invest_detail', $data_insert);
        } else {
            $data_insert['created_at'] = $process_timestamp;
            $data_insert['updated_at'] = $process_timestamp;
            $this->db->insert('coop_invest_detail', $data_insert);
            $detail_id = $this->db->insert_id();
        }

        return $id;
    }

    public function get_invest_data($id, $status, $detail_status, $profit_status, $tran_status) {
        $result = array();
        
        $where = "1=1";
        $where_detail = "1=1";
        $where_profit = "1=1";
        $where_prev_profit = "1=1";
        $where_transaction = "1=1";
        $where_prev_transaction = "1=1";

        if(!empty($status)) {
            $where = "status = '".$status."'";
        }
        if(!empty($detail_status)) {
            $where_detail = "status = '".$detail_status."'";
        }
        if(!empty($profit_status)) {
            $where_profit = "status = '".$profit_status."'";
        }
        if(!empty($tran_status)) {
            $where_transaction = "status = '".$tran_status."'";
        }
        if(!empty($id)) {
            $where .= " AND id = '".$id."'";
            $where_detail .= " AND invest_id = '".$id."'";
            $where_profit .= " AND invest_id = '".$id."'";
            $where_prev_profit .= " AND invest_id = '".$id."'";
            $where_transaction .= " AND invest_id = '".$id."'";
            $where_prev_transaction .= " AND invest_id = '".$id."'";
        }

        //transaction n profit show only last 5 years.
        $where_profit .= " AND date >= '".(((INT)date('Y'))-5)."-01-01' AND date <= '".date('Y')."-12-31'";
        $where_prev_profit .= " AND status = 1 AND date < '".(((INT)date('Y'))-5)."-01-01'";
        $where_transaction .= " AND date >= '".(((INT)date('Y'))-5)."-01-01' AND date <= '".date('Y')."-12-31'";
        $where_prev_transaction .= " AND status = 1 AND date < '".(((INT)date('Y'))-5)."-01-01'";

        $invest = $this->db->select("*")->from("coop_invest")->where($where)->get()->row_array();
        $result = $invest;
        $result['amount_format'] = number_format($invest['amount'],2);
        $result['update_date_thai'] = $this->center_function->ConvertToThaiDate($invest['update_date'],'1','0');

        $detail = $this->db->select("*")->from("coop_invest_detail")->where($where_detail)->get()->row_array();

        if(!empty($detail)) {
            $detail['value_per_unit_format'] = number_format($detail['value_per_unit'],2);
            $detail['aver_profit_format'] = number_format($detail['aver_profit'],2);
            $detail['unit_format'] = number_format($detail['unit']);
            if(!empty($detail['invest_date']) && !empty($detail['end_date'])) {
                $date1 = new DateTime($detail['invest_date']);
			    $date2 = new DateTime($detail['end_date']);
                $interval = date_diff($date1, $date2);
                $detail['invest_interval'] = $interval;
                $detail['start_date_thai'] = $this->center_function->ConvertToThaiDate($detail['invest_date'],'1','0');
                $detail['start_date_calender'] = $this->center_function->mydate2date($detail['invest_date']);

                $detail['end_date_thai'] = $this->center_function->ConvertToThaiDate($detail['end_date'],'1','0');
                $detail['end_date_calender'] = $this->center_function->mydate2date($detail['end_date']);

            }
            if(!empty($detail['end_date'])) {
                $date1 = new DateTime(date("Y-m-d"));
			    $date2 = new DateTime($detail['end_date']);
                $interval = date_diff($date1, $date2);
                $detail['invest_interval_left'] = $interval;
            }
        }
        $result['detail'] = $detail;

        $profit_raw = $this->db->select("*")->from("coop_invest_profit_transaction")->where($where_profit)->get()->result_array();
        $profits = array();
        $sum_profit = 0;
        foreach($profit_raw as $profit) {
            $profit['amount_format'] = number_format($profit['amount'],2);
            $profit['date_format'] = $this->center_function->ConvertToThaiDate($profit['date'],'1','0');
            $profits[] = $profit;
            $sum_profit += $profit['amount'];
        }
        $result['profits'] = $profits;
        $result['sum_profit'] = $sum_profit;
        $result['sum_profit_format'] = number_format($sum_profit,2);
        $result['total_balance'] = $sum_profit + $invest['amount'];
        $result['total_balance_format'] = number_format($result['total_balance'] ,2);

        //Get perv profit for chart.
        $profit_perv_raw = $this->db->select("SUM(amount) as sum")->from("coop_invest_profit_transaction")->where($where_prev_profit)->get()->row_array();
        $result['profit_perv_sum'] = !empty($profit_perv_raw) ? $profit_perv_raw['sum'] : 0;
        $result['total_profit'] = $result['profit_perv_sum'] + $sum_profit;
        $result['total_profit_format'] = number_format($result['total_profit'], 2);

        $transaction_raw = $this->db->select("*")->from("coop_invest_transaction")->where($where_transaction)->order_by('date ASC')->get()->result_array();
        $transactions = array();
        $total_transaction_unit = 0;
        $total_transaction_payment = 0;
        $last_value_per_unit = 0;
        foreach($transaction_raw as $transaction) {
            $transaction['amount_format'] = number_format($transaction['amount'], 2);
            $transaction['unit_format'] = number_format($transaction['unit']);
            $transaction['value_per_unit_format'] = number_format($transaction['value_per_unit'], 2);
            $transaction['payment'] = $transaction['amount'] * $transaction['value_per_unit'];
            $transaction['payment_format'] = number_format($transaction['payment'], 2);
            $transaction['date_format'] = $this->center_function->ConvertToThaiDate($transaction['date'],'1','0');
            $transactions[] = $transaction;
            if($transaction['tran_type'] == 1) {
                $total_transaction_unit += $transaction['unit'];
                $total_transaction_payment += $transaction['amount'];
            } else {
                $total_transaction_unit -= $transaction['unit'];
                $total_transaction_payment -= $transaction['amount'];
            }

            $last_value_per_unit = $transaction['value_per_unit'];
        }
        $result['transactions'] = $transactions;

        $result['tran_fif_total_payment'] = $total_transaction_payment;
        $result['tran_fif_total_payment_format'] = number_format($result['tran_fif_total_payment'],2);
        $result['tran_fif_total_unit'] = $total_transaction_unit;
        $result['tran_fif_total_unit_format'] = number_format($total_transaction_unit);
        $result['tran_fif_total_amount'] = $result['tran_fif_total_unit'] * $last_value_per_unit;
        $result['tran_fif_total_amount_format'] = number_format($result['tran_fif_total_amount'], 2);
        $result['tran_fif_total_amount_n_profit'] = $result['tran_fif_total_amount'] + $result['total_fif_profit'];
        $result['tran_fif_total_amount_n_profit_format'] = number_format($result['tran_fif_total_amount_n_profit'],2);

        $tran_prev_unit = 0;
        $tran_prev_payment = 0;
        $tran_prev_raw = $this->db->select("*")->from("coop_invest_transaction")->where($where_prev_transaction)->get()->result_array();
        foreach($tran_prev_raw as $tran_prev) {
            if($transaction['tran_type'] == 1) {
                $tran_prev_unit += $tran_prev['unit'];
                $tran_prev_payment += $tran_prev['amount'];
            } else {
                $tran_prev_unit += $tran_prev['unit'];
                $tran_prev_payment += $tran_prev['amount'];
            }
        }
        $result['tran_prev_unit'] = $tran_prev_unit;
        $result['tran_prev_unit_format'] = number_format($tran_prev_unit,2);
        $result['tran_prev_payment'] = $tran_prev_payment;
        $result['tran_prev_payment_format'] = number_format($tran_prev_payment,2);
        $result['tran_total_payment'] = $tran_prev_payment + $total_transaction_payment;
        $result['tran_total_payment_format'] = number_format($result['tran_total_payment'],2);
        $result['tran_total_unit'] = $tran_prev_unit + $total_transaction_unit;
        $result['tran_total_amount'] = $result['tran_total_unit'] * $last_value_per_unit;
        $result['tran_total_amount_format'] = number_format($result['tran_total_amount'], 2);
        $result['tran_total_amount_n_profit'] = $result['tran_total_amount'] + $result['total_profit'];
        $result['tran_total_amount_n_profit_format'] = number_format($result['tran_total_amount_n_profit'],2);
        
        return $result;
    }

    public function add_profit_transaction($id, $invest_id, $date, $rate, $amount, $note) {
        $result = array();
        $invest = $this->db->select("*")->from("coop_invest")->where("id = '".$invest_id."'")->get()->row_array();
        $process_timestamp = date('Y-m-d H:i:s');

        $result['invest_id'] = $invest_id;

        $data_insert = array();
        $data_insert['invest_id'] = $invest_id;
        $data_insert['date'] = $date;
        $data_insert['rate'] = $rate;
        $data_insert['amount'] = $amount;
        $data_insert['type'] = $invest['type'];
        $data_insert['note'] = $note;
        $data_insert['status'] = 1;
        $data_insert['user_id'] = $_SESSION['USER_ID'];
        $data_insert['updated_at'] = $process_timestamp;
        if(empty($id)) {
            $data_insert['created_at'] = $process_timestamp;
            $this->db->insert('coop_invest_profit_transaction', $data_insert);
            $id = $this->db->insert_id();
        } else {
            $this->db->where('id', $id);
            $this->db->update('coop_invest_profit_transaction', $data_insert);
        }
        $result['id'] = $id;

        $data_insert = array();
        $data_insert['update_date'] = $process_timestamp;
        $data_insert['updated_at'] = $process_timestamp;
        $this->db->where('id', $invest_id);
        $this->db->update('coop_invest', $data_insert);

        return $result;
    }

    public function get_profit_transaction_by_id($id) {
        $where = "1=1";

        if(!empty($id)) { $where .= " AND id = '".$id."'";}

        $transaction = $this->db->select("*")->from("coop_invest_profit_transaction")->where($where)->get()->row_array();
        $transaction['amount_format'] = number_format($transaction['amount'],2);
        $transaction['rate_format'] = number_format($transaction['rate']);
        $transaction['date_format'] = $this->center_function->ConvertToThaiDate($transaction['date'],'1','0');
        $transaction['date_calender'] = $this->center_function->mydate2date($transaction['date']);

        return $transaction;
    }

    public function edit_share_coop($id, $name, $period) {
        $process_timestamp = date('Y-m-d H:i:s');
        $data_insert = array();
        $data_insert['name'] = $name;
        $data_insert['amount'] = 0;
        $data_insert['status'] = 1;
        $data_insert['start_date'] = $process_timestamp;
        $data_insert['type'] = 2;
        $data_insert['user_id'] = $_SESSION['USER_ID'];
        if(!empty($id)) {
            $data_insert['update_date'] = $process_timestamp;
            $data_insert['updated_at'] = $process_timestamp;
            $this->db->where('id', $id);
            $this->db->update('coop_invest', $data_insert);
        } else {
            $data_insert['update_date'] = $process_timestamp;
            $data_insert['created_at'] = $process_timestamp;
            $data_insert['updated_at'] = $process_timestamp;
            $this->db->insert('coop_invest', $data_insert);
            $id = $this->db->insert_id();
        }

        $detail = $this->db->select("id")->from("coop_invest_detail")->where("invest_id = '".$id."' AND status = 1")->get()->row_array();

        $data_insert = array();
        $data_insert['invest_id'] = $id;
        $data_insert['payment_method_text'] = $period;
        $data_insert['status'] = 1;
        $data_insert['user_id'] = $_SESSION['USER_ID'];
        if(!empty($detail)) {
            $data_insert['updated_at'] = $process_timestamp;
            $this->db->where('id', $detail['id']);
            $this->db->update('coop_invest_detail', $data_insert);
        } else {
            $data_insert['created_at'] = $process_timestamp;
            $data_insert['updated_at'] = $process_timestamp;
            $this->db->insert('coop_invest_detail', $data_insert);
            $detail_id = $this->db->insert_id();
        }

        return $id;
    }

    /*
    $tran_type 1 = ซื้อ/ 2 = ขาย
    */
    public function add_transaction($id, $invest_id, $date, $unit, $rate, $amount, $note, $tran_type) {
        $result = array();
        $process_timestamp = date('Y-m-d H:i:s');

        $invest = $this->db->select("*")->from("coop_invest")->where("id = '".$invest_id."'")->get()->row_array();

        if(empty($rate)) {
            $rate = $amount/$unit;
        }

        $data_insert = array();
        $data_insert['invest_id'] = $invest_id;
        $data_insert['date'] = $date;
        $data_insert['amount'] = $amount;
        $data_insert['value_per_unit'] = $rate;
        $data_insert['unit'] = $unit;
        $data_insert['note'] = $note;
        $data_insert['status'] = 1;
        $data_insert['user_id'] = $_SESSION['USER_ID'];
        $data_insert['type'] = $invest['type'];
        $data_insert['tran_type'] = $tran_type;
        if(!empty($id)) {
            $data_del = array();
            $data_del['status'] = 3;
            $data_del['updated_at'] = $process_timestamp;
            $this->db->where('id', $id);
            $this->db->update('coop_invest_transaction', $data_del);
        }
        $data_insert['created_at'] = $process_timestamp;
        $data_insert['updated_at'] = $process_timestamp;
        $this->db->insert('coop_invest_transaction', $data_insert);
        $id = $this->db->insert_id();

        //Update invest amount
        $transactions = $this->db->select("*")->from("coop_invest_transaction")->where("invest_id = '".$invest_id."' AND status = 1")->get()->result_array();
        $total_payment = 0;
        foreach($transactions as $transaction) {
            if($transaction['tran_type'] == 1) {
                $total_payment += $transaction['amount'];
            } else {
                $total_payment -= $transaction['amount'];
            }
        }

        $data_update = array();
        $data_update['amount'] = $total_payment;
        $data_update['update_date'] = $process_timestamp;
        $data_update['updated_at'] = $process_timestamp;
        $this->db->where('id', $invest_id);
        $this->db->update('coop_invest', $data_update);

        $result['id'] = $id;
        $result['invest_id'] = $invest_id;
        return $result;
    }

    public function get_transaction($id) {
        $result = array();
        $where = "1=1";
        if(!empty($id)) {
            $where .= " AND id = ".$id;
        }
        $transaction = $this->db->select("*")->from("coop_invest_transaction")->where($where)->get()->row_array();
        if(!empty($transaction)) {
            $transaction['amount_format'] = number_format($transaction['amount'],2);
            $transaction['unit_format'] = number_format($transaction['unit']);
            $transaction['value_per_unit_format'] = number_format($transaction['value_per_unit'],2);
            $transaction['date_format'] = $this->center_function->ConvertToThaiDate($transaction['date'],'1','0');
            $transaction['date_calender'] = $this->center_function->mydate2date($transaction['date']);
        }
        return $transaction;
    }

    public function edit_bond($id, $aver_profit, $credit_rating, $start_date, $due_date, $invest_rate_text, $name, $department_name, $payment_method_text, $unit, $value_per_unit) {
        $process_timestamp = date('Y-m-d H:i:s');
        $amount = $unit * $value_per_unit;
        $data_insert = array();
        $data_insert['name'] = $department_name;
        $data_insert['amount'] = $amount;
        $data_insert['status'] = 1;
        $data_insert['start_date'] = $start_date;
        $data_insert['type'] = 3;
        $data_insert['user_id'] = $_SESSION['USER_ID'];
        if(!empty($id)) {
            $data_insert['update_date'] = $process_timestamp;
            $data_insert['updated_at'] = $process_timestamp;
            $this->db->where('id', $id);
            $this->db->update('coop_invest', $data_insert);
        } else {
            $data_insert['update_date'] = $process_timestamp;
            $data_insert['created_at'] = $process_timestamp;
            $data_insert['updated_at'] = $process_timestamp;
            $this->db->insert('coop_invest', $data_insert);
            $id = $this->db->insert_id();
        }

        $detail = $this->db->select("id")->from("coop_invest_detail")->where("invest_id = '".$id."' AND status = 1")->get()->row_array();

        $data_insert = array();
        $data_insert['invest_id'] = $id;
        $data_insert['invest_rate_text'] = $invest_rate_text;
        $data_insert['invest_date'] = $start_date;
        $data_insert['end_date'] = $due_date;
        $data_insert['payment_method_text'] = $payment_method_text;
        $data_insert['aver_profit'] = $aver_profit;
        $data_insert['credit_rating'] = $credit_rating;
        $data_insert['unit'] = $unit;
        $data_insert['value_per_unit'] = $value_per_unit;
        $data_insert['name'] = $name;
        $data_insert['status'] = 1;
        $data_insert['user_id'] = $_SESSION['USER_ID'];
        if(!empty($detail)) {
            $data_insert['updated_at'] = $process_timestamp;
            $this->db->where('id', $detail['id']);
            $this->db->update('coop_invest_detail', $data_insert);
        } else {
            $data_insert['created_at'] = $process_timestamp;
            $data_insert['updated_at'] = $process_timestamp;
            $this->db->insert('coop_invest_detail', $data_insert);
            $detail_id = $this->db->insert_id();
        }

        return $id;
    }

    public function edit_private_share($id, $aver_profit, $credit_rating, $start_date, $due_date, $invest_rate_text, $name, $department_name, $payment_method_text, $unit, $value_per_unit) {
        $process_timestamp = date('Y-m-d H:i:s');
        $amount = $unit * $value_per_unit;
        $data_insert = array();
        $data_insert['name'] = $department_name;
        $data_insert['amount'] = $amount;
        $data_insert['status'] = 1;
        $data_insert['start_date'] = $start_date;
        $data_insert['type'] = 4;
        $data_insert['user_id'] = $_SESSION['USER_ID'];
        if(!empty($id)) {
            $data_insert['update_date'] = $process_timestamp;
            $data_insert['updated_at'] = $process_timestamp;
            $this->db->where('id', $id);
            $this->db->update('coop_invest', $data_insert);
        } else {
            $data_insert['update_date'] = $process_timestamp;
            $data_insert['created_at'] = $process_timestamp;
            $data_insert['updated_at'] = $process_timestamp;
            $this->db->insert('coop_invest', $data_insert);
            $id = $this->db->insert_id();
        }

        $detail = $this->db->select("id")->from("coop_invest_detail")->where("invest_id = '".$id."' AND status = 1")->get()->row_array();

        $data_insert = array();
        $data_insert['invest_id'] = $id;
        $data_insert['invest_rate_text'] = $invest_rate_text;
        $data_insert['invest_date'] = $start_date;
        $data_insert['end_date'] = $due_date;
        $data_insert['payment_method_text'] = $payment_method_text;
        $data_insert['aver_profit'] = $aver_profit;
        $data_insert['credit_rating'] = $credit_rating;
        $data_insert['unit'] = $unit;
        $data_insert['value_per_unit'] = $value_per_unit;
        $data_insert['name'] = $name;
        $data_insert['status'] = 1;
        $data_insert['user_id'] = $_SESSION['USER_ID'];
        if(!empty($detail)) {
            $data_insert['updated_at'] = $process_timestamp;
            $this->db->where('id', $detail['id']);
            $this->db->update('coop_invest_detail', $data_insert);
        } else {
            $data_insert['created_at'] = $process_timestamp;
            $data_insert['updated_at'] = $process_timestamp;
            $this->db->insert('coop_invest_detail', $data_insert);
            $detail_id = $this->db->insert_id();
        }

        return $id;
    }

    public function edit_set_share($id, $name, $period) {
        $process_timestamp = date('Y-m-d H:i:s');
        $data_insert = array();
        $data_insert['name'] = $name;
        $data_insert['amount'] = 0;
        $data_insert['status'] = 1;
        $data_insert['start_date'] = $process_timestamp;
        $data_insert['type'] = 5;
        $data_insert['user_id'] = $_SESSION['USER_ID'];
        if(!empty($id)) {
            $data_insert['update_date'] = $process_timestamp;
            $data_insert['updated_at'] = $process_timestamp;
            $this->db->where('id', $id);
            $this->db->update('coop_invest', $data_insert);
        } else {
            $data_insert['update_date'] = $process_timestamp;
            $data_insert['created_at'] = $process_timestamp;
            $data_insert['updated_at'] = $process_timestamp;
            $this->db->insert('coop_invest', $data_insert);
            $id = $this->db->insert_id();
        }

        $detail = $this->db->select("id")->from("coop_invest_detail")->where("invest_id = '".$id."' AND status = 1")->get()->row_array();

        $data_insert = array();
        $data_insert['invest_id'] = $id;
        $data_insert['name'] = $period;
        $data_insert['status'] = 1;
        $data_insert['user_id'] = $_SESSION['USER_ID'];
        if(!empty($detail)) {
            $data_insert['updated_at'] = $process_timestamp;
            $this->db->where('id', $detail['id']);
            $this->db->update('coop_invest_detail', $data_insert);
        } else {
            $data_insert['created_at'] = $process_timestamp;
            $data_insert['updated_at'] = $process_timestamp;
            $this->db->insert('coop_invest_detail', $data_insert);
            $detail_id = $this->db->insert_id();
        }

        return $id;
    }

    public function add_invest_share_value($invest_id, $date, $value) {
        $data_insert = array();
        $data_insert['invest_id'] = $invest_id;
        $data_insert['status'] = 1;
        $data_insert['value'] = $value;
        $data_insert['date'] = $date;
        $data_insert['user_id'] = $_SESSION['USER_ID'];
        $data_insert['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert('coop_invest_share_value', $data_insert);
        $id = $this->db->insert_id();
        return $id;
    }

    /*
        $date must be timestamp.
    */
    public function get_invest_share_value($invest_id, $date) {
        $result = array();
        if(empty($date)) $date = date('Y-m-d H:i:s');

        $first_interest = $this->db->select("*")->from("coop_invest_share_value")->where("invest_id = '".$invest_id."' AND DATE(date) <= '".$date."' AND status = 1")->order_by("date")->get()->row_array();
        $last_interest = $this->db->select("*")->from("coop_invest_share_value")->where("invest_id = '".$invest_id."' AND DATE(date) <= '".$date."' AND status = 1")->order_by("date DESC")->get()->row_array();
        if(!empty($first_interest)) {
            $first_interest['date_thai'] = $this->center_function->ConvertToThaiDate($first_interest['date'],'1','0');
            $first_interest['date_calender'] = $this->center_function->mydate2date($first_interest['date']);
            $first_interest['value_format'] = number_format($first_interest['value'],2);
        }
        if(!empty($last_interest)) {
            $last_interest['date_thai'] = $this->center_function->ConvertToThaiDate($last_interest['date'],'1','0');
            $last_interest['date_calender'] = $this->center_function->mydate2date($last_interest['date']);
            $last_interest['value_format'] = number_format($last_interest['value'],2);
        }

        $result['first'] = $first_interest;
        $result['last'] = $last_interest;
        return $result;
    }

    public function remove_profit($id) {
        $result = array();

        $data_update = array();
        $data_update['status'] = 2;
        $data_update['cancel_user_id'] = $_SESSION['USER_ID'];
        $data_update['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        $this->db->update('coop_invest_profit_transaction', $data_update);

        return $id;
    }

    public function remove_transactrion($id) {
        $result = array();

        $data_update = array();
        $data_update['status'] = 2;
        $data_update['cancel_user_id'] = $_SESSION['USER_ID'];
        $data_update['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        $this->db->update('coop_invest_transaction', $data_update);

        return $id;
    }
}