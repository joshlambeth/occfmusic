<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

echo "hi";

$monthArray = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );
$date = getdate();
$month = $date['mon'];
$year = $date['year'];
//if (isset($_GET['months']) && isset($_GET['year']))
//{
//    $month = $_GET['months'];
//    $year = $_GET['year'];
//}


//echo '<table width="903" border="0"><tr>';
//if ($month == 1)
//{
//    if ($_GET['mode'] == 'admin' && $_COOKIE['pw'] == 'confirmed')
//    { 
//        echo '<td width="301"><a href="calendar.php?mode=admin&months=' . (12) . '&year=' . ($year - 1) . '">Previous Month</a></td>';
//    }
//    else
//    {
//         echo '<td width="301"><a href="calendar.php?months=' . (12) . '&year=' . ($year - 1) . '">Previous Month</a></td>';
//    }
//}
//else
//{
//    if ($_GET['mode'] == 'admin'  && $_COOKIE['pw'] == 'confirmed')
//    {
//        echo '<td width="301"><a href="calendar.php?mode=admin&months=' . ($month - 1) . '&year=' . $year . '">Previous Month</a></td>';
//    }
//    else
//    {
//        echo '<td width="301"><a href="calendar.php?months=' . ($month - 1) . '&year=' . $year . '">Previous Month</a></td>';
//    }
//}
//      
//echo '<td width="301" align="center" style="font-size:x-large; font-weight:bold;">' . $monthArray[$month - 1] . ' ' . $year . '</td>';
//
//if ($month == 12)
//{
//    if ($_GET['mode'] == 'admin'  && $_COOKIE['pw'] == 'confirmed')
//    {
//        echo '<td width="301" align="right"><a href="calendar.php?mode=admin&months=' . ($month % 12   1) . '&year=' . ($year   1) . '">Next Month</a></td>';
//    }
//    else
//    {
//        echo '<td width="301" align="right"><a href="calendar.php?months=' . ($month % 12   1) . '&year=' . ($year   1) . '">Next Month</a></td>';
//    }
//}
//else
//{
//    if ($_GET['mode'] == 'admin'  && $_COOKIE['pw'] == 'confirmed')
//    {
//        echo '<td width="301" align="right"><a href="calendar.php?mode=admin&months=' . ($month % 12   1) . '&year=' . $year . '">Next Month</a></td>';
//    }
//    else
//    {
//        echo '<td width="301" align="right"><a href="calendar.php?months=' . ($month % 12   1) . '&year=' . $year . '">Next Month</a></td>';
//    }
//}
//echo '</tr></table>';
//echo '<br>';
//


echo '<table border="1" cellspacing="0" cellpadding="4" style="width:903px;table-layout:fixed;" bgcolor="#FFFFFF"><tr style="font-weight:bold;"><td style="min-width:129px;" align="center">Sunday</td><td style="min-width:129px;" align="center">Monday</td><td style="min-width:129px;" align="center">Tuesday</td><td style="min-width:129px;" align="center">Wednesday</td><td style="min-width:129px;" align="center">Thursday</td><td style="min-width:129px;" align="center">Friday</td><td style="min-width:129px;" align="center">Saturday</td></tr>';


$dayOfMonth = 1;
$weekDay = 0;
$safety = 0;


while($dayOfMonth <= cal_days_in_month(0, $month, $year) && $safety < 10)
{
    //echo '<br>weekDay = ' . $weekDay;
    if ($weekDay == 0)
    {
        echo '<tr height="130" style="min-height:130" valign="top">';
    }
    if ($dayOfMonth == 1 && $weekDay == JDDayOfWeek(cal_to_jd(0, $month, 1, $year), 0))
    {
        echo '<td style="font-size:12px;.font-size:small;_font-size:x-small;min-width:129;">' . $dayOfMonth . '<br>' . '</td>';
        $dayOfMonth++;
    }
    elseif ($dayOfMonth == 1 && $weekDay != JDDayOfWeek(cal_to_jd(0, $month, 1, $year), 0))
    {
        echo '<td>&nbsp;</td>';
        $safety++;
    }
    else
    {
        echo '<td style="font-size:12px;.font-size:small;_font-size:x-small;min-width:129;">' . $dayOfMonth . '<br>' .  '</td>';
        $dayOfMonth++;
    }
    if ($weekDay == 6)
    {
        echo '</tr>';
    }
    $weekDay++;
    $weekDay = $weekDay % 7;
    
    
}

while ($weekDay < 7 && $weekDay != 0)
{
    echo '<td>&nbsp;</td>';
    $weekDay++;
}


echo '</tr></table>';
echo "hell0";
?>

