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
	$filename = $_SERVER["DOCUMENT_ROOT"]."/fsccoop"."/assets/document/loan/loan_03.pdf" ;
	//echo $filename;exit;
	
	$pdf = new FPDI();
	// echo $filename;exit;
    $pageCount_1 = $pdf->setSourceFile($filename);
    $myImage = "assets/images/check-mark.png";
    $data = $loan_fscoop;

    $age                = $this->center_function->diff_birthday($data['birthday']);
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
                $y_point = 86.2;
                    $pdf->Image($myImage, 29, $y_point, 3);
                $y_point = 94;
                    $pdf->Image($myImage, 29, $y_point, 3);
                $y_point = 101.4;
                    $pdf->Image($myImage, 29, $y_point, 3);
                $y_point = 109;
                    $pdf->Image($myImage, 29, $y_point, 3);
                $y_point = 116.0;
                    $pdf->Image($myImage, 29, $y_point, 3);
                $y_point = 124.2;
                    $pdf->Image($myImage, 29, $y_point, 3);

            }else if($pageNo == '2'){
                
            }else if($pageNo == '3'){
                $y_point = 65.5;
                    $pdf->SetXY( 135, $y_point );
                    $pdf->MultiCell(62.5, 5, U2T('สหกรณ์ออมทรัพย์โรงพยาบาลตำรวจ**'), $border, "C"); //เขียนที่
                $y_point = 72.8;
                    $pdf->SetXY( 132, $y_point );
                    $pdf->MultiCell(13, 5, U2T($date_to_text), $border, "C"); //วันที่
                    $pdf->SetXY( 153.5, $y_point );
                    $pdf->MultiCell(23, 5, U2T($month2text), $border, "C"); //เดือนที่
                    $pdf->SetXY( 184.2, $y_point );
                    $pdf->MultiCell(13, 5, U2T($date_to_year), $border, "C"); //ปี
                $y_point = 91.5;
                    $pdf->SetXY( 49, $y_point );
                    $pdf->MultiCell(70, 5, U2T($fullname_th), $border, "C"); //ชื่อ
                    $pdf->SetXY( 150, $y_point );
                    $pdf->MultiCell(20, 5, U2T($data['member_id']), $border, "C"); //สมาชิกทะเบียนที่
                    $pdf->SetXY( 176.5, $y_point );
                    $pdf->MultiCell(17.5, 5, U2T($age), $border, "C"); //อายุ
                $y_point = 98.7;
                    $pdf->SetXY( 78.5, $y_point );
                    $pdf->MultiCell(58, 5, U2T($data['position_name']), $border, "C"); //ตำแหน่ง
                    $pdf->SetXY( 146.2, $y_point );
                    $pdf->MultiCell(50, 5, U2T($data['mem_group_name']), $border, "C"); //สังกัด
                $y_point = 106;
                    $pdf->SetXY( 57.5, $y_point );
                    $pdf->MultiCell(25, 5, U2T($data['address_no']), $border, "C"); //บ้านเลขที่
                    $pdf->SetXY( 90.5, $y_point );
                    $pdf->MultiCell(40, 5, U2T(($data['address_road']=='')?'-':$data['address_road']), $border, "C"); //ถนน
                    $pdf->SetXY( 140.5, $y_point );
                    $pdf->MultiCell(55, 5, U2T(($data['address_soi']=='')?'-':$data['address_soi']), $border, "C"); //ซอย
                $y_point = 113;
                    $pdf->SetXY( 33.5, $y_point );
                    $pdf->MultiCell(47, 5, U2T(($data['district_name']=='')?'-':$data['district_name']), $border, "C"); //ตำบล
                    $pdf->SetXY( 93.5, $y_point );
                    $pdf->MultiCell(40, 5, U2T($data['amphur_name']), $border, "C"); //ปากช่อง
                    $pdf->SetXY( 145.5, $y_point );
                    $pdf->MultiCell(52, 5, U2T($data['province_name']), $border, "C"); //นครราชสีมา
                $y_point = 120.2;
                    $pdf->SetXY( 59, $y_point );
                    $pdf->MultiCell(29, 5, U2T(($data['office_tel']=='')?'-':$data['office_tel']), $border, "C"); //โทรศัพท์ติดต่อที่ทำงาน
                    $pdf->SetXY( 107.5, $y_point );
                    $pdf->MultiCell(32, 5, U2T(($data['tel']=='')?'-':$data['tel']), $border, "C"); //โทรศัพท์บ้าน
                    $pdf->SetXY( 159, $y_point );
                    $pdf->MultiCell(37, 5, U2T(($data['mobile']=='')?'-':$data['mobile']), $border, "C"); //โทรศัพท์มือถือ
                $y_point = 134.4;
                    $pdf->SetXY( 92, $y_point );
                    $pdf->MultiCell(29, 5, U2T($data['loan_amount']), $border, "C"); //จำนวนเงินกู้
                    $pdf->SetXY( 130.2, $y_point );
                    $pdf->MultiCell(62, 5, U2T($money_loan_amount_2text), $border, "C"); //จำนวนเงินกู้
                $y_point = 141.6;
                    $pdf->SetXY( 97, $y_point );
                    $pdf->MultiCell(25, 5, U2T($data['money_per_period']), $border, "C"); //เงินต้นและดอกเบี้ย
                    $pdf->SetXY( 135.2, $y_point );
                    $pdf->MultiCell(23, 5, U2T($data['period_amount']), $border, "C"); //งวด
                $y_point = 148.8;
                    $pdf->Image($myImage, 45, 151, 3);
                    $pdf->SetXY( 95, $y_point );
                    $pdf->MultiCell(25, 5, U2T('FORD**'), $border, "C"); //ยี่ห้อรถ
                    $pdf->SetXY( 127.5, $y_point );
                    $pdf->MultiCell(29, 5, U2T('MUSTANG**'), $border, "C"); //รุ่นรถ
                    $pdf->SetXY( 164.9, $y_point );
                    $pdf->MultiCell(19.8, 5, U2T('1,500,000**'), $border, "C"); //ราคา
                $y_point = 156;
                    $pdf->Image($myImage, 45, 157.3, 3);
                    $pdf->SetXY( 95, $y_point );
                    $pdf->MultiCell(25, 5, U2T('FORD**'), $border, "C"); //ยี่ห้อรถ
                    $pdf->SetXY( 127.5, $y_point );
                    $pdf->MultiCell(29, 5, U2T('MUSTANG**'), $border, "C"); //รุ่นรถ
                    $pdf->SetXY( 164.9, $y_point );
                    $pdf->MultiCell(19.8, 5, U2T('1,500,000**'), $border, "C"); //ราคา
                $y_point = 185.0;
                    $pdf->SetXY( 35, $y_point );
                    $pdf->MultiCell(80, 5, U2T('American International Assurance**'), $border, "C"); //ประกันบริษัท

            }else if($pageNo == '4'){
                $y_point = 68.5;
                    $pdf->SetXY( 127.5, $y_point );
                    $pdf->MultiCell(34, 5, U2T($full_date), $border, "C"); //วันที่
                $y_point = 90.8;
                    $pdf->SetXY( 73, $y_point );
                    $pdf->MultiCell(44.5, 5, U2T($full_date."**"), $border, "C"); //เป็นผู้กู้ตั้งแต่วันที่
                    $pdf->SetXY( 138, $y_point );
                    $pdf->MultiCell(23, 5, U2T('5**'), $border, "C"); //รวมระยะ(ปี)
                    $pdf->SetXY( 165, $y_point );
                    $pdf->MultiCell(20, 5, U2T('5**'), $border, "C"); //รวมระยะ(เดือน)
                $y_point = 98;
                    $pdf->SetXY( 87.5, $y_point );
                    $pdf->MultiCell(44.5, 5, U2T('300,000**'), $border, "C"); //หุ้นในสหกรณ์
                    $pdf->SetXY( 151.5, $y_point );
                    $pdf->MultiCell(30, 5, U2T('5'), $border, "C"); //ส่งหุ้นละ(งวด)
                $y_point = 105.1;
                    $pdf->SetXY( 54.5, $y_point );
                    $pdf->MultiCell(35.5, 5, U2T('ออมทรัพย์**'), $border, "C"); //เงินฝากประเภท
                    $pdf->SetXY( 105, $y_point );
                    $pdf->MultiCell(40, 5, U2T('596XX8258X**'), $border, "C"); //เลขที่บัญชี
                    $pdf->SetXY( 157, $y_point );
                    $pdf->MultiCell(33 , 5, U2T('500,645**'), $border, "C"); //จำนวนเงินฝาก
                $y_point = 119.5;
                    $pdf->SetXY( 62.5, $y_point );
                    $pdf->MultiCell(43, 5, U2T('SM54165**'), $border, "C"); //หนังสือกู้ฉุกเฉินที่
                    $pdf->SetXY( 113, $y_point );
                    $pdf->MultiCell(32, 5, U2T('15/01/35**'), $border, "C"); //วันที่
                    $pdf->SetXY( 162.5, $y_point );
                    $pdf->MultiCell(26 , 5, U2T($data['period_amount']), $border, "C"); //ระยะเวลากู้
                $y_point = 126.6;
                    $pdf->SetXY( 40.8, $y_point );
                    $pdf->MultiCell(27, 5, U2T($data['money_per_period']), $border, "C"); //จำนวนเงิน
                    $pdf->SetXY( 87, $y_point );
                    $pdf->MultiCell(23.4, 5, U2T('0**'), $border, "C"); //คงเหลือ
                    $pdf->SetXY( 144, $y_point );
                    $pdf->MultiCell(22.7, 5, U2T('150**'), $border, "C"); //จำนวนผ่อนชำระ
                $y_point = 133.6;
                    $pdf->SetXY( 62, $y_point );
                    $pdf->MultiCell(42, 5, U2T('หนังสือเงินกู้สามัญที่**'), $border, "C"); //หนังสือเงินกู้สามัญที่
                    $pdf->SetXY( 113, $y_point );
                    $pdf->MultiCell(32, 5, U2T('วันที่**'), $border, "C"); //วันที่
                    $pdf->SetXY( 161, $y_point );
                    $pdf->MultiCell(27, 5, U2T('ระยะเวลากู้**'), $border, "C"); //ระยะเวลากู้
                $y_point = 140.6;
                    $pdf->SetXY( 40, $y_point );
                    $pdf->MultiCell(27, 5, U2T('3000000**'), $border, "C"); //จำนวนเงิน
                    $pdf->SetXY( 86, $y_point );
                    $pdf->MultiCell(26, 5, U2T('596XX8258X**'), $border, "C"); //เขียนที่
                    $pdf->SetXY( 143, $y_point );
                    $pdf->MultiCell(24, 5, U2T('596XX8258X**'), $border, "C"); //เขียนที่
                $y_point = 147.8;
                    $pdf->SetXY( 79, $y_point );
                    $pdf->MultiCell(27, 5, U2T('596XX8258X**'), $border, "C"); //เขียนที่
                    $pdf->SetXY( 113, $y_point );
                    $pdf->MultiCell(31, 5, U2T('596XX8258X**'), $border, "C"); //เขียนที่
                    $pdf->SetXY( 162.5, $y_point );
                    $pdf->MultiCell(26, 5, U2T('596XX8258X**'), $border, "C"); //เขียนที่
                $y_point = 154.8;
                    $pdf->SetXY( 40, $y_point );
                    $pdf->MultiCell(27, 5, U2T('596XX8258X**'), $border, "C"); //เขียนที่
                    $pdf->SetXY( 86.5, $y_point );
                    $pdf->MultiCell(24, 5, U2T('596XX8258X**'), $border, "C"); //เขียนที่
                    $pdf->SetXY( 144, $y_point );
                    $pdf->MultiCell(24, 5, U2T('596XX8258X**'), $border, "C"); //เขียนที่
                $y_point = 162;
                    $pdf->SetXY( 84, $y_point );
                    $pdf->MultiCell(27, 5, U2T('596XX8258X'), $border, "C"); //เขียนที่
                    $pdf->SetXY( 142.2, $y_point );
                    $pdf->MultiCell(24, 5, U2T('596XX8258X'), $border, "C"); //เขียนที่
                $y_point = 169.2;
                    $pdf->SetXY( 58, $y_point );
                    $pdf->MultiCell(135, 5, U2T('596XX8258X'), $border, "C"); //เขียนที่

            }else if($pageNo == '5'){
                $y_point = 65.;
                    $pdf->SetXY( 130.2, $y_point );
                    $pdf->MultiCell(11, 5, U2T($date_to_text), $border, "C"); //วันที่ 
                    $pdf->SetXY( 148.9, $y_point );
                    $pdf->MultiCell(22.9, 5, U2T($month2text), $border, "C"); //เดือนที่
                    $pdf->SetXY( 178.5, $y_point );
                    $pdf->MultiCell(17, 5, U2T($date_to_year), $border, "C"); //ปี
                $y_point = 77;
                    $pdf->SetXY( 49, $y_point );
                    $pdf->MultiCell(53, 5, U2T($fullname_th), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 140, $y_point );
                    $pdf->MultiCell(35, 5, U2T($data['member_id']."**"), $border, "C"); //สมาชิกเลขทะเบียนที่
                    $pdf->SetXY( 181, $y_point );
                    $pdf->MultiCell(12, 5, U2T($age), $border, "C"); //อายุ
                $y_point = 84.8;
                    $pdf->SetXY( 56.2, $y_point );
                    $pdf->MultiCell(19, 5, U2T($data['address_no']), $border, "C"); //บ้านเลขที่
                    $pdf->SetXY( 85.5, $y_point );
                    $pdf->MultiCell(16, 5, U2T(($data['address_moo']=='')?'-':$data['address_moo']), $border, "C"); //หมู่
                    $pdf->SetXY( 119, $y_point );
                    $pdf->MultiCell(30, 5, U2T(($data['address_soi']=='')?'-':$data['address_soi']), $border, "C"); //ซอย
                    $pdf->SetXY( 158.5, $y_point );
                    $pdf->MultiCell(37, 5, U2T(($data['address_road']=='')?'-':$data['address_road']), $border, "C"); //ถนน
                $y_point = 92.6;
                    $pdf->SetXY( 44, $y_point );
                    $pdf->MultiCell(30, 5, U2T($data['district_name']), $border, "C"); //ตำบล
                    $pdf->SetXY( 95, $y_point );
                    $pdf->MultiCell(46, 5, U2T($data['amphur_name']), $border, "C"); //อำเภอ
                    $pdf->SetXY( 153, $y_point );
                    $pdf->MultiCell(42.5, 5, U2T($data['province_name']), $border, "C"); //จังหวัด
                $y_point = 100;
                    $pdf->SetXY( 52, $y_point );
                    $pdf->MultiCell(38.5, 5, U2T($data['tel']), $border, "C"); //เบอร์โทรศัพท์บ้าน
                    $pdf->SetXY( 103.5, $y_point );
                    $pdf->MultiCell(35.5, 5, U2T($data['mobile']), $border, "C"); //เบอร์มือถือ
                    $pdf->SetXY( 152, $y_point );
                    $pdf->MultiCell(43, 5, U2T($data['position_name']), $border, "C"); //ตำแหน่ง
                $y_point = 107.5;
                    $pdf->SetXY( 35, $y_point );
                    $pdf->MultiCell(36, 5, U2T($data['mem_group_name']), $border, "C"); //สังกัต
                    $pdf->SetXY( 109, $y_point );
                    $pdf->MultiCell(16.5, 5, U2T($data['salary']), $border, "C"); //เงินเดือน
                    $pdf->SetXY( 136, $y_point );
                    $pdf->MultiCell(57, 5, U2T($money_salary_2text), $border, "C"); //เงินเดือน(ตัวอักษร)
                $y_point = 138.8;
                    $pdf->SetXY( 82.5, $y_point );
                    $pdf->MultiCell(31, 5, U2T('SM054489**'), $border, "C"); //สัญญากู้เลขที่
                    $pdf->SetXY( 140.5, $y_point );
                    $pdf->MultiCell(31, 5, U2T('SM054489**'), $border, "C"); //คำขอกู้เลขที่
            }else if($pageNo == '6'){

            }else if ($pageNo == '7'){
                $y_point = 80.5;
                    $pdf->SetXY( 130.2, $y_point );
                    $pdf->MultiCell(11, 5, U2T($date_to_text), $border, "C"); //วันที่ 
                    $pdf->SetXY( 148.9, $y_point );
                    $pdf->MultiCell(22.9, 5, U2T($month2text), $border, "C"); //เดือนที่
                    $pdf->SetXY( 178.5, $y_point );
                    $pdf->MultiCell(17, 5, U2T($date_to_year), $border, "C"); //ปี
                 $y_point = 95.8;
                    $pdf->SetXY( 49, $y_point );
                    $pdf->MultiCell(106, 5, U2T($fullname_th."**(ชื่อผู้สมรส)"), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 162.5, $y_point );
                    $pdf->MultiCell(31, 5, U2T($age), $border, "C"); //อายุ
                $y_point = 103.6;
                    $pdf->SetXY( 45.2, $y_point );
                    $pdf->MultiCell(22.2, 5, U2T($data['address_no']), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 76.5, $y_point );
                    $pdf->MultiCell(15.7, 5, U2T(($data['address_moo']=='')?'-':$data['address_moo']), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 109.7, $y_point );
                    $pdf->MultiCell(36, 5, U2T(($data['address_soi']=='')?'-':$data['address_soi']), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 155.5, $y_point );
                    $pdf->MultiCell(40, 5, U2T(($data['address_road']=='')?'-':$data['address_road']), $border, "C"); //ชื่อผู้กู้
                $y_point = 111;
                    $pdf->SetXY( 45.2, $y_point );
                    $pdf->MultiCell(47, 5, U2T($data['district_name']), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 110, $y_point );
                    $pdf->MultiCell(35, 5, U2T($data['amphur_name']), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 158, $y_point );
                    $pdf->MultiCell(35, 5, U2T($data['province_name']), $border, "C"); //ชื่อผู้กู้
                $y_point = 118.5;
                    $pdf->SetXY( 59.5, $y_point );
                    $pdf->MultiCell(102, 5, U2T($fullname_th), $border, "C"); //ชื่อผู้กู้
                $y_point = 219;
                    $pdf->SetXY( 50.5, $y_point );
                    $pdf->MultiCell(118, 5, U2T('ลลิษา มโนบาล *****'), $border, "C"); //ชื่อผู้กู้
                    $y_point = 226.5;
                    $pdf->SetXY( 50.5, $y_point );
                    $pdf->MultiCell(110, 5, U2T($fullname_th), $border, "C"); //ชื่อผู้กู้
            }
    }
	
	//exit;
	$pdf->Output();