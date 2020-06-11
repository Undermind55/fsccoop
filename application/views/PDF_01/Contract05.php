<?php
function U2T($text) { return @iconv("UTF-8", "TIS-620//IGNORE", ($text)); }
function num_format($text) {
    if($text!=''){
        return number_format($text,2);
    }else{
        return '';
    }
}

	$filename = $_SERVER["DOCUMENT_ROOT"]."/fsccoop"."/assets/document/loan/loan_05.pdf" ;
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

	for ($pageNo = 1; $pageNo <= $pageCount_1; $pageNo++) {	
        $pdf->AddPage();
            $tplIdx = $pdf->importPage($pageNo);
            $pdf->useTemplate($tplIdx, 0, 0, 0, 0, true);
            $pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
            $pdf->SetFont('THSarabunNew', '', 12 );
                        $pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
            // $pdf->SetFont('THSarabunNew', '', 6 );
            // $border = 1;
            // for ($i = 10; $i<=280;$i+= 20){
            //     for ($j = 10; $j<200;$j+= 10){
            //         $pdf->SetXY( $j, $i );
            //         $pdf->MultiCell(7, 5, U2T($j.','.$i), $border, "L");//หนังสือกู้ที่
            //     }

            // }
            $pdf->SetTitle(U2T('คำขอกู้เงินเพื่อการศึกษา'));
            $border = 1;
            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetAutoPageBreak(true,0);
            if($pageNo == '1'){
                // $pdf->Image($myImage, 35.8, 162.3, 3);
                // $y_point = 55.7;
                $y_point = 26.5;
                    $pdf->SetXY( 120.5, $y_point );
                    $pdf->MultiCell(35, 5, U2T('สหกรณ์ออมทรัพย์โรงพยาบาลตำรวจ**'), $border, "C"); //ชื่อผู้กู้
                $y_point = 54.5;
                    $pdf->SetXY( 44.5, $y_point );
                    $pdf->MultiCell(80, 5, U2T($fullname_th), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 148, $y_point );
                    $pdf->MultiCell(50, 5, U2T($data['member_id']), $border, "C"); //สมาชิกเลขทะเบียนที่
                $y_point = 60.3;
                    $pdf->SetXY( 57, $y_point );
                    $pdf->MultiCell(41, 5, U2T($data['position_name']), $border, "C"); //
                    $pdf->SetXY( 105.5, $y_point );
                    $pdf->MultiCell(25, 5, U2T($data['mem_group_name']), $border, "C"); //
                    $pdf->SetXY( 143, $y_point );
                    $pdf->MultiCell(25, 5, U2T(($data['office_tel']=='')?'-':$data['office_tel']), $border, "C"); //
                    $pdf->SetXY( 175, $y_point );
                    $pdf->MultiCell(22, 5, U2T($data['mobile']), $border, "C"); //
                $y_point = 66;
                    $pdf->SetXY( 33.5, $y_point );
                    $pdf->MultiCell(26.5, 5, U2T($data['salary']), $border, "C"); //
                    $pdf->SetXY( 97.5, $y_point );
                    $pdf->MultiCell(22, 5, U2T($data['salary']."**"), $border, "C"); //
                    $pdf->SetXY( 132.5, $y_point );
                    $pdf->MultiCell(22, 5, U2T($month2text), $border, "C"); //
                    $pdf->SetXY( 158, $y_point );
                    $pdf->MultiCell(13, 5, U2T($date_to_year), $border, "C"); //
                $y_point = 78;
                    $pdf->SetXY( 128, $y_point );
                    $pdf->MultiCell(63, 5, U2T($data['loan_amount']), $border, "C"); //
                $y_point = 83.8;
                    $pdf->SetXY( 11.8, $y_point );
                    $pdf->MultiCell(64.5, 5, U2T($money_loan_amount_2text), $border, "C"); //
                    $pdf->SetXY( 92, $y_point );
                    $pdf->MultiCell(105, 5, U2T('เพื่อนำไปใช้***'), $border, "C"); //
   

 
            }else if($pageNo == '2'){
                $y_point = 36.2;
                    $pdf->Image($myImage, 17.2, $y_point, 3);
                    $pdf->Image($myImage, 100, $y_point, 3);
                $y_point = 43.3;
                    $pdf->Image($myImage, 17.2, $y_point, 3);
                    $pdf->Image($myImage, 100, $y_point, 3);
                $y_point = 50.5;
                    $pdf->SetXY( 71.5, $y_point );
                    $pdf->MultiCell(27.5, 5, U2T('สองล้านบาทถ้วน***'), $border, "C"); //
                $y_point = 85;
                    $pdf->SetXY( 10, $y_point );
                    $pdf->MultiCell(35, 5, U2T($data['salary']), $border, "C"); //
                    $pdf->SetXY( 48, $y_point );
                    $pdf->MultiCell(35, 5, U2T('15,000**'), $border, "C"); //
                    $pdf->SetXY( 87, $y_point );
                    $pdf->MultiCell(37.5, 5, U2T('15,000**'), $border, "C"); //
                    $pdf->SetXY( 128, $y_point );
                    $pdf->MultiCell(32, 5, U2T('15,000**'), $border, "C"); //
                    $pdf->SetXY( 164, $y_point );
                    $pdf->MultiCell(34.5, 5, U2T('15,000**'), $border, "C"); //
                $y_point = 102;
                    $pdf->SetXY( 65, $y_point );
                    $pdf->MultiCell(30, 5, U2T('15,000**'), $border, "C"); //
                    $pdf->SetXY( 129.5, $y_point );
                    $pdf->MultiCell(13, 5, U2T('15,000**'), $border, "C"); //
                    $pdf->SetXY( 170, $y_point );
                    $pdf->MultiCell(20, 5, U2T('15,000**'), $border, "C"); //
                $y_point = 109.1;
                    $pdf->SetXY( 65, $y_point );
                    $pdf->MultiCell(30, 5, U2T('15,000**'), $border, "C"); //
                    $pdf->SetXY( 171.5, $y_point );
                    $pdf->MultiCell(20, 5, U2T('15,000'), $border, "C"); //
                $y_point = 115.4;
                    $pdf->SetXY( 80.5, $y_point );
                    $pdf->MultiCell(28, 5, U2T('มิถุนายน'), $border, "C"); //
                    $pdf->SetXY( 114.5, $y_point );
                    $pdf->MultiCell(16, 5, U2T('2563'), $border, "C"); //
                    $pdf->SetXY( 162.5, $y_point );
                    $pdf->MultiCell(20.5, 5, U2T('2563'), $border, "C"); //
                $y_point = 134.5;
                    $pdf->Image($myImage, 48.5, $y_point, 3);
                    $pdf->Image($myImage, 91.3, $y_point, 3);
                $y_point = 141;
                    $pdf->SetXY( 52, $y_point );
                    $pdf->MultiCell(83.5, 5, U2T('ข้อแจ้งอื่นๆ'), $border, "C"); //

            }else if($pageNo == '3'){
                $y_point = 21.5;
                $pdf->SetXY( 148.5, $y_point );
                $pdf->MultiCell(40, 5, U2T('สหกรณ์ออมทรัพย์โรงพยาบาลตำรวจ**'), $border, "C"); //ชื่อผู้กู้
                $y_point = 30.5;
                $pdf->SetXY( 148.5, $y_point );
                $pdf->MultiCell(40, 5, U2T($full_date), $border, "C"); //ชื่อผู้กู้
                $y_point = 48.5;
                $pdf->SetXY( 54.5, $y_point );
                $pdf->MultiCell(80, 5, U2T($full_name), $border, "C"); //ชื่อผู้กู้
                $y_point = 57.5;
                $pdf->SetXY( 35.5, $y_point );
                $pdf->MultiCell(30, 5, U2T($full_date), $border, "C"); //ชื่อผู้กู้
                $pdf->SetXY( 84.5, $y_point );
                $pdf->MultiCell(45, 5, U2T($data['mobile']), $border, "C"); //ชื่อผู้กู้
                $y_point = 73.5;
                $pdf->SetXY( 65.5, $y_point );
                $pdf->MultiCell(50, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $pdf->SetXY( 143.5, $y_point );
                $pdf->MultiCell(12, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $pdf->SetXY( 183.5, $y_point );
                $pdf->MultiCell(12, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $y_point = 81.5;
                $pdf->SetXY( 65.5, $y_point );
                $pdf->MultiCell(50, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $pdf->SetXY( 143.5, $y_point );
                $pdf->MultiCell(12, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $pdf->SetXY( 183.5, $y_point );
                $pdf->MultiCell(12, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $y_point = 89;
                $pdf->SetXY( 65.5, $y_point );
                $pdf->MultiCell(50, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $pdf->SetXY( 143.5, $y_point );
                $pdf->MultiCell(12, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $pdf->SetXY( 183.5, $y_point );
                $pdf->MultiCell(12, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $y_point = 105;
                $pdf->SetXY( 47.5, $y_point );
                $pdf->MultiCell(32, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $pdf->SetXY( 98.5, $y_point );
                $pdf->MultiCell(28, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $pdf->SetXY( 140.5, $y_point );
                $pdf->MultiCell(34, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $y_point = 112.5;
                $pdf->SetXY( 66.5, $y_point );
                $pdf->MultiCell(34, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $pdf->SetXY( 145.5, $y_point );
                $pdf->MultiCell(34, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $y_point = 120.5;
                $pdf->SetXY( 133.5, $y_point );
                $pdf->MultiCell(38, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $y_point = 152;
                $pdf->SetXY( 20, $y_point );
                $pdf->MultiCell(30, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $pdf->SetXY( 130, $y_point );
                $pdf->MultiCell(55, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $y_point = 183;
                $pdf->SetXY( 135, $y_point );
                $pdf->MultiCell(50, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $y_point = 191;
                $pdf->SetXY( 135, $y_point );
                $pdf->MultiCell(48, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $y_point = 205.8;
                $pdf->SetXY( 135, $y_point );
                $pdf->MultiCell(48, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                
                
                

            }
        }
	//exit;
	$pdf->Output();