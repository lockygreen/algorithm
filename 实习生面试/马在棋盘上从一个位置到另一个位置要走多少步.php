<?php
/*
请用任意一种语言，实现一个函数，只写该function即可。
100*100的棋盘，点坐标的范围从（0，0）到（99，99）。
象棋中，马走日，比如可以从（0，0）走到(1,2)，也可以走到（2，1），但是不可以走到（-1，-2），因为已经跳出棋盘范围了。
请写一个函数，输入是棋盘范围内的两个坐标，求马从第一个坐标走到第二个坐标，最少要走多少步。
比如，f((0,0),(1,2)) = 1, f((3,3),(9,9)) = 4
*/
function getSteps($x1,$y1,$x2,$y2)
{
	//棋盘大小
	$size = 100;
	//参数合法性检查
	if($x1 < 0 or $x1 >= $size or $x2 < 0 or $x2 >= $size or $y1 < 0 or $y1 >= $size or $y2 < 0 or $y2 >= $size)
	{
		return -1;
	}
	//可走的八个方向
	$directions = array(array(1,2),array(-1,2),array(1,-2),array(-1,-2),array(2,1),array(-2,1),array(2,-1),array(-2,-1));
	//全棋盘初值都是-1，表示没走过。
	$map = array();
	for($i=0;$i<$size ;$i++)
	{
		for($j=0;$j<$size ;$j++)
		{
			$map[$i][$j] = -1;
		}
	}
	//出发点设置为0，并放入$points数组中。该数组每个元素都是一个数组，三个值分别代表坐标和要走的步骤。
	$map[$x1][$y1] = 0;
	$points = array(array($x1,$y1,0));
	//循环处理$points数组，即找到p点的下一个点p_to，如果p_to在棋盘内且值为-1，就赋值为p的步骤加1.
	while(!empty($points))
	{
		$p = $points[0];
		foreach($directions as $d)
		{
			$p_to = array($p[0]+$d[0],$p[1]+$d[1],$p[2]+1);
			if($p_to[0] >= 0 and $p_to[1] >= 0 and $p_to[0] < $size and $p_to[1] < $size and $map[$p_to[0]][$p_to[1]] == -1)
			{
				$map[$p_to[0]][$p_to[1]] = $p_to[2];
				$points[] = $p_to;
				//如果已经找到，就返回。
				if($x2 == $p_to[0] and $y2 == $p_to[1])
				{
					return $p_to[2];
				}
			}
		}
		array_shift($points);
	}
	//整个棋盘已经求完所有可走的位置。
	//如果目的点可达，那么在循环中就已经return了，走不到这里；
	//如果目的点不可达，那么，就会返回-1
	return $map[$x2][$y2];
}
var_dump(getSteps(0,0,98,2));