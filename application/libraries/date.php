<?php
class Date{
        
    function get_month_name($idx){
        $arr_month = array(
            'Januari','Februari','Maret',
            'April','Mei','Juni','Juli','Agustus',
            'September','Oktober','November','Desember'
        );
        return $arr_month[$idx-1];
    }
    function legend_status(){
        echo '<p>Keterangan:
            <span class="label">Belum berjalan</span>
            <span class="label label-success">Berjalan <50%</span>
            <span class="label label-info">Berjalan 50%-75%</span>
            <span class="label label-warning">Berjalan 75%-100%</span>
            <span class="label label-important">Sudah selesai</span>
        </p>
        ';
    }
    function warna_tgl($from, $to) {
        $first_date = strtotime($from);
        $second_date = strtotime($to);
        $curr_date = strtotime(date('Y/m/d'));
        $offset = floor(($curr_date-$first_date)/60/60/24);
        $range = floor(($second_date-$first_date)/60/60/24);
        $progress = $offset/$range*100;
        if($progress<0){
            $progress='label';
        }elseif($progress<50){
            $progress='label label-success';
        }elseif($progress<75){
            $progress='label label-info';
        }elseif($progress<=100){
            $progress='label label-warning';
        }else{
            $progress='label label-important';
        }
        return $progress;
    }
    function hitung_jam($from, $to) {
        $from = strtotime($from);
        $to = strtotime($to);
        $range = ($to-$from)/60/45;
//        return number_format($range, 2, ',','.');
        return round($range);
    }
    function get_day_name($idx){
        $arr_date = array('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');
        return $arr_date[$idx-1];
    }
    function hari_tgl($in){
        $tgl = date_create_from_format('Y-m-d', $in);
        $idx = date_format($tgl,'N');
        $arr_date = array('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');
        return $arr_date[$idx-1];
    }

    function hari_tgl_a($in){
        $tgl = date_create_from_format('Y-m-d H:i:s', $in);
        $idx = date_format($tgl,'N');
        $arr_date = array('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');
        return $arr_date[$idx-1];
    }

    function savetgl($in){
        //merubah format tanggal yy-mm-dd jadi dd-mm-yy
        $obj_date= date_create_from_format('d-m-Y h:i:s', $in);
        return date_format($obj_date, 'Y-m-d H:i:s');
    }
    function konversi1($in){
        //merubah format tanggal yy-mm-dd jadi dd-mm-yy
        if($in=="0000-00-00"){echo '';}else{
            $obj_date =  date_create_from_format('Y-m-d H:i:s', $in);
            return date_format($obj_date, 'd-m-Y');
        }
    }
    function konversi2($in){
        //merubah format tanggal yy-mm-dd jadi dd-mm-yy
        $obj_date=  date_create_from_format('Y-m-d', $in);
        echo date_format($obj_date, 'd-m-y');
    }
    function konversi2a($in){
        //merubah format tanggal yy-mm-dd jadi dd-mm-yy
       
        $obj_date=  date_create_from_format('Y-m-d', $in);
        return date_format($obj_date, 'd-m-Y');
    }
    function konversi2b($in){
        //merubah format tanggal yy-mm-dd jadi dd-mm-yy
       
        $obj_date=  date_create_from_format('d-m-Y', $in);
        return date_format($obj_date, 'Y-m-d');
    }

    function konversi3($in){
        //merubah format dari model 09 Jan 2012 ke 2012-01-09
        $part = explode(' ',$in);
        return $part[2].'-'.$this->index_bulan_ina($part[1]).'-'.$part[0];
    }
    
    function konversi4($in){
        //merubah ke tanggal indonesia
        $bulan=array(
            '','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'
        );
        $obj_date=  date_create_from_format('Y-m-d H:i:s', $in);
        return date_format($obj_date, 'j').' '.$bulan[date_format($obj_date, 'n')].' '.date_format($obj_date, 'Y');
    }

    function konversi4a($in){
        //merubah ke tanggal indonesia
        $bulan=array(
            '','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'
        );
        $obj_date=  date_create_from_format('d-m-Y', $in);
        return date_format($obj_date, 'j').' '.$bulan[date_format($obj_date, 'n')].' '.date_format($obj_date, 'Y');
    }
    
