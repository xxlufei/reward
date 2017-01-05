<?php
/**
 * Created by PhpStorm.
 * User: lufei
 * Date: 2017/1/4
 * Time: 22:49
 */
header('content-type:text/html;charset=utf-8');
ini_set('memory_limit', '256M');

require_once('CreateReward.php');
require_once('Reward.php');

$total = 100;
$num = 40;
$max = 35;
$min = 0.1;

$create_reward = new CreateReward();



//性能测试
for($i=0; $i<5; $i++) {
	$time_start = microtime_float();
	$reward_arr = $create_reward->random_red($total, $num, $max, $min);
	$time_end = microtime_float();
	$time[] = $time_end - $time_start;
}
echo array_sum($time)/5;
function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}


/*检查结果
$reward_arr = $create_reward->random_red($total, $num, $max, $min);
sort($reward_arr);//正序，最小的在前面
$sum = 0;
$min_count = 0;
$max_count = 0;
foreach($reward_arr as $i => $val) {
	if ($i<3) {
		echo "<br />第".($i+1)."个红包，金额为：".$val."<br />";  
	} 
    if ($val == $max) {
      	$max_count++;
    }
    if ($val < $min) {
    	$min_count++;
    }
    $val = $val*100;
    $sum += $val;
}
//检测钱是否全部发完
echo '<hr>已生成红包总金额为：'.($sum/100).';总个数为：'.count($reward_arr).'<hr>';
//检测有没有小于0的值
echo "<br />最大值:".($val/100).',共有'.$max_count.'个最大值，共有'.$min_count.'个值比最小值小';*/


/*正态分布图
//对红包进行排序一下以显示正态分布特性
$reward_arr = $create_reward->random_red($total, $num, $max, $min);
$show = array();
rsort($reward_arr);
foreach($reward_arr as $k=>$value)
{
    $t=$k%2;
    if(!$t) $show[]=$value;
    else array_unshift($show,$value);
}
echo "设定最大值为:".$max.',最小值为:'.$min.'<hr />';
echo "<table style='font-size:12px;width:600px;border:1px solid #ccc;text-align:left;'><tr><td>红包金额</td><td>图示</td></tr>";
foreach($show as $val)
{
    #线条长度计算
    $width=intval($num*$val*300/$total);
    echo "<tr><td>&nbsp;{$val}&nbsp;</td><td width='500px;text-align:left;'><hr style='width:{$width}px;height:3px;border:none;border-top:3px double red;margin:0 auto 0 0px;'></td></tr>";
}
echo "</table>";
*/
