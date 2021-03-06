<style>
	.table-view>thead, .table-view>thead>tr>td, .table-view>thead>tr>th {
		font-size: 14px;
	}
	.table-view-2>thead>tr>th{
	    border-top: 1px solid #000 !important;
		border-bottom: 1px solid #000 !important;
		font-size: 16px;
	}
	.table-view-2>tbody>tr>td{
	    border: 0px !important;
		font-family: Tahoma;
		font-size: 12px;
	}	
	.border-bottom{
	    border-bottom: 1px solid #000 !important;
		font-weight: bold;
	}
	.table-view-2>tbody>tr>td>span{
		font-family: Tahoma;
		font-size: 12px !important;
	}
	.foot-border{
	    border-top: 1px solid #000 !important;
		border-bottom: double !important;
		font-weight: bold;
	}
	.table {
		color: #000;
	}
	.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
		padding:6px;
	}
</style>
<?php
	if(@$_GET['start_date']){
		$start_date_arr = explode('/',@$_GET['start_date']);
		$start_day = $start_date_arr[0];
		$start_month = $start_date_arr[1];
		$start_year = $start_date_arr[2];
		$start_year -= 543;
		$start_date = $start_year.'-'.$start_month.'-'.$start_day;
	}
	if(@$_GET['end_date']){
		$end_date_arr = explode('/',@$_GET['end_date']);
		$end_day = $end_date_arr[0];
		$end_month = $end_date_arr[1];
		$end_year = $end_date_arr[2];
		$end_year -= 543;
		$end_date = $end_year.'-'.$end_month.'-'.$end_day;
	}

	$runno = 0;
	$total = 0;
	$cremation_receive_total = 0;
	$cremation_balance_total = 0;
	$adv_payment_total = 0;
	foreach($datas AS $page=>$data){
?>
<div style="width: 1000px;" class="page-break">
	<div class="panel panel-body" style="padding-top:10px !important;min-height: 1200px;">
		<table style="width: 100%;">
		<?php 
			if(@$page == 1){
		?>	
			<tr>
				<td style="width:100px;vertical-align: top;">

				</td>
				<td class="text-center">
					<img src="<?php echo base_url(PROJECTPATH.$this->logo_path); ?>" alt="Logo" style="height: 80px;" />
					<h3 class="title_view"><?php echo @$_SESSION['COOP_NAME'];?></h3>
					<h3 class="title_view">รายงานสมาชิกเสียชีวิต</h3>
					<h3 class="title_view">
					<?php
						echo (@$_GET['start_date'] == @$_GET['end_date'])?"":"ระหว่าง";
						echo "วันที่ ".$this->center_function->ConvertToThaiDate($start_date);
						echo (@$_GET['start_date'] == @$_GET['end_date'])?"":"  ถึง  ".$this->center_function->ConvertToThaiDate($end_date);
					?>
					</h3>
					</td>
					<td style="width:100px;vertical-align: top;" class="text-right">
					<a class="no_print" onclick="window.print();"><button class="btn btn-perview btn-after-input" type="button"><span class="icon icon-print" aria-hidden="true"></span></button></a>
					<?php
						$get_param = '?';
						foreach(@$_GET as $key => $value){
							$get_param .= $key.'='.$value.'&';
						}
						$get_param = substr($get_param,0,-1);
					?>
					<a class="no_print"  target="_blank" href="<?php echo base_url(PROJECTPATH.'/report_cremation_data/coop_report_pass_away_excel'.$get_param); ?>">
						<button class="btn btn-perview btn-after-input" type="button"><span class="icon icon icon-file-excel-o" aria-hidden="true"></span></button>
					</a>
				</td>
			</tr>
		<?php } ?>
			<tr>
				<td colspan="3" style="text-align: right;">
					<span class="title_view">หน้าที่ <?php echo @$page.'/'.@$page_all;?></span><br>
				</td>
			</tr> 
			<tr>
				<td colspan="3" style="text-align: right;">
					<span class="title_view">วันที่ <?php echo $this->center_function->ConvertToThaiDate(@date('Y-m-d'),1,0);?></span>
				</td>
			</tr> 
			<tr>
				<td colspan="3" style="text-align: right;">
					<span class="title_view">เวลา <?php echo date('H:i:s');?></span>
				</td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: right;">
					<span class="title_view">ผู้ทำรายการ <?php echo $_SESSION['USER_NAME'];?></span>
				</td>
			</tr>
		</table>

		<table class="table table-view table-center">
			<thead>
				<?php
					if(@$page == 1){
				?>
				<?php
					}
				?>
				<tr>
					<th style="vertical-align: middle;">ลำดับ</th>
					<th style="vertical-align: middle;">วันที่ทำรายการ</th>
					<th style="vertical-align: middle;">เลขฌาปนกิจ</th>
					<th style="vertical-align: middle;">ชื่อสกุล</th>
					<th style="vertical-align: middle;">รหัสสมาชิก</th>
					<th style="vertical-align: middle;">เงินสงเคราะห์</th>
					<th style="vertical-align: middle;">เงินสงเคราะห์ล่วงหน้า</th>
					<th style="vertical-align: middle;">รวม</th>
				</tr>
			</thead>
			<tbody>

			<?php
				foreach($data as $key => $row){
					$cremation_receive_total += $row["cremation_receive_amount"] - $row["action_fee_percent"];
					$cremation_balance_total += $row["cremation_balance_amount"];
					$adv_payment_total += $row["adv_payment_balance"];
			?>
				<tr>
					<td class="text-center" style="vertical-align: middle;"><?php echo ++$runno;?></td>
					<td class="text-center" style="vertical-align: middle;"><?php echo $this->center_function->ConvertToThaiDate($row["createdatetime"]);?></td>
					<td class="text-center" style="vertical-align: middle;"><?php echo $row["member_cremation_id"];?></td>
					<td class="text-left" style="vertical-align: middle;"><?php echo $row["prename_full"].$row["assoc_firstname"]." ".$row["assoc_lastname"];?></td>
					<td class="text-center" style="vertical-align: middle;"><?php echo !empty($row["ref_member_id"]) ? $row["ref_member_id"] : $row["member_id"];?></td>
					<td class="text-right" style="vertical-align: middle;"><?php echo number_format($row["cremation_receive_amount"] - $row["action_fee_percent"],2);?></td>
					<td class="text-right" style="vertical-align: middle;"><?php echo number_format($row["adv_payment_balance"],2);?></td>
					<td class="text-right" style="vertical-align: middle;"><?php echo number_format($row["cremation_balance_amount"],2);?></td>
				</tr>
			<?php
					$total += $row["benefits_approved_amount"];
				}
				if ($page == $page_all) {
			?>
				<tr>
					<td colspan="5" class="text-center" style="vertical-align: middle;">รวม</td>
					<td class="text-right" style="vertical-align: middle;"><?php echo number_format($cremation_receive_total,2);?></td>
					<td class="text-right" style="vertical-align: middle;"><?php echo number_format($adv_payment_total,2);?></td>
					<td class="text-right" style="vertical-align: middle;"><?php echo number_format($cremation_balance_total,2);?></td>
				</tr>
			<?php
				}
			?>
			</tbody>
		</table>
	</div>
</div>
<?php
	}
?>