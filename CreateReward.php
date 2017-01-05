<?php 
class CreateReward{
	/*
     * 生成红包
     * author    xx     2016年9月23日13:53:38
     * @param   int          $total               红包总金额
     * @param   int          $num                 红包总数量
     * @param   int          $max                 红包最大值
     * 
     */
    public function random_red($total, $num, $max, $min)
    {
        #总共要发的红包金额，留出一个最大值;
        $total = $total - $max;
        $reward = new Reward();
        $result_merge = $reward->splitReward($total, $num, $max - 0.01, $min);
        sort($result_merge);
        $result_merge[1] = $result_merge[1] + $result_merge[0];
        $result_merge[0] = $max * 100;
        foreach ($result_merge as &$v) {
            $v = floor($v) / 100;
        }
        return $result_merge;
    }
}