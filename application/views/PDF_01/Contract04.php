<?php
function U2T($text) { return @iconv("UTF-8", "TIS-620//IGNORE", ($text)); }
function num_format($text) {
    if($text!=''){
        return number_format($text,2);
    }else{
        return '';
    }
}

	$filename = $_SERVER["DOCUMENT_ROOT"]."/fsccoop"."/assets/document/loan/loan_04.pdf" ;
	$pdf = new FPDI();

    $pageCount_1 = $pdf->setSourceFile($filename);
    $myImage = "assets/images/check-mark.png";
    $data = $loan_fscoop;
    // foreach($user as $key=>$value){
    //     $firstname_th = $value['firstname_th'];
    //     $lastname_th  = $value['lastname_th'];
    //     $fullname_th = $firstname_th."  ".$lastname_th;     
    // }
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
            
            // $pdf->SetTitle(U2T('คำขอกู้เงินเพื่อการศึกษา'));
            $border = 1;
            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetAutoPageBreak(true,0);
            if($pageNo == '1'){
                // $pdf->Image($myImage, 35.8, 162.3, 3);
                $y_point = 55.7;
                    $pdf->SetXY( 33, $y_point );
                    $pdf->MultiCell(65, 5, U2T('สหกรณ์ออมทรัพย์โรงพยาบาลตำรวจ**'), $border, "C"); //เขียนที่
                    $y_point = 63.5;
                    $pdf->SetXY( 130.2, $y_point );
                    $pdf->MultiCell(11, 5, U2T($date_to_text), $border, "C"); //วันที่ 
                    $pdf->SetXY( 148.9, $y_point );
                    $pdf->MultiCell(22.9, 5, U2T($month2text), $border, "C"); //เดือนที่
                    $pdf->SetXY( 178.5, $y_point );
                    $pdf->MultiCell(17, 5, U2T($date_to_year), $border, "C"); //ปี
                $y_point = 86.5;
                    $pdf->SetXY( 47, $y_point );
                    $pdf->MultiCell(62, 5, U2T($fullname_th), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 142, $y_point );
                    $pdf->MultiCell(50, 5, U2T($data['member_id']), $border, "C"); //สมาชิกเลขทะเบียนที่
                $y_point = 93.9;
                    $pdf->SetXY( 85, $y_point );
                    $pdf->MultiCell(40, 5, U2T($data['position_name']), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 134, $y_point );
                    $pdf->MultiCell(29.5, 5, U2T($data['mem_group_name']), $border, "C"); //สมาชิกเลขทะเบียนที่
                    $pdf->SetXY( 181, $y_point );
                    $pdf->MultiCell(15, 5, U2T($data['office_tel']), $border, "C"); //สมาชิกเลขทะเบียนที่
                $y_point = 101.3;
                    $pdf->SetXY( 31.5, $y_point );
                    $pdf->MultiCell(33, 5, U2T($data['mobile']), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 96, $y_point );
                    $pdf->MultiCell(19, 5, U2T($data['salary']), $border, "C"); //สมาชิกเลขทะเบียนที่
                    $pdf->SetXY( 165, $y_point );
                    $pdf->MultiCell(25, 5, U2T('-**'), $border, "C"); //สมาชิกเลขทะเบียนที่
                $y_point = 109.1;
                    $pdf->SetXY( 31.5, $y_point );
                    $pdf->MultiCell(15, 5, U2T($month2text), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 54, $y_point );
                    $pdf->MultiCell(25, 5, U2T($date_to_year), $border, "C"); //ชื่อผู้กู้
                $y_point = 116.1;
                    $pdf->SetXY( 157.5, $y_point );
                    $pdf->MultiCell(50, 5, U2T($data['loan_amount']), $border, "C"); //ชื่อผู้กู้
                $y_point = 123.7;
                    $pdf->SetXY( 23, $y_point );
                    $pdf->MultiCell(50, 5, U2T($money_loan_amount_2text), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 95, $y_point );
                    $pdf->MultiCell(90, 5, U2T('-**'), $border, "C"); //ชื่อผู้กู้
                $y_point = 165.9;
                    $pdf->SetXY( 105.5, $y_point );
                    $pdf->MultiCell(36.8, 5, U2T('2,000,000**'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 143.6, $y_point );
                    $pdf->MultiCell(26.5, 5, U2T('2,000,000**'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 172.6, $y_point );
                    $pdf->MultiCell(25, 5, U2T('2,000,000**'), $border, "C"); //ชื่อผู้กู้
                $y_point = 174.3;
                    $pdf->SetXY( 105.5, $y_point );
                    $pdf->MultiCell(36.8, 5, U2T('2,000,000**'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 143.6, $y_point );
                    $pdf->MultiCell(26.5, 5, U2T('2,000,000**'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 172.6, $y_point );
                    $pdf->MultiCell(25, 5, U2T('2,000,000**'), $border, "C"); //ชื่อผู้กู้
                $y_point = 184.2;
                    $pdf->SetXY( 105.5, $y_point );
                    $pdf->MultiCell(36.8, 5, U2T('2,000,000**'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 143.6, $y_point );
                    $pdf->MultiCell(26.5, 5, U2T('2,000,000**'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 172.6, $y_point );
                    $pdf->MultiCell(25, 5, U2T('2,000,000**'), $border, "C"); //ชื่อผู้กู้
                $y_point = 194.2;
                    $pdf->SetXY( 105.5, $y_point );
                    $pdf->MultiCell(36.8, 5, U2T('2,000,000**'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 143.6, $y_point );
                    $pdf->MultiCell(26.5, 5, U2T('2,000,000**'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 172.6, $y_point );
                    $pdf->MultiCell(25, 5, U2T('2,000,000**'), $border, "C"); //ชื่อผู้กู้
                $y_point = 202.8;
                    $pdf->SetXY( 105.5, $y_point );
                    $pdf->MultiCell(36.8, 5, U2T('2,000,000**'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 143.6, $y_point );
                    $pdf->MultiCell(26.5, 5, U2T('2,000,000**'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 172.6, $y_point );
                    $pdf->MultiCell(25, 5, U2T('2,000,000**'), $border, "C"); //ชื่อผู้กู้
                $y_point = 220.8;
                    $pdf->SetXY( 120.5, $y_point );
                    $pdf->MultiCell(28.8, 5, U2T($data['money_per_period']), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 167.6, $y_point );
                    $pdf->MultiCell(23.5, 5, U2T($data['period_amount']), $border, "C"); //ชื่อผู้กู้
                // $y_point = 243.2;
                //     $pdf->SetXY( 131, $y_point );
                //     $pdf->MultiCell(55, 5, U2T($fullname_th), $border, "C"); //ชื่อผู้กู้
                // $y_point = 279.9;
                //     $pdf->SetXY( 131.5, $y_point );
                //     $pdf->MultiCell(46, 5, U2T($fullname_th), $border, "C"); //ชื่อผู้กู้
 
            }else if($pageNo == '2'){
                $y_point = 50;
                    $pdf->SetXY( 131.5, $y_point );
                    $pdf->MultiCell(46, 5, U2T('2,000,000'), $border, "C"); //ชื่อผู้กู้
            }else if($pageNo == '3'){
                $y_point = 80;
                    $pdf->SetXY( 168, $y_point );
                    $pdf->MultiCell(14.5, 5, U2T('500'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 183, $y_point );
                    $pdf->MultiCell(15, 5, U2T('500'), $border, "C"); //ชื่อผู้กู้
                $y_point = 87;
                    $pdf->SetXY( 162.5, $y_point );
                    $pdf->MultiCell(34, 5, U2T('500'), $border, "C"); //ชื่อผู้กู้
                $y_point = 94.5;
                    $pdf->SetXY( 44, $y_point );
                    $pdf->MultiCell(150, 5, U2T('นายสมหมาย ใจดี'), $border, "C"); //ชื่อผู้กู้
                $y_point = 101.8;
                    $pdf->SetXY( 48, $y_point );
                    $pdf->MultiCell(148, 5, U2T('นายสมหมาย ใจดี'), $border, "C"); //ชื่อผู้กู้
                $y_point = 109.2;
                    $pdf->SetXY( 155.5, $y_point );
                    $pdf->MultiCell(34, 5, U2T('500'), $border, "C"); //ชื่อผู้กู้
                $y_point = 116.7;
                    $pdf->SetXY( 80, $y_point );
                    $pdf->MultiCell(60, 5, U2T('110-5455666-175'), $border, "C"); //ชื่อผู้กู้
                $y_point = 124.2;
                    $pdf->SetXY( 47, $y_point );
                    $pdf->MultiCell(37, 5, U2T('110-5455666-175'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 92, $y_point );
                    $pdf->MultiCell(37, 5, U2T('110-5455666-175'), $border, "C"); //ชื่อผู้กู้
                $y_point = 131.6;
                    $pdf->SetXY( 30, $y_point );
                    $pdf->MultiCell(32, 5, U2T('110-5455666-175'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 72, $y_point );
                    $pdf->MultiCell(39, 5, U2T('110-5455666-175'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 122, $y_point );
                    $pdf->MultiCell(29, 5, U2T('110-5455666-175'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 160.5, $y_point );
                    $pdf->MultiCell(36, 5, U2T('110-5455666-175'), $border, "C"); //ชื่อผู้กู้
                $y_point = 139;
                    $pdf->SetXY( 36, $y_point );
                    $pdf->MultiCell(42, 5, U2T('110-5455666-175'), $border, "C"); //ชื่อผู้กู้
                $y_point = 154;
                    $pdf->SetXY( 60, $y_point );
                    $pdf->MultiCell(42, 5, U2T('110-5455666-175'), $border, "C"); //ชื่อผู้กู้
            }
        }
	//exit;
	$pdf->Output();