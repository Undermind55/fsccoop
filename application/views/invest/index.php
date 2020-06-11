<!-- Css color of this screen not belong to main css. -->
<?php
unset($_POST);
$link = array(
    'href' => PROJECTJSPATH.'assets/css/Chart.min.css',
    'rel' => 'stylesheet',
    'type' => 'text/css'
);
echo link_tag($link);
?>
<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    th, td {
        text-align: center;
    }
    .modal-dialog-delete {
        margin:0 auto;
        width: 350px;
        margin-top: 8%;
    }
    .modal-dialog-account {
        margin:auto;
        width: 50%;
        margin-top:7%;
    }
    .control-label {
        text-align:right;
        padding-top:5px;
    }
    .text_left {
        text-align:left;
    }
    .text_right {
        text-align:right;
    }
    @media (min-width: 768px) {
        .card_col {
            width:20%;
        }
    }
    @media (max-width: 768px) {
        .card_col {
            width:100%;
        }
    }
    .card_col {
        float: left;
        padding-left: 5px;
        padding-right: 5px;
    }
    .card_col > .card {
        padding-top: 15px;
        padding-bottom: 15px;
    }
    .second_bg {
        background-color : #137de0;
        color :#FFFFFF;
    }
    .second_text {
        color : #137de0;
    }
    .selected_invest {
        background-color : #137de0 !important;
        color :#FFFFFF !important;
    }
    .card {
        padding: 15px;
    }
    .card_list {
        padding-top: 0 !important;
        padding-bottom: 0 !important;
    }
    .topic_row {
        border-top-color: #000 !important;
    }
    .topic_row th {
        color: #4c4b4b;
        font-size: 20px;
        padding-top: 2px!important;
        padding-bottom: 2px!important;
    }
    .table_invest_list {
        border: 0 !important;
        background-color: #fff !important;
        margin-top: 20px;
    }
    .topic_col {
        border-top: 2px solid #eceff1 !important;
    }
    .table_sub {
        background-color: transparent !important;
    }
    .table_sub td {
        border: 0 !important;
    }
    .text_right {
        text-align: right !important;
    }
    .table_sub tr:hover {
        background-color: #c7c3c3 !important;
    }
    .card_list .invest-title {
        margin-top: 10px !important;
        margin-bottom: 10px !important;
    }
    .detail_top {
        padding-bottom: 20px;
        border-bottom: 1px solid #eceff1;
    }
    .row_detail {
        border-bottom: 1px solid #eceff1;
        padding-bottom: 10px;
    }
    .col_detail_right {
        /* border-left: 1px solid #eceff1; */
    }
    .col_detail_left {
        border-right: 1px solid #eceff1;
    }
    .helpblock_plus {
        display: inline;
        margin-top: 5px;
        margin-bottom: 10px;
        /* color: #137de0; */
    }
    .helpblock_minus {
        display: inline;
        margin-top: 5px;
        margin-bottom: 10px;
        color: #d50000;
    }
    .helpblock_dark {
        display: inline;
        margin-top: 5px;
        margin-bottom: 10px;
        color: #000000;
    }
    .helpbtn {
        border-radius: 50px !important;
        font-size: 12px;
        padding-top: 2px;
        padding-bottom: 2px;
        width: unset;
        height: unset;
    }
    .no_b_space {
        margin-bottom: 0px;
    }
    .no_t_space {
        margin-top: 0px;
    }
    .title_font {
        font-size: 28px;
    }
    .dark_font {
        color: #000000;
    }
    .grey_icon {
        font-size: 12px;
        color: #b5b5b5;
    }
    .no_size_padding {
        padding-left:0 !important;
        padding-right:0  !important;
    }
    .invest_row td {
        padding-top: 4px !important;
        padding-bottom: 4px !important;
    }
    .card-footer {
        border-top: unset;
    }
    .table_invest_list .table-bordered {
        border: unset;
    }
