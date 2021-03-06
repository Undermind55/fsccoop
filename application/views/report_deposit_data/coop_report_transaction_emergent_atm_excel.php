<?php 
header("Content-type: application/vnd.ms-excel;charset=utf-8;");
header("Content-Disposition: attachment; filename=รายงานความเคลื่อนไหวเงินกู้ฉุกเฉิน ATM.xls"); 
date_default_timezone_set('Asia/Bangkok');
?>
<pre>
	<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<style>
				.num {
				  mso-number-format:General;
				}
				.text{
				  mso-number-format:"\@";/*force text*/ 
				}
				.text-center{
					text-align: center;
				}
				.text-left{
					text-align: left;
				}
				.table_title{
					font-family: AngsanaUPC, MS Sans Serif;
					font-size: 22px;
					font-weight: bold;
					text-align:center;
				}
				.table_title_right{
					font-family: AngsanaUPC, MS Sans Serif;
					font-size: 16px;
					font-weight: bold;
					text-align:right;
				}
				.table_header_top{
					font-family: AngsanaUPC, MS Sans Serif;
					font-size: 19px;
					font-weight: bold;
					text-align:center;
					border-top: thin solid black;
					border-left: thin solid black;
					border-right: thin solid black;
				}
				.table_header_mid{
					font-family: AngsanaUPC, MS Sans Serif;
					font-size: 19px;
					font-weight: bold;
					text-align:center;
					border-left: thin solid black;
					border-right: thin solid black;
				}
				.table_header_bot{
					font-family: AngsanaUPC, MS Sans Serif;
					font-size: 19px;
					font-weight: bold;
					text-align:center;
					border-bottom: thin solid black;
					border-left: thin solid black;
					border-right: thin solid black;
				}
				.table_header_bot2{
					font-family: AngsanaUPC, MS Sans Serif;
					font-size: 19px;
					font-weight: bold;
					text-align:center;
					border: thin solid black;
				}
				.table_body{
					font-family: AngsanaUPC, MS Sans Serif;
					font-size: 21px;
					border: thin solid black;
				}
				.table_body_right{
					font-family: AngsanaUPC, MS Sans Serif;
					font-size: 21px;
					border: thin solid black;
					text-align:right;
				}
			</style>
		</head>
		<body>
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
//echo '<pre>'; print_r($_GET); echo '</pre>';
if(@$_GET['month']!='' && @$_GET['year']!=''){
	$day = '';
	$month = @$_GET['month'];
	$year = @$_GET['year'];
	$title_date = " เดือน ".@$month_arr[$month]." ปี ".(@$year);
}else{
	$day = '';
	$month = '';
	$year = @$_GET['year'];
	$title_date = " ปี ".(@$year);
}	
$last_runno = 0;		
//if(!empty($data)){
	//foreach(@$data AS $page=>$data_row){
	?>
				<table class="table table-bordered">	
					<tr>
						<tr>
							<th class="table_title" colspan="7"><?php echo @$_SESSION['COOP_NAME'];?></th>
						</tr>
						<tr>
							<th class="table_title" colspan="7">รายงานความเคลื่อนไหวเงินกู้ฉุกเฉิน ATM</th>
						</tr>
						<tr>
							<th class="table_title" colspan="7">
								<?php 
									echo (@$_GET['start_date'] == @$_GET['end_date'])?"":"ตั้งแต่";
									echo "วันที่ ".$this->center_function->ConvertToThaiDate($start_date);
									echo (@$_GET['start_date'] == @$_GET['end_date'])?"":"  ถึงวันที่  ".$this->center_function->ConvertToThaiDate($end_date);
								?>
							</th>
						</tr>
						<tr>
							<th class="table_title_right" colspan="7">
								<span class="title_view">วันที่ <?php echo $this->center_function->ConvertToThaiDate(@date('Y-m-d'),1,0);?></span>				
								<span class="title_view">   เวลา <?php echo date('H:i:s');?></span>	
							</th>
						</tr>
					</tr> 
				</table>
			
				<table class="table table-bordered">
					<thead> 
					
						<tr>
							<th class="table_header_top" style="width: 40px;vertical-align: middle;">ลำดับ</th>
							<th class="table_header_top" style="width: 100px;vertical-align: middle;">วันที่</th>
							<th class="table_header_top" style="width: 60px;vertical-align: middle;">เวลา</th>
							<th class="table_header_top" style="width: 80px;vertical-align: middle;">เลขที่สมาชิก</th>
							<th class="table_header_top" style="width: 80px;vertical-align: middle;">เลขที่สัญญา</th>
							<th class="table_header_top" style="width: 180px;vertical-align: middle;">ชื่อ-นามสกุล</th>
							<th class="table_header_top" style="width: 80px;vertical-align: middle;">จำนวนเงิน</th>
							<th class="table_header_top" style="width: 80px;vertical-align: middle;">หมายเหตุ</th>
						</tr> 
					</thead>
					<tbody>
					<?php
						$runno = $last_runno;
						$all_loan_amount = 0;
						if(!empty($data)){
							foreach(@$data as $key => $row){
								$runno++;
								$member_name =	@$row['prename_short'].@$row['firstname_th'].'  '.@$row['lastname_th'];
								$all_loan_amount += @$row['loan_amount'];
					?>			
							<tr> 
							  <td class="table_body" style="text-align: center;vertical-align: top;"><?php echo @$runno; ?></td>
							  <td class="table_body" style="text-align: center;vertical-align: top;"><?php echo (@$row['loan_date'])?$this->center_function->mydate2date(@$row['loan_date']):"";?></td>
							  <td class="table_body" style="text-align: center;vertical-align: top;"><?php echo (@$row['loan_date'])?date(" H:i" , strtotime(@$row['loan_date'])):""?></td>						 
							  <td class="table_body" style='text-align: center;vertical-align: top;mso-number-format:"\@";'><?php echo @$row['member_id'];?></td>						 
							  <td class="table_body" style="text-align: center;vertical-align: top;"><?php echo @$row['contract_number'];?></td>	
							  <td class="table_body" style="text-align: left;vertical-align: top;"><?php echo @$member_name;?></td> 					 
							  <td class="table_body" style="text-align: right;vertical-align: top;"><?php echo number_format(@$row['loan_amount'],2); ?></td> 					 
							  <td class="table_body" style="text-align: center;vertical-align: top;"><?php echo (@$row['transaction_at'] == '1')?'ATM':'ผ่านระบบ'; ?></td> 					 
							</tr>									
					
					<?php									
							}
						}
						$last_runno = $runno;
					?>
						<tr> 
						  <td class="table_body" style="text-align: right;vertical-align: top;" colspan="6">รวม</td>
						 <td class="table_body" style="text-align: right;vertical-align: top;"><?php echo number_format(@$all_loan_amount,2); ?></td> 					 
						 <td class="table_body" style="text-align: right;vertical-align: top;">&nbsp;</td> 					 
						</tr>	
					</tbody>    
				</table>
<?php 
	//}
//} 
?>


		</body>
	</html>
</pre>