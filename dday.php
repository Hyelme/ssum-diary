<? /*$sdate = ���̾���� ������ ��¥, $tdate1 = ���� ���� ��¥*/
function d_day($sdate) { 
$now = time($tdate1); 
$dday = mktime(0,0,0,$sdate); 
$xday = ceil(($dday-$now)/(60*60*24)); 
if($xday >= 0) $result = '<b>Day '.($xday+1).'</b>'; 
else { 
$result = '<b>D-'.abs($xday).'</b>'; 
} 
return $result; 
} 

echo d_day($sdate);
?> 