    function konversi4b($in){
        //merubah ke tanggal indonesia
        $bulan=array(
            '','Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'
        );
        $obj_date=  date_create_from_format('d-m-Y', $in);
        return date_format($obj_date, 'j').' '.$bulan[date_format($obj_date, 'n')].' '.date_format($obj_date, 'Y');
    }

    function konversi4c($in){
        //merubah ke tanggal indonesia
        $bulan=array(
            '','Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'
        );
        $obj_date=  date_create_from_format('Y-m-d H:i:s', $in);
        return date_format($obj_date, 'j').' '.$bulan[date_format($obj_date, 'n')].' '.date_format($obj_date, 'Y');
    }

    function konversi5($in){
        //merubah ke tanggal indonesia
        $bulan=array(
            '','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'
        );
        if($in==""){echo '';}else{
        $obj_date=  date_create_from_format('Y-m-d', $in);
        return date_format($obj_date, 'j').' '.$bulan[date_format($obj_date, 'n')].' '.date_format($obj_date, 'Y');
        }
    }

    function konversi5a($in){
        //merubah ke tanggal indonesia
        $bulan=array(
            '','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'
        );
        if($in==""){echo '';}else{
        $obj_date=  date_create_from_format('Y-m-d', $in);
        return $bulan[date_format($obj_date, 'n')].' '.date_format($obj_date, 'Y');
        }
    }

    function jam_konversi($in)
    {
        $obj_date=  date_create_from_format('Y-m-d H:i:s', $in);
        return date_format($obj_date, 'H').':'.date_format($obj_date, 'i');
    }
    
    function index_bulan_ina($bulan){
        if(strcasecmp($bulan,'jan')==0||strcasecmp($bulan,'januari')==0){
            return '01';
        }else if(strcasecmp($bulan,'feb')==0||strcasecmp($bulan,'februari')==0){
            return '02';
        }else if(strcasecmp($bulan,'mar')==0||strcasecmp($bulan,'maret')==0){
            return '03';
        }else if(strcasecmp($bulan,'apr')==0||strcasecmp($bulan,'april')==0){
            return '04';
        }else if(strcasecmp($bulan,'mei')==0||strcasecmp($bulan,'mei')==0){
            return '05';
        }else if(strcasecmp($bulan,'jun')==0||strcasecmp($bulan,'juni')==0){
            return '06';
        }else if(strcasecmp($bulan,'jul')==0||strcasecmp($bulan,'juli')==0){
            return '07';
        }else if(strcasecmp($bulan,'agu')==0||strcasecmp($bulan,'agustus')==0){
            return '08';
        }else if(strcasecmp($bulan,'sep')==0||strcasecmp($bulan,'september')==0){
            return '09';
        }else if(strcasecmp($bulan,'okt')==0||strcasecmp($bulan,'oktober')==0){
            return '10';
        }else if(strcasecmp($bulan,'nov')==0||strcasecmp($bulan,'noember')==0){
            return '11';
        }else if(strcasecmp($bulan,'des')==0||strcasecmp($bulan,'desember')==0){
            return '12';
        }
    }
    
    function extract_date($in){
        $obj_date=  date_create_from_format('Y-m-d H:i:s', $in);
        
        $a[] = date_format($obj_date, 'Y');
        $a[] = date_format($obj_date, 'n')-1;
        $a[] = date_format($obj_date, 'j');
        $a[] = date_format($obj_date, 'G');
        $a[] = date_format($obj_date, 'i');
        $a[] = date_format($obj_date, 's');
        return implode(', ', $a);
    }
    
    function createDateRangeArray($strDateFrom,$strDateTo) {
        // takes two dates formatted as YYYY-MM-DD and creates an
        // inclusive array of the dates between the from and to dates.

        // could test validity of dates here but I'm already doing
        // that in the main script

        $aryRange=array();

        $iDateFrom=mktime(1,0,0,substr($strDateFrom,5,2),     substr($strDateFrom,8,2),substr($strDateFrom,0,4));
        $iDateTo=mktime(1,0,0,substr($strDateTo,5,2),     substr($strDateTo,8,2),substr($strDateTo,0,4));

        if ($iDateTo>=$iDateFrom) {
            array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry

            while ($iDateFrom<$iDateTo) {
                $iDateFrom+=86400; // add 24 hours
                array_push($aryRange,date('Y-m-d',$iDateFrom));
            }
        }
        return $aryRange;
    }
    
}
