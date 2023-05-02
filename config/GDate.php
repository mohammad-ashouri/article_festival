<?php
function arabicDate($format,$timestamp)
{
    /*
    $format: [*]hj|ar|en:[jdl][Fmn][Yy][Aa]  (php.date function handles the rest chars)  
        examples:  
        echo arabicDate('hj:l d-F-Y هـ', time());    
        echo arabicDate('ar:l d/F - h:iA', time());  
    */  
    $format=trim($format);  
    if (substr($format,0,1)=='*') {  
                   $use_span=true;  
    $format=substr($format,1);  
           } else $use_span=false;  
    $type=substr($format,0,3);  

    $arDay = array("Sat"=>"السبت", "Sun"=>"الأحد", "Mon"=>"الإثنين", "Tue"=>"الثلاثاء",  
    "Wed"=>"الأربعاء", "Thu"=>"الخميس", "Fri"=>"الجمعة");  
    $ampm=array('am'=>'صباحا','pm'=>'مساء');  
    list($d,$m,$y,$dayname,$monthname,$am)=explode(' ',date('d m Y D M a', $timestamp));  
    if ($type=='hj:') {  
    if (($y>1582)||(($y==1582)&&($m>10))||(($y==1582)&&($m==10)&&($d>14))) {  
    $jd=ard_int((1461*($y+4800+ard_int(($m-14)/12)))/4);  
    $jd+=ard_int((367*($m-2-12*(ard_int(($m-14)/12))))/12);  
    $jd-=ard_int((3*(ard_int(($y+4900+ard_int(($m-14)/12))/100)))/4);  
    $jd+=$d-32076;  
    } else {  
    $jd = 367*$y-ard_int((7*($y+5001 + ard_int(($m-9)/7)))/4) + ard_int((275*$m)/9)+$d+1729777;  
    }  
    $l=$jd-1948440+10632;  
    $n=ard_int(($l-1)/10631);  
    $l=$l-10631*$n+355; // Correction: 355 instead of 354  
    $j=(ard_int((10985-$l)/5316)) * (ard_int((50*$l)/17719)) + (ard_int($l/5670)) * (ard_int((43*$l)/15238));  
    $l=$l-(ard_int((30-$j)/15)) * (ard_int((17719*$j)/50)) - (ard_int($j/16)) * (ard_int((15238*$j)/43))+29;  
    $m=ard_int((24*$l)/709);  
    $d=$l-ard_int((709*$m)/24);  
    $y=30*$n+$j-30;  
    $format=substr($format,3);  
    $hjMonth = array("محرم", "صفر", "ربيع ألاول", "ربيع الثاني",
    "جمادی ألاول", "جمادی الثاني", "رجب", "شعبان", "رمضان", "شوال", "ذو القعدة", "ذو الحجة");
    $format=str_replace('j', $d, $format);  
    $format=str_replace('d', str_pad($d,2,0,STR_PAD_LEFT), $format);  
    $format=str_replace('l', $arDay[$dayname], $format);  
    $format=str_replace('F', $hjMonth[$m-1], $format);  
    $format=str_replace('m', str_pad($m,2,0,STR_PAD_LEFT), $format);  
    $format=str_replace('n', $m, $format);  
    $format=str_replace('Y', $y, $format);  
    $format=str_replace('y', substr($y,2), $format);  
    $format=str_replace('a', substr($ampm[$am],0,1), $format);  
    $format=str_replace('A', $ampm[$am], $format);  
    }
    elseif($type=='ar:')
    {
        $format=substr($format,3);
        $arMonth=array("Jan"=>"يناير", "Feb"=>"فبراير","Mar"=>"مارس", "Apr"=>"ابريل", "May"=>"مايو",
        "Jun"=>"يونيو", "Jul"=>"يوليو", "Aug"=>"اغسطس", "Sep"=>"سبتمبر", "Oct"=>"اكتوبر",
        "Nov"=>"نوفمبر", "Dec"=>"ديسمبر");
        $format=str_replace('l', $arDay[$dayname], $format);
        $format=str_replace('F', $arMonth[$monthname], $format);
        $format=str_replace('a', substr($ampm[$am],0,1), $format);
        $format=str_replace('A', $ampm[$am], $format);
    }
    $date = date($format, $timestamp);  
    if($use_span) return '<span dir="rtl" lang="ar-sa">'.$date.'</span>';  
    else return $date;  
}  
function ard_int($float){return ($float < -0.0000001) ? ceil($float-0.0000001) : floor($float+0.0000001);} 
?>