</style>
<div class="layout-content">
    <div class="layout-content-body">
        <h1 class="title_top">ระบบการลงทุน</h1>
        <p style="font-family: upbean; font-size: 20px; margin-bottom:5px;"><?php $this->load->view('breadcrumb'); ?></p>
        <div class="row gutter-xs">
            <div class="card_col">
                <div class="card bg-primary">
                    <div class="card-values">
                        <div class="p-x text-right">
                            <h3 class="card-title fw-l title_font" id="card_title_invest_payment"><?php echo $total_data['invest_payment_format']; ?></h3>
                            <small>จำนวนเงินลงทุน</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card_col">
                <div class="card bg-primary">
                    <div class="card-values">
                        <div class="p-x text-right">
                            <h3 class="card-title fw-l title_font" id="card_title_profit"><?php echo $total_data['profit_format'];?></h3>
                            <small>ผลตอบแทนระหว่างปี</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card_col">
                <div class="card bg-primary">
                    <div class="card-values">
                        <div class="p-x text-right">
                            <h3 class="card-title fw-l title_font" id="card_title_diff"><?php echo number_format(0,2);?></h3>
                            <small>ผลต่างราคาซื้อขาย</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card_col">
                <div class="card second_bg">
                    <div class="card-values">
                        <div class="p-x text-right">
                            <h3 class="card-title fw-l title_font"  id="card_title_total"><?php echo number_format(0,2);?></h3>
                            <small>มูลค่าทรัพย์สินรวม</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card_col">
                <div class="card second_bg">
                    <div class="card-values">
                        <div class="p-x text-right">
                            <h3 class="card-title fw-l title_font"><?php echo number_format(0,2);?></h3>
                            <small>Average Rate of Return (ARR)</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gutter-xs">
            <div class="col-xs-6 col-md-6">
                <div class="card">
                    <div class="card-body card_list">
                        <table class="table table-bordered table-center table_invest_list">
                            <thead> 
                                <tr style="border-bottom: 3px solid #eceff1;">
                                    <th width="40%">หัวข้อการลงทุน</th>
                                    <th width="20%">จำนวนเงินลงทุน</th>
                                    <th width="20%">อัปเดต</th>
                                    <th width="20%">สถานะ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($invest_types as $invest_type) {
                                ?>
                                <tr class="topic_row"> 											 
                                    <th class="text-left topic_col" colspan="4">
                                        <?php echo $invest_type["name"];?>
                                        <!-- <span class="icon icon-search"></span> -->
                                    </th>
                                </tr>
                                <tr>
                                    <td colspan="4" style="padding: 0;">
                                        <table class="table table-bordered table-striped table-center table_sub">
                                            <tbody class="tbody_<?php echo $invest_type['id']?>">
                                                <?php
                                                    if(!empty($invests[$invest_type['id']])) {
                                                        foreach($invests[$invest_type['id']] as $invest) {
                                                ?>
                                                <tr class="invest_row" id="invest_row_<?php echo $invest['id'];?>" data-id="<?php echo $invest['id'];?>">
                                                    <td id="invest_name_<?php echo $invest['id'];?>" width="40%" class="text_left"><?php echo $invest['name'];?></td>
                                                    <td id="invest_amount_<?php echo $invest['id'];?>" width="20%" class="text_right"><?php echo number_format($invest['amount'],2);?></td>
                                                    <td id="invest_update_date_<?php echo $invest['id'];?>" width="20%"><?php echo $this->center_function->ConvertToThaiDate($invest['update_date'],'1','0');?></td>
                                                    <td id="invest_status_<?php echo $invest['id'];?>" width="20%"><?php echo $invest['status'] == 1 ? "Active" : "Inactive"; ?></td>
                                                </tr>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody> 
                        </table>
                    </div>
                    <div class="card-footer text-right">
                        <button type="button" id="add_invest" class="btn second_bg" data-dismiss="modal"><span class="icon icon-plus"></span> เพิ่ม</button>
                    </div>
                </div>
            </div>
            
            <div class="col-xs-6 col-md-6">
                <div class="card">
                    <div class="card-body card_list">
                        <div class="row">
                            <div id="sav_c_detail" class="col-md-12" style="display:none;">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h3 class="invest-title dark_font" id="sav_c_t_name"></h3>
                                        <span  class="help-block">เงินฝากในระบบสหกรณ์</span>
                                    </div>
                                    <div class="col-md-3 text-right invest-title">
                                        <button type="button" id="sav_c_edit_btn" class="btn second_bg" data_id=""><span class="icon icon-pencil"></span> แก้ไข</button>
                                    </div>
                                </div>
                                <div class="row row_detail">
                                    <div class="col-md-6 col_detail_left">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 id="sav_c_t_amount" class="no_b_space title_font dark_font"></h3>
                                                <span  class="help-block no_t_space">เงินฝาก</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 id="sav_c_t_time_left" class="no_b_space title_font dark_font"></h3>
                                                <span  class="help-block no_t_space">อายุคงเหลือ</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row" style="display:none;">
                                            <div class="col-md-12 col_detail_right">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h3 id="sav_c_t_balance" class="second_text no_b_space title_font"></h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span  class="help-block no_t_space">รวมทั้งหมด</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span id="sav_c_diff_percent" class="helpblock_plus text-edit"></span>
                                                        <span id="sav_c_diff_percent_arrow" class="icon icon-arrow-up text-edit"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col_detail_right">
                                                <h3 id="sav_c_t_profit" class="second_text no_b_space title_font"></h3>
                                                <span  class="help-block no_t_space">รวมดอกเบี้ยที่ได้รับ</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>ข้อมูลการลงทุน</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>จำนวนเงิน</span>
                                    </div>
                                    <div class="col-md-9">
                                        <span id="sav_c_d_amount"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>อัตราดอกเบี้ย</span>
                                    </div>
                                    <div class="col-md-9">
                                        <span id="sav_c_d_interest"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>วันที่ลงทุน</span>
                                    </div>
                                    <div class="col-md-9">
                                        <span id="sav_c_d_start_date"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>วันที่ครบกำหนด</span>
                                    </div>
                                    <div class="col-md-9">
                                        <span id="sav_c_d_due_date"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>รอบการจ่ายเงิน</span>
                                    </div>
                                    <div class="col-md-9">
                                        <span id="sav_c_d_period"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>สถานะ</span>
                                    </div>
                                    <div class="col-md-9">
                                        <span id="sav_c_d_status"></span>
                                    </div>
                                </div>
                            </div>
                            <div id="share_c_detail" class="col-md-12" style="display:none;">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h3 class="invest-title dark_font" id="share_c_t_name"></h3>
                                        <span  class="help-block">หุ้นชุมนุม</span>
                                    </div>
                                    <div class="col-md-3 text-right invest-title">
                                        <button type="button" id="share_c_edit_btn" class="btn second_bg" data_id=""><span class="icon icon-pencil"></span> แก้ไข</button>
                                    </div>
                                </div>
                                <div class="row row_detail">
                                    <div class="col-md-6 col_detail_left">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 id="share_c_t_amount" class="no_b_space title_font dark_font"></h3>
                                                <span  class="help-block no_t_space">เงินลงทุน</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12 col_detail_right">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h3 id="share_c_t_balance" class="second_text no_b_space title_font"></h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <span class="help-block no_t_space">รวมปันผลที่ได้รับ</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <label class="invest-title">ประวัติซื้อหุ้นย้อนหลัง 5 ปี</label>
                                        <span class="icon icon-search grey_icon"></span>
                                    </div>
                                    <div class="col-md-3 text-right invest-title">
                                        <button type="button" id="share_add_tran_btn" class="btn second_bg" data_id=""><span class="icon icon-plus"></span> เพิ่ม</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table table-bordered table-center table_invest_list table-striped no_t_space table_sub">
                                        <thead> 
                                            <tr style="border-bottom: 3px solid #eceff1;">
                                                <th width="17%">วันที่</th>
                                                <th width="15%">จำนวนหุ้น</th>
                                                <th width="20%">มูลค่า</th>
                                                <th>หมายเหตุ</th>
                                                <th width="10%"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="share-tran-tbody">
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <span id="share-t-c-total"></span>
                                    </div>
                                </div>
                            </div>
                            <div id="bond_c_detail" class="col-md-12" style="display:none;">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h3 class="invest-title dark_font" id="bond_t_name"></h3>
                                        <span class="help-block" id='bond_help_title'>พันธบัตรรัฐบาล</span>
                                        <span class="help-block" id='share_p_help_title'>หุ้นกู้เอกชน</span>
                                    </div>
                                    <div class="col-md-3 text-right invest-title">
                                        <button type="button" id="bond_edit_btn" class="btn second_bg" data_id=""><span class="icon icon-pencil"></span> แก้ไข</button>
                                    </div>
                                </div>
                                <div class="row row_detail">
                                    <div class="col-md-6 col_detail_left">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 id="bond_t_amount" class="no_b_space title_font dark_font"></h3>
                                                <span  class="help-block no_t_space">มูลค่าเฉลีย</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 id="bond_t_time_left" class="no_b_space title_font dark_font"></h3>
                                                <span  class="help-block no_t_space">อายุคงเหลือ</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row" style="display:none;">
                                            <div class="col-md-12 col_detail_right">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h3 id="bond_t_balance" class="second_text no_b_space title_font"></h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="help-block no_t_space">รวมทั้งหมด</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span id="bond_diff_percent" class="helpblock_plus text-edit"></span>
                                                        <span id="bond_diff_percent_arrow" class="icon icon-arrow-up text-edit"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col_detail_right">
                                                <h3 id="bond_t_profit" class="second_text no_b_space title_font"></h3>
                                                <span  class="help-block no_t_space">รวมดอกเบี้ยที่ได้รับ</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>ข้อมูลการลงทุน</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>ชื่อรุ่น</span>
                                    </div>
                                    <div class="col-md-9">
                                        <span id="bond_d_name"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>Credit Rating</span>
                                    </div>
                                    <div class="col-md-9">
                                        <span id="bond_d_credit_rating"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>จำนวนหน่วย</span>
                                    </div>
                                    <div class="col-md-9">
                                        <span id="bond_d_unit"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>มูลค่าเฉลี่ย</span>
                                    </div>
                                    <div class="col-md-9">
                                        <span id="bond_d_value_per_unit"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>ผลตอบแทนเฉลี่ย</span>
                                    </div>
                                    <div class="col-md-9">
                                        <span id="bond_d_aver_profit"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>ดอกเบี้ย</span>
                                    </div>
                                    <div class="col-md-9">
                                        <span id="bond_d_interest"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>วันที่ซื้อ</span>
                                    </div>
                                    <div class="col-md-9">
                                        <span id="bond_d_start_date"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>วันที่ครบกำหนด</span>
                                    </div>
                                    <div class="col-md-9">
                                        <span id="bond_d_due_date"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>รอบการจ่ายดอกเบี้ย</span>
                                    </div>
                                    <div class="col-md-9">
                                        <span id="bond_d_payment_method_text"></span>
                                    </div>
                                </div>
                            </div>
                            <div id="share_s_detail" class="col-md-12" style="display:none;">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h3 class="invest-title dark_font" id="share_s_t_name"></h3>
                                        <span  class="help-block">หุ้นทุนในตลาดหลักทรัพย์</span>
                                    </div>
                                    <div class="col-md-3 text-right invest-title">
                                        <button type="button" id="share_s_edit_btn" class="btn second_bg" data_id=""><span class="icon icon-pencil"></span> แก้ไข</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col_detail_left">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 id="share_s_t_amount" class="no_b_space title_font dark_font"></h3>
                                                <span  class="help-block no_t_space">เงินลงทุน</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12 col_detail_right">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h3 id="share_s_t_balance" class="second_text no_b_space title_font"></h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="helpblock_dark no_t_space">ผลต่างราคาซื้อ/ขาย</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span id="share_s_diff_percent" class="text-edit"></span>
                                                        <span id="share_s_diff_percent_arrow_plus" class="icon icon-arrow-up text-edit"></span>
                                                        <span id="share_s_diff_percent_arrow_minus" class="icon icon-arrow-down text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row_detail">
                                    <div class="col-md-6 col_detail_left">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3 id="share_s_t_rate" class="no_b_space title_font dark_font" style="margin-top: 0px;margin-bottom: 0px;"></h3>
                                            </div>
                                            <div class="col-md-6">
                                                <span id="share_s_rate_diff" class="helpblock_plus text-edit no_b_space no_t_space"></span>
                                                <span id="share_s_rate_diff_arrow_plus" class="icon icon-arrow-up text-edit no_b_space no_t_space"></span>
                                                <span id="share_s_rate_diff_arrow_minus" class="icon icon-arrow-down text-danger no_b_space no_t_space"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <span id="share_s_rate_date" class="no_b_space no_t_space"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="button" id="share_s_rate_edit_btn" class="btn second_bg helpbtn" data_id=""><span class="icon icon-pencil"></span> แก้ไขมูลค่า</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12 col_detail_right">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h3 id="share_s_t_profit" class="second_text no_b_space no_t_space title_font"></h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <span  class="help-block no_t_space">รวมปันผลที่ได้รับ</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <label class="invest-title">ประวัติซื้อหุ้นย้อนหลัง 5 ปี</label>
                                        <span class="icon icon-search grey_icon"></span>
                                    </div>
                                    <div class="col-md-3 text-right invest-title">
                                        <button type="button" id="share_s_add_tran_btn" class="btn second_bg" data_id=""><span class="icon icon-plus"></span> เพิ่ม</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table table-bordered table-center table_invest_list table-striped no_t_space table_sub">
                                        <thead> 
                                            <tr style="border-bottom: 3px solid #eceff1;">
                                                <th>วันที่</th>
                                                <th>ซื้อ/ขาย</th>
                                                <th>จำนวนหุ้น</th>
                                                <th>มูลค่า</th>
                                                <th>มูลค่าต่อหุ้นเฉลี่ย</th>
                                                <th>หมายเหตุ</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="share-s-tran-tbody">
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <span id="share-t-c-total"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body card_list">
                        <div class="row">
                            <div id="interest_card" class="col-md-12" style="display: none;">
                                <div class="row">
                                    <div class="col-md-9">
                                        <label class="invest-title">ประวัติรับดอกเบี้ยย้อนหลัง 5 ปี</label>
                                        <span class="icon icon-search grey_icon"></span>
                                    </div>
                                    <div class="col-md-3 text-right invest-title">
                                        <button type="button" id="interest_add_btn" class="btn second_bg" data_id=""><span class="icon icon-plus"></span> เพิ่ม</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-chart"  style="display: block; max-width: 100%; max-height: 400px;">
                                                <canvas id="myChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table table-bordered table-center table_invest_list table-striped no_t_space table_sub">
                                        <thead> 
                                            <tr style="border-bottom: 3px solid #eceff1;">
                                                <th width="17%">วันที่</th>
                                                <th width="15%">อัตราดอกเบี้ย</th>
                                                <th width="17%">ดอกเบี้ย</th>
                                                <th >หมายเหตุ</th>
                                                <th width="10%"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="profit-tbody">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="dividend_card" class="col-md-12" style="display: none;">
                                <div class="row">
                                    <div class="col-md-9">
                                        <label class="invest-title">ประวัติเงินปันผลย้อนหลัง 5 ปี</label>
                                        <span class="icon icon-search grey_icon"></span>
                                    </div>
                                    <div class="col-md-3 text-right invest-title">
                                        <button type="button" id="dividend_add_btn" class="btn second_bg" data_id=""><span class="icon icon-plus"></span> เพิ่ม</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-chart"  style="display: block; max-width: 100%; max-height: 400px;">
                                                <canvas id="dividendChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table table-bordered table-center table_invest_list table-striped no_t_space table_sub">
                                        <thead> 
                                            <tr style="border-bottom: 3px solid #eceff1;">
                                                <th>วันที่</th>
                                                <th>ปันผล</th>
                                                <th>จำนวนเงิน</th>
                                                <th>หมายเหตุ</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="dividend-tbody">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="invest_modal" tabindex="-1" role="dialog" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-account">
        <div class="modal-content">
            <div class="modal-header modal-header-confirmSave">
                <h2 class="modal-title">เพิ่มการลงทุน</h2>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(PROJECTPATH.'/invest/edit'); ?>" method="post" id="add_form">
                <input id="invest_id" name="invest_id" type="hidden" value="">
                <input id="invest_type_add_sub" name="invest_type_sub" type="hidden" value=""><!-- For edit process. -->
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">หมวดการลงทุน</label>
                            <div class="col-sm-6">
                                <select id="invest_type_add" name="invest_type" class="form-control m-b-1">
                                    <option value=""></option>
                                    <?php 
                                        foreach($invest_types as $key => $invest_type) {
                                    ?>
                                    <option value="<?php echo $invest_type['id']; ?>"><?php echo $invest_type['name']; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row coop_sav_c_row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">ชื่อผู้รับฝาก</label>
                            <div class="col-sm-6">
                                <input id="sav_c_name" name="sav_c[name]" class="form-control m-b-1 coop_sav_c_input" type="text" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row coop_sav_c_row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">จำนวนเงิน</label>
                            <div class="col-sm-6">
                                <input type="text" id="sav_c_amount" name="sav_c[amount]" class="form-control m-b-1 num_input" onKeyUp="format_the_number_decimal(this)" value="0">
                            </div>
                        </div>
                    </div>
                    <div class="row coop_sav_c_row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">อัตราดอกเบี้ย</label>
                            <div class="col-sm-6">
                                <input id="sav_c_interest" name="sav_c[interest]" class="form-control m-b-1 coop_sav_c_input" type="text" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row coop_sav_c_row">
                        <label class="col-sm-3 control-label right">วันที่ลงทุน</label>
                        <div class="col-sm-6">
                            <div class="input-with-icon">
                                <div class="form-group">
                                    <input id="sav_c_start_date" name="sav_c[start_date]" class="form-control m-b-1 mydate coop_sav_c_input" style="padding-left: 50px;" type="text" value="<?php echo $this->center_function->mydate2date(date('Y-m-d')); ?>" data-date-language="th-th">
                                    <span class="icon icon-calendar input-icon m-f-1"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row coop_sav_c_row">
                        <label class="col-sm-3 control-label right">วันที่ครบกำหนด</label>
                        <div class="col-sm-6">
                            <div class="input-with-icon">
                                <div class="form-group">
                                    <input id="sav_c_due_date" name="sav_c[due_date]" class="form-control m-b-1 mydate coop_sav_c_input" style="padding-left: 50px;" type="text" value="<?php echo $this->center_function->mydate2date(date('Y-m-d')); ?>" data-date-language="th-th">
                                    <span class="icon icon-calendar input-icon m-f-1"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row coop_sav_c_row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">รอบการจ่ายเงิน</label>
                            <div class="col-sm-6">
                                <input id="sav_c_period" name="sav_c[period]" class="form-control m-b-1 coop_sav_c_input" type="text" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row coop_share_c_row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">ชื่อชุมนุม</label>
                            <div class="col-sm-6">
                                <input id="share_c_name" name="share_c[name]" class="form-control m-b-1 coop_share_c_input" type="text" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row coop_share_c_row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">รอบบัญชี</label>
                            <div class="col-sm-6">
                                <input id="share_c_period" name="share_c[period]" class="form-control m-b-1 coop_share_c_input" type="text" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row bond_c_row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">ชื่อรุ่น</label>
                            <div class="col-sm-6">
                                <input id="bond_c_name" name="bond[name]" class="form-control m-b-1 bond_c_input" type="text" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row bond_c_row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">ชื่อหน่วยงานที่ออก</label>
                            <div class="col-sm-6">
                                <input id="bond_c_department_name" name="bond[department_name]" class="form-control m-b-1 bond_c_input" type="text" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row bond_c_row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Credit Rating</label>
                            <div class="col-sm-6">
                                <input id="bond_c_credit_rating" name="bond[credit_rating]" class="form-control m-b-1 bond_c_input" type="text" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row bond_c_row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">จำนวนหน่วย</label>
                            <div class="col-sm-6">
                                <input id="bond_c_unit" name="bond[unit]" class="form-control m-b-1 bond_c_input num_input" onKeyUp="format_the_number_decimal(this)" type="text" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row bond_c_row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">มูลค่าเฉลี่ย</label>
                            <div class="col-sm-6">
                                <input id="bond_c_value_per_unit" name="bond[value_per_unit]" class="form-control m-b-1 bond_c_input num_input" onKeyUp="format_the_number_decimal(this)" type="text" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row bond_c_row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">ผลตอบแทนเฉลี่ย</label>
                            <div class="col-sm-6">
                                <input id="bond_c_aver_profit" name="bond[aver_profit]" class="form-control m-b-1 bond_c_input num_input" onKeyUp="format_the_number_decimal(this)" type="text" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row bond_c_row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">ดอกเบี้ย</label>
                            <div class="col-sm-6">
                                <input id="bond_c_invest_rate_text" name="bond[invest_rate_text]" class="form-control m-b-1 bond_c_input" type="text" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row bond_c_row">
                        <label class="col-sm-3 control-label right">วันที่ซื้อ</label>
                        <div class="col-sm-6">
                            <div class="input-with-icon">
                                <div class="form-group">
                                    <input id="bond_c_start_date" name="bond[start_date]" class="form-control m-b-1 mydate bond_c_input" style="padding-left: 50px;" type="text" value="<?php echo $this->center_function->mydate2date(date('Y-m-d')); ?>" data-date-language="th-th">
                                    <span class="icon icon-calendar input-icon m-f-1"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row bond_c_row">
                        <label class="col-sm-3 control-label right">วันที่ครบกำหนด</label>
                        <div class="col-sm-6">
                            <div class="input-with-icon">
                                <div class="form-group">
                                    <input id="bond_c_due_date" name="bond[due_date]" class="form-control m-b-1 mydate bond_c_input" style="padding-left: 50px;" type="text" value="<?php echo $this->center_function->mydate2date(date('Y-m-d')); ?>" data-date-language="th-th">
                                    <span class="icon icon-calendar input-icon m-f-1"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row bond_c_row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">รอบการจ่ายดอกเบี้ย</label>
                            <div class="col-sm-6">
                                <input id="bond_c_payment_method_text" name="bond[payment_method_text]" class="form-control m-b-1 bond_c_input" type="text" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row coop_share_s_row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">ชื่อหุ้น</label>
                            <div class="col-sm-6">
                                <input id="share_s_name" name="share_s[name]" class="form-control m-b-1 coop_share_s_input" type="text" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row coop_share_s_row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">ตัวย่อ</label>
                            <div class="col-sm-6">
                                <input id="share_s_period" name="share_s[period]" class="form-control m-b-1 coop_share_sinput" type="text" value="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="button" class="btn btn-primary min-width-100" id="submit_add">ตกลง</button>
                        <button class="btn btn-danger min-width-100" type="button" id="cancel_add">ยกเลิก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="interest_modal" tabindex="-1" role="dialog" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-account">
        <div class="modal-content">
            <div class="modal-header modal-header-confirmSave">
                <h2 class="modal-title">เพิ่มประวัติการรับดอกเบี้ย</h2>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(PROJECTPATH.'/invest/add_interest'); ?>" method="post" id="add_interest_form">
                    <input id="add_interest_invest_id" name="invest_id" type="hidden" value="">
                    <input id="add_interest_interest_id" name="id" type="hidden" value="">
                    <div class="row">
                        <label class="col-sm-3 control-label right"> ชื่อชุมนุม </label>
                        <label class="col-sm-3 control-label text-left" id="interest-add-branch-name"></label>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 control-label right"> วันที่ได้รับดอกเบี้ย </label>
                        <div class="col-sm-6">
                            <div class="input-with-icon">
                                <div class="form-group">
                                    <input id="interest_date" name="date" class="form-control m-b-1 mydate" style="padding-left: 50px;" type="text" value="<?php echo $this->center_function->mydate2date(date('Y-m-d')); ?>" data-date-language="th-th">
                                    <span class="icon icon-calendar input-icon m-f-1"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> อัตราดอกเบี้ย </label>
                            <div class="col-sm-6">
                                <input id="interest_rate" name="rate" class="form-control m-b-1 num_input" onKeyUp="format_the_number_decimal(this)" value="0">
                            </div>
                            <label class="col-sm-3 control-label text-left p-l-0"></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> ดอกเบี้ยที่ได้รับ </label>
                            <div class="col-sm-6">
                                <input id="interest_amount" name="amount" class="form-control m-b-1 num_input" onKeyUp="format_the_number_decimal(this)" value="0">
                            </div>
                            <label class="col-sm-3 control-label text-left p-l-0">บาท</label>
                        </div>
                    </div>
                    <div class="row coop_sav_c_row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">หมายเหตุ</label>
                            <div class="col-sm-6">
                                <input id="interest_note" name="note" class="form-control m-b-1" type="text" value="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="button" class="btn btn-primary min-width-100" id="interest_submit_add">ตกลง</button>
                        <button class="btn btn-danger min-width-100" type="button" id="interest_cancel_add">ยกเลิก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="dividend_modal" tabindex="-1" role="dialog" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-account">
        <div class="modal-content">
            <div class="modal-header modal-header-confirmSave">
                <h2 class="modal-title">เพิ่มประวัติการรับเงินปันผล</h2>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(PROJECTPATH.'/invest/add_interest'); ?>" method="post" id="add_dividend_form">
                    <input id="add_dividend_invest_id" name="invest_id" type="hidden" value="">
                    <input id="add_dividend_interest_id" name="id" type="hidden" value="">
                    <div class="row">
                        <label class="col-sm-3 control-label right" id="dividend_branch_name_t_label"> ชื่อชุมนุม </label>
                        <label class="col-sm-3 control-label text-left" id="dividend-add-branch-name"></label>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 control-label right"> วันที่ได้รับปันผล </label>
                        <div class="col-sm-6">
                            <div class="input-with-icon">
                                <div class="form-group">
                                    <input id="dividend_date" name="date" class="form-control m-b-1 mydate" style="padding-left: 50px;" type="text" value="<?php echo $this->center_function->mydate2date(date('Y-m-d')); ?>" data-date-language="th-th">
                                    <span class="icon icon-calendar input-icon m-f-1"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> % ปันผล </label>
                            <div class="col-sm-6">
                                <input id="dividend_rate" name="rate" class="form-control m-b-1 num_input" onKeyUp="format_the_number_decimal(this)" value="0">
                            </div>
                            <label class="col-sm-3 control-label text-left p-l-0">%</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> จำนวนเงิน </label>
                            <div class="col-sm-6">
                                <input id="dividend_amount" name="amount" class="form-control m-b-1 num_input" onKeyUp="format_the_number_decimal(this)" value="0">
                            </div>
                            <label class="col-sm-3 control-label text-left p-l-0">บาท</label>
                        </div>
                    </div>
                    <div class="row coop_sav_c_row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">หมายเหตุ</label>
                            <div class="col-sm-6">
                                <input id="dividend_note" name="note" class="form-control m-b-1" type="text" value="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="button" class="btn btn-primary min-width-100" id="dividend_submit_add">ตกลง</button>
                        <button class="btn btn-danger min-width-100" type="button" id="dividend_cancel_add">ยกเลิก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="share_c_modal" tabindex="-1" role="dialog" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-account">
        <div class="modal-content">
            <div class="modal-header modal-header-confirmSave">
                <h2 class="modal-title">เพิ่มประวัติการซื้อหุ้น</h2>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(PROJECTPATH.'/invest/add_transaction'); ?>" method="post" id="share_c_form">
                    <input id="share_c_m_invest_id" name="invest_id" type="hidden" value="">
                    <input id="share_c_m_tran_id" name="id" type="hidden" value="">
                    <input id="share_c_m_tran_type" name="tran_type" type="hidden" value="1">
                    <div class="row">
                        <label class="col-sm-3 control-label right"> ชื่อชุมนุม </label>
                        <label class="col-sm-3 control-label text-left" id="share_c_m_branch_name"></label>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 control-label right"> วันที่ลงทุน </label>
                        <div class="col-sm-6">
                            <div class="input-with-icon">
                                <div class="form-group">
                                    <input id="share_c_m_date" name="date" class="form-control m-b-1 mydate" style="padding-left: 50px;" type="text" value="<?php echo $this->center_function->mydate2date(date('Y-m-d')); ?>" data-date-language="th-th">
                                    <span class="icon icon-calendar input-icon m-f-1"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> จำนวนหุ้น </label>
                            <div class="col-sm-6">
                                <input id="share_c_m_unit" name="unit" class="form-control m-b-1 num_input" onKeyUp="format_the_number_decimal(this)" value="0">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> มูลค่าหุ้น </label>
                            <div class="col-sm-6">
                                <input id="share_c_m_amount" name="amount" class="form-control m-b-1 num_input" onKeyUp="format_the_number_decimal(this)" value="0">
                            </div>
                        </div>
                    </div>
                    <div class="row coop_sav_c_row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">หมายเหตุ</label>
                            <div class="col-sm-6">
                                <input id="share_c_m_note" name="note" class="form-control m-b-1" type="text" value="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="button" class="btn btn-primary min-width-100" id="share_c_m_submit">ตกลง</button>
                        <button class="btn btn-danger min-width-100" type="button" id="share_c_m_cancel">ยกเลิก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="share_val_modal" tabindex="-1" role="dialog" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-account">
        <div class="modal-content">
            <div class="modal-header modal-header-confirmSave">
                <h2 class="modal-title">แก้ไขมูลค่าหุ้น</h2>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(PROJECTPATH.'/invest/add_invest_interest_value'); ?>" method="post" id="share_val_form">
                    <input id="share_val_invest_id" name="invest_id" type="hidden" value="">
                    <div class="row">
                        <label class="col-sm-3 control-label right"> ชื่อหุ้น </label>
                        <label class="col-sm-3 control-label text-left" id="share_val_branch_name"></label>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 control-label right"> ข้อมูล ณ วันที่ </label>
                        <div class="col-sm-6">
                            <div class="input-with-icon">
                                <div class="form-group">
                                    <input id="share_val_date" name="date" class="form-control m-b-1 mydate" style="padding-left: 50px;" type="text" value="<?php echo $this->center_function->mydate2date(date('Y-m-d')); ?>" data-date-language="th-th">
                                    <span class="icon icon-calendar input-icon m-f-1"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> มูลค่าหุ้น </label>
                            <div class="col-sm-6">
                                <input id="share_val_amount" name="amount" class="form-control m-b-1 num_input" onKeyUp="format_the_number_decimal(this)" value="0">
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="button" class="btn btn-primary min-width-100" id="share_val_submit">ตกลง</button>
                        <button class="btn btn-danger min-width-100" type="button" id="share_val_cancel">ยกเลิก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="share_s_modal" tabindex="-1" role="dialog" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-account">
        <div class="modal-content">
            <div class="modal-header modal-header-confirmSave">
                <h2 class="modal-title">เพิ่มประวัติการซื้อหุ้น</h2>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(PROJECTPATH.'/invest/add_transaction'); ?>" method="post" id="share_s_form">
                    <input id="share_s_m_invest_id" name="invest_id" type="hidden" value="">
                    <input id="share_s_m_tran_id" name="id" type="hidden" value="">
                    <div class="row">
                        <label class="col-sm-3 control-label right"> ชื่อหุ้น </label>
                        <label class="col-sm-3 control-label text-left" id="share_s_m_branch_name"></label>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 control-label right"> วันที่ลงทุน </label>
                        <div class="col-sm-6">
                            <div class="input-with-icon">
                                <div class="form-group">
                                    <input id="share_s_m_date" name="date" class="form-control m-b-1 mydate" style="padding-left: 50px;" type="text" value="<?php echo $this->center_function->mydate2date(date('Y-m-d')); ?>" data-date-language="th-th">
                                    <span class="icon icon-calendar input-icon m-f-1"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> ซื้อ/ขาย </label>
                            <div class="col-sm-6">
                                <span style="">
                                    <input type="radio" name="tran_type" id="tran_type_1" value="1" checked="checked"> ซื้อ &nbsp;&nbsp;
                                    <input type="radio" name="tran_type" id="tran_type_2" value="2"> ขาย &nbsp;&nbsp;
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> จำนวนหุ้น </label>
                            <div class="col-sm-6">
                                <input id="share_s_m_unit" name="unit" class="form-control m-b-1 num_input share_s_cal" onKeyUp="format_the_number_decimal(this)" value="0">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> มูลค่าหุ้น </label>
                            <div class="col-sm-6">
                                <input id="share_s_m_amount" name="amount" class="form-control m-b-1 num_input share_s_cal" onKeyUp="format_the_number_decimal(this)" value="0">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> มูลค่าหุ้นต่อหน่วย </label>
                            <div class="col-sm-6">
                                <label class="col-sm-3 control-label text-left" id="share_s_m_rate">  </label>
                            </div>
                        </div>
                    </div>
                    <div class="row coop_sav_c_row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">หมายเหตุ</label>
                            <div class="col-sm-6">
                                <input id="share_s_m_note" name="note" class="form-control m-b-1" type="text" value="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="button" class="btn btn-primary min-width-100" id="share_s_m_submit">ตกลง</button>
                        <button class="btn btn-danger min-width-100" type="button" id="share_s_m_cancel">ยกเลิก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<form action="<?php echo base_url(PROJECTPATH.'/invest'); ?>" method="post" id="reload_form">
    <input type="hidden" id="reload_invest_id" name="invest_id" value="">;
</form>
<?php
$link = array(
    'src' => PROJECTJSPATH.'assets/js/Chart.min.js',
    'type' => 'text/javascript'
);
echo script_tag($link);
?>
<script>
    current_date_format = "<?php echo $this->center_function->mydate2date(date('Y-m-d')); ?>";
    $(document).ready(function() {
        $(".mydate").datepicker({
			prevText : "ก่อนหน้า",
			nextText: "ถัดไป",
			currentText: "Today",
			changeMonth: true,
			changeYear: true,
			isBuddhist: true,
			monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'],
			dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],
			constrainInput: true,
			dateFormat: "dd/mm/yy",
			yearRange: "c-50:c+10",
			autoclose: true,
        });
        
        <?php
            if(!empty($invest_id)) {
        ?>
        $.blockUI({
			message: 'กรุณารอสักครู่...',
			css: {
				border: 'none',
				padding: '15px',
				backgroundColor: '#000',
				'-webkit-border-radius': '10px',
				'-moz-border-radius': '10px',
				opacity: .5,
				color: '#fff'
			},
			baseZ: 6000,
			bindEvents: false
		});
        display_detail(<?php echo $invest_id;?>);
        <?php
            }
        ?>

        $("#add_invest").click(function() {
            $("#invest_id").val('');
            $("#invest_type_add_sub").val('');
            $('#invest_type_add').prop('disabled', false);
            $('.coop_sav_c_row').hide();
            $('.coop_share_c_row').hide();
            $('.bond_c_row').hide();
            $('.coop_share_s_row').hide();
            $("#invest_modal").modal('show');
        });
        $("#invest_type_add").change(function() {
            type = $(this).val();
            if(type == 1) {
                $('.coop_sav_c_row').show();
                $('.coop_share_c_row').hide();
                $('.bond_c_row').hide();
                $('.coop_share_s_row').hide();
            } else if (type == 2) {
                $('.coop_sav_c_row').hide();
                $('.coop_share_c_row').show();
                $('.bond_c_row').hide();
                $('.coop_share_s_row').hide();
            } else if (type == 3 || type == 4) {
                $('.coop_sav_c_row').hide();
                $('.coop_share_c_row').hide();
                $('.bond_c_row').show();
                $('.coop_share_s_row').hide();
            } else if (type == 5) {
                $('.coop_sav_c_row').hide();
                $('.coop_share_c_row').hide();
                $('.bond_c_row').hide();
                $('.coop_share_s_row').show();
            }
        });
        $("#cancel_add").click(function() {
            $("#invest_modal").modal('hide');
            $("#invest_type_add_sub").val('');
            $("#invest_type_add").val('');
            $('#invest_type_add').prop('disabled', false);
            $("#sav_c_name").val('');
            $("#sav_c_amount").val(0);
            $("#sav_c_interest").val('');
            $("#sav_c_start_date").val(current_date_format);
            $("#sav_c_due_date").val(current_date_format);
            $("#sav_c_period").val('');
            $("#share_c_name").val('');
            $("#share_c_period").val('');
            $("#bond_c_name").val('');
            $("#bond_c_department_name").val('');
            $("#bond_c_credit_rating").val('');
            $("#bond_c_unit").val(0);
            $("#bond_c_value_per_unit").val(0);
            $("#bond_c_aver_profit").val(0);
            $("#bond_c_invest_rate_text").val('');
            $("#bond_c_start_date").val(current_date_format);
            $("#bond_c_due_date").val(current_date_format);
            $("#share_s_name").val('');
            $("#share_s_period").val('');
            $("#bond_c_payment_method_text").val('');
        });
        $("#submit_add").click(function() {
            $(".num_input").each(function(index) {
               $(this).val(removeCommas($(this).val()));
            });
            $.post(base_url+"invest/edit",
            $("#add_form").serialize(),
            function(result) {
                data = JSON.parse(result);
                invest_id = data.invest_id;
                $("#reload_invest_id").val(invest_id);
                $("#reload_form").submit();
			});
        });
        $(".invest_row").click(function() {
            $.blockUI({
                message: 'กรุณารอสักครู่...',
                css: {
                    border: 'none',
                    padding: '15px',
                    backgroundColor: '#000',
                    '-webkit-border-radius': '10px',
                    '-moz-border-radius': '10px',
                    opacity: .5,
                    color: '#fff'
                },
                baseZ: 6000,
                bindEvents: false
            });
            invest_id = $(this).attr("data-id");
            display_detail(invest_id)
        });
        $("#interest_add_btn").click(function() {
            $("#add_interest_invest_id").val($(this).attr("data_id"));
            $("#interest_modal").modal('show');
        });
        $("#interest_cancel_add").click(function() {
            $("#interest_modal").modal("hide");
            $("#interest_date").val(current_date_format);
            $("#interest_rate").val(0);
            $("#interest_amount").val(0);
            $("#interest_note").val("");
            $("#add_interest_invest_id").val("");
            $("#add_interest_interest_id").val("");
        });
        $("#interest_submit_add").click(function() {
            $.blockUI({
                message: 'กรุณารอสักครู่...',
                css: {
                    border: 'none',
                    padding: '15px',
                    backgroundColor: '#000',
                    '-webkit-border-radius': '10px',
                    '-moz-border-radius': '10px',
                    opacity: .5,
                    color: '#fff'
                },
                baseZ: 6000,
                bindEvents: false
            });
            invest_id = $("#add_interest_invest_id").val();
            $("#interest_rate").val(removeCommas($("#interest_rate").val()));
            $("#interest_amount").val(removeCommas($("#interest_amount").val()));
            $.post(base_url+"invest/add_interest",
            $("#add_interest_form").serialize(),
            function(result) {
                data = JSON.parse(result);
                $("#interest_modal").modal("hide");
                $("#interest_date").val(current_date_format);
                $("#interest_rate").val(0);
                $("#interest_amount").val(0);
                $("#interest_note").val("");
                $("#add_interest_invest_id").val("");
                $("#add_interest_interest_id").val("");
                display_detail(invest_id);
			});
        });
        $(document).on("click",".profit-edit-bth",function() {
            id = $(this).attr('data-id');
            $.get(base_url+"invest/get_profit_transaction?id="+id,
            function(result) {
                data = JSON.parse(result);
                transaction = data.data;
                $("#interest_date").val(transaction.date_calender);
                $("#interest_rate").val(transaction.rate_format);
                $("#interest_amount").val(transaction.amount_format);
                $("#interest_note").val(transaction.note);
                $("#add_interest_invest_id").val(transaction.invest_id);
                $("#add_interest_interest_id").val(transaction.id);
                $("#interest_modal").modal("show");
            });
        });
        $("#share_add_tran_btn").click(function() {
            $("#share_c_m_invest_id").val($(this).attr('data_id'));
            $("#share_c_m_tran_id").val("");
            $("#share_c_m_date").val(current_date_format);
            $("#share_c_m_amount").val(0);
            $("#share_c_m_unit").val(0);
            $("#share_c_m_note").val("");
            $("#share_c_modal").modal('show');
        });
        $("#share_c_m_cancel").click(function() {
            $("#share_c_m_invest_id").val($(this).attr('data_id'));
            $("#share_c_m_tran_id").val("");
            $("#share_c_m_date").val(current_date_format);
            $("#share_c_m_amount").val(0);
            $("#share_c_m_unit").val(0);
            $("#share_c_m_note").val("");
            $("#share_c_modal").modal('hide');
        });
        $("#share_c_m_submit").click(function() {
            $.blockUI({
                message: 'กรุณารอสักครู่...',
                css: {
                    border: 'none',
                    padding: '15px',
                    backgroundColor: '#000',
                    '-webkit-border-radius': '10px',
                    '-moz-border-radius': '10px',
                    opacity: .5,
                    color: '#fff'
                },
                baseZ: 6000,
                bindEvents: false
            });
            invest_id = $("#share_c_m_invest_id").val();
            $(".num_input").each(function(index) {
               $(this).val(removeCommas($(this).val()));
            });
            $.post(base_url+"invest/add_transaction",
            $("#share_c_form").serialize(),
            function(result) {
                data = JSON.parse(result);
                $("#share_c_m_invest_id").val("");
                $("#share_c_m_tran_id").val("");
                $("#share_c_m_date").val(current_date_format);
                $("#share_c_m_amount").val(0);
                $("#share_c_m_unit").val(0);
                $("#share_c_m_note").val("");
                $("#share_c_modal").modal('hide');
                display_detail(invest_id);
            });
        });
        $(document).on("click",".s-t-c-edit-bth",function() {
            id = $(this).attr('data-id');
            $.get(base_url+"invest/get_transaction?id="+id,
            function(result) {
                data = JSON.parse(result);
                tran = data.data;
                $("#share_c_m_invest_id").val(tran.invest_id);
                $("#share_c_m_tran_id").val(tran.id);
                $("#share_c_m_date").val(tran.date_calender);
                $("#share_c_m_amount").val(tran.amount_format);
                $("#share_c_m_unit").val(tran.unit);
                $("#share_c_m_note").val(tran.note);
                $("#share_c_modal").modal("show");
            });
        });
        $("#dividend_add_btn").click(function() {
            $("#add_dividend_invest_id").val($(this).attr("data_id"));
            $("#dividend_modal").modal('show');
        });
        $("#dividend_cancel_add").click(function() {
            $("#dividend_modal").modal("hide");
            $("#dividend_date").val(current_date_format);
            $("#dividend_rate").val(0);
            $("#dividend_amount").val(0);
            $("#dividend_note").val("");
            $("#add_dividend_invest_id").val("");
            $("#add_dividend_interest_id").val("");
        });
        $("#dividend_submit_add").click(function() {
            $.blockUI({
                message: 'กรุณารอสักครู่...',
                css: {
                    border: 'none',
                    padding: '15px',
                    backgroundColor: '#000',
                    '-webkit-border-radius': '10px',
                    '-moz-border-radius': '10px',
                    opacity: .5,
                    color: '#fff'
                },
                baseZ: 6000,
                bindEvents: false
            });
            $(".num_input").each(function(index) {
               $(this).val(removeCommas($(this).val()));
            });
            invest_id = $("#add_dividend_invest_id").val();
            $("#dividend_rate").val(removeCommas($("#dividend_rate").val()));
            $("#dividend_amount").val(removeCommas($("#dividend_amount").val()));
            $.post(base_url+"invest/add_interest",
            $("#add_dividend_form").serialize(),
            function(result) {
                data = JSON.parse(result);
                $("#dividend_modal").modal("hide");
                $("#dividend_date").val(current_date_format);
                $("#dividend_rate").val(0);
                $("#dividend_amount").val(0);
                $("#dividend_note").val("");
                $("#add_dividend_invest_id").val("");
                $("#add_dividend_interest_id").val("");
                display_detail(invest_id);
			});
        });
        $(document).on("click",".dividend-edit-bth",function() {
            id = $(this).attr('data-id');
            $.get(base_url+"invest/get_profit_transaction?id="+id,
            function(result) {
                data = JSON.parse(result);
                transaction = data.data;
                $("#dividend_date").val(transaction.date_calender);
                $("#dividend_rate").val(transaction.rate_format);
                $("#dividend_amount").val(transaction.amount_format);
                $("#dividend_note").val(transaction.note);
                $("#add_dividend_invest_id").val(transaction.invest_id);
                $("#add_dividend_interest_id").val(transaction.id);
                $("#dividend_modal").modal("show");
            });
        });
        $("#sav_c_edit_btn").click(function() {
            $('.coop_sav_c_row').show();
            $('.coop_share_c_row').hide();
            id = $(this).attr('data_id');
            $.get(base_url+"invest/get_invest_by_id?id="+id,
            function(result) {
                data = JSON.parse(result);
                invest = data.data;
                $("#invest_id").val(invest.id);
                $("#invest_type_add").val(invest.type);
                $('#invest_type_add').prop('disabled', true);
                $("#invest_type_add_sub").val(invest.type);
                $("#sav_c_name").val(invest.name);
                $("#sav_c_amount").val(invest.amount_format);
                $("#sav_c_interest").val(invest.detail.invest_rate_text);
                $("#sav_c_start_date").val(invest.detail.start_date_calender);
                $("#sav_c_due_date").val(invest.detail.end_date_calender);
                $("#sav_c_period").val(invest.detail.payment_method_text);
                $("#bond_c_name").val('');
                $("#bond_c_department_name").val('');
                $("#bond_c_credit_rating").val('');
                $("#bond_c_unit").val(0);
                $("#bond_c_value_per_unit").val(0);
                $("#bond_c_aver_profit").val(0);
                $("#bond_c_invest_rate_text").val('');
                $("#bond_c_start_date").val(current_date_format);
                $("#bond_c_due_date").val(current_date_format);
                $("#bond_c_payment_method_text").val('');
                $("#share_s_name").val('');
                $("#share_s_period").val('');
                $('.coop_sav_c_row').show();
                $('.coop_share_c_row').hide();
                $('.bond_c_row').hide();
                $('.coop_share_s_row').hide();
                $("#invest_modal").modal("show");
            });
        });
        $("#bond_edit_btn").click(function() {
            id = $(this).attr('data_id');
            $.get(base_url+"invest/get_invest_by_id?id="+id,
            function(result) {
                data = JSON.parse(result);
                invest = data.data;
                $("#invest_id").val(invest.id);
                $("#invest_type_add").val(invest.type);
                $('#invest_type_add').prop('disabled', true);
                $("#invest_type_add_sub").val(invest.type);
                $("#sav_c_name").val('');
                $("#sav_c_amount").val(0);
                $("#sav_c_interest").val('');
                $("#sav_c_start_date").val(current_date_format);
                $("#sav_c_due_date").val(current_date_format);
                $("#sav_c_period").val('');
                $("#share_c_name").val('');
                $("#share_c_period").val('');
                $("#bond_c_name").val(invest.detail.name);
                $("#bond_c_department_name").val(invest.name);
                $("#bond_c_credit_rating").val(invest.detail.credit_rating);
                $("#bond_c_unit").val(invest.detail.unit_format);
                $("#bond_c_value_per_unit").val(invest.detail.value_per_unit_format);
                $("#bond_c_aver_profit").val(invest.detail.aver_profit_format);
                $("#bond_c_invest_rate_text").val(invest.detail.invest_rate_text);
                $("#bond_c_start_date").val(invest.detail.start_date_calender);
                $("#bond_c_due_date").val(invest.detail.end_date_calender);
                $("#bond_c_payment_method_text").val(invest.detail.payment_method_text);
                $("#share_s_name").val('');
                $("#share_s_period").val('');
                $('.coop_sav_c_row').hide();
                $('.coop_share_c_row').hide();
                $('.bond_c_row').show();
                $('.coop_share_s_row').hide();
                $("#invest_modal").modal("show");
            });
        });
        $("#share_c_edit_btn").click(function() {
            id = $(this).attr('data_id');
            $.get(base_url+"invest/get_invest_by_id?id="+id,
            function(result) {
                data = JSON.parse(result);
                invest = data.data;
                $("#invest_id").val(invest.id);
                $("#invest_type_add").val(invest.type);
                $('#invest_type_add').prop('disabled', true);
                $("#invest_type_add_sub").val(invest.type);
                $("#sav_c_name").val('');
                $("#sav_c_amount").val(0);
                $("#sav_c_interest").val('');
                $("#sav_c_start_date").val(current_date_format);
                $("#sav_c_due_date").val(current_date_format);
                $("#sav_c_period").val('');
                $("#share_c_name").val(invest.name);
                $("#share_c_period").val(invest.detail.payment_method_text);
                $("#bond_c_name").val('');
                $("#bond_c_department_name").val('');
                $("#bond_c_credit_rating").val('');
                $("#bond_c_unit").val(0);
                $("#bond_c_value_per_unit").val(0);
                $("#bond_c_aver_profit").val(0);
                $("#bond_c_invest_rate_text").val('');
                $("#bond_c_start_date").val(current_date_format);
                $("#bond_c_due_date").val(current_date_format);
                $("#bond_c_payment_method_text").val('');
                $("#share_s_name").val('');
                $("#share_s_period").val('');
                $('.coop_sav_c_row').hide();
                $('.coop_share_c_row').show();
                $('.bond_c_row').hide();
                $('.coop_share_s_row').hide();
                $("#invest_modal").modal("show");
            });
        });
        $("#share_s_edit_btn").click(function() {
            id = $(this).attr('data_id');
            $.get(base_url+"invest/get_invest_by_id?id="+id,
            function(result) {
                data = JSON.parse(result);
                invest = data.data;
                $("#invest_id").val(invest.id);
                $("#invest_type_add").val(invest.type);
                $('#invest_type_add').prop('disabled', true);
                $("#invest_type_add_sub").val(invest.type);
                $("#sav_c_name").val('');
                $("#sav_c_amount").val(0);
                $("#sav_c_interest").val('');
                $("#sav_c_start_date").val(current_date_format);
                $("#sav_c_due_date").val(current_date_format);
                $("#sav_c_period").val('');
                $("#share_c_name").val(invest.name);
                $("#share_c_period").val(invest.detail.payment_method_text);
                $("#bond_c_name").val('');
                $("#bond_c_department_name").val('');
                $("#bond_c_credit_rating").val('');
                $("#bond_c_unit").val(0);
                $("#bond_c_value_per_unit").val(0);
                $("#bond_c_aver_profit").val(0);
                $("#bond_c_invest_rate_text").val('');
                $("#bond_c_start_date").val(current_date_format);
                $("#bond_c_due_date").val(current_date_format);
                $("#bond_c_payment_method_text").val('');
                $("#share_s_name").val(invest.name);
                $("#share_s_period").val(invest.detail.name);
                $('.coop_sav_c_row').hide();
                $('.coop_share_c_row').hide();
                $('.bond_c_row').hide();
                $('.coop_share_s_row').show();
                $("#invest_modal").modal("show");
            });
        });

        $("#share_s_rate_edit_btn").click(function() {
            id = $(this).attr('data_id');
            $.get(base_url+"invest/get_invest_share_value?id="+id,
            function(result) {
                data = JSON.parse(result);
                date = current_date_format;
                share_val = 0;
                if(data.share_val && data.share_val.last) {
                    share_val = data.share_val.last.value_format;
                }
                $("#share_val_invest_id").val(id);
                $("#share_val_date").val(date);
                $("#share_val_amount").val(share_val);
                $("#share_val_branch_name").html($("#share_s_t_name").text());
                $("#share_val_modal").modal('show');
            });
        });
        $("#share_val_cancel").click(function() {
            $("#share_val_date").val(current_date_format);
            $("#share_val_amount").val(0);
            $("#share_val_modal").modal('hide');
        });
        $("#share_val_submit").click(function() {
            $.blockUI({
                message: 'กรุณารอสักครู่...',
                css: {
                    border: 'none',
                    padding: '15px',
                    backgroundColor: '#000',
                    '-webkit-border-radius': '10px',
                    '-moz-border-radius': '10px',
                    opacity: .5,
                    color: '#fff'
                },
                baseZ: 6000,
                bindEvents: false
            });
            $(".num_input").each(function(index) {
                $(this).val(removeCommas($(this).val()));
            });
            $.post(base_url+"invest/add_invest_share_value",
            $("#share_val_form").serialize(),
            function(result) {
                data = JSON.parse(result);
                invest_id = $("#share_val_invest_id").val();
                $("#share_val_modal").modal('hide');
                display_detail(invest_id);
			});
        });
        $("#share_s_add_tran_btn").click(function() {
            id = $(this).attr('data_id');
            $("#share_s_m_invest_id").val(id);
            $("#share_s_m_tran_id").val("");
            $("#share_s_m_date").val(current_date_format);
            $("#share_s_m_unit").val(0);
            $("#share_s_m_amount").val(0);
            $("#share_s_m_rate").html('0.00');
            $("#share_s_m_note").val("");
            $("#share_s_modal").modal('show');
        });
        $(document).on("click",".s-t-s-edit-bth",function() {
            id = $(this).attr('data-id');
            $.get(base_url+"invest/get_transaction?id="+id,
            function(result) {
                data = JSON.parse(result);
                tran = data.data;
                $("#share_s_m_invest_id").val(tran.invest_id);
                $("#share_s_m_tran_id").val(tran.id);
                $("#share_s_m_date").val(tran.date_calender);
                $("#share_s_m_unit").val(tran.unit);
                $("#share_s_m_amount").val(tran.amount_format);
                $("#share_s_m_rate").html(tran.value_per_unit_format);
                $("#share_s_m_note").val(tran.note);
                $("#share_s_modal").modal('show');
            });
        });
        $("#share_s_m_cancel").click(function() {
            $("#share_s_m_tran_id").val("");
            $("#share_s_m_date").val(current_date_format);
            $("#share_s_m_unit").val(0);
            $("#share_s_m_amount").val(0);
            $("#share_s_m_rate").html('0.00');
            $("#share_s_m_note").val("");
            $("#share_s_modal").modal('hide');
        });
        $("#share_s_m_submit").click(function() {
            $.blockUI({
                message: 'กรุณารอสักครู่...',
                css: {
                    border: 'none',
                    padding: '15px',
                    backgroundColor: '#000',
                    '-webkit-border-radius': '10px',
                    '-moz-border-radius': '10px',
                    opacity: .5,
                    color: '#fff'
                },
                baseZ: 6000,
                bindEvents: false
            });
            $(".num_input").each(function(index) {
                $(this).val(removeCommas($(this).val()));
            });
            invest_id = $("#share_s_m_invest_id").val();
            $.post(base_url+"invest/add_transaction",
            $("#share_s_form").serialize(),
            function(result) {
                data = JSON.parse(result);
                $("#share_s_modal").modal('hide');
                display_detail(invest_id);
			});
        });
        $(".share_s_cal").keypress(function() {
            if(!$("#share_s_m_unit").val() || !$("#share_s_m_amount").val()) {
                $("#share_s_m_rate").html('0.00');
            } else {
                unit = parseFloat(removeCommas($("#share_s_m_unit").val()));
                val = parseFloat(removeCommas($("#share_s_m_amount").val()));
                val_per_unit = val / unit;
                val_per_unit = Math.round(val_per_unit*100)/100;
                val_per_unit = val_per_unit.toLocaleString('en');
                $("#share_s_m_rate").html(val_per_unit);
            }
        });
        $(".share_s_cal").change(function() {
            if(!$("#share_s_m_unit").val() || !$("#share_s_m_amount").val()) {
                $("#share_s_m_rate").html('0.00');
            } else {
                unit = parseFloat(removeCommas($("#share_s_m_unit").val()));
                val = parseFloat(removeCommas($("#share_s_m_amount").val()));
                val_per_unit = val / unit;
                val_per_unit = Math.round(val_per_unit*100)/100;
                val_per_unit = val_per_unit.toLocaleString('en');
                $("#share_s_m_rate").html(val_per_unit);
            }
        });

        $(document).on("click",".dividend-del-bth",function() {
            id = $(this).attr('data-id');
            swal({
				title: "คุณต้องการที่จะลบใช่หรือไม่",
				text: "",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: '#DD6B55',
				confirmButtonText: 'ลบ',
				cancelButtonText: "ยกเลิก",
				closeOnConfirm: true,
				closeOnCancel: true
			},
			function (isConfirm) {
				if (isConfirm) {
					$.blockUI({
                        message: 'กรุณารอสักครู่...',
                        css: {
                            border: 'none',
                            padding: '15px',
                            backgroundColor: '#000',
                            '-webkit-border-radius': '10px',
                            '-moz-border-radius': '10px',
                            opacity: .5,
                            color: '#fff'
                        },
                        baseZ: 6000,
                        bindEvents: false
                    });
                    $.post(base_url+"invest/remove_profit",
                    {id:id},
                    function(result) {
                        data = JSON.parse(result);
                        display_detail($("#dividend_add_btn").attr('data_id'));
                    });
				}
			});
        });
        $(document).on("click",".profit-del-bth",function() {
            id = $(this).attr('data-id');
            swal({
				title: "คุณต้องการที่จะลบใช่หรือไม่",
				text: "",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: '#DD6B55',
				confirmButtonText: 'ลบ',
				cancelButtonText: "ยกเลิก",
				closeOnConfirm: true,
				closeOnCancel: true
			},
			function (isConfirm) {
				if (isConfirm) {
					$.blockUI({
                        message: 'กรุณารอสักครู่...',
                        css: {
                            border: 'none',
                            padding: '15px',
                            backgroundColor: '#000',
                            '-webkit-border-radius': '10px',
                            '-moz-border-radius': '10px',
                            opacity: .5,
                            color: '#fff'
                        },
                        baseZ: 6000,
                        bindEvents: false
                    });
                    $.post(base_url+"invest/remove_profit",
                    {id:id},
                    function(result) {
                        data = JSON.parse(result);
                        display_detail($("#interest_add_btn").attr('data_id'));
                    });
				}
			});
        });
        $(document).on("click", ".s-t-c-del-bth", function() {
            id = $(this).attr('data-id');
            swal({
				title: "คุณต้องการที่จะลบใช่หรือไม่",
				text: "",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: '#DD6B55',
				confirmButtonText: 'ลบ',
				cancelButtonText: "ยกเลิก",
				closeOnConfirm: true,
				closeOnCancel: true
			},
			function (isConfirm) {
				if (isConfirm) {
					$.blockUI({
                        message: 'กรุณารอสักครู่...',
                        css: {
                            border: 'none',
                            padding: '15px',
                            backgroundColor: '#000',
                            '-webkit-border-radius': '10px',
                            '-moz-border-radius': '10px',
                            opacity: .5,
                            color: '#fff'
                        },
                        baseZ: 6000,
                        bindEvents: false
                    });
                    $.post(base_url+"invest/remove_transactrion",
                    {id:id},
                    function(result) {
                        data = JSON.parse(result);
                        display_detail($("#share_add_tran_btn").attr('data_id'));
                    });
				}
			});
        });
        $(document).on("click", ".s-t-s-del-bth", function() {
            id = $(this).attr('data-id');
            swal({
				title: "คุณต้องการที่จะลบใช่หรือไม่",
				text: "",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: '#DD6B55',
				confirmButtonText: 'ลบ',
				cancelButtonText: "ยกเลิก",
				closeOnConfirm: true,
				closeOnCancel: true
			},
			function (isConfirm) {
				if (isConfirm) {
					$.blockUI({
                        message: 'กรุณารอสักครู่...',
                        css: {
                            border: 'none',
                            padding: '15px',
                            backgroundColor: '#000',
                            '-webkit-border-radius': '10px',
                            '-moz-border-radius': '10px',
                            opacity: .5,
                            color: '#fff'
                        },
                        baseZ: 6000,
                        bindEvents: false
                    });
                    $.post(base_url+"invest/remove_transactrion",
                    {id:id},
                    function(result) {
                        data = JSON.parse(result);
                        display_detail($("#share_s_add_tran_btn").attr('data_id'));
                    });
				}
			});
        });
    });

    function display_detail(invest_id) {
        $(".selected_invest").removeClass("selected_invest");
        $("#invest_row_"+invest_id).addClass("selected_invest");
       
        $("#interest_add_btn").attr("data_id", invest_id);

        $.get(base_url+"invest/get_invest_by_id?id="+invest_id,
        function(result) {
            data = JSON.parse(result);
            invest = data.data;

            $("#invest_name_"+invest_id).html(invest.name);
            $("#invest_amount_"+invest_id).html(invest.amount_format);
            $("#invest_update_date_"+invest_id).html(invest.update_date_thai);
            $("#invest_status_"+invest_id).html(invest.status == 1 ? "Active" : "Inactive");
            if(invest.type == 1) {
                $("#sav_c_edit_btn").attr("data_id", invest_id);
                $("#sav_c_t_name").html(invest.name);
                $("#interest-add-branch-name").html(invest.name);
                $("#sav_c_t_amount").html(invest.amount_format);
                interval = "";
                if(invest.detail.invest_interval_left) {
                    if(invest.detail.invest_interval_left.y) {
                        interval += invest.detail.invest_interval_left.y + " ปี ";
                    }
                    if(invest.detail.invest_interval_left.m) {
                        interval += invest.detail.invest_interval_left.m + " เดือน ";
                    }
                    if(invest.detail.invest_interval_left.d) {
                        interval += invest.detail.invest_interval_left.d + " วัน ";
                    }
                }
                $("#sav_c_t_time_left").html(interval);
                $("#sav_c_t_balance").html(invest.total_balance_format);
                $("#sav_c_t_profit").html(invest.sum_profit_format);
                $("#sav_c_d_amount").html(invest.amount_format);
                if(invest.detail) {
                    detail = invest.detail;
                    $("#sav_c_d_interest").html(detail.invest_rate_text);
                    $("#sav_c_d_start_date").html(detail.start_date_thai);
                    $("#sav_c_d_due_date").html(detail.end_date_thai);
                    $("#sav_c_d_period").html(detail.payment_method_text);
                } else {
                    $("#sav_c_d_interest").html("");
                    $("#sav_c_d_start_date").html("");
                    $("#sav_c_d_due_date").html("");
                    $("#sav_c_d_period").html("");
                }
                status = invest.status == 1 ? 'Active' : 'Inactive';
                $("#sav_c_d_status").html(status);

                profit_ele = $("#profit-tbody");
                profit_ele.html("");
                chart_labels = [''];
                total_profit = invest.profit_perv_sum ? invest.profit_perv_sum : 0;
                chart_values = [total_profit];
                if(invest.profits) {
                    for(i=0; i < invest.profits.length; i++) {
                        profit = invest.profits[i];
                        td = $(`<tr>
                                    <td class="text-center no_size_padding">`+profit.date_format+`</td>
                                    <td class="text-center no_size_padding">`+profit.rate+` % </td>
                                    <td class="text-right no_size_padding">`+profit.amount_format+`</td>
                                    <td class="text-left">`+profit.note+`</td>
                                    <td class="no_size_padding">
                                        <a class="profit-edit-bth" id="profit-edit-bth-`+profit.id+`" data-id="`+profit.id+`" href="javascript:void(0)">แก้ไข</a>
                                        <a class="profit-del-bth text-danger" id="profit-del-bth-`+profit.id+`" data-id="`+profit.id+`" href="javascript:void(0)">ลบ</a>
                                    </td>
                                </tr>`);
                        profit_ele.append(td);
                        chart_labels.push(profit.date_format);
                        total_profit += parseFloat(profit.amount);
                        chart_values.push(profit.rate);
                    }
                }
                chart_labels.push('');

                diff_percent = Math.round(((total_profit*100)/invest.amount)*100)/100;
                if(diff_percent > 0) {
                    $("#sav_c_diff_percent").html("+"+diff_percent+"%");
                    $("#sav_c_diff_percent_arrow").show();
                } else {
                    $("#sav_c_diff_percent").html("");
                    $("#sav_c_diff_percent_arrow").hide();
                }
                var ctx = document.getElementById('myChart');
                var ctx1 = ctx.getContext('2d');
                const gradient = ctx1.createLinearGradient(0, 0, 0, 400);
                gradient.addColorStop(0, 'rgba(250,0,0,1)');   
                gradient.addColorStop(1, 'rgba(250,0,0,0)');
                var myChart = new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                            labels: chart_labels,
                                            datasets: [{
                                                data: chart_values,
                                                backgroundColor : gradient,
                                                borderColor: [
                                                    'rgba(255, 99, 132, 1)'
                                                ],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                yAxes: [{
                                                    ticks: {
                                                        beginAtZero: true
                                                    }
                                                }],
                                                xAxes: [{
                                                    gridLines : {
                                                        display : false
                                                    }
                                                }]
                                            },
                                            legend: {
                                                display: false
                                            }
                                        }
                                    });
                $("#sav_c_detail").show();
                $("#share_c_detail").hide();
                $("#bond_c_detail").hide();
                $("#share_s_detail").hide();

                $("#interest_card").show();
                $("#dividend_card").hide();
            } else if (invest.type == 2) {
                $("#share_c_t_name").html(invest.name);
                $("#share_c_m_branch_name").html(invest.name);
                $("#share_c_t_amount").html(invest.amount_format);
                $("#share_c_t_balance").html(invest.total_profit_format);
                $("#share_add_tran_btn").attr("data_id", invest_id);
                $("#share_c_t_amount").html(invest.amount_format);
                $("#share_c_t_balance").html(invest.total_profit_format);
                $("#dividend-add-branch-name").html(invest.name);
                $("#dividend_add_btn").attr("data_id", invest_id);
                $("#share_c_edit_btn").attr("data_id", invest_id);
                $("#dividend_branch_name_t_label").html('ชื่อชุมนุม');
                tran_ele = $("#share-tran-tbody");
                tran_ele.html("");
                value_per_unit = 0;
                if(invest.transactions) {
                    for(i=0; i < invest.transactions.length; i++) {
                        tran = invest.transactions[i];
                        td = $(`<tr>
                                    <td class="text-center no_size_padding">`+tran.date_format+`</td>
                                    <td class="text-right no_size_padding">`+tran.unit_format+`</td>
                                    <td class="text-right no_size_padding">`+tran.amount_format+`</td>
                                    <td class="text-left">`+tran.note+`</td>
                                    <td class="no_size_padding">
                                        <a class="s-t-c-edit-bth" id="s-t-c-edit-bth-`+tran.id+`" data-id="`+tran.id+`" href="javascript:void(0)">แก้ไข</a>
                                        <a class="s-t-c-del-bth text-danger" id="s-t-c-del-bth-`+tran.id+`" data-id="`+tran.id+`" href="javascript:void(0)">ลบ</a>
                                    </td>
                                </tr>`);
                        tran_ele.append(td);
                        value_per_unit = tran.value_per_unit;
                    }
                }
                td = $(`<tr>
                            <td class="text-center no_size_padding"></td>
                            <td class="text-center no_size_padding"><label>รวม</label></td>
                            <td class="text-right no_size_padding"><label>`+invest.tran_total_amount_format+`</label></td>
                            <td class="text-left"></td>
                            <td class="no_size_padding"></td>
                        </tr>`);
                tran_ele.append(td);

                profit_ele = $("#dividend-tbody");
                profit_ele.html("");
                chart_labels = [''];
                total_profit = invest.profit_perv_sum ? invest.profit_perv_sum : 0;
                chart_values = [total_profit];
                if(invest.profits) {
                    for(i=0; i < invest.profits.length; i++) {
                        profit = invest.profits[i];
                        td = $(`<tr>
                                    <td class="text-center no_size_padding">`+profit.date_format+`</td>
                                    <td class="text-center no_size_padding">`+profit.rate+` % </td>
                                    <td class="text-right no_size_padding">`+profit.amount_format+`</td>
                                    <td class="text-left">`+profit.note+`</td>
                                    <td class="no_size_padding">
                                        <a class="dividend-edit-bth" id="dividend-edit-bth-`+profit.id+`" data-id="`+profit.id+`" href="javascript:void(0)">แก้ไข</a>
                                        <a class="dividend-del-bth text-danger" id="dividend-del-bth-`+profit.id+`" data-id="`+profit.id+`" href="javascript:void(0)">ลบ</a>
                                    </td>
                                </tr>`);
                        profit_ele.append(td);
                        chart_labels.push(profit.date_format);
                        total_profit += parseFloat(profit.amount);
                        chart_values.push(profit.rate);
                    }
                }
                chart_labels.push("");
                var ctx = document.getElementById('dividendChart');
                var ctx1 = ctx.getContext('2d');
                const gradient = ctx1.createLinearGradient(0, 0, 0, 400);
                gradient.addColorStop(0, 'rgba(250,0,0,1)');   
                gradient.addColorStop(1, 'rgba(250,0,0,0)');
                var myChart = new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                            labels: chart_labels,
                                            datasets: [{
                                                data: chart_values,
                                                backgroundColor : gradient,
                                                borderColor: [
                                                    'rgba(255, 99, 132, 1)'
                                                ],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                yAxes: [{
                                                    ticks: {
                                                        beginAtZero: true
                                                    }
                                                }],
                                                xAxes: [{
                                                    gridLines : {
                                                        display : false
                                                    }
                                                }]
                                            },
                                            legend: {
                                                display: false
                                            }
                                        }
                                    });

                $("#sav_c_detail").hide();
                $("#share_c_detail").show();
                $("#bond_c_detail").hide();
                $("#share_s_detail").hide();

                $("#interest_card").hide();
                $("#dividend_card").show();
            } else if (invest.type == 3 || invest.type == 4) {
                $("#bond_edit_btn").attr("data_id", invest_id);
                $("#bond_t_name").html(invest.name);
                $("#interest-add-branch-name").html(invest.name);
                $("#bond_t_amount").html(invest.amount_format);
                if(invest.type == 3) {
                    $("#bond_help_title").show();
                    $("#share_p_help_title").hide();
                } else {
                    $("#bond_help_title").hide();
                    $("#share_p_help_title").show();
                }
                interval = "";
                if(invest.detail.invest_interval_left) {
                    if(invest.detail.invest_interval_left.y) {
                        interval += invest.detail.invest_interval_left.y + " ปี ";
                    }
                    if(invest.detail.invest_interval_left.m) {
                        interval += invest.detail.invest_interval_left.m + " เดือน ";
                    }
                    if(invest.detail.invest_interval_left.d) {
                        interval += invest.detail.invest_interval_left.d + " วัน ";
                    }
                }
                $("#bond_t_time_left").html(interval);
                $("#bond_t_balance").html(invest.total_balance_format);
                $("#bond_t_profit").html(invest.sum_profit_format);
                $("#bond_d_name").html(invest.amount_format);
                if(invest.detail) {
                    detail = invest.detail;
                    $("#bond_d_name").html(detail.name);
                    $("#bond_d_credit_rating").html(detail.credit_rating);
                    $("#bond_d_unit").html(detail.unit);
                    $("#bond_d_value_per_unit").html(detail.value_per_unit_format);
                    $("#bond_d_aver_profit").html(detail.aver_profit_format);
                    $("#bond_d_interest").html(detail.invest_rate_text);
                    $("#bond_d_start_date").html(detail.start_date_thai);
                    $("#bond_d_due_date").html(detail.end_date_thai);
                    $("#bond_d_payment_method_text").html(detail.payment_method_text);
                } else {
                    $("#bond_d_name").html("");
                    $("#bond_d_credit_rating").html("");
                    $("#bond_d_unit").html("");
                    $("#bond_d_value_per_unit").html("");
                    $("#bond_d_aver_profit").html("");
                    $("#bond_d_interest").html("");
                    $("#bond_d_start_date").html("");
                    $("#bond_d_due_date").html("");
                    $("#bond_d_payment_method_text").html("");
                }

                profit_ele = $("#profit-tbody");
                profit_ele.html("");
                chart_labels = [''];
                total_profit = invest.profit_perv_sum ? invest.profit_perv_sum : 0;
                chart_values = [total_profit];
                if(invest.profits) {
                    for(i=0; i < invest.profits.length; i++) {
                        profit = invest.profits[i];
                        td = $(`<tr>
                                    <td class="text-center no_size_padding">`+profit.date_format+`</td>
                                    <td class="text-center no_size_padding">`+profit.rate+` % </td>
                                    <td class="text-right no_size_padding">`+profit.amount_format+`</td>
                                    <td class="text-left">`+profit.note+`</td>
                                    <td class="no_size_padding">
                                        <a class="profit-edit-bth" id="profit-edit-bth-`+profit.id+`" data-id="`+profit.id+`" href="javascript:void(0)">แก้ไข</a>
                                        <a class="profit-del-bth text-danger" id="profit-del-bth-`+profit.id+`" data-id="`+profit.id+`" href="javascript:void(0)">ลบ</a>
                                    </td>
                                </tr>`);
                        profit_ele.append(td);
                        chart_labels.push(profit.date_format);
                        total_profit += parseFloat(profit.amount);
                        chart_values.push(profit.rate);
                    }
                }
                chart_labels.push('');

                diff_percent = Math.round(((total_profit*100)/invest.amount)*100)/100;
                if(diff_percent > 0) {
                    $("#bond_diff_percent").html("+"+diff_percent+"%");
                    $("#bond_diff_percent_arrow").show();
                } else {
                    $("#bond_diff_percent").html("");
                    $("#bond_diff_percent_arrow").hide();
                }
                
                var ctx = document.getElementById('myChart');
                var ctx1 = ctx.getContext('2d');
                const gradient = ctx1.createLinearGradient(0, 0, 0, 400);
                gradient.addColorStop(0, 'rgba(250,0,0,1)');   
                gradient.addColorStop(1, 'rgba(250,0,0,0)');
                var myChart = new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                            labels: chart_labels,
                                            datasets: [{
                                                data: chart_values,
                                                backgroundColor : gradient,
                                                borderColor: [
                                                    'rgba(255, 99, 132, 1)'
                                                ],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                yAxes: [{
                                                    ticks: {
                                                        beginAtZero: true
                                                    }
                                                }],
                                                xAxes: [{
                                                    gridLines : {
                                                        display : false
                                                    }
                                                }]
                                            },
                                            legend: {
                                                display: false
                                            }
                                        }
                                    });

                $("#sav_c_detail").hide();
                $("#share_c_detail").hide();
                $("#bond_c_detail").show();
                $("#share_s_detail").hide();

                $("#interest_card").show();
                $("#dividend_card").hide();
            } else if (invest.type == 5) {
                $("#share_s_t_name").html(invest.name);
                $("#share_s_t_amount").html(invest.amount_format);
                $("#share_s_t_balance").html(invest.tran_total_amount_n_profit_format);
                $("#share_s_rate_edit_btn").attr("data_id", invest.id);
                $("#share_s_m_branch_name").html(invest.name);
                $("#share_s_edit_btn").attr("data_id", invest.id);
                $("#share_s_add_tran_btn").attr("data_id", invest.id);
                $("#dividend_add_btn").attr("data_id", invest.id);
                $("#dividend-add-branch-name").html(invest.name);
                $("#dividend_branch_name_t_label").html('ชื่อหุ้น');
                share_value = data.share_value;
                if(share_value && share_value.last) {
                    diff = share_value.last.value - share_value.first.value;
                    if(diff > 0) {
                        $("#share_s_rate_diff").html("+"+diff+"%");
                        $("#share_s_rate_diff_arrow_plus").show();
                        $("#share_s_rate_diff_arrow_minus").hide();
                        $("#share_s_rate_diff").addClass("helpblock_plus");
                        $("#share_s_rate_diff").removeClass("helpblock_minus");
                    } else if (diff < 0) {
                        diff = diff * (-1);
                        $("#share_s_rate_diff").html("+"+diff+"%");
                        $("#share_s_rate_diff_arrow_plus").hide();
                        $("#share_s_rate_diff_arrow_minus").show();
                        $("#share_s_rate_diff").removeClass("helpblock_plus");
                        $("#share_s_rate_diff").addClass("helpblock_minus");
                    } else {
                        $("#share_s_rate_diff").html("");
                        $("#share_s_rate_diff_arrow_plus").hide();
                        $("#share_s_rate_diff_arrow_minus").hide();
                        $("#share_s_rate_diff").removeClass("helpblock_plus");
                        $("#share_s_rate_diff").removeClass("helpblock_minus");
                    }
                    $("#share_s_t_rate").html(share_value.last.value_format);
                    $("#share_s_rate_date").html("มูลค่าหุ้น ณ "+share_value.last.date_thai);
                }

                $("#share_s_t_balance").html(invest.tran_fif_total_amount_format);
                diff = invest.tran_fif_total_amount - invest.amount;
                if(diff > 0) {
                    $("#share_s_diff_percent").html("+"+diff+"%");
                    $("#share_s_diff_percent_arrow_plus").show();
                    $("#share_s_diff_percent_arrow_minus").hide();
                    $("#share_s_diff_percent").addClass("helpblock_plus");
                    $("#share_s_diff_percent").removeClass("helpblock_minus");
                } else if (diff < 0) {
                    diff = diff * (-1);
                    $("#share_s_diff_percent").html("+"+diff+"%");
                    $("#share_s_diff_percent_arrow_plus").hide();
                    $("#share_s_diff_percent_arrow_minus").show();
                    $("#share_s_diff_percent").removeClass("helpblock_plus");
                    $("#share_s_diff_percent").addClass("helpblock_minus");
                } else {
                    $("#share_s_diff_percent").html("");
                    $("#share_s_diff_percent_arrow_plus").hide();
                    $("#share_s_diff_percent_arrow_minus").hide();
                    $("#share_s_diff_percent").removeClass("helpblock_plus");
                    $("#share_s_diff_percent").removeClass("helpblock_minus");
                }

                $("#share_s_t_profit").html(invest.sum_profit_format);

                tran_ele = $("#share-s-tran-tbody");
                tran_ele.html("");
                value_per_unit = 0;
                if(invest.transactions) {
                    for(i=0; i < invest.transactions.length; i++) {
                        tran = invest.transactions[i];
                        tran_type_text = tran.tran_type == 1 ? "ซื้อ" : "ขาย";
                        td = $(`<tr>
                                    <td class="text-center no_size_padding">`+tran.date_format+`</td>
                                    <td class="text-center no_size_padding">`+tran_type_text+`</td>
                                    <td class="text-right no_size_padding">`+tran.unit_format+`</td>
                                    <td class="text-right no_size_padding">`+tran.amount_format+`</td>
                                    <td class="text-right no_size_padding">`+tran.value_per_unit_format+`</td>
                                    <td class="text-left ">`+tran.note+`</td>
                                    <td class="no_size_padding">
                                        <a class="s-t-s-edit-bth" id="s-t-s-edit-bth-`+tran.id+`" data-id="`+tran.id+`" href="javascript:void(0)">แก้ไข</a>
                                        <a class="s-t-s-del-bth text-danger" id="s-t-s-del-bth-`+tran.id+`" data-id="`+tran.id+`" href="javascript:void(0)">ลบ</a>
                                    </td>
                                </tr>`);
                        tran_ele.append(td);
                        value_per_unit = tran.value_per_unit_format;
                    }
                }
                td = $(`<tr>
                            <td class="text-center no_size_padding"></td>
                            <td class="text-center no_size_padding"><label>รวม</label></td>
                            <td class="text-right no_size_padding"><label>`+invest.tran_fif_total_unit_format+`</label></td>
                            <td class="text-right no_size_padding"><label>`+invest.tran_fif_total_amount+`</label></td>
                            <td class="text-right no_size_padding"><label>`+value_per_unit+`</label></td>
                            <td class="text-center no_size_padding"></td>
                            <td class="text-center no_size_padding"></td>
                            <td class="no_size_padding"></td>
                        </tr>`);
                tran_ele.append(td);

                profit_ele = $("#dividend-tbody");
                profit_ele.html("");
                chart_labels = [''];
                total_profit = invest.profit_perv_sum ? invest.profit_perv_sum : 0;
                chart_values = [total_profit];
                if(invest.profits) {
                    for(i=0; i < invest.profits.length; i++) {
                        profit = invest.profits[i];
                        td = $(`<tr>
                                    <td class="text-center no_size_padding">`+profit.date_format+`</td>
                                    <td class="text-center no_size_padding">`+profit.rate+` % </td>
                                    <td class="text-right no_size_padding">`+profit.amount_format+`</td>
                                    <td class="text-left">`+profit.note+`</td>
                                    <td class="no_size_padding">
                                        <a class="profit-edit-bth" id="profit-edit-bth-`+profit.id+`" data-id="`+profit.id+`" href="javascript:void(0)">แก้ไข</a>
                                        <a class="profit-del-bth text-danger" id="profit-del-bth-`+profit.id+`" data-id="`+profit.id+`" href="javascript:void(0)">ลบ</a>
                                    </td>
                                </tr>`);
                        profit_ele.append(td);
                        chart_labels.push(profit.date_format);
                        total_profit += parseFloat(profit.amount);
                        chart_values.push(profit.rate);
                    }
                }
                chart_labels.push('');
                var ctx = document.getElementById('dividendChart');
                var ctx1 = ctx.getContext('2d');
                const gradient = ctx1.createLinearGradient(0, 0, 0, 400);
                gradient.addColorStop(0, 'rgba(250,0,0,1)');   
                gradient.addColorStop(1, 'rgba(250,0,0,0)');
                var myChart = new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                            labels: chart_labels,
                                            datasets: [{
                                                data: chart_values,
                                                backgroundColor : gradient,
                                                borderColor: [
                                                    'rgba(255, 99, 132, 1)'
                                                ],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                yAxes: [{
                                                    ticks: {
                                                        beginAtZero: true
                                                    }
                                                }],
                                                xAxes: [{
                                                    gridLines : {
                                                        display : false
                                                    }
                                                }]
                                            },
                                            legend: {
                                                display: false
                                            }
                                        }
                                    });

                $("#sav_c_detail").hide();
                $("#share_c_detail").hide();
                $("#bond_c_detail").hide();
                $("#share_s_detail").show();
                $("#interest_card").hide();
                $("#dividend_card").show();
            }

            $("#card_title_invest_payment").html(data.total_data.invest_payment_format);
            $("#card_title_profit").html(data.total_data.profit_format);
            $.unblockUI();
        });
    }

    function format_the_number_decimal(ele){
        var value = $('#'+ele.id).val();
        value = value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
        var num = value.split(".");
        var decimal = '';
        var num_decimal = '';
        if(typeof num[1] !== 'undefined'){
            if(num[1].length > 2){
                num_decimal = num[1].substring(0, 2);
            }else{
                num_decimal =  num[1];
            }
            decimal =  "."+num_decimal;
        }
        if(value!=''){
            if(value == 'NaN'){
                $('#'+ele.id).val(0);
            }else{
                value = (num[0] == '')?0:parseInt(num[0]);
                value = value.toLocaleString()+decimal;
                $('#'+ele.id).val(value);
            }
        }else{
            $('#'+ele.id).val(0);
        }
    }

    function removeCommas(str) {
        return(str.replace(/,/g,''));
    }
</script>
