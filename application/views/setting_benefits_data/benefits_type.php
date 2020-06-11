<div class="layout-content">
    <div class="layout-content-body">
	<style>
		label{
			padding-top:7px;
		}
		.control-label{
			padding-top:7px;
		}
		.indent{
			text-indent: 40px;
			.modal-dialog-data {
				width:90% !important;
				margin:auto;
				margin-top:1%;
				margin-bottom:1%;
			}
		}
		.bt-add{
			float:none;
		}
		.modal-dialog{
			width:80%;
		}
		small{
			display: none !important;
		}
		.cke_contents{
			height: 500px !important;
		}
		th{
			text-align:center;
		}
		.money-textbox {
			width:85px;
			display:unset;
			margin:5px;
			padding-left: 0px;
			padding-right: 0px;
		}
		.year-textbox {
			width:60px;
			display:unset;
			margin:5px;
		}
	</style>
	<?php
	$act = @$_GET['act'];
	$id  = @$_GET['id'];
	$detail_id  = @$_GET['detail_id'];
	?> 
<?php if (empty($act)) { ?>
		<h1 style="margin-bottom: 0">สวัสดิการสมาชิก</h1>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding-l-r-0">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 padding-l-r-0">
				<?php $this->load->view('breadcrumb'); ?>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 " style="padding-right:0px;text-align:right;">	
			   <button class="btn btn-primary btn-lg bt-add" type="button" onclick="add_type();"><span class="icon icon-plus-circle"></span> เพิ่มสวัสดิการ</button> 
			</div>
		</div>	
		  <div class="row gutter-xs">
			  <div class="col-xs-12 col-md-12">
					  <div class="panel panel-body">
				<div class="bs-example" data-example-id="striped-table">
				<table class="table table-striped"> 
					<thead> 
						 <tr>
							<th class = "font-normal" width="5%">ลำดับ</th>
							<th class = "font-normal"> ชื่อสวัสดิการ </th>
							<th class = "font-normal" style="width: 15%"> วันที่เริ่มใช้ </th>
							<th class = "font-normal" style="width: 15%"> จัดการ </th>
						</tr> 
					</thead>
					<tbody>
				 <?php  
					if(!empty($rs)){
						foreach(@$rs as $key => $row){ 
							$this->db->select(array('*'));
							$this->db->from('coop_benefits_type_detail');
							$this->db->where("benefits_id = '".@$row["benefits_id"]."' AND start_date <= '".date('Y-m-d')."'");
							$this->db->order_by('start_date DESC');
							$rs_detail = $this->db->get()->result_array();
				?>
						<tr> 
						  <td scope="row" align="center"><?php echo $i++; ?></td>
						  <td class="text-left"><?php echo @$row['benefits_name']; ?></td> 
						  <td align="center"><?php echo @$rs_detail[0]['start_date']==''?'ไม่ระบุ':$this->center_function->ConvertToThaiDate(@$rs_detail[0]['start_date']); ?></td> 
						  <td align="center">
							  <a href="?act=detail&id=<?php echo @$row["benefits_id"] ?>">ดูรายละเอียด</a> |
							  <a style="cursor:pointer;" onclick="edit_type('<?php echo @$row['benefits_id']; ?>','<?php echo @$row['benefits_name']; ?>','');">แก้ไข</a> |
							  <a href="#" onclick="del_coop_data('<?php echo @$row['benefits_id']; ?>')" class="text-del"> ลบ </a> 
						  </td> 
						</tr>
				<?php 
						}
					} 
				?>
					 </tbody> 
				  </table> 
				</div>
				</div>
					<?php echo @$paging ?>
				 </div>
		  </div>

<?php }else if($act == "detail"){
?>
		<h1 style="margin-bottom: 0">สวัสดิการสมาชิก</h1>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding-l-r-0">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 padding-l-r-0">
				<?php $this->load->view('breadcrumb'); ?>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 " style="padding-right:0px;text-align:right;">	
				<a href="<?php echo base_url(PROJECTPATH.'/setting_benefits_data/benefits_type?act=add&id='.$_GET['id']); ?>">
					<button class="btn btn-primary btn-lg bt-add" type="button" onclick="add_detail();"><span class="icon icon-plus-circle"></span> เพิ่มรายการ</button> 
				</a>
			</div>
		</div>	
		<div class="row gutter-xs">
			  <div class="col-xs-12 col-md-12">
					<div class="panel panel-body">
						<h1 class="text-left m-t-1 m-b-1"><?php echo @$benefits_type['benefits_name']; ?></h1>
						<div class="bs-example" data-example-id="striped-table">
							<table class="table table-striped"> 
								<thead> 
									 <tr>
										<th class = "font-normal" width="5%">ลำดับ</th>
										<th class = "font-normal"> วันที่เพิ่ม </th>
										<th class = "font-normal"> วันที่มีผล </th>
										<th class = "font-normal"> สถานะ </th>
										<th class = "font-normal" style="width: 150px;"> จัดการ </th>
									</tr> 
								</thead>
								<tbody>
							 <?php  
								$i = 1;
								if(!empty($rs_detail)){
									foreach(@$rs_detail as $key => $row_detail){ 
										$this->db->select(array('*'));
										$this->db->from('coop_benefits_type_detail');
										$this->db->where("benefits_id = '".@$_GET['id']."' AND start_date <= '".date('Y-m-d')."'");
										$this->db->order_by('start_date DESC');
										$rs_status = $this->db->get()->result_array();
										$row_status = @$rs_status[0];
							?>
									<tr> 
									  <td scope="row" align="center"><?php echo $i++; ?></td>
									  <td align="center"><?php echo $this->center_function->ConvertToThaiDate(@$row_detail['createdatetime']); ?></td> 
									  <td align="center"><?php echo $this->center_function->ConvertToThaiDate(@$row_detail['start_date']); ?></td> 
									  <td align="center">
											<?php echo $row_status['id']==@$row_detail['id']?'ใช้งาน':'ไม่ใช้งาน'; ?>
									  </td> 
									  <td align="center">
										  <a href="?act=edit&id=<?php echo @$row_detail["benefits_id"] ?>&detail_id=<?php echo @$row_detail["id"] ?>">ดูรายละเอียด</a> |
										  <a href="#" onclick="del_coop_detail_data('<?php echo @$row_detail["benefits_id"] ?>','<?php echo @$row_detail["id"]; ?>')" class="text-del"> ลบ </a> 
									  </td> 
									</tr>
							<?php 
									}
								} 
							?>
								 </tbody> 
							  </table> 
						</div>
					</div>
					<?php echo @$paging ?>
				 </div>
		  </div>

<?php
} else { ?>

		<div class="col-md-12">
			<h1 class="text-left m-t-1 m-b-1"><?php echo @$benefits_type['benefits_name']; ?></h1>
			<form id='form_save' data-toggle="validator" novalidate="novalidate" action="<?php echo base_url(PROJECTPATH.'/setting_benefits_data/benefits_type_detail_save'); ?>" method="post">	
				<input id="id" name="id"  type="hidden" value="<?php echo $id; ?>" required>
				<?php if (!empty($detail_id)) { ?>
				<input id="type_add" name="type_add"  type="hidden" value="edit" required>
				<input id="detail_id" name="detail_id"  type="hidden" value="<?php echo $detail_id; ?>" required>
				
				<?php }else{ ?>
				<input id="type_add" name="type_add"  type="hidden" value="add" required>
				<?php } ?>
				
				<div class="row">
					<label class="col-sm-2 control-label text-right" for="benefits_detail">รายละเอียด</label>
					<div class="col-sm-9">
						<div class="form-group">
							<textarea id="benefits_detail" name="benefits_detail" required  title="กรุณากรอก รายละเอียด"><?php echo @$row['benefits_detail']; ?></textarea>
						</div>
					</div>
				</div>

				<div class="row">
					<label class="g24-col-sm-4 control-label text-right"></label>
					<div class="g24-col-sm-1 text-center">
						<input type="checkbox" style="vertical-align: -webkit-baseline-middle;" id="age_grester_select" name="age_grester_select" value="age_grester" <?php echo !empty($row["age_grester_status"]) ? "checked" : ""; ?>>
					</div>
					<label class="control-label text-center">อายุตั้งแต่</label>
					<input type="text" class="form-control text-center year-textbox" id="age_val" name="age_val" value="<?php echo $row["age_grester"];?>" maxlength="3"/>
					<label class="control-label text-left">ขึ้นไป</label>
				</div>
				<div class="row">
					<label class="g24-col-sm-4 control-label text-right"></label>
					<div class="g24-col-sm-1 text-center">
						<input type="checkbox" style="vertical-align: -webkit-baseline-middle;" id="member_age_grester_select" name="member_age_grester_select" value="member_age_grester" <?php echo !empty($row["member_age_grester_status"]) ? "checked" : ""; ?>>
					</div>
					<label class="control-label text-center">เป็นสมาชิกไม่น้อยกว่า</label>
					<input  type="text" class="form-control text-center year-textbox" id="member_age_val" name="member_age_val" value="<?php echo $row["member_age_grester"];?>" maxlength="3"/>
					<label class="control-label text-left">ปี</label>
				</div>
				<div class="row">
					<label class="g24-col-sm-4 control-label text-right"></label>
					<div class="g24-col-sm-1 text-center">
						<input type="checkbox" style="vertical-align: -webkit-baseline-middle;" id="req_time" name="req_time" value="req_time" <?php echo !empty($row["request_time_status"]) ? "checked" : ""; ?>>
					</div>
					<label class="control-label text-center">ขอรับสิทธิ์ได้ไม่เกิน</label>
					<input type="text" class="form-control text-center year-textbox" id="req_time_val" name="req_time_val" value="<?php echo $row["request_time"];?>" maxlength="3"/>
					<label class="control-label text-left">ครั้ง</label>
					 <label class="control-label"><input type="radio" style="margin:5px;" name="req_time_type" value="per_year" <?php echo !empty($row["request_time_unit"]) && $row["request_time_unit"] == "per_year" ? "checked" : ""; ?>>ต่อปี</label>
					 <label class="control-label" ><input type="radio" style="margin:5px;" name="req_time_type"  value="per_person"  <?php echo !empty($row["request_time_unit"]) && $row["request_time_unit"] == "per_person" ? "checked" : ""; ?>>ต่อคน</label>
				</div>
				<div class="row">
					<label class="g24-col-sm-4 control-label text-right"></label>
					<div class="g24-col-sm-20">
						<label class="g24-col-sm-24 control-label text-left"> เงื่อนไขพิเศษประเภทสวัสดิการอื่นๆ </label>
					</div>
				</div>
				<div class="row">
					<label class="g24-col-sm-4 control-label text-right"></label>
					<div class="g24-col-sm-1 text-center">
						<!-- <input type="checkbox" style="vertical-align: -webkit-baseline-middle;" id="payment_receive_checkbox" name="sp_conditions[]" value="payment_receive" <?php echo !empty($row["payment_receive"]) ? "checked" : ""; ?>> -->
						<input type="radio" style="vertical-align: -webkit-baseline-middle;" name="sp_condition" id="payment_receive_radio"  value="payment_receive" <?php echo $row["special_con_selected"] == "payment_receive" ? "checked" : ""; ?>>
					</div>
					<label class="control-label text-center">ได้รับเงินสวัสดิการ</label>
					<input type="text" class="form-control text-center money-textbox" id="payment_receive" name="payment_receive" value="<?php echo number_format(@$row['payment_receive'],2)?>" onkeyup="format_the_number_decimal(this);"/>
					<label class="control-label text-left">บาท</label>
				</div>
				<div class="row">
					<label class="g24-col-sm-4 control-label text-right"></label>
					<div class="g24-col-sm-1 text-center">
						<input type="radio" style="vertical-align: -webkit-baseline-middle;" id="retire_benefit_radio" name="sp_condition" value="retire_member_receive" <?php echo $row["special_con_selected"] == "retire_member_receive" ? "checked" : ""; ?>>
					</div>
					<label class="control-label text-center">สมาชิกเกษียณได้ จ่าย</label>
					<input type="text" class="form-control text-center money-textbox" id="retire_benefit" name="retire_member_receive" value="<?php echo number_format(@$row['retire_member_receive'],2)?>" onkeyup="format_the_number_decimal(this);"/>
					<label class="control-label text-left">บาท คูณจำนวนปีที่เป็นสมาชิก</label>
				</div>
				<div class="row">
					<label class="g24-col-sm-4 control-label text-right"></label>
					<div class="g24-col-sm-1 text-center">
						<input type="radio" style="vertical-align: -webkit-baseline-middle;" id="heir_benefit_radio" name="sp_condition" value="new_heir_receive" <?php echo $row["special_con_selected"] == "new_heir_receive" ? "checked" : ""; ?>>
					</div>
					<label class="control-label text-center">รับขวัญทายาทใหม่ จ่าย</label>
					<input type="text" class="form-control text-center money-textbox" id="heir_benefit" name="new_heir_receive" value="<?php echo number_format(@$row['new_heir_receive'],2)?>" onkeyup="format_the_number_decimal(this);"/>
					<label class="control-label text-left">บาท</label>
				</div>

				<div class="row">
					<label class="g24-col-sm-4 control-label text-right"></label>
					<div class="g24-col-sm-1 text-center">
						<input type="radio" style="vertical-align: -webkit-baseline-middle;" id="pass_away_benefit_radio" name="sp_condition" value="pass_away_default_receive" <?php echo $row["special_con_selected"] == "pass_away_default_receive" ? "checked" : ""; ?>>
					</div>
					<label class="control-label text-center">ถึงแก่กรรม ได้รับค่าปลงศพ</label>
					<input type="text" class="form-control text-center money-textbox" id="pass_away_benefit" name="pass_away_benefit" value="<?php echo number_format(@$row['pass_away_default_receive'],2)?>" onkeyup="format_the_number_decimal(this);"/>
					<label class="control-label text-left">บาท โดยไม่มีหนี้กับสหกรณ์</label>
				</div>
				<?php
					for ($i=1; $i<=5; $i++) {
				?>
				<div class="row">
					<label class="g24-col-sm-5 control-label text-right"></label>
					<label class="control-label text-center">เป็นสมาชิกไม่เกิน</label>
					<input type="text" class="form-control text-center year-textbox" id="pass_away_benefit_year_<?php echo $i;?>" name="pass_away_year_<?php echo $i;?>" value="<?php echo $row['pass_away_year_'.$i];?>" maxlength="3"/>
					<label class="control-label text-left">ปี</label>
					<label class="control-label text-center">จ่าย</label>
					<input type="text" class="form-control text-center money-textbox" id="pass_away_benefit_amount_<?php echo $i;?>" name="pass_away_receive_<?php echo $i;?>" value="<?php echo number_format(@$row['pass_away_receive_'.$i],2)?>" onkeyup="format_the_number_decimal(this);"/>
					<label class="control-label text-left">บาท</label>
				</div>
				<?php
					}
				?>
				<div class="row">
					<label class="g24-col-sm-5 control-label text-right"></label>
					<label class="control-label text-center">เป็นสมาชิกเกิน</label>
					<input type="text" class="form-control text-center year-textbox" id="pass_away_benefit_year_last" name="pass_away_year_last" value="<?php echo $row['pass_away_year_last'];?>" maxlength="3"/>
					<label class="control-label text-left">ปี</label>
					<label class="control-label text-center">ขึ้นไป เพิ่มปีละ</label>
					<input type="text" class="form-control text-center money-textbox" id="pass_away_benefit_amount_last" name="pass_away_receive_last" value="<?php echo number_format(@$row['pass_away_receive_last'],2)?>" onkeyup="format_the_number_decimal(this);"/>
					<label class="control-label text-left">บาท</label>
				</div>

				<div class="row">
					<label class="g24-col-sm-4 control-label text-right"></label>
					<div class="g24-col-sm-1 text-center">
						<input type="radio" style="vertical-align: -webkit-baseline-middle;" id="scholarship_radio" name="sp_condition" value="scholarship" <?php echo $row["special_con_selected"] == "scholarship" ? "checked" : ""; ?>>
					</div>
					<label class="control-label text-center">ทุนส่งเสริมการศึกษาบุตร</label>
				</div>
				<div class="row">
					<label class="g24-col-sm-5 control-label text-right"></label>
					<label class="control-label text-center">อนุบาล ปีละ</label>
					<input type="text" class="form-control text-center money-textbox" id="scholarship_kindergarten" name="scholarship_kindergarten" value="<?php echo number_format(@$row['scholarship_kindergarten'],2)?>" onkeyup="format_the_number_decimal(this);"/>
					<label class="control-label text-left">บาท</label>
				</div>
				<div class="row">
					<label class="g24-col-sm-5 control-label text-right"></label>
					<label class="control-label text-center">ประถม ปีละ</label>
					<input type="text" class="form-control text-center money-textbox" id="scholarship_elementary" name="scholarship_elementary" value="<?php echo number_format(@$row['scholarship_elementary'],2)?>" onkeyup="format_the_number_decimal(this);"/>
					<label class="control-label text-left">บาท</label>
				</div>
				<div class="row">
					<label class="g24-col-sm-5 control-label text-right"></label>
					<label class="control-label text-center">ม.ต้น ปีละ</label>
					<input type="text" class="form-control text-center money-textbox" id="scholarship_junior_high_school" name="scholarship_junior_high" value="<?php echo number_format(@$row['scholarship_junior_high'],2)?>" onkeyup="format_the_number_decimal(this);"/>
					<label class="control-label text-left">บาท</label>
				</div>
				<div class="row">
					<label class="g24-col-sm-5 control-label text-right"></label>
					<label class="control-label text-center">ม.ปลาย/ปวช ปีละ</label>
					<input type="text" class="form-control text-center money-textbox" id="scholarship_senior_high_school" name="scholarship_senior_high" value="<?php echo number_format(@$row['scholarship_senior_high'],2)?>" onkeyup="format_the_number_decimal(this);"/>
					<label class="control-label text-left">บาท</label>
				</div>
				<div class="row">
					<label class="g24-col-sm-5 control-label text-right"></label>
					<label class="control-label text-center">ป.ตรี/ปวส. ปีละ</label>
					<input type="text" class="form-control text-center money-textbox" id="scholarship_bachelor" name="scholarship_bachelor" value="<?php echo number_format(@$row['scholarship_bachelor'],2)?>" onkeyup="format_the_number_decimal(this);"/>
					<label class="control-label text-left">บาท</label>
				</div>
				<div class="row">
					<label class="g24-col-sm-5 control-label text-right"></label>
					<label class="control-label text-center">เริ่มนับวันที่</label>
					<input type="text" class="form-control text-center year-textbox" maxlength="2" id="scholarship_period_date_start" name="scholarship_period_date_start" value="<?php echo !empty($row['scholarship_period_date_start']) ? $row['scholarship_period_date_start'] : date("d");?>" onkeyup=""/>
					<label class="control-label text-center">เดือน
					<select id="scholarship_period_month_start" name="scholarship_period_month_start" class="form-control" style="display:unset;width:150px;">
						<?php
							$month_selected = !empty($row['scholarship_period_month_start']) ? $row['scholarship_period_month_start'] : date("m");
							foreach($this->month_arr as $key => $value){
						?>
							<option value="<?php echo $key; ?>" <?php echo $month_selected==$key?'selected':''; ?>><?php echo $value; ?></option>
						<?php } ?>
					</select></label>
				</div>

				<div class="row">
					<label class="g24-col-sm-4 control-label text-right"></label>
					<div class="g24-col-sm-1 text-center">
						<input type="radio" style="vertical-align: -webkit-baseline-middle;" id="atm_coop_radio" name="sp_condition" value="atm_coop" <?php echo $row["special_con_selected"] == "atm_coop" ? "checked" : ""; ?>>
					</div>
					<label class="control-label text-center">ประสบอุบัติเหตุสำหรับผู้ถือบัตร ATM COOP ได้รับรวมกันสูงสุดไม่เกิน</label>
					<input type="text" class="form-control text-center money-textbox" id="atm_coop" name="atm_coop_max_receive" value="<?php echo number_format(@$row['atm_coop_max_receive'],2)?>" onkeyup="format_the_number_decimal(this);"/>
					<label class="control-label text-left">บาท</label>
				</div>
				<div class="row">
					<label class="g24-col-sm-5 control-label text-right"></label>
					<label class="control-label text-center">เสียชีวิต ได้รับ</label>
					<input type="text" class="form-control text-center money-textbox" id="atm_coop_pass_away" name="atm_coop_pass_away" value="<?php echo number_format($row["atm_coop_pass_away"],2);?>" onkeyup="format_the_number_decimal(this);"/>
					<label class="control-label text-left">บาท</label>
				</div>
				<div class="row">
					<label class="g24-col-sm-5 control-label text-right"></label>
					<label class="control-label text-center">กรณีทุพพลภาพถาวรสิ้นเชิง จ่าย</label>
					<input type="text" class="form-control text-center money-textbox" id="atm_coop_tpb" name="atm_coop_tpb" value="<?php echo number_format($row["atm_coop_tpd"],2);?>" onkeyup="format_the_number_decimal(this);"/>
					<label class="control-label text-left">บาท</label>
				</div>
				<!-- <div class="row">
					<label class="g24-col-sm-5 control-label text-right"></label>
					<label class="control-label text-center">สูญเสียอวัยวะ</label>
				</div> -->
				<div class="row">
					<label class="g24-col-sm-5 control-label text-right"></label>
					<label class="control-label text-center">สูญเสียสายตาหนึ่งข้าง จ่าย</label>
					<input type="text" class="form-control text-center money-textbox" id="atm_coop_e" name="atm_coop_e" value="<?php echo number_format($row["atm_coop_e"],2);?>" onkeyup="format_the_number_decimal(this);"/>
					<label class="control-label text-left">บาท</label>
				</div>
				<!-- <div class="row">
					<label class="g24-col-sm-6 control-label text-right"></label>
					<label class="control-label text-center">สูญเสียอวัยวะอื่นๆ</label>
				</div> -->
				<div class="row">
					<label class="g24-col-sm-5 control-label text-right"></label>
					<label class="control-label text-center">มือสองข้างตั้งแต่ข้อมือ หรือเท้าสองข้างตั้งแต่ข้อเท้า หรือสูญเสียสายตาสองข้าง จ่าย</label>
					<input type="text" class="form-control text-center money-textbox" id="atm_coop_hhffee" name="atm_coop_hhffee" value="<?php echo number_format($row["atm_coop_hhffee"],2);?>" onkeyup="format_the_number_decimal(this);"/>
					<label class="control-label text-left">บาท</label>
				</div>
				<div class="row">
					<label class="g24-col-sm-5 control-label text-right"></label>
					<label class="control-label text-center">มือหนึ่งข้างตั้งแต่ข้อมือ และเท้าหนึ่งข้างตั้งแต่ข้อเท้า จ่าย</label>
					<input type="text" class="form-control text-center money-textbox" id="atm_coop_hf" name="atm_coop_hf" value="<?php echo number_format($row["atm_coop_hf"],2);?>" onkeyup="format_the_number_decimal(this);"/>
					<label class="control-label text-left">บาท</label>
				</div>
				<div class="row">
					<label class="g24-col-sm-5 control-label text-right"></label>
					<label class="control-label text-center">มือหนึ่งข้างตั้งแต่ข้อมือ และสูญเสียสายตาหนึ่งข้าง จ่าย</label>
					<input type="text" class="form-control text-center money-textbox" id="atm_coop_he" name="atm_coop_he" value="<?php echo number_format($row["atm_coop_he"],2);?>" onkeyup="format_the_number_decimal(this);"/>
					<label class="control-label text-left">บาท</label>
				</div>
				<div class="row">
					<label class="g24-col-sm-5 control-label text-right"></label>
					<label class="control-label text-center">เท้าหนึ่งข้างตั้งแต่ข้อเท้า และสูญเสียสายตาหนึ่งข้าง จ่าย</label>
					<input type="text" class="form-control text-center money-textbox" id="atm_coop_fe" name="atm_coop_fe" value="<?php echo number_format($row["atm_coop_fe"],2);?>" onkeyup="format_the_number_decimal(this);"/>
					<label class="control-label text-left">บาท</label>
				</div>
				<div class="row">
					<label class="g24-col-sm-5 control-label text-right"></label>
					<label class="control-label text-center">มือหนึ่ง ข้างตั้งแต่ข้อมือ จ่าย</label>
					<input type="text" class="form-control text-center money-textbox" id="atm_coop_h" name="atm_coop_h" value="<?php echo number_format($row["atm_coop_h"],2);?>" onkeyup="format_the_number_decimal(this);"/>
					<label class="control-label text-left">บาท</label>
				</div>
				<div class="row">
					<label class="g24-col-sm-5 control-label text-right"></label>
					<label class="control-label text-center">เท้าหนึ่งข้างตั้งแต่ข้อเท้า จ่าย</label>
					<input type="text" class="form-control text-center money-textbox" id="atm_coop_f" name="atm_coop_f" value="<?php echo number_format($row["atm_coop_f"],2);?>" onkeyup="format_the_number_decimal(this);"/>
					<label class="control-label text-left">บาท</label>
				</div>
				<div class="row">
					<label class="g24-col-sm-4 control-label text-right"></label>
					<div class="g24-col-sm-1 text-center">
						<input type="radio" style="vertical-align: -webkit-baseline-middle;" id="cremation_receive_radio" name="sp_condition" value="cremation_receive" <?php echo $row["special_con_selected"] == "cremation_receive" ? "checked" : ""; ?>>
					</div>
					<label class="control-label text-center">งานศพ บิดา มารดา และบุตร จ่าย</label>
					<input type="text" class="form-control text-center money-textbox" id="cremation_receive" name="cremation_receive" value="<?php echo number_format($row["cremation_receive"],2);?>" onkeyup="format_the_number_decimal(this);"/>
					<label class="control-label text-left">บาท</label>
				</div>

				<div class="row">
                   <label class="col-sm-2 control-label text-right" for="start_date">มีผลวันที่</label>
                    <div class="col-sm-2">
						<div class="form-group">
						  <input id="start_date" name="start_date" class="form-control m-b-1" style="padding-left: 50px;" type="text" value="<?php echo $this->center_function->mydate2date(empty($row['start_date']) ? '' : @$row['start_date']); ?>" data-date-language="th-th" required  title="กรุณาเลือก มีผลวันที่">
						  <span class="icon icon-calendar input-icon m-f-1"></span>
						</div>
                    </div>
				</div>

				<div class="form-group text-center">
					<button type="button"  onclick="check_form()" class="btn btn-primary min-width-100">ตกลง</button>
					<a href="?act=detail&id=<?php echo $_GET['id'];?>"><button class="btn btn-danger min-width-100" type="button">ยกเลิก</button></a>
				</div>
			</form>
		</div>

<?php } ?>
	</div>
