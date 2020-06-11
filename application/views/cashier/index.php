<div class="layout-content">
    <div class="layout-content-body">
<style>
  .border1 { border: solid 1px #ccc; padding: 0 15px; }
  .mem_pic { margin-top: -1em;float: right; width: 150px; }
  .mem_pic img { width: 100%; border: solid 1px #ccc; }
  .mem_pic button { display: block; width: 100%; }
  .modal-backdrop.in{
    opacity: 0;
  }
  .modal-backdrop {
    position: relative;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1040;
    background-color: #000;
  }
  .font-normal{
	font-weight:normal;
  }
  .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
    border: 1px solid #fff;
  }
  th {
      text-align: center;
  }
  .modal-dialog-add {
	   margin:0 auto;
	   width: 60%;
	   margin-top: 5%;
	}
</style>

<h1 style="margin-bottom: 0"> รายการชำระอื่นๆ </h1>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding-l-r-0">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 padding-l-r-0" id="breadcrumb">
			<?php $this->load->view('breadcrumb'); ?>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 padding-l-r-0">
        <a class="btn btn-primary btn-lg bt-add" onclick="open_modal('search_receipt_modal')">
            <span class="icon icon-search"></span>
				ค้นหาใบเสร็จ
        </a>
    </div>
</div>
	<div class="panel panel-body col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
		<form data-toggle="validator" id='form1' novalidate="novalidate" action = '' method="post" class="g24 form form-horizontal">
		<div class="row m-t-1">
			<input type = 'hidden' name = 'type_add' value ='addremember'>
			<div class="g24-col-sm-24">		
				<div class="form-group">
					<div class=" g24-col-sm-24">			
							<label class="g24-col-sm-3 control-label font-normal" for="form-control-2">รหัสสมาชิก</label>			
							<div class="g24-col-sm-6">
								<div class="input-group">
									<input id="member_id" class="form-control " type="text" name='member_id' value="<?php echo @$row_member['member_id']?>" onkeypress="check_member_id();">
									<span class="input-group-btn">
										<a data-toggle="modal" data-target="#myModal" id="test" class="" href="#">
										<button id="" type="button" class="btn btn-info btn-search"><span class="icon icon-search"></span>
										</button>
										</a>
									</span>	
								</div>						
							</div>
							
							<label class="g24-col-sm-3 control-label font-normal" for="form-control-2">เลขที่ใบเสร็จ</label>
							<div class="g24-col-sm-4">
							<input class="form-control" type="text" value="<?php echo $receipt_number; ?>" readonly>
							</div>					
					</div>
				</div>

				<div class="form-group">
					<div class=" g24-col-sm-24">
					<label class="g24-col-sm-3 control-label font-normal" for="form-control-2">ชื่อ - สกุล</label>			
						<div class="g24-col-sm-13">
						<input id="form-control-2" class="form-control" type="text" value="<?php echo @$row_member['firstname_th']." ".@$row_member['lastname_th']; ?>" readonly>
						</div>		
					</div>
				</div>

				<div>
					<label class="g24-col-sm-3 control-label font-normal" for="form-control-2">วันที่</label>
					<div class="g24-col-sm-6">
						<div class="input-with-icon g24-col-sm-24">
							<div class="form-group">
								<input id="fix_date" name="fix_date" class="form-control m-b-1" style="padding-left: 50px;" type="text" value="<?=@$_GET['fix_date']=="" ? date("d/m/").(date("Y")+543) : $_GET['fix_date']?>" data-date-language="th-th" autocomplete="off" <?=@$_GET['member_id']=="" ? "disabled" : ""?>>
								<span class="icon icon-calendar input-icon m-f-1"></span>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class=" g24-col-sm-24">
					<label class="g24-col-sm-3 control-label font-normal" for="form-control-2">รายละเอียด</label>
						<div class="g24-col-sm-6">
							<select id="account_list" class="form-control m-b-1" name="account_list" onchange="change_type()">
								<option value="">รายละเอียด</option> 
								<?php
								foreach($account_list as $key => $value){
								?>
									<option value="<?php echo $value['account_id']; ?>"><?php echo $value['account_list']; ?></option> 
								<?php } ?>
							</select>
						</div>
						<div class="g24-col-sm-1 control-label">
							<a href="<?php echo PROJECTPATH."/setting_account_data2/coop_account_receipt";?>"> ตั้งค่า </a>
						</div>
						
						
						<label class="g24-col-sm-2 control-label font-normal" for="form-control-2">จำนวนเงิน</label>
						
						<div class="g24-col-sm-4">
						<input id='amount' class="form-control" style = 'text-align:right;' type="text" name='amount' onKeyUp="format_the_number_decimal(this)" value=""> 
						</div>
						<label class="g24-col-sm-1 control-label font-normal" for="form-control-2">บาท</label>
						
						<?php if(@$_GET['member_id']!=''){ ?>
						<div class=" g24-col-sm-2">
							<div class="g24-col-sm-14">
								<button type="button" onclick="check_form()" class="btn btn-primary min-width-100">
								<span class="icon icon-save"></span>
								บันทึก					
								</button>
							</div>
						</div>	
						<?php } ?>
					</div>						
				</div>
				<?php $display="display:none";//; ?>
				<div class="form-group loan_data" style="<?php echo $display; ?>">
					<div class=" g24-col-sm-24">
						<label class="g24-col-sm-3 control-label font-normal" for="form-control-2">เลขที่สัญญา</label>
						<div class="g24-col-sm-6">
							<select class="form-control loan_normal_data" name="loan_id" id="loan_id" onchange="choose_loan('loan_id');">
								<option value="">เลือกเลขที่สัญญา</option>
								<?php
								foreach($row_loan as $key => $value){
								?>
									<option value="<?php echo $value['id']; ?>" principal="<?php echo number_format($value['loan_amount_balance'],2,'.',''); ?>" interest="<?php echo $value['interest']; ?>" interest_non_pay="<?php echo $value['interest_non_pay']; ?>" loan_interest_debt_total="<?php echo $value['loan_interest_debt_total'];?>" data-principal-refrain="<?php echo $value["refrain"]["principal"]?>" data-interest-refrain="<?php echo $value["refrain"]["interest"]?>"><?php echo $value['contract_number']; ?></option>
								<?php } ?>
							</select>
							<select class="form-control loan_atm_data" name="loan_atm_id" id="loan_atm_id" onchange="choose_loan('loan_atm_id');">
								<option value="">เลือกเลขที่สัญญา</option>
								<?php
								foreach($row_loan_atm as $key => $value){
								?>
									<option value="<?php echo $value['loan_atm_id']; ?>" principal="<?php echo number_format(@$value['principal'],2,'.',''); ?>" interest="<?php echo @$value['interest']; ?>" interest_non_pay="<?php echo $value['interest_non_pay']; ?>" loan_interest_debt_total="<?php echo $value['loan_interest_debt_total'];?>"><?php echo $value['contract_number']; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="g24-col-sm-7">
							<label class="custom-control custom-control-primary custom-checkbox" style="padding-top: 7px;">
								<input type="checkbox" id="pay_all" name="pay_all" onclick="check_pay_all()" value="1" class="custom-control-input permission_item">
								<span class="custom-control-indicator" style="margin-top: 7px;"></span>
								<span class="custom-control-label">ชำระเงินทั้งหมด</span>
							</label>
						</div>
					</div>						
				</div>
				<div class="form-group loan_all_data" style="<?php echo $display; ?>"> 
					<input type="hidden" id="loan_principal_refrain" value="">
					<input type="hidden" id="loan_interest_refrain" value="">
					<div class=" g24-col-sm-24">
						<label class="g24-col-sm-3 control-label font-normal" for="form-control-2">เงินต้น</label>
						<div class="g24-col-sm-6">
							<input class="form-control" type="text" id="principal_amount" value="" readonly>
						</div>
						<label class="g24-col-sm-3 control-label font-normal" for="form-control-2">ดอกเบี้ย</label>
						<div class="g24-col-sm-4">
							<input class="form-control" type="text" id="interest_amount" value="" onKeyUp="format_the_number_decimal(this)">
							<input class="form-control" type="hidden" id="interest_amount_all" value="">
							<input type="hidden" name="interest_debt" id="interest_debt" value=""/>
						</div>
						<label class="g24-col-sm-3 control-label font-normal" for="form-control-2">ดอกเบี้ยคงค้าง</label>
						<div class="g24-col-sm-4">
							<input class="form-control" type="text" id="interest_non_pay" value="" readonly>
						</div>
					</div>						
				</div>
				<div class="form-group loan_all_data" style="<?php echo $display; ?>"> 
					<div class=" g24-col-sm-24">
						<label class="g24-col-sm-3 control-label font-normal" for="form-control-2">ช่องทางชำระเงิน</label>
						<div class="g24-col-sm-6" style="padding-top:7px;">
							<input type="radio" id="pay_type_cash" name="pay_type" checked value="cash"> เงินสด
							<input type="radio" id="pay_type_transfer" name="pay_type" value="transfer"> เงินโอน
						</div>
						<label class="g24-col-sm-3 control-label font-normal loan_deduct_type" for="form-control-2" >หัก</label>
						<div class="g24-col-sm-8 loan_deduct_type" style="padding-top:7px;">
							<input type="radio" id="deduct_type_all" name="deduct_type" checked value="all" class="deduct-type-radio" onclick="check_pay_all()"> เงินต้น + ดอกเบี้ย
							<input type="radio" id="deduct_type_principal" name="deduct_type" value="principal" class="deduct-type-radio" onclick="check_pay_all()"> เงินต้น
							<input type="radio" id="deduct_type_interest" name="deduct_type" value="interest" class="deduct-type-radio" onclick="check_pay_all()"> ดอกเบี้ย
						</div>
					</div>						
				</div>
				<div class="form-group other_payment_compromise" style="<?php echo $display; ?>">
						<div class=" g24-col-sm-24">
								<label class="g24-col-sm-3 control-label font-normal" for="form-control-2">เลขที่สัญญา</label>
								<div class="g24-col-sm-6">
										<select class="form-control compromise_select" name="compromise_id" id="compromise_id" onchange="choose_compromise('compromise_id');">
												<option value="">เลือกเลขที่สัญญา</option>
												<?php
												foreach($compomise_debts as $key => $value){
												?>
														<option value="<?php echo $value['id']; ?>" debt="<?php echo number_format($value['other_debt_blance'],2,'.',''); ?>" ><?php echo $value['contract_number']; ?></option>
												<?php } ?>
										</select>
								</div>
								<label class="g24-col-sm-3 control-label font-normal" for="form-control-2">หนี้คงค้าง</label>
								<div class="g24-col-sm-6">
										<input class="form-control" type="text" id="other_payment_compromise" value="<?php echo number_format($compomise_debt,2);?>" readonly>
								</div>
						</div>
				</div>
			</div>
		</form>
		</div>
		<form action="<?php echo base_url(PROJECTPATH.'/cashier/save'); ?>" method="POST" id="form2">
			<input type="hidden" name="member_id" value="<?php echo @$row_member['member_id']; ?>">
		<div class="bs-example" data-example-id="striped-table">
			<table class="table table-bordered table-striped">	
				<thead> 
					<tr class="bg-primary">
						<!--th class = "font-normal" style="width: 5%">ลำดับ</th-->
						<th class = "font-normal" style="width: 40%">รายการ</th>
						<th class = "font-normal" style="width: 15%">เงินต้น</th>
						<th class = "font-normal" style="width: 15%;">ดอกเบี้ย</th> 
						<th class = "font-normal" style="width: 15%;">จำนวนเงิน</th> 
						<th class = "font-normal" style="width: 5%;"></th> 
					</tr> 
				</thead>
				<tbody id="table_data">
					<tr id="value_null">
						<td colspan='6' align='center'> ยังไม่มีรายการใดๆ </td>
					</tr>
				</tbody>
				<tfoot class="table_footer" style="display:none;"> 
					<tr class="bg-primary">
						<td align='right' colspan = '3'>ยอดรวมสุทธิ</td>
						<td align='right' style="width: 120px;" id="sum_amount">0</td>
						<td align='center' style ="width: 50px">บาท</td>
					</tr>
				</tfoot>
			</table>
			
		</div>
			<div class="row m-t-1 table_footer" style="display:none;">	
				<center>
					<button class="btn btn-primary" type="button" id ="save" onclick="after_submit()" style="width:auto;">
						<span class="icon icon-print"></span>
						พิมพ์ใบเสร็จรับเงิน				
					</button>
				</center>
			</div>
		</form>
		</div>
	</div>
</div>
<?php $this->load->view('search_member_new_modal'); ?>
<div class="modal modal_in_modal fade" id="search_receipt_modal" role="dialog">
	<!-- <div class="modal-dialog modal-dialog-add"> -->
	<div class="modal-lg modal-dialog-add">

	  <div class="modal-content">
		<div class="modal-header modal-header-info">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <h2 class="modal-title">ค้นหาใบเสร็จ</h2>
		</div>
		<div class="modal-body">
			<div class="input-with-icon">
				<div class="row">
					<div class="col">
						<label class="col-sm-2 control-label">รูปแบบค้นหา</label>
						<div class="col-sm-4">
							<div class="form-group">
								<select id="search_receipt_list" name="search_receipt_list" class="form-control m-b-1">
									<option value="">เลือกรูปแบบค้นหา</option>
									<option value="receipt_id">เลขที่ใบเสร็จ</option>
									<option value="member_id">รหัสสมาชิก</option>
									<option value="id_card">หมายเลขบัตรประชาชน</option>
									<option value="firstname_th">ชื่อสมาชิก</option>
									<option value="lastname_th">นามสกุล</option>
								</select>
							</div>
						</div>
						<label class="col-sm-1 control-label" style="white-space: nowrap;"> ค้นหา </label>
						<div class="col-sm-4">
							<div class="form-group">
								<div class="input-group">
								<input id="search_receipt_text" name="search_receipt_text" class="form-control m-b-1" type="text" value="">
								<span class="input-group-btn">
									<button type="button" class="btn btn-info btn-search" onclick="search_receipt()"><span class="icon icon-search"></span></button>
								</span>	
								</div>
							</div>
						</div>	
					</div>
				</div>
			</div>
			<div class="bs-example" data-example-id="striped-table">
				<table class="table table-striped">
					<thead> 
						<tr class="bg-primary">
							<th class = "font-normal" style="width: 5%">เลขที่ใบเสร็จ</th>
							<th class = "font-normal" style="width: 10%">รหัสสมาชิก</th>
							<th class = "font-normal" style="width: 20%">ชื่อ - นามสกุล</th> 
							<th class = "font-normal" style="width: 10%;">จำนวนเงิน</th> 
							<th class = "font-normal" style="width: 20%;">ผู้ออกใบเสร็จ</th> 
							<th class = "font-normal" style="width: 15%;">วันที่ออกใบเสร็จ</th> 
							<th class = "font-normal" style="width: 20%;">สถานะ</th> 
							<th class = "font-normal" style="width: 5%;"></th> 
						</tr> 
					</thead>
					<tbody id="search_receipt_result">
					</tbody>
				</table>
			</div>
		</div>
		<div class="modal-footer">
		  <button type="button" id="close" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
		</div>
	  </div>
	</div>
</div>
<?php
$v = date('YmdHis');
$link = array(
    'src' => PROJECTJSPATH.'assets/js/cashier.js?v='.$v,
    'type' => 'text/javascript'
);
echo script_tag($link);
?>
<script>
	function check_member_id() {
		var member_id = $('#member_id').first().val();
		var keycode = (event.keyCode ? event.keyCode : event.which);
		if(keycode == '13'){
			$.post(base_url+"save_money/check_member_id", 
			{	
			member_id: member_id
			}
			, function(result) {
				obj = JSON.parse(result);
				mem_id = obj.member_id;
				if(mem_id != undefined){
					document.location.href = '<?php echo base_url(uri_string())?>?member_id='+mem_id
				}else{					
					swal('ไม่พบรหัสสมาชิกที่ท่านเลือก','','warning'); 
				}
			});		
		}
	}
</script>
