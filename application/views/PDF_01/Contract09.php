<?php
function U2T($text) { return @iconv("UTF-8", "TIS-620//IGNORE", ($text)); }
function num_format($text) {
    if($text!=''){
        return number_format($text,2);
    }else{
        return '';
    }
}

    $filename = $_SERVER["DOCUMENT_ROOT"]."/fsccoop"."/assets/document/loan/loan_09.pdf" ;
	$pdf = new FPDI();

    $pageCount_1 = $pdf->setSourceFile($filename);
    $myImage = "assets/images/check-mark.png";

    $data       = $loan_fscoop;
    $name       = $data['firstname_th'].' '.$data['lastname_th'];
    $full_name  = $data['prename_full'].$data['firstname_th'].' '.$data['lastname_th'];
    $c_address  = $data['c_address_no'].''.$data['address_soi'].' '.$data['c_address_moo'].' '.$data['address_village'];
    $age                        = $this->center_function->diff_birthday($data['birthday']);
    $monthtext                  = $this->center_function->month_arr();
    $money_loan_amount_2text    = $this->center_function->convert($data['loan_amount']);
    $money_salary_2text         = $this->center_function->convert($data['salary']);
    $share_month2text           = $this->center_function->convert($data['loan_amount']);
    $money_per_period2text      = $this->center_function->convert($data['money_per_period']);
    $interest_per_year2text     = $this->center_function->convert($data['interest_per_year']);
    $period_amount2text         = $this->center_function->convert($data['period_amount']);
    $interest_per_year2text     = $this->center_function->numbetText($data['interest_per_year']);
    $month_arr                  = $this->center_function->month_arr();
    $month_short_arr            = $this->center_function->month_short_arr();
  
    
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
    

    $day = date('d');
    $mount = date('m');
    $int_mount = (int)$mount;
    $date = date('d/m/');
    $year = date('Y')+543;
    $date = $date.$year;

	for ($pageNo = 1; $pageNo <= $pageCount_1; $pageNo++) {	
        $pdf->AddPage();
        $tplIdx = $pdf->importPage($pageNo);
            $pdf->useTemplate($tplIdx, 0, 0, 0, 0, true);
            // $pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
            // $pdf->SetFont('THSarabunNew', '', 6 );
            // $border = 0;
            // for ($i = 10; $i<=270;$i+= 5){
            //     for ($j = 10; $j<200;$j+= 10){
            //         $pdf->SetXY( $j, $i );
            //         $pdf->MultiCell(7, 5, U2T($j.','.$i), $border, "L");//หนังสือกู้ที่
            //     }

            // }
            
            $pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
            $pdf->SetFont('THSarabunNew', '', 14 );
            $border = 1;
            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetAutoPageBreak(true,0);
            $day = date('d');
            $mount = date('m');
            $int_mount = (int)$mount;
            $date = date('d/m/');
            $year = date('Y')+543;
            $date = $date.$year;
            if($pageNo == '1'){
                $y = 8.7;

                $y_point = 16.2;
                $pdf->SetXY( 30, $y_point );
                $pdf->MultiCell(70, 5, U2T($full_name), $border, "C");//ชื่อผู้ขอกู้
                $pdf->SetXY( 127, $y_point );
                $pdf->MultiCell(17, 5, U2T($data['member_id']), $border, "C");//เลขที่สมาชิก
                $pdf->SetXY( 163, $y_point );
                $pdf->MultiCell(40, 5, U2T($data['coop_mem_group'][0]['mem_group_name']), $border, "C");//หน่วยงาน
                $y_point += $y;
                $pdf->SetXY( 50, $y_point );
                $pdf->MultiCell(53, 5, U2T($data['coop_loan_guarantee'][0]['full_name_th']), $border, "C");//ชื่อผู้ค้ำ1
                $pdf->SetXY( 127, $y_point );
                $pdf->MultiCell(17, 5, U2T($data['coop_loan_guarantee'][0]['member_id']), $border, "C");//เลขที่สมาชิก1
                $pdf->SetXY( 163, $y_point );
                $pdf->MultiCell(40, 5, U2T($data['coop_loan_guarantee'][0]['mem_group_name']), $border, "C");//หน่อบงาน1
                $y_point += $y;
                $pdf->SetXY( 50, $y_point );
                $pdf->MultiCell(53, 5, U2T($data['coop_loan_guarantee'][1]['full_name_th']), $border, "C");//ชื่อผู้ค้ำ2
                $pdf->SetXY( 127, $y_point );
                $pdf->MultiCell(17, 5, U2T($data['coop_loan_guarantee'][1]['member_id']), $border, "C");//เลขที่สมาชิก2
                $pdf->SetXY( 163, $y_point );
                $pdf->MultiCell(40, 5, U2T($data['coop_loan_guarantee'][1]['mem_group_name']), $border, "C");//หน่อบงาน2
                $y_point += $y;
                $pdf->SetXY( 50, $y_point );
                $pdf->MultiCell(53, 5, U2T($data['coop_loan_guarantee'][2]['full_name_th']), $border, "C");//ชื่อผู้ค้ำ2
                $pdf->SetXY( 127, $y_point );
                $pdf->MultiCell(17, 5, U2T($data['coop_loan_guarantee'][2]['member_id']), $border, "C");//เลขที่สมาชิก3
                $pdf->SetXY( 163, $y_point );
                $pdf->MultiCell(40, 5, U2T($data['coop_loan_guarantee'][2]['mem_group_name']), $border, "C");//หน่อบงาน3

                $y_point = 71.5;
                $pdf->Image($myImage, 12.6, $y_point, 3);
                $pdf->Image($myImage, 31.6, $y_point, 3);
                $pdf->Image($myImage, 51.6, $y_point, 3);
                $pdf->Image($myImage, 67.6, $y_point, 3);   

                $pdf->Image($myImage, 110.6, $y_point, 3);
                $pdf->Image($myImage, 133.1, $y_point, 3);
                $pdf->Image($myImage, 156.1, $y_point, 3);
                $pdf->Image($myImage, 177.6, $y_point, 3);
                $y_point += 6.8;
                $pdf->Image($myImage, 110.6, $y_point, 3);
                $pdf->Image($myImage, 133.1, $y_point, 3);
                $pdf->Image($myImage, 156.1, $y_point, 3);
                $pdf->Image($myImage, 177.6, $y_point, 3);

                $y = 7.63;
                $y_point = 257.8;
                $pdf->SetXY( 80 , $y_point );
                $pdf->MultiCell(65, 5, U2T($data['fullname_th']), $border, "C");//รองผู้จัดการ
                $pdf->SetXY( 161 , $y_point );
                $pdf->MultiCell(10, 5, U2T($data['member_id']), $border, "C");//วัน
                $pdf->SetXY( 172 , $y_point );
                $pdf->MultiCell(10, 5, U2T($data['shair_id']), $border, "C");//เดือน
                $y_point += $y;
                $pdf->SetXY( 80 , $y_point );
                $pdf->MultiCell(65, 5, U2T($data['position']), $border, "C");//หัวหน้าผ่ายสินเชื่อ
                $pdf->SetXY( 161 , $y_point );
                $pdf->MultiCell(10, 5, U2T('t14'), $border, "C");//วัน
                $pdf->SetXY( 172 , $y_point );
                $pdf->MultiCell(10, 5, U2T('t15'), $border, "C");//เดือน
                $y_point += $y;
                $pdf->SetXY( 80 , $y_point );
                $pdf->MultiCell(65, 5, U2T('t16'), $border, "C");//เจ้าหน้าที่ สอ.รพ.
                $pdf->SetXY( 161 , $y_point );
                $pdf->MultiCell(10, 5, U2T('t17'), $border, "C");//วัน
                $pdf->SetXY( 172 , $y_point );
                $pdf->MultiCell(10, 5, U2T('t18'), $border, "C");//เดือน

            }else if($pageNo == '2'){

            }else if($pageNo == '3'){
                $y = 7.67;
                $y_point = 34;
                $pdf->SetXY( 32.5, $y_point );
                $pdf->MultiCell(14  , 5, U2T('***'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 166.5, $y_point-1.5 );
                $pdf->MultiCell(14  , 5, U2T('5'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 181.5, $y_point-1.5 );
                $pdf->MultiCell(14  , 5, U2T('35'), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 32.5, $y_point );
                $pdf->MultiCell(9  , 5, U2T($date_to_text), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 42.5, $y_point );
                $pdf->MultiCell(9  , 5, U2T($date_to_month), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 52.5, $y_point );
                $pdf->MultiCell(10  , 5, U2T($date_to_year), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 160, $y_point-1.5 );
                $pdf->MultiCell(9  , 5, U2T($date_to_text), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 170, $y_point-1.5 );
                $pdf->MultiCell(9  , 5, U2T($date_to_month), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 181.5, $y_point-1.5 );
                $pdf->MultiCell(11  , 5, U2T($date_to_year), $border, "C");//หนังสือกู้ที่

                $y_point = 58;
                $pdf->SetXY( 133, $y_point );
                $pdf->MultiCell(60 , 5, U2T($data['coop_name_th']), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 133, $y_point );
                $pdf->MultiCell(60 , 5, U2T($full_date), $border, "C");//หนังสือกู้ที่

                $y_point = 85;
                $pdf->SetXY( 45, $y_point );
                $pdf->MultiCell(85 , 5, U2T($full_name), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 165, $y_point );
                $pdf->MultiCell(30 , 5, U2T($data['member_id']), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 58, $y_point );
                $pdf->MultiCell(40 , 5, U2T($data['salary']), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 79, $y_point );
                $pdf->MultiCell(30 , 5, U2T($data['loan_amount'] ), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 120, $y_point );
                $pdf->MultiCell(71 , 5, U2T($money_loan_amount_2text ), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 124, $y_point );
                $pdf->MultiCell(71 , 5, U2T('***'), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 119, $y_point );
                $pdf->MultiCell(71 , 5, U2T(($position=='')? '-': $position), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 105, $y_point );
                $pdf->MultiCell(35 , 5, U2T($data['id_card']), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 154, $y_point );
                $pdf->MultiCell(40 , 5, U2T($data['mem_group_name_faction']), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 56, $y_point );
                $pdf->MultiCell(25 , 5, U2T($data['c_address_no']), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 90, $y_point );
                $pdf->MultiCell(30 , 5, U2T($data['c_address_road']), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 132, $y_point );
                $pdf->MultiCell(25 , 5, U2T($data['district_name']), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 168, $y_point );
                $pdf->MultiCell(27 , 5, U2T($data['amphur_name']), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 32.5   , $y_point );
                $pdf->MultiCell(39 , 5, U2T($data['province_name']), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 94   , $y_point );
                $pdf->MultiCell(30 , 5, U2T($data['zipcode']), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 140, $y_point );
                $pdf->MultiCell(55 , 5, U2T($data['mobile']), $border, "C");//หนังสือกู้ที่

                $y_point = 207.3;
                if ($data['pay_type']==1){
                    $pdf->Image($myImage, 42.5, $y_point+1.3, 3);
                    $pdf->SetXY( 86, $y_point );
                    $pdf->MultiCell(36, 5, U2T($data['money_per_period']), $border, "C"); //ต้นเงินเท่ากันทุกงวดๆ ละ.
                    $pdf->SetXY( 170, $y_point );
                    $pdf->MultiCell(18, 5, U2T($data['period_amount']), $border, "C"); //จำนวนงวด
                }else if($data['pay_type']==2) {
                    $y_point += $y;
                    $pdf->Image($myImage, 42.5, $y_point+1.3, 3);
                    $pdf->SetXY( 105, $y_point );
                    $pdf->MultiCell(36, 5, U2T($data['money_per_period']), $border, "C"); //ต้นเงินและดอกเบ้ียเท่ากันทุกงวดๆละ
                    $pdf->SetXY( 170, $y_point );
                    $pdf->MultiCell(18, 5, U2T($data['period_amount']), $border, "C"); //จำนวนงวด
                }
                $y_point = 238;
                $pdf->SetXY( 135, $y_point );
                $pdf->MultiCell(50 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 135, $y_point );
                $pdf->MultiCell(50 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $y_point = 276.5;
                $pdf->SetXY( 135, $y_point );
                $pdf->MultiCell(50 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 135, $y_point );
                $pdf->MultiCell(50 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่

            }else if($pageNo == '4'){

            }else if($pageNo == '5'){
                $y = 7.65;
                $y_point = 38;
                $pdf->SetXY( 161, $y_point );
                $pdf->MultiCell(15 , 5, U2T(''), $border, "C");//ที่
                $pdf->SetXY( 178, $y_point );
                $pdf->MultiCell(15 , 5, U2T(''), $border, "C");//ที่

                $y_point += $y;
                $pdf->SetXY( 157, $y_point );
                $pdf->MultiCell(34 , 5, U2T($full_date), $border, "C");//วันที่

                $y_point += $y;
                $pdf->SetXY( 45, $y_point );
                $pdf->MultiCell(150 , 5, U2T($full_name), $border, "C");//ชื่อ
                $y_point += $y;
                $pdf->SetXY( 45, $y_point );
                $pdf->MultiCell(150 , 5, U2T($full_name), $border, "C");//ชื่อ
                $y_point += $y;
                $pdf->SetXY( 157, $y_point );
                $pdf->MultiCell(35 , 5, U2T($data['member_id']), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 85, $y_point );
                $pdf->MultiCell(35 , 5, U2T($data['position_name']), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 46, $y_point );
                $pdf->MultiCell(35 , 5, U2T($data['id_card']), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 92, $y_point );
                $pdf->MultiCell(45 , 5, U2T($data['mem_group_full_name_level']), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 170, $y_point );
                $pdf->MultiCell(25 , 5, U2T($data['c_address_no']), $border, "C");//หนังสือกู้ที่

                $y_point += $y;
                $pdf->SetXY( 29, $y_point );
                $pdf->MultiCell(30 , 5, U2T(($data['c_address_road'] =='')? '-': $data['c_address_road']), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 70, $y_point );
                $pdf->MultiCell(33 , 5, U2T(($data['district_name'] =='')? '-': $data['district_name']), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 115, $y_point );
                $pdf->MultiCell(33 , 5, U2T($data['amphur_name']), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 161, $y_point );
                $pdf->MultiCell(33 , 5, U2T($data['province_name']), $border, "C");//หนังสือกู้ที่

                $y_point += $y;
                $pdf->SetXY( 35, $y_point );
                $pdf->MultiCell(55 , 5, U2T($data['mobile']), $border, "C");//หนังสือกู้ที่
                $y_point += $y+$y;
                $pdf->SetXY( 102, $y_point );
                $pdf->MultiCell(23 , 5, U2T($data['loan_amount']), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 135, $y_point );
                $pdf->MultiCell(55 , 5, U2T($money_salary_2text), $border, "C");//หนังสือกู้ที่

                $y_point += $y+$y+$y;
                $pdf->Image($myImage, 42.5, $y_point+1.3, 3);
                $pdf->SetXY( 105, $y_point );
                $pdf->MultiCell(60 , 5, U2T($money_per_period2text), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->Image($myImage, 42.5, $y_point+1.3, 3);
                $pdf->SetXY( 123, $y_point );
                $pdf->MultiCell(60 , 5, U2T($money_per_period2text), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 48, $y_point );
                $pdf->MultiCell(28 , 5, U2T($data['period_amount']), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 155, $y_point );
                $pdf->MultiCell(30 , 5, U2T($interest_per_year2text), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 60, $y_point );
                $pdf->MultiCell(30 , 5, U2T($month_arr[$data['month_start']]), $border, "C");//หนังสือกู้ที่
   
            }else if($pageNo == '6'){
                $y = 7.63;
                $y_point = 43;
                $pdf->SetXY( 119, $y_point );
                $pdf->MultiCell(30 , 5, U2T(''), $border, "C");//สหกรณ์เลขที่
                $pdf->SetXY( 162, $y_point );
                $pdf->MultiCell(25 , 5, U2T($data['petition_number']), $border, "C");//หุ้น
                $y_point += $y;
                $pdf->SetXY( 32, $y_point );
                $pdf->MultiCell(40 , 5, U2T(''), $border, "C");//จำนวนเงิน
                $y_point = 100.6;
                $pdf->SetXY( 124, $y_point );
                $pdf->MultiCell(50 , 5, U2T(''), $border, "C");//ผู้กู้
                $y_point += $y;
                $pdf->SetXY( 124, $y_point );
                $pdf->MultiCell(50 , 5, U2T(''), $border, "C");//ผู้กู้
                $y_point += $y;
                $pdf->SetXY( 124, $y_point );
                $pdf->MultiCell(50 , 5, U2T(''), $border, "C");//พยาน
                $y_point += $y;
                $pdf->SetXY( 124, $y_point );
                $pdf->MultiCell(50 , 5, U2T(''), $border, "C");//พยาน
                $y_point += $y;
                $pdf->SetXY( 124, $y_point );
                $pdf->MultiCell(50 , 5, U2T(''), $border, "C");//พยาน
                $y_point += $y;
                $pdf->SetXY( 124, $y_point );
                $pdf->MultiCell(50 , 5, U2T(''), $border, "C");//พยาน

                $y_point = 162.8;
                $pdf->SetXY( 148, $y_point );
                $pdf->MultiCell(40 , 5, U2T('t1'), $border, "C");//ผู้กู้
                $y_point += $y;
                $pdf->SetXY( 148, $y_point );
                $pdf->MultiCell(40 , 5, U2T('t1'), $border, "C");//ผู้กู้
                $y_point += $y;
                $pdf->SetXY( 45, $y_point );
                $pdf->MultiCell(55 , 5, U2T('t1'), $border, "C");//ผู้กู้
                $pdf->SetXY( 128, $y_point );
                $pdf->MultiCell(55 , 5, U2T('t1'), $border, "C");//ผู้กู้
                $y_point += $y;
                $pdf->SetXY( 54, $y_point );
                $pdf->MultiCell(52 , 5, U2T('t1'), $border, "C");//ผู้กู้
                $y_point += $y+$y;
                $pdf->SetXY( 110, $y_point );
                $pdf->MultiCell(43 , 5, U2T('t1'), $border, "C");//ผู้กู้
                $y_point += $y;
                $pdf->SetXY( 110, $y_point );
                $pdf->MultiCell(43 , 5, U2T('t1'), $border, "C");//ผู้กู้
                $y_point += $y;
                $pdf->SetXY( 110, $y_point );
                $pdf->MultiCell(43 , 5, U2T('t1'), $border, "C");//ผู้กู้
                $y_point += $y;
                $pdf->SetXY( 110, $y_point );
                $pdf->MultiCell(43 , 5, U2T('t1'), $border, "C");//ผู้กู้

                $y_point = 235.5;
                $pdf->SetXY( 32, $y_point );
                $pdf->MultiCell(85 , 5, U2T('t1'), $border, "C");//ผู้กู้
                $pdf->SetXY( 150, $y_point );
                $pdf->MultiCell(35 , 5, U2T('t1'), $border, "C");//ผู้กู้

                $y_point += $y;
                $pdf->SetXY( 23, $y_point );
                $pdf->MultiCell(75 , 5, U2T('t1'), $border, "C");//ผู้กู้

                $y_point = 255;
                $pdf->SetXY( 92, $y_point );
                $pdf->MultiCell(50 , 5, U2T('t1'), $border, "C");//ผู้กู้
                $y_point += $y;
                $pdf->SetXY( 92, $y_point );
                $pdf->MultiCell(50 , 5, U2T('t1'), $border, "C");//ผู้กู้
                $y_point = 274.3;
                $pdf->SetXY( 92, $y_point );
                $pdf->MultiCell(50 , 5, U2T('t1'), $border, "C");//ผู้กู้
                $y_point = 286;
                $pdf->SetXY( 92, $y_point );
                $pdf->MultiCell(50 , 5, U2T('t1'), $border, "C");//ผู้กู้
            }else if($pageNo == '7'){
                $y_point = 43.7;
                $pdf->SetXY( 135, $y_point );
                $pdf->MultiCell(60 , 5, U2T($data['mem_group_name_faction']), $border, "C");//ผู้กู้
                $y_point += $y;
                $pdf->SetXY( 120, $y_point );
                $pdf->MultiCell(13 , 5, U2T($date_to_text), $border, "C");//ผู้กู้
                $pdf->SetXY( 143, $y_point );
                $pdf->MultiCell(28 , 5, U2T($mount), $border, "C");//ผู้กู้
                $pdf->SetXY( 178.5, $y_point );
                $pdf->MultiCell(13 , 5, U2T($date_to_year), $border, "C");//ผู้กู้
                $y_point += $y;
                $pdf->SetXY( 45, $y_point );
                $pdf->MultiCell(55 , 5, U2T($fullname_th), $border, "C");//ผู้กู้
                $pdf->SetXY( 138, $y_point );
                $pdf->MultiCell(37 , 5, U2T($data['id_card']), $border, "C");//ผู้กู้
                $pdf->SetXY( 182, $y_point );
                $pdf->MultiCell(8 , 5, U2T($age), $border, "C");//ผู้กู้


                $y_point += $y;
                $pdf->SetXY( 52, $y_point );
                $pdf->MultiCell(15 , 5, U2T($data['c_address_no']), $border, "C");//ผู้กู้
                $pdf->SetXY( 75, $y_point );
                $pdf->MultiCell(15 , 5, U2T($data['c_address_moo']), $border, "C");//ผู้กู้
                $pdf->SetXY( 107, $y_point );
                $pdf->MultiCell(35 , 5, U2T($data['c_address_soi']), $border, "C");//ผู้กู้
                $pdf->SetXY( 150, $y_point );
                $pdf->MultiCell(40 , 5, U2T($data['c_address_road']), $border, "C");//ผู้กู้

                $y_point += $y;
                $pdf->SetXY( 39, $y_point );
                $pdf->MultiCell(40 , 5, U2T($data['district_name']), $border, "C");//ผู้กู้
                $pdf->SetXY( 98, $y_point );
                $pdf->MultiCell(35 , 5, U2T($data['amphur_name']), $border, "C");//ผู้กู้
                $pdf->SetXY( 150, $y_point );
                $pdf->MultiCell(40 , 5, U2T($data['province_name']), $border, "C");//ผู้กู้

                $y_point += $y;
                $pdf->SetXY( 47, $y_point );
                $pdf->MultiCell(35 , 5, U2T($data['tel']), $border, "C");//ผู้กู้
                $pdf->SetXY( 95, $y_point );
                $pdf->MultiCell(38 , 5, U2T($data['mobile']), $border, "C");//ผู้กู้
                $pdf->SetXY( 149, $y_point );
                $pdf->MultiCell(40 , 5, U2T($data['position']), $border, "C");//ผู้กู้
                $y_point += $y;
                $pdf->SetXY( 30, $y_point );
                $pdf->MultiCell(30 , 5, U2T($data['mem_group_full_name_level']), $border, "C");//ผู้กู้
                $pdf->SetXY( 100, $y_point );
                $pdf->MultiCell(20 , 5, U2T($data['salary']), $border, "C");//ผู้กู้
                $pdf->SetXY( 132, $y_point );
                $pdf->MultiCell(58 , 5, U2T($money_salary_2text ), $border, "C");//ผู้กู้
                $y_point += $y;
                $pdf->SetXY( 152, $y_point );
                $pdf->MultiCell(40 , 5, U2T($data['member_id']), $border, "C");//ผู้กู้
                $y_point += $y+$y+$y+0.6;
                $pdf->SetFont('THSarabunNew', '', 10 );
                $pdf->SetXY( 68, $y_point );
                $pdf->MultiCell(14.5 , 5, U2T($data['petition_number']), $border, "C");//ผู้กู้
                $pdf->SetFont('THSarabunNew', '', 5 );
                $pdf->SetXY( 110, $y_point );
                $pdf->MultiCell(8 , 5, U2T($data['contract_number']), $border, "C");//ผู้กู้
                $pdf->SetFont('THSarabunNew', '', 14 );
            }else if($pageNo == '9'){
                $y = 7.63;
                $y_point = 40;
                $pdf->SetXY( 38, $y_point-1.7);
                $pdf->MultiCell(7.8, 5, U2T(''), $border, "C");//ผู้กู้
                $pdf->SetXY( 46.8, $y_point-1.7);
                $pdf->MultiCell(10, 5, U2T(''), $border, "C");//ผู้กู้
                $pdf->SetXY( 165, $y_point );
                $pdf->MultiCell(15 , 5, U2T(''), $border, "C");//ผู้กู้
                $pdf->SetXY( 181, $y_point );
                $pdf->MultiCell(15 , 5, U2T(''), $border, "C");//ผู้กู้

                $y_point += $y;
                $pdf->SetXY( 18, $y_point-1.7);
                $pdf->MultiCell(49, 5, U2T($full_name), $border, "C");//ผู้กู้
                $y_point = 59.4;
                $pdf->SetXY( 80, $y_point);
                $pdf->MultiCell(75, 5, U2T($data['coop_loan_guarantee']['0']['full_name_th']), $border, "C");//ผู้กู้
                $y_point = 71.5;
                $pdf->SetXY( 143, $y_point);
                $pdf->MultiCell(50, 5, U2T($full_date), $border, "C");//ผู้กู้
                $y_point = 83.3;
                $pdf->SetXY( 45, $y_point);
                $pdf->MultiCell(150, 5, U2T($data['coop_loan_guarantee']['0']['full_name_th']), $border, "C");//ผู้กู้


                $y_point += $y;
                $pdf->SetXY( 157, $y_point);
                $pdf->MultiCell(35, 5, U2T(U2T($data['coop_loan_guarantee']['0']['member_id'])), $border, "C");//ผู้กู้

                $y_point += $y;
                $pdf->SetXY( 88, $y_point);
                $pdf->MultiCell(45, 5, U2T($data['positon_name']), $border, "C");//ผู้กู้

                $y_point += $y;
                $pdf->SetXY( 49, $y_point);
                $pdf->MultiCell(35, 5, U2T($data['id_card']), $border, "C");//ผู้กู้
                $pdf->SetXY( 95, $y_point);
                $pdf->MultiCell(35, 5, U2T($data['coop_loan_guarantee'][1]['mem_group_name']), $border, "C");//ผู้กู้
                $pdf->SetXY( 169, $y_point);
                $pdf->MultiCell(25, 5, U2T($data['c_address_no']), $border, "C");//ผู้กู้

                $y_point += $y;
                $pdf->SetXY( 29, $y_point);
                $pdf->MultiCell(30, 5, U2T($data['c_address_road']), $border, "C");//ผู้กู้
                $pdf->SetXY( 68, $y_point);
                $pdf->MultiCell(30, 5, U2T($data['c_district_name']), $border, "C");//ผู้กู้
                $pdf->SetXY( 110, $y_point);
                $pdf->MultiCell(33  , 5, U2T($data['c_amphur_name']), $border, "C");//ผู้กู้
                $pdf->SetXY( 155, $y_point);
                $pdf->MultiCell(40, 5, U2T($data['provine_name']), $border, "C");//ผู้กู้

                $y_point += $y;
                $pdf->SetXY( 38, $y_point);
                $pdf->MultiCell(40, 5, U2T($data['mobile']), $border, "C");//ผู้กู้
                $y_point += $y+$y;
                $pdf->SetXY( 77, $y_point);
                $pdf->MultiCell(65, 5, U2T($fullname_th), $border, "C");//ผู้กู้
                $pdf->SetXY( 177, $y_point);
                $pdf->MultiCell(16, 5, U2T($data['member_id']), $border, "C");//ผู้กู้
                $y_point += $y;
                $pdf->SetXY( 41, $y_point);
                $pdf->MultiCell(30, 5, U2T($data['loan_amount']), $border, "C");//ผู้กู้
                $pdf->SetXY( 83, $y_point);
                $pdf->MultiCell(70, 5, U2T($money_loan_amount_2text), $border, "C");//ผู้กู้

                $y_point += $y;
                $pdf->SetXY( 45, $y_point);
                $pdf->MultiCell(12, 5, U2T(''), $border, "C");//ผู้กู้
                $pdf->SetXY( 59, $y_point);
                $pdf->MultiCell(12, 5, U2T(''), $border, "C");//ผู้กู้
                $pdf->SetXY( 83, $y_point);
                $pdf->MultiCell(38, 5, U2T($data['approve_date']), $border, "C");//ผู้กู้
            }else if($pageNo == '10'){
                $y_point = 70;
                $pdf->SetXY( 29, $y_point);
                $pdf->MultiCell(38, 5, U2T($data['coop_loan_guarantee'][0]['full_name_th']), $border, "C");//ผู้กู้
                $pdf->SetXY( 80, $y_point);
                $pdf->MultiCell(33, 5, U2T($data['position_name']), $border, "C");//ผู้กู้
                $y_point = 76.5;
                $pdf->SetXY( 37.5, $y_point);
                $pdf->MultiCell(57, 5, U2T($fullname_th), $border, "C");//ผู้กู้
                $y_point = 132.5;
                $pdf->SetXY( 134, $y_point);
                $pdf->MultiCell(57, 5, U2T($data['coop_loan_guarantee'][0]['mem_group_name']), $border, "C");//ผู้กู้
                $y_point = 139.8;
                $pdf->SetXY( 133, $y_point);
                $pdf->MultiCell(57, 5, U2T($full_date), $border, "C");//ผู้กู้
                $y_point = 148;
                $pdf->SetXY( 38, $y_point);
                $pdf->MultiCell(57, 5, U2T($data['mary_name']), $border, "C");//ผู้กู้
                $pdf->SetXY( 123, $y_point);
                $pdf->MultiCell(57, 5, U2T($full_name), $border, "C");//ผู้กู้
                $y_point = 155.5;
                $pdf->SetXY( 45, $y_point);
                $pdf->MultiCell(47, 5, U2T($data['coop_loan_guarantee']['0']['full_name_th']), $border, "C");//ผู้กู้
            }else if($pageNo == '11'){
                $y_point = 79.5;
                $pdf->SetXY( 135, $y_point);
                $pdf->MultiCell(57, 5, U2T($data['petition_number']), $border, "C");//ผู้กู้
                $y_point = 87;
                $pdf->SetXY( 45, $y_point);
                $pdf->MultiCell(40, 5, U2T($data['approve_date']), $border, "C");//ผู้กู้
                $y_point = 94;
                $pdf->SetXY( 36, $y_point);
                $pdf->MultiCell(88, 5, U2T($full_name), $border, "C");//ผู้กู้
                $y_point = 112;
                $pdf->Image($myImage, 59, $y_point, 3);
                $y_point = 120;
                $pdf->Image($myImage, 59, $y_point, 3);
                $y_point = 135;
                $pdf->Image($myImage, 59, $y_point, 3);
                $y_point = 143.2;
                $pdf->Image($myImage, 59, $y_point, 3);
                $y_point = 149.5;
                $pdf->Image($myImage, 59, $y_point, 3);
                $y_point = 165;
                $pdf->Image($myImage, 59, $y_point, 3);
                $y_point = 181;
                $pdf->Image($myImage, 59, $y_point, 3);
            }else if($pageNo == '11'){
                
            }else if($pageNo == '12'){

            }else if($pageNo == '13'){
                $y_point = 38.5;
                $pdf->SetXY( 40, $y_point);
                $pdf->MultiCell(10, 5, U2T(''), $border, "C");//ผู้กู้
                $pdf->SetXY( 48, $y_point);
                $pdf->MultiCell(10, 5, U2T(''), $border, "C");//ผู้กู้
                $y_point = 47;
                $pdf->SetXY( 20, $y_point);
                $pdf->MultiCell(47, 5, U2T($fullname_th), $border, "C");//ผู้กู้
                $y_point = 60;
                $pdf->SetXY( 80, $y_point);
                $pdf->MultiCell(75, 5, U2T($data['coop_loan_guarantee']['0']['full_name_th']), $border, "C");//ผู้กู้
                $y_point = 72;
                $pdf->SetXY( 143, $y_point);
                $pdf->MultiCell(48, 5, U2T($full_date), $border, "C");//ผู้กู้
                $y_point = 83.7;
                $pdf->SetXY( 45, $y_point);
                $pdf->MultiCell(120, 5, U2T($full_name), $border, "C");//ผู้กู้
                $y_point = 90.7;
                $pdf->SetXY( 160, $y_point);
                $pdf->MultiCell(30, 5, U2T($data['member_id']), $border, "C");//ผู้กู้
                $y_point = 98.8;
                $pdf->SetXY( 87, $y_point);
                $pdf->MultiCell(40, 5, U2T($data['position_name']), $border, "C");//ผู้กู้
                $y_point = 50;
                $y_point = 106.5;
                $pdf->SetXY( 48, $y_point);
                $pdf->MultiCell(36, 5, U2T($data['id_card']), $border, "C");//ผู้กู้
                $pdf->SetXY( 95, $y_point);
                $pdf->MultiCell(33, 5, U2T($data['mem_group_name_level']), $border, "C");//ผู้กู้
                $pdf->SetXY( 165, $y_point);
                $pdf->MultiCell(30, 5, U2T($data['c_address_no']), $border, "C");//ผู้กู้
                $y_point = 114;
                $pdf->SetXY( 28, $y_point);
                $pdf->MultiCell(30, 5, U2T($data['c_address_road']), $border, "C");//ผู้กู้
                $pdf->SetXY( 65, $y_point);
                $pdf->MultiCell(30, 5, U2T($data['district_name']), $border, "C");//ผู้กู้
                $pdf->SetXY( 108, $y_point);
                $pdf->MultiCell(30, 5, U2T($data['amphur_name']), $border, "C");//ผู้กู้
                $pdf->SetXY( 165, $y_point);
                $pdf->MultiCell(30, 5, U2T($data['province_name']), $border, "C");//ผู้กู้
                $y_point = 122.5;
                $pdf->SetXY( 32.5, $y_point);
                $pdf->MultiCell(40, 5, U2T($data['mobile']), $border, "C");//ผู้กู้
                $y_point = 137;
                $pdf->SetXY( 72, $y_point);
                $pdf->MultiCell(62, 5, U2T($fullname_th), $border, "C");//ผู้กู้
                $pdf->SetXY( 175, $y_point);
                $pdf->MultiCell(20, 5, U2T($data['member_id']), $border, "C");//ผู้กู้
                $y_point = 144.5;
                $pdf->SetXY( 40, $y_point);
                $pdf->MultiCell(30, 5, U2T($data['loan_amount']), $border, "C");//ผู้กู้
                $pdf->SetXY( 80, $y_point);
                $pdf->MultiCell(70, 5, U2T($money_loan_amount_2text), $border, "C");//ผู้กู้
                $y_point = 152.5;
                $pdf->SetXY( 43, $y_point);
                $pdf->MultiCell(12, 5, U2T(''), $border, "C");//ผู้กู้
                $pdf->SetXY( 57, $y_point);
                $pdf->MultiCell(12, 5, U2T(''), $border, "C");//ผู้กู้
                $pdf->SetXY( 83, $y_point);
                $pdf->MultiCell(36, 5, U2T($data['approve_date']), $border, "C");//ผู้กู้
            }else if($pageNo == '14'){
                $y_point = 76.5;
                $pdf->SetXY( 32, $y_point);
                $pdf->MultiCell(30, 5, U2T($data['coop_loan_guarantee']['1']['full_name_th']), $border, "C");//ผู้กู้
                $pdf->SetXY( 80, $y_point);
                $pdf->MultiCell(30, 5, U2T($data['position_name']), $border, "C");//ผู้กู้
                $y_point = 83;
                $pdf->SetXY( 40, $y_point);
                $pdf->MultiCell(52, 5, U2T($data['coop_loan_guarantee']['0']['full_name_th']), $border, "C");//ผู้กู้
                $y_point = 139;
                $pdf->SetXY( 132.5, $y_point);
                $pdf->MultiCell(52, 5, U2T($data['coop_loan_guarantee'][0]['mem_group_name']), $border, "C");//ผู้กู้
                $y_point = 146.5;
                $pdf->SetXY( 132.5, $y_point);
                $pdf->MultiCell(52, 5, U2T($full_date), $border, "C");//ผู้กู้
                $y_point = 154;
                $pdf->SetXY( 42.5, $y_point);
                $pdf->MultiCell(52, 5, U2T($data['marry_name']), $border, "C");//ผู้กู้
                $pdf->SetXY( 125, $y_point);
                $pdf->MultiCell(52, 5, U2T($fullname_th), $border, "C");//ผู้กู้
                $y_point = 162;
                $pdf->SetXY( 45, $y_point);
                $pdf->MultiCell(52, 5, U2T($fullname_th), $border, "C");//ผู้กู้
                
            }else if($pageNo == '15'){
                $y_point = 79.5;
                $pdf->SetXY( 137, $y_point);
                $pdf->MultiCell(20, 5, U2T(''), $border, "C");//ผู้กู้
                $pdf->SetXY( 161, $y_point);
                $pdf->MultiCell(20, 5, U2T(''), $border, "C");//ผู้กู้
                $y_point = 87;
                $pdf->SetXY( 44, $y_point);
                $pdf->MultiCell(40, 5, U2T($data['approve_date']), $border, "C");//ผู้กู้
                $y_point = 95;
                $pdf->SetXY( 44, $y_point);
                $pdf->MultiCell(83, 5, U2T($fullname_th), $border, "C");//ผู้กู้
                $y_point = 112;
                $pdf->Image($myImage, 59, $y_point, 3);
                $y_point = 120;
                $pdf->Image($myImage, 59, $y_point, 3);
                $y_point = 135;
                $pdf->Image($myImage, 59, $y_point, 3);
                $y_point = 143;
                $pdf->Image($myImage, 59, $y_point, 3);
                $y_point = 150.5;
                $pdf->Image($myImage, 59, $y_point, 3);
                $y_point = 165.5;
                $pdf->Image($myImage, 59, $y_point, 3);
                $y_point = 181;
                $pdf->Image($myImage, 59, $y_point, 3);
            }
        }
	$pdf->Output();