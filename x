0309回复实习生胡涛

这种质量的人，不要也罢。

对不起，你的笔试没有通过。
招聘测试实习生，三个基本要求，分别是在岗时间、算法和代码基础、写测试用例。如果会使用liunx、sql之类的工具，或者有工程经验，优先。
对不起。您没有达到后两条要求。

【1】实习时间
	OK
【2】算法题，
这是php代码，二十多行代码就能搞定。
//返回值中，最多有3的n次方减去2的n次方再减去n个数字。
//3的n次方：每项都有-1，0，1三种选择
//2的n次方：每项都有0，-1两种选择，不合法
//n：只有一个数字，没经过加减法，不合法
function X($A)
{
	$B = array();
	$C = array();
	foreach($A as $a)
	{
		foreach($B as $b)
		{
			$B[] = $a + $b;
			$B[] = $a - $b;
			$B[] = $b - $a;
		}
		foreach($C as $c)
		{
			$B[] = $a + $c;
			$B[] = $a - $c;
			$B[] = $c - $a;				
		}
		$C[] = $a;
		sort($B);//可以不sort
		$B = array_unique($B);
	}
	return $B;
}
【3】分析数据需求，然后数据库建表
	您的思路很乱。
	用户表怎么能同时存储乘客和司机呢？
	订单表里
		订单日期，乘客出行日期：基本重复。如果是实时约车，这就是同一个时间；如果是预约车，这就是不同时间，但你没有字段表示这是实时约车还是预约车。
		司机姓名，司机联系方式，乘客姓名，乘客联系方式：有司机id和乘客id就可以了
		乘客目的地：出发地呢？出发地和目的地是乘客发单时候填写的地址，还是实际上的行程开始地址和行程结束地址？
		订单价钱：发单时候的预估价？行程完成之后的账单价？用券优惠之后的支付价？有无支付？支付渠道？支付时间？

【4】写测试用例