</div>
<div id="benefits_type_modal" tabindex="-1" role="dialog" class="modal fade">
	<div class="modal-dialog modal-dialog-data">
		<div class="modal-content">
			<div class="modal-header modal-header-confirmSave">
				<button type="button" class="close" data-dismiss="modal">x</button>
				<h2 class="modal-title"><span id="title_1">เพิ่มสวัสดิการ</span></h2>
			</div>
			<div class="modal-body">
				<div class="form-group" style="padding-bottom: 50px;">
				<form id='form1' data-toggle="validator" novalidate="novalidate" action="<?php echo base_url(PROJECTPATH.'/setting_benefits_data/benefits_type_save'); ?>" method="post">	
					<input type="hidden" class="form-control" id="benefits_id" name="benefits_id" value="">
					<div class="row">
						<label class="col-sm-4 control-label text-right" for="benefits_name">ชื่อสวัสดิการ</label>
						<div class="col-sm-6">
							<div class="form-group">
								<input id="benefits_name" name="benefits_name" class="form-control m-b-1" type="text" value="" required title="กรุณากรอก ชื่อสวัสดิการ">
							</div>
						</div>
						<label class="col-sm-2 control-label">&nbsp;</label>
					</div>
					
					<!--div class="row">
					   <label class="col-sm-4 control-label text-right" for="start_date">วันที่เริ่มใช้</label>
						<div class="col-sm-3">
							<div class="form-group">
							  <input id="start_date" name="start_date" class="form-control m-b-1" style="padding-left: 50px;" type="text" value="" data-date-language="th-th" required  title="กรุณาเลือก วันที่เริ่มใช้">
							  <span class="icon icon-calendar input-icon m-f-1"></span>
							</div>
						</div>
						<label class="col-sm-2 control-label">&nbsp;</label>
					</div-->
					
					<div class="form-group">
						<div class="col-sm-12" style="text-align:center;margin-top:20px;margin-bottom:20px;">
							<button type="button" class="btn btn-primary" onclick="save_type()">บันทึก</button>&nbsp;&nbsp;&nbsp;
							<button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
						</div>
					</div>
					
					<!--table id="group_table" class="table table-bordered table-striped table-center">
						<thead> 
							<tr class="bg-primary">
								<th width="80px">ลำดับ</th>
								<th>ชื่อสวัสดิการ</th>
								<th>วันที่เริ่มใช้</th>
								<th width="150px"></th>
							</tr>
						</thead>
						<tbody>
						<?php 
							$j = 1;
							if(!empty($rs)){
								foreach(@$rs as $key => $row){ 
						?>
								<tr> 
									<td><?php echo @$j++; ?></d>
									<td style="text-align:left;"><?php echo @$row['benefits_name']; ?></td> 
									<td><?php echo $this->center_function->ConvertToThaiDate(@$row['start_date']); ?></td> 
									<td>
										<a style="cursor:pointer;" onclick="edit_type('<?php echo @$row['benefits_id']; ?>','<?php echo @$row['benefits_name']; ?>','<?php echo $this->center_function->mydate2date(@$row['start_date']); ?>');">ดูรายละเอียด</a> |
										<span class="text-del del"  onclick="del_coop_data('<?php echo @$row['benefits_id'] ?>')">ลบ</span>
									</td> 
								</tr>
						<?php 
								}
							} 
						?>
						</tbody>
					</table--> 					
				</form>					
				</div>				
			</div>
		</div>
	</div>
</div>
<?php

$link = array(
    'src' => PROJECTJSPATH.'assets/ckeditor/ckeditor.js',
    'type' => 'text/javascript'
);
echo script_tag($link);

$link = array(
    'src' => PROJECTJSPATH.'assets/ckeditor/adapters/jquery.js',
    'type' => 'text/javascript'
);
echo script_tag($link);


$link = array(
    'src' => PROJECTJSPATH.'assets/js/coop_benefits_type.js',
    'type' => 'text/javascript'
);
echo script_tag($link);
?>
<script>
	$(document).ready(function() {		
		if($("#benefits_detail").length) {
			$("#benefits_detail").ckeditor({ height : 146 , customConfig : '<?php echo PROJECTPATH; ?>/assets/ckeditor/config-admin-color.js'   });
		}
	});	
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
                $('#'+ele.id).val('');
            }else{
                value = (num[0] == '')?0:parseInt(num[0]);
                value = value.toLocaleString()+decimal;
                $('#'+ele.id).val(value);
            }
        }else{
            $('#'+ele.id).val('');
        }
    }

</script>       