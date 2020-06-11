<?php
function U2T($text) { return @iconv("UTF-8", "TIS-620//IGNORE", ($text)); }
function num_format($text) {
    if($text!=''){
        return number_format($text,2);
    }else{
        return '';
    }
}
    // print_r($user);
	$filename = $_SERVER["DOCUMENT_ROOT"]."/fsccoop"."/assets/document/loan/loan_02.pdf" ;
	//echo $filename;exit;
	
	$pdf = new FPDI();
	// echo $filename;exit;
    $pageCount_1 = $pdf->setSourceFile($filename);
    $myImage = "assets/images/check-mark.png";
    $data = $loan_fscoop;

    // echo "<pre>";
    // print_r($data);exit;
    
    $age = $this->center_function->diff_birthday($data['birthday']);
    $monthtext          = $this->center_function->month_arr();
    $money_loan_amount_2text = $this->center_function->convert($data['loan_amount']);
    $money_salary_2text = $this->center_function->convert($data['loan_amount']);

    $date_to_text       = number_format(substr($data['approve_date'], 8, 2));
    $date_to_month      = number_format(substr($data['approve_date'], 5, 2));
    $date_to_year       = (substr($data['approve_date'], 0, 4))+543;
    $month2text         = $monthtext[$date_to_month];
    $full_date          = $date_to_text."  ".$month2text."  ".$date_to_year;
    $day_start_period   = number_format(substr($data['date_start_period'], 8, 2));
    $month_start_period = number_format(substr($data['date_start_period'], 5, 2));
    $year_start_period  = (substr($data['approve_date'], 0, 4))+543;
    $full_start_period  = $day_start_period."  ".$month_start_period."  ".$year_start_period;
    $fullname_th        = $data['firstname_th']."  ".$data['lastname_th'];
	for ($pageNo = 1; $pageNo <= $pageCount_1; $pageNo++) {	
        $pdf->AddPage();
            $tplIdx = $pdf->importPage($pageNo);
            $pdf->useTemplate($tplIdx, 0, 0, 0, 0, true);
            $pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
            $pdf->SetFont('THSarabunNew', '', 14 );
            
            $border = 1;
            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetAutoPageBreak(true,0);
            if($pageNo == '1'){
                $y_point = 44;
                    $pdf->Image($myImage, 29, $y_point, 3);
                $y_point = 52;
                    $pdf->Image($myImage, 29, $y_point, 3);
                $y_point = 59;
                    $pdf->Image($myImage, 29, $y_point, 3);
                $y_point = 66.9;
                    $pdf->Image($myImage, 29, $y_point, 3);
                $y_point = 73.7;
                    $pdf->Image($myImage, 29, $y_point, 3);
                $y_point = 82.5;
                    $pdf->Image($myImage, 29, $y_point, 3);
                $y_point = 89.5;
                    $pdf->Image($myImage, 95.5, $y_point, 3);
                $y_point = 97.2;
                    $pdf->Image($myImage, 29, $y_point, 3);
                $y_point = 104.4;
                    $pdf->Image($myImage, 29, $y_point, 3);
                $y_point = 120.4;
                    $pdf->Image($myImage, 29, $y_point, 3);
                $y_point = 128.4;
                    $pdf->Image($myImage, 29, $y_point, 3);
                $y_point = 136;
                    $pdf->Image($myImage, 29, $y_point, 3);
                $y_point = 143.5;
                    $pdf->Image($myImage, 44.7, $y_point, 3);
                $y_point = 150.8;
                    $pdf->Image($myImage, 44.7, $y_point, 3);
                $y_point = 158.5;
                    $pdf->Image($myImage, 44.7, $y_point, 3);
            }else if($pageNo == '2'){

            }else if($pageNo == '3'){
                $y_point = 48.1;
                    $pdf->SetXY( 135.3, $y_point );
                    $pdf->MultiCell(61, 5, U2T('สหกรณ์ออมทรัพย์โรงพยาบาลตำรวจ+'), $border, "C"); //เขียนที่
                $y_point = 55;
                    $pdf->SetXY( 132, $y_point );
                    $pdf->MultiCell(13, 5, U2T($date_to_text), $border, "C"); //วันที่
                    $pdf->SetXY( 153.5, $y_point );
                    $pdf->MultiCell(23, 5, U2T($month2text), $border, "C"); //วันที่
                    $pdf->SetXY( 184.5, $y_point );
                    $pdf->MultiCell(15, 5, U2T($date_to_year), $border, "C"); //วันที่
                $y_point = 74;
                    $pdf->SetXY( 49, $y_point );
                    $pdf->MultiCell(70, 5, U2T($fullname_th), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 150, $y_point );
                    $pdf->MultiCell(20, 5, U2T($data['member_id']), $border, "C"); //สมาชิกเลขทะเบียนที่
                    $pdf->SetXY( 177, $y_point );
                    $pdf->MultiCell(12, 5, U2T($age), $border, "C"); //อายุ
                $y_point = 81.2;
                    $pdf->SetXY( 79, $y_point );
                    $pdf->MultiCell(57, 5, U2T(($data['position_name']=='')?'-':$data['position_name']), $border, "C"); //ตำแหน่ง
                    $pdf->SetXY( 146, $y_point );
                    $pdf->MultiCell(50, 5, U2T($data['mem_group_name']), $border, "C"); //สังกัด
                $y_point = 95.8;
                    $pdf->SetXY( 93, $y_point );
                    $pdf->MultiCell(27, 5, U2T(number_format($data['loan_amount'])), $border, "C"); //จำนวนเงินกู้
                    $pdf->SetXY( 130, $y_point );
                    $pdf->MultiCell(61, 5, U2T($money_loan_amount_2text), $border, "C"); //จำนวนเงินกู้ตัวอักษร
                $y_point = 102.8;
                    $pdf->SetXY( 53, $y_point );
                    $pdf->MultiCell(24, 5, U2T($data['period_amount']), $border, "C"); //ระยะเวลาผ่อนชำระ
                    $pdf->SetXY( 144.3, $y_point );
                    $pdf->MultiCell(35, 5, U2T($data['money_per_period']), $border, "C"); //จำนวนที่ผ่อนชำระได้
                $y_point = 118.7;
                    $pdf->Image($myImage, 43.5, $y_point, 3); //Check วัตถุประสงค์ในการซื้อ
                $y_point = 131.5;
                    $pdf->SetXY( 43.5, $y_point );
                    $pdf->MultiCell(37, 5, U2T('1,200,000+'), $border, "C"); //ราคาซื้อขายบ้านพร้อมที่ดิน
                    $pdf->SetXY( 102, $y_point );
                    $pdf->MultiCell(28, 5, U2T('250+'), $border, "C"); //เงินมัดจำ
                    $pdf->SetXY( 158.5, $y_point );
                    $pdf->MultiCell(25.5, 5, U2T('150+'), $border, "C"); //เงินทุนส่วนตัว
                $y_point = 139;
                    $pdf->SetXY( 93.5, $y_point );
                    $pdf->MultiCell(36, 5, U2T(number_format($data['loan_amount_total_balance'])), $border, "C"); //เงินต้นจำนวน
                    $pdf->SetXY( 148.8, $y_point );
                    $pdf->MultiCell(35, 5, U2T(number_format($data['loan_interest_amount'])), $border, "C"); //ดอกเบี้ยจำนวน
                $y_point = 146.1;
                    $pdf->SetXY( 76.5, $y_point );
                    $pdf->MultiCell(52.8, 5, U2T('Schweizerische Nationalbank++'), $border, "C"); //ภาระจำนองสถาบันการเงิน
                    $pdf->SetXY( 136.5, $y_point );
                    $pdf->MultiCell(52.8, 5, U2T('วัดเกต++'), $border, "C"); //สาขา
                $y_point = 164.9;
                    $pdf->SetXY( 42.5, $y_point );
                    $pdf->MultiCell(22, 5, U2T('99/99++'), $border, "C"); //โฉนดเลขที่
                    $pdf->SetXY( 82.9, $y_point );
                    $pdf->MultiCell(22, 5, U2T('ป่าแดด++'), $border, "C"); //ตำบล, แขวง
                $y_point = 171.9;
                    $pdf->SetXY( 40, $y_point );
                    $pdf->MultiCell(26.5, 5, U2T('หางดง++'), $border, "C"); //อำเภอ, เขต
                    $pdf->SetXY( 80, $y_point );
                    $pdf->MultiCell(25, 5, U2T('เชียงใหม่++'), $border, "C"); //จังหวัด
                $y_point = 179.2;
                    $pdf->SetXY( 52, $y_point );
                    $pdf->MultiCell(10.5, 5, U2T('120++'), $border, "C"); //อำเภอ, เขต
                    $pdf->SetXY( 68, $y_point );
                    $pdf->MultiCell(10, 5, U2T('30++'), $border, "C"); //จังหวัด
                    $pdf->SetXY( 84.5, $y_point );
                    $pdf->MultiCell(12.3, 5, U2T('100++'), $border, "C"); //จังหวัด
                $y_point = 186.3;
                    $pdf->SetXY( 42, $y_point );
                    $pdf->MultiCell(21.5, 5, U2T('120++'), $border, "C"); //อำเภอ, เขต
                    $pdf->SetXY( 72.5, $y_point );
                    $pdf->MultiCell(26, 5, U2T('120++'), $border, "C"); //อำเภอ, เขต
                $y_point = 164.9;
                    $pdf->SetXY( 127.5, $y_point );
                    $pdf->MultiCell(15, 5, U2T('99/99++'), $border, "C"); //ห้องชุดเลขที่
                    $pdf->SetXY( 152.9, $y_point );
                    $pdf->MultiCell(10, 5, U2T('2++'), $border, "C"); //ชั้น
                    $pdf->SetXY( 170, $y_point );
                    $pdf->MultiCell(11.5, 5, U2T('2++'), $border, "C"); //เนื้อที่.....ตรม
                $y_point = 171.9;
                    $pdf->SetXY( 127.5, $y_point );
                    $pdf->MultiCell(60, 5, U2T('Burj Khalifa++'), $border, "C"); //ชื่ออาคาร, ชุด
                $y_point = 179.2;
                    $pdf->SetXY( 127.5, $y_point );
                    $pdf->MultiCell(18.5, 5, U2T('loft++'), $border, "C"); //ห้องชุดแบบ
                    $pdf->SetXY( 164, $y_point );
                    $pdf->MultiCell(26, 5, U2T('ช้างเผือก'), $border, "C"); //ตำบล, แขวง
                $y_point = 186.3;
                    $pdf->SetXY( 126, $y_point );
                    $pdf->MultiCell(25.5, 5, U2T('เมืองเชียงใหม่++'), $border, "C"); //อำเภอ, เขต
                    $pdf->SetXY( 164.5, $y_point );
                    $pdf->MultiCell(26, 5, U2T('เชียงใหม่++'), $border, "C"); //จังหวัด

                $y_point = 201;
                    $pdf->SetXY( 70, $y_point );
                    $pdf->MultiCell(43, 5, U2T('Masters Degree++'), $border, "C"); //การศึกษาระดับ
                    $pdf->SetXY( 120, $y_point );
                    $pdf->MultiCell(70, 5, U2T('Duke University++'), $border, "C"); //จาก...
                $y_point = 209.2;
                    $pdf->Image($myImage, 143, $y_point, 3);
                $y_point = 208.1;
                    $pdf->SetXY( 155, $y_point );
                    $pdf->MultiCell(20, 5, U2T('PHP++'), $border, "C"); //อาชีพ
                $y_point = 215;
                    $pdf->SetXY( 37.5, $y_point );
                    $pdf->MultiCell(37, 5, U2T($data['position_name']), $border, "C"); //อาชีพ
                    $pdf->SetXY( 90.5, $y_point );
                    $pdf->MultiCell(30, 5, U2T('Cyber Cop++'), $border, "C"); //แผนก
                    $pdf->SetXY( 130.7, $y_point );
                    $pdf->MultiCell(27, 5, U2T('08X-XX5664X++'), $border, "C"); //เบอร์โทรศัพท์
                    $pdf->SetXY( 175, $y_point );
                    $pdf->MultiCell(16, 5, U2T('18++'), $border, "C"); //อายุ
                $y_point = 222.3;
                    $pdf->SetXY( 46, $y_point );
                    $pdf->MultiCell(40, 5, U2T($data['salary']), $border, "C"); //อัตตราเงินเดือน
                    $pdf->SetXY( 116.5, $y_point );
                    $pdf->MultiCell(32, 5, U2T('Trade++'), $border, "C"); //แผนก
                    $pdf->SetXY( 160.5, $y_point );
                    $pdf->MultiCell(28, 5, U2T('180,000++'), $border, "C"); //แผนก
                $y_point = 231;
                    $pdf->Image($myImage, 67.5, $y_point, 3);
                $y_point = 236.5;
                    $pdf->SetXY( 41, $y_point );
                    $pdf->MultiCell(41.5, 5, U2T('ลลิษา มโนบาล++'), $border, "C"); //ชื่อคู่สมรส
                    $pdf->SetXY( 90, $y_point );
                    $pdf->MultiCell(12, 5, U2T('23++'), $border, "C"); //อายุ
                    $pdf->SetXY( 117, $y_point );
                    $pdf->MultiCell(35, 5, U2T('นักร้อง/นักแสดง++'), $border, "C"); //อาชีพ
                    $pdf->SetXY( 165, $y_point );
                    $pdf->MultiCell(30, 5, U2T('Vocal++'), $border, "C"); //อายุ
                $y_point = 243.5;
                    $pdf->SetXY( 46, $y_point );
                    $pdf->MultiCell(57, 5, U2T('Interscope Records++'), $border, "C"); //อายุ
                    $pdf->SetXY( 115.5, $y_point );
                    $pdf->MultiCell(80, 5, U2T('California++'), $border, "C"); //อายุ
                $y_point = 250.8;
                    $pdf->SetXY( 36.5, $y_point );
                    $pdf->MultiCell(37, 5, U2T('13,500++'), $border, "C"); //อายุ
                    $pdf->SetXY( 104, $y_point );
                    $pdf->MultiCell(18, 5, U2T('0++'), $border, "C"); //อายุ
                    $pdf->SetXY( 155, $y_point );
                    $pdf->MultiCell(29, 5, U2T('150,000++'), $border, "C"); //อายุ
                $y_point = 258.1;
                    $pdf->SetXY( 87.5, $y_point );
                    $pdf->MultiCell(22, 5, U2T($data['address_no']), $border, "C"); //อายุ
                    $pdf->SetXY( 117.2, $y_point );
                    $pdf->MultiCell(28.5, 5, U2T($data['address_moo']), $border, "C"); //อายุ
                    $pdf->SetXY( 153.2, $y_point );
                    $pdf->MultiCell(42, 5, U2T($data['address_distric']), $border, "C"); //อายุ
                $y_point = 265.1;
                    $pdf->SetXY( 32.5, $y_point );
                    $pdf->MultiCell(38.5, 5, U2T($data['address_road']), $border, "C"); //อายุ
                    $pdf->SetXY( 88.7, $y_point );
                    $pdf->MultiCell(45, 5, U2T('หนองสาหร่าย'), $border, "C"); //อายุ
                    $pdf->SetXY( 150, $y_point );
                    $pdf->MultiCell(45, 5, U2T('ปากช่อง'), $border, "C"); //อายุ
                $y_point = 272.3;
                    $pdf->SetXY( 36, $y_point );
                    $pdf->MultiCell(49, 5, U2T('ปากช่อง'), $border, "C"); //อายุ
                    $pdf->SetXY( 107, $y_point );
                    $pdf->MultiCell(25, 5, U2T('30130'), $border, "C"); //อายุ
                    $pdf->SetXY( 142, $y_point );
                    $pdf->MultiCell(55, 5, U2T('30130'), $border, "C"); //อายุ
            }else if($pageNo == '4'){
                $y_point = 93.1;
                    $pdf->SetXY( 43, $y_point );
                    $pdf->MultiCell(60.5, 5, U2T('ลลิษา มโนบาล'), $border, "C"); //ชื่อคู่สมรส
                    $pdf->SetXY( 127, $y_point );
                    $pdf->MultiCell(60.5, 5, U2T('Interscope Records'), $border, "C"); //ชื่อคู่สมรส
                $y_point = 100.2;
                    $pdf->SetXY( 140, $y_point );
                    $pdf->MultiCell(56, 5, U2T('+82 10-5468-9804'), $border, "C"); //ชื่อคู่สมรส

            }else if($pageNo == '5'){

            }else if($pageNo == '6'){
                    
            }else if($pageNo == '7'){

                $y_point = 59.6;
                    $pdf->SetXY( 130.8, $y_point );
                    $pdf->MultiCell(9.5, 5, U2T($date_to_text), $border, "C"); //วันที่
                    $pdf->SetXY( 149, $y_point );
                    $pdf->MultiCell(21, 5, U2T($month2text), $border, "C"); //วันที่
                    $pdf->SetXY( 178, $y_point );
                    $pdf->MultiCell(15, 5, U2T($date_to_year), $border, "C"); //วันที่
                $y_point = 71.5;
                    $pdf->SetXY( 49.3, $y_point );
                    $pdf->MultiCell(53, 5, U2T($fullname_th), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 140, $y_point );
                    $pdf->MultiCell(35, 5, U2T($data['id_card']), $border, "C"); //ID Card
                    $pdf->SetXY( 182.5, $y_point );
                    $pdf->MultiCell(10, 5, U2T($age), $border, "C"); //อายุ
                $y_point = 79;
                    $pdf->SetXY( 56.2, $y_point );
                    $pdf->MultiCell(19, 5, U2T($data['address_no']), $border, "C"); //บ้านเลขที่
                    $pdf->SetXY( 85.5, $y_point );
                    $pdf->MultiCell(16, 5, U2T($data['address_moo']), $border, "C"); //หมู่
                    $pdf->SetXY( 119, $y_point );
                    $pdf->MultiCell(30, 5, U2T($data['address_soi']), $border, "C"); //ซอย
                    $pdf->SetXY( 158.5, $y_point );
                    $pdf->MultiCell(37, 5, U2T($data['address_road']), $border, "C"); //ถนน
                $y_point = 86.8;
                    $pdf->SetXY( 44, $y_point );
                    $pdf->MultiCell(30, 5, U2T($data['district_name']), $border, "C"); //ตำบล
                    $pdf->SetXY( 95, $y_point );
                    $pdf->MultiCell(46, 5, U2T($data['amphur_name']), $border, "C"); //อำเภอ
                    $pdf->SetXY( 153, $y_point );
                    $pdf->MultiCell(42.5, 5, U2T($data['province_name']), $border, "C"); //จังหวัด
                $y_point = 94.3;
                    $pdf->SetXY( 52, $y_point );
                    $pdf->MultiCell(38.5, 5, U2T($data['tel']), $border, "C"); //เบอร์โทรศัพท์บ้าน
                    $pdf->SetXY( 103.5, $y_point );
                    $pdf->MultiCell(35.5, 5, U2T($data['mobile']), $border, "C"); //เบอร์มือถือ
                    $pdf->SetXY( 152, $y_point );
                    $pdf->MultiCell(43, 5, U2T($data['position_name***']), $border, "C"); //ตำแหน่ง
                $y_point = 101.8;
                    $pdf->SetXY( 35, $y_point );
                    $pdf->MultiCell(36, 5, U2T('Interscope Records***'), $border, "C"); //สังกัต
                    $pdf->SetXY( 109, $y_point );
                    $pdf->MultiCell(16.5, 5, U2T($data['salary']), $border, "C"); //เงินเดือน
                    $pdf->SetXY( 136, $y_point );
                    $pdf->MultiCell(57, 5, U2T($money_salary_2text), $border, "C"); //เงินเดือน(ตัวอักษร)
                $y_point = 109.8;
                    $pdf->SetXY( 163.5, $y_point );
                    $pdf->MultiCell(32, 5, U2T('SM054489++'), $border, "C"); //ทะเบียนสมาชิก
                $y_point = 132.8;
                    $pdf->SetXY( 82.5, $y_point );
                    $pdf->MultiCell(31, 5, U2T('SM054489++'), $border, "C"); //สัญญากู้เลขที่
                    $pdf->SetXY( 140.5, $y_point );
                    $pdf->MultiCell(31, 5, U2T('SM054489++'), $border, "C"); //คำขอกู้เลขที่
            }else if($pageNo == '8'){

            }else if($pageNo == '9'){
                $y_point = 64.8;
                    $pdf->SetXY( 130, $y_point );
                    $pdf->MultiCell(9.5, 5, U2T($date_to_text), $border, "C"); //วันที่
                    $pdf->SetXY( 147, $y_point );
                    $pdf->MultiCell(30, 5, U2T($month2text), $border, "C"); //วันที่
                    $pdf->SetXY( 183, $y_point );
                    $pdf->MultiCell(15, 5, U2T($date_to_year), $border, "C"); //วันที่
                $y_point = 80.1;
                    $pdf->SetXY( 51, $y_point );
                    $pdf->MultiCell(100, 5, U2T($fullname_th."++(คู่สมรส)"), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 162.5, $y_point );
                    $pdf->MultiCell(30, 5, U2T($age), $border, "C"); //ชื่อผู้กู้
                $y_point = 87.9;
                    $pdf->SetXY( 45.2, $y_point );
                    $pdf->MultiCell(22.2, 5, U2T($data['address_no']), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 76.5, $y_point );
                    $pdf->MultiCell(15.7, 5, U2T($data['address_moo']), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 109.7, $y_point );
                    $pdf->MultiCell(36, 5, U2T($data['address_soi']), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 155.5, $y_point );
                    $pdf->MultiCell(40, 5, U2T($data['address_road']), $border, "C"); //ชื่อผู้กู้
                $y_point = 95.1;
                    $pdf->SetXY( 45.2, $y_point );
                    $pdf->MultiCell(47, 5, U2T($data['district_name']), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 110, $y_point );
                    $pdf->MultiCell(35, 5, U2T($data['amphur_name']), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 158, $y_point );
                    $pdf->MultiCell(35, 5, U2T($data['province_name']), $border, "C"); //ชื่อผู้กู้
                $y_point = 102.9;
                    $pdf->SetXY( 60, $y_point );
                    $pdf->MultiCell(98, 5, U2T($fullname_th), $border, "C"); //ชื่อผู้กู้
                $y_point = 203.5;
                    $pdf->SetXY(49, $y_point);
                    $pdf->MultiCell(119, 5, U2T($fullname_th), $border, "C"); //ชื่อผู้กู้
                $y_point = 210.7;
                    $pdf->SetXY(53, $y_point);
                    $pdf->MultiCell(95, 5, U2T('ชื่อคู่สมรส****'), $border, "C"); //ชื่อคู่สมรส
            }else if($pageNo == '10'){

            }else if($pageNo == '11'){
                $y_point = 63.9;
                $pdf->SetXY( 127, $y_point );
                $pdf->MultiCell(9.5, 5, U2T($date_to_text), $border, "C"); //วันที่
                $pdf->SetXY( 145, $y_point );
                $pdf->MultiCell(30, 5, U2T($month2text), $border, "C"); //วันที่
                $pdf->SetXY( 180.5, $y_point );
                $pdf->MultiCell(15, 5, U2T($date_to_year), $border, "C"); //วันที่
                $y_point = 91.4;
                $pdf->SetXY( 61, $y_point );
                $pdf->MultiCell(130, 5, U2T($fullname_th), $border, "C"); //ชื่อผู้กู้
                $y_point = 99.1;
                $pdf->SetXY( 140, $y_point );
                $pdf->MultiCell(50, 5, U2T($data['loan_amount']), $border, "C"); //เงินกู้
                $y_point = 106.8;
                $pdf->SetXY( 28, $y_point );
                $pdf->MultiCell(95, 5, U2T($money_loan_amount_2text), $border, "C"); //จำนวนเงิน(ตัวอักษร)
                $y_point = 114.5;
                $pdf->SetXY( 45, $y_point );
                $pdf->MultiCell(44, 5, U2T($full_date), $border, "C"); //วันที่กู้
                $y_point = 129.5;
                $pdf->SetXY( 69.5, $y_point );
                $pdf->MultiCell(37, 5, U2T($full_date), $border, "C"); //ในวันที่กู้
                $pdf->SetXY( 124, $y_point );
                $pdf->MultiCell(62, 5, U2T($data['loan_amount']), $border, "C"); //เงินกู้
                $y_point = 137.3;
                $pdf->SetXY( 28, $y_point );
                $pdf->MultiCell(100, 5, U2T($money_loan_amount_2text), $border, "C"); //จำนวนเงิน(ตัวอักษร)
                $y_point = 146;
                $pdf->Image($myImage, 39, $y_point, 3);
                $y_point = 154.8;
                $pdf->Image($myImage, 39, $y_point, 3);
                $y_point = 169.3;
                $pdf->Image($myImage, 39, $y_point, 3);
                $y_point = 184.7;
                $pdf->Image($myImage, 39, $y_point, 3);
                $y_point = 199.5;
                $pdf->Image($myImage, 39, $y_point, 3);
            }
    }
	
	//exit;
	$pdf->Output();