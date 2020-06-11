<?php
function U2T($text) { return @iconv("UTF-8", "TIS-620//IGNORE", ($text)); }
function num_format($text) {
    if($text!=''){
        return number_format($text,2);
    }else{
        return '';
    }
}

	$filename = $_SERVER["DOCUMENT_ROOT"]."/fsccoop"."/assets/document/loan/loan_07.pdf" ;
	$pdf = new FPDI();

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
 
    

    // $test = $share_bill;
	for ($pageNo = 1; $pageNo <= $pageCount_1; $pageNo++) {	
        $pdf->AddPage();
            $tplIdx = $pdf->importPage($pageNo);
            $pdf->useTemplate($tplIdx, 0, 0, 0, 0, true);
            $pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
            $pdf->SetFont('THSarabunNew', '', 14 );
            
            // $pdf->SetTitle(U2T('คำขอกู้เงินเพื่อการศึกษา'));
            $border = 1;
            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetAutoPageBreak(true,0);
            if($pageNo == '1'){
                $y_point = 36.6;
                    $pdf->Image($myImage, 23.3, $y_point, 3);
                $y_point = 44.8;
                    $pdf->Image($myImage, 23.3, $y_point, 3);
                $y_point = 52;
                    $pdf->Image($myImage, 23.3, $y_point, 3);
                $y_point = 59.4;
                    $pdf->Image($myImage, 23.3, $y_point, 3);
                $y_point = 66.4;
                    $pdf->Image($myImage, 23.3, $y_point, 3);
                $y_point = 74.8;
                    $pdf->Image($myImage, 23.3, $y_point, 3);
                $y_point = 82.3;
                    $pdf->Image($myImage, 23.3, $y_point, 3);
                $y_point = 89.3;
                    $pdf->Image($myImage, 23.3, $y_point, 3);
                $y_point = 98;
                    $pdf->Image($myImage, 39.3, $y_point, 3);
                $y_point = 105;
                    $pdf->Image($myImage, 39.3, $y_point, 3);
                $y_point = 112.5;
                    $pdf->Image($myImage, 39.3, $y_point, 3);
            }else if($pageNo == '2'){
                    
            }else if($pageNo == '3'){
                $y_point = 31;
                    $pdf->SetXY(31, $y_point, 3);
                    $pdf->MultiCell(13, 5, U2T('325*'), $border, "C"); // รับที่
                    $pdf->SetXY(45, $y_point, 3);
                    $pdf->MultiCell(13, 5, U2T('9*'), $border, "C"); // รับที่
                $y_point = 38.7;
                    $pdf->SetXY(31, $y_point, 3);
                    $pdf->MultiCell(8, 5, U2T('10*'), $border, "C"); // วันที่(วัน)
                    $pdf->SetXY(42, $y_point, 3);
                    $pdf->MultiCell(8, 5, U2T('09*'), $border, "C"); // วันที่(เดือน)
                    $pdf->SetXY(51.3, $y_point, 3);
                    $pdf->MultiCell(9.5, 5, U2T('2563*'), $border, "C"); // วันที่(ปี)
                $y_point = 30;
                    $pdf->SetXY(165, $y_point, 3);
                    $pdf->MultiCell(13, 5, U2T('325*'), $border, "C"); // หนังสือกู้ที่
                    $pdf->SetXY(178, $y_point, 3);
                    $pdf->MultiCell(13, 5, U2T('9*'), $border, "C"); // หนังสือกู้ที่
                $y_point = 38;
                    $pdf->SetXY(155, $y_point, 3);
                    $pdf->MultiCell(13, 5, U2T($date_to_text), $border, "C"); // วันที่(วัน)
                    $pdf->SetXY(168, $y_point, 3);
                    $pdf->MultiCell(11, 5, U2T($month2text), $border, "C"); // วันที่(เดือน)
                    $pdf->SetXY(180, $y_point, 3);
                    $pdf->MultiCell(11, 5, U2T($date_to_year), $border, "C"); // วันที่(ปี)
                $y_point = 52.0;
                    $pdf->SetXY(132, $y_point, 3);
                    $pdf->MultiCell(63.8, 5, U2T('สหกรณ์ออมทรัพย์โรงพยาบาลตำรวจ**'), $border, "C"); // เขียนที่
                $y_point = 59.7;
                    $pdf->SetXY(132, $y_point, 3);
                    $pdf->MultiCell(63.8, 5, U2T($full_date), $border, "C"); // เขียนที่
                $y_point = 79;
                    $pdf->SetXY(45, $y_point, 3);
                    $pdf->MultiCell(86, 5, U2T($fullname_th), $border, "C"); // ชื่อ
                    $pdf->SetXY(163, $y_point, 3);
                    $pdf->MultiCell(30.7, 5, U2T($data['member_id']), $border, "C"); // ชื่อ
                $y_point = 86.5;
                    $pdf->SetXY(57, $y_point, 3);
                    $pdf->MultiCell(42, 5, U2T($data['salary']), $border, "C"); // ชื่อ
                $y_point = 94.2;
                    $pdf->SetXY(78, $y_point, 3);
                    $pdf->MultiCell(28, 5, U2T($data['loan_amount']), $border, "C"); // ชื่อ
                    $pdf->SetXY(118, $y_point, 3);
                    $pdf->MultiCell(74, 5, U2T($money_loan_amount_2text), $border, "C"); // ชื่อ
                $y_point = 101.8;
                    $pdf->SetXY(123, $y_point, 3);
                    $pdf->MultiCell(70, 5, U2T('ทุนการศึกษาของเด็กๆ**'), $border, "C"); // เหตุผลกู้
                $y_point = 109.5;
                    $pdf->SetXY(115, $y_point, 3);
                    $pdf->MultiCell(75, 5, U2T($data['position_name']), $border, "C"); // ตำแหน่ง
                $y_point = 117;
                    $pdf->SetXY(107, $y_point, 3);
                    $pdf->MultiCell(39, 5, U2T($data['id_card']), $border, "C"); // ชื่อ
                    $pdf->SetXY(153, $y_point, 3);
                    $pdf->MultiCell(39, 5, U2T(($data['mem_group_name']=='')?'-':$data['mem_group_name']), $border, "C"); // ชื่อ
                $y_point = 124.9;
                    $pdf->SetXY(54.5, $y_point, 3);
                    $pdf->MultiCell(26, 5, U2T($data['address_no']), $border, "C"); // ชื่อ
                    $pdf->SetXY(90, $y_point, 3);
                    $pdf->MultiCell(37, 5, U2T(($data['address_road']=='')?'-':$data['address_road']), $border, "C"); // ชื่อ
                    $pdf->SetXY(138, $y_point, 3);
                    $pdf->MultiCell(53, 5, U2T(($data['district_name']=='')?'-':$data['district_name']), $border, "C"); // ชื่อ
                $y_point = 132.4;
                    $pdf->SetXY(30.5, $y_point, 3);
                    $pdf->MultiCell(45, 5, U2T($data['amphur_name']), $border, "C"); // ชื่อ
                    $pdf->SetXY(90, $y_point, 3);
                    $pdf->MultiCell(37, 5, U2T($data['province_name']), $border, "C"); // ชื่อ
                    $pdf->SetXY(147, $y_point, 3);
                    $pdf->MultiCell(43, 5, U2T($data['mobile']), $border, "C"); // ชื่อ
                    $y_point = 151.9;
                    $pdf->SetXY( 38, $y_point );
                    $pdf->MultiCell(22, 5, U2T('99/99'), $border, "C"); //โฉนดเลขที่
                    $pdf->SetXY( 78, $y_point );
                    $pdf->MultiCell(22, 5, U2T('ป่าแดด'), $border, "C"); //ตำบล, แขวง
                $y_point = 158.9;
                    $pdf->SetXY( 36, $y_point );
                    $pdf->MultiCell(26.5, 5, U2T('หางดง'), $border, "C"); //อำเภอ, เขต
                    $pdf->SetXY( 74, $y_point );
                    $pdf->MultiCell(23, 5, U2T('เชียงใหม่'), $border, "C"); //จังหวัด
                $y_point = 165.9;
                    $pdf->SetXY( 46.5, $y_point );
                    $pdf->MultiCell(10.5, 5, U2T('120'), $border, "C"); //อำเภอ, เขต
                    $pdf->SetXY( 64, $y_point );
                    $pdf->MultiCell(10, 5, U2T('30'), $border, "C"); //จังหวัด
                    $pdf->SetXY( 79, $y_point );
                    $pdf->MultiCell(12.3, 5, U2T('100'), $border, "C"); //จังหวัด
                $y_point = 173;
                    $pdf->SetXY( 35.5, $y_point );
                    $pdf->MultiCell(21.5, 5, U2T('120'), $border, "C"); //อำเภอ, เขต
                    $pdf->SetXY( 66.5, $y_point );
                    $pdf->MultiCell(26, 5, U2T('120'), $border, "C"); //อำเภอ, เขต
                $y_point = 151.5;
                    $pdf->SetXY( 122.5, $y_point );
                    $pdf->MultiCell(15, 5, U2T('99/99'), $border, "C"); //ห้องชุดเลขที่
                    $pdf->SetXY( 148.9, $y_point );
                    $pdf->MultiCell(10, 5, U2T('2'), $border, "C"); //ชั้น
                    $pdf->SetXY( 165, $y_point );
                    $pdf->MultiCell(11.5, 5, U2T('2'), $border, "C"); //เนื้อที่.....ตรม
                $y_point = 158.9;
                    $pdf->SetXY( 122.5, $y_point );
                    $pdf->MultiCell(60, 5, U2T('Burj Khalifa'), $border, "C"); //ชื่ออาคาร, ชุด
                $y_point = 165.9;
                    $pdf->SetXY( 122.5, $y_point );
                    $pdf->MultiCell(18.5, 5, U2T('loft'), $border, "C"); //ห้องชุดแบบ
                    $pdf->SetXY( 159, $y_point );
                    $pdf->MultiCell(26, 5, U2T('ช้างเผือก'), $border, "C"); //ตำบล, แขวง
                $y_point = 173;
                    $pdf->SetXY( 121, $y_point );
                    $pdf->MultiCell(25.5, 5, U2T('เมืองเชียงใหม่'), $border, "C"); //อำเภอ, เขต
                    $pdf->SetXY( 159.5, $y_point );
                    $pdf->MultiCell(26, 5, U2T('เชียงใหม่'), $border, "C"); //จังหวัด
                $y_point = 202.1;
                    $pdf->Image($myImage, 42.2, $y_point, 3);
                $y_point = 199.7;
                    $pdf->SetXY( 87, $y_point );
                    $pdf->MultiCell(35, 5, U2T('15,000'), $border, "C"); //อำเภอ, เขต
                    $pdf->SetXY( 164, $y_point );
                    $pdf->MultiCell(18, 5, U2T('23'), $border, "C"); //อำเภอ, เขต
                $y_point = 207.5;
                    $pdf->SetXY( 104, $y_point );
                    $pdf->MultiCell(40, 5, U2T('15,000'), $border, "C"); //อำเภอ, เขต
                    $pdf->SetXY( 164, $y_point );
                    $pdf->MultiCell(18, 5, U2T('23'), $border, "C"); //อำเภอ, เขต
                $y_point = 208.9;
                    $pdf->Image($myImage, 42.2, $y_point, 3);
            }else if($pageNo == '4'){
                $y_point = 21.3;
                    $pdf->SetXY(128, $y_point);
                    $pdf->MultiCell(43, 5, U2T('15,000'), $border, "C"); //อำเภอ, เขต
                $y_point = 45.7;
                    $pdf->Image($myImage, 64.9, $y_point, 3);
                    $pdf->Image($myImage, 103.2, $y_point, 3);
                    $y_point = 60.2;
                    $pdf->Image($myImage, 64.9, $y_point, 3);
                    $pdf->Image($myImage, 103.2, $y_point, 3);
                $y_point = 76.2;
                    $pdf->Image($myImage, 64.9, $y_point, 3);
                    $pdf->Image($myImage, 103.8, $y_point, 3);
                $y_point = 125;
                    $pdf->SetXY(88.5, $y_point);
                    $pdf->MultiCell(63, 5, U2T('1,5000,000'), $border, "C"); //อำเภอ, เขต 
  
                 $y_point = 171.3;
                    $pdf->SetXY(64.2, $y_point);
                    $pdf->MultiCell(130, 5, U2T('1,5000,000'), $border, "C"); //อำเภอ, เขต 
                $y_point = 178.8;
                    $pdf->SetXY(61, $y_point);
                    $pdf->MultiCell(130, 5, U2T('1,5000,000'), $border, "C"); //อำเภอ, เขต 

            }else if($pageNo == '4'){

            }else if($pageNo == '5'){
                $y_point = 39.5;
                    $pdf->SetXY(158.8, $y_point);
                    $pdf->MultiCell(17, 5, U2T('530**'), $border, "C"); //ที่
                    $pdf->SetXY(178.8, $y_point);
                    $pdf->MultiCell(17, 5, U2T('530**'), $border, "C"); //ที่
                $y_point = 47.2;
                    $pdf->SetXY(156.8, $y_point);
                    $pdf->MultiCell(39, 5, U2T($full_date), $border, "C"); //ที่
                $y_point = 55.1;
                    $pdf->SetXY(42.8, $y_point);
                    $pdf->MultiCell(150, 5, U2T($fullname_th), $border, "C"); //ที่
                $y_point = 62.3;
                    $pdf->SetXY(43.3, $y_point);
                    $pdf->MultiCell(148, 5, U2T($fullname_th."**"), $border, "C"); //ที่
                $y_point = 69.6;
                    $pdf->SetXY(154.8, $y_point);
                    $pdf->MultiCell(38, 5, U2T($data['member_id']), $border, "C"); //ที่
                $y_point = 77.6;
                    $pdf->SetXY(80.8, $y_point);
                    $pdf->MultiCell(55, 5, U2T($data['position_name']), $border, "C"); //ที่
                $y_point = 85.5;
                    $pdf->SetXY(45, $y_point);
                    $pdf->MultiCell(35, 5, U2T($data['id_card']), $border, "C"); //ที่
                    $pdf->SetXY(92, $y_point);
                    $pdf->MultiCell(42, 5, U2T($data['mem_group_name']), $border, "C"); //ที่
                    $pdf->SetXY(170, $y_point);
                    $pdf->MultiCell(20, 5, U2T($data['address_no']), $border, "C"); //ที่
                $y_point = 93.2;
                    $pdf->SetXY(27.5, $y_point);
                    $pdf->MultiCell(35, 5, U2T(($data['address_road']=='')?'-':$data['address_road']), $border, "C"); //ที่
                    $pdf->SetXY(70, $y_point);
                    $pdf->MultiCell(30, 5, U2T(($data['district_name']=='')?'-':$data['district_name']), $border, "C"); //ที่
                    $pdf->SetXY(114, $y_point);
                    $pdf->MultiCell(35, 5, U2T($data['amphur_name']), $border, "C"); //ที่
                    $pdf->SetXY(160, $y_point);
                    $pdf->MultiCell(33, 5, U2T($data['province_name']), $border, "C"); //ที่
                $y_point = 100.9;
                    $pdf->SetXY(35.5, $y_point);
                    $pdf->MultiCell(35, 5, U2T($data['mobile']), $border, "C"); //ที่
                $y_point = 116;
                    $pdf->SetXY(101, $y_point);
                    $pdf->MultiCell(23, 5, U2T($data['loan_amount']), $border, "C"); //ที่
                    $pdf->SetXY(135, $y_point);
                    $pdf->MultiCell(55, 5, U2T($money_loan_amount_2text), $border, "C"); //ที่
                $y_point = 140;
                    $pdf->Image($myImage, 41.9, $y_point, 3);
                $y_point = 139;
                    $pdf->SetXY(104, $y_point);
                    $pdf->MultiCell(63, 5, U2T('1,500,000'), $border, "C"); //ที่
                $y_point = 148;
                    $pdf->Image($myImage, 41.9, $y_point, 3);
                $y_point = 146.9;
                    $pdf->SetXY(122, $y_point);
                    $pdf->MultiCell(64, 5, U2T('1,500,000'), $border, "C"); //ที่
                $y_point = 154.8;
                    $pdf->SetXY(48, $y_point);
                    $pdf->MultiCell(30, 5, U2T('1,500,000'), $border, "C"); //ที่
                    $pdf->SetXY(154.5, $y_point);
                    $pdf->MultiCell(30, 5, U2T('1,500,000'), $border, "C"); //ที่
                $y_point = 162.5;
                    $pdf->SetXY(59, $y_point);
                    $pdf->MultiCell(31, 5, U2T('1,500,000'), $border, "C"); //ที่
            }else if ($pageNo == '6'){
                $y_point = 112.7;
                    $pdf->SetXY(110, $y_point);
                    $pdf->MultiCell(34, 5, U2T('80,000 ไร่'), $border, "C"); //ที่
                    $pdf->SetXY(165, $y_point);
                    $pdf->MultiCell(31, 5, U2T('หนองสาหร่าย'), $border, "C"); //ที่
                $y_point = 120;
                    $pdf->SetXY(37, $y_point);
                    $pdf->MultiCell(26, 5, U2T('ปากช่อง'), $border, "C"); //ที่
                    $pdf->SetXY(77, $y_point);
                    $pdf->MultiCell(26, 5, U2T('นครราชสีมา'), $border, "C"); //ที่
                $y_point = 227;
                    $pdf->SetXY(33, $y_point);
                    $pdf->MultiCell(80, 5, U2T('ปากช่อง'), $border, "C"); //ที่
                    $pdf->SetXY(149, $y_point);
                    $pdf->MultiCell(38, 5, U2T('554,000'), $border, "C"); //ที่
                $y_point = 234.5;
                    $pdf->SetXY(21, $y_point);
                    $pdf->MultiCell(80, 5, U2T('ปากช่อง'), $border, "C"); //ท
            }else if($pageNo == '7'){

            }else if($pageNo == '8'){

            }else if($pageNo == '9' ){

            }else if($pageNo == '10'){
                $y_point = 47;
                $pdf->SetXY(134.5, $y_point);
                 $pdf->MultiCell(60, 5, U2T('ปากช่อง'), $border, "C"); //
                $y_point = 54.4;
                $pdf->SetXY(120, $y_point);
                $pdf->MultiCell(15, 5, U2T('2'), $border, "C"); //
                $pdf->SetXY(142.5, $y_point);
                $pdf->MultiCell(28, 5, U2T('ปากช่อง'), $border, "C"); //
                $pdf->SetXY(176.5, $y_point);
                $pdf->MultiCell(23, 5, U2T('ปากช่อง'), $border, "C"); //
                $y_point = 61.8;
                $pdf->SetXY( 43.5, $y_point );
                $pdf->MultiCell(58, 5, U2T($fullname_th), $border, "C"); //ชื่อs...
                $pdf->SetXY( 135.5, $y_point );
                $pdf->MultiCell(40, 5, U2T($id_card), $border, "C"); //
                $pdf->SetXY( 181.5, $y_point );
                $pdf->MultiCell(10, 5, U2T('18'), $border, "C"); //
                $y_point = 69.8;
                $pdf->SetXY( 50.5, $y_point );
                $pdf->MultiCell(15, 5, U2T($address_number), $border, "C"); //
                $pdf->SetXY( 71.5, $y_point );
                $pdf->MultiCell(15, 5, U2T($address_moo), $border, "C"); //
                $pdf->SetXY( 103.5, $y_point );
                $pdf->MultiCell(35, 5, U2T($address_soi), $border, "C"); //
                $pdf->SetXY( 152.5, $y_point );
                $pdf->MultiCell(38, 5, U2T($address_road), $border, "C"); //
                $y_point = 77.3;
                $pdf->SetXY( 39.5, $y_point );
                $pdf->MultiCell(44, 5, U2T($district), $border, "C"); //
                $pdf->SetXY( 98, $y_point );
                $pdf->MultiCell(38, 5, U2T($amphur), $border, "C"); //
                $pdf->SetXY( 152, $y_point );
                $pdf->MultiCell(40, 5, U2T($province), $border, "C"); //
                $y_point = 84.8;
                $pdf->SetXY( 47, $y_point );
                $pdf->MultiCell(38, 5, U2T('044-313XXX'), $border, "C"); //
                $pdf->SetXY( 96, $y_point );
                $pdf->MultiCell(38, 5, U2T($mobile), $border, "C"); //
                $pdf->SetXY( 150, $y_point );
                $pdf->MultiCell(38, 5, U2T($position), $border, "C"); //
                $y_point = 91.3;
                $y_point = 78.5;
                $pdf->SetXY( 49, $y_point );
                $pdf->MultiCell(38, 5, U2T('044-313XXX'), $border, "C"); //
                $pdf->SetXY( 100, $y_point );
                $pdf->MultiCell(38, 5, U2T($mobile), $border, "C"); //
                $pdf->SetXY( 154, $y_point );
                $pdf->MultiCell(38, 5, U2T($position), $border, "C"); //s
                    
            }
        
    }
	//exit;
    $pdf->Output();
    