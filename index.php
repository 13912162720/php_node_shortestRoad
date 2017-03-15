<?php
$tree =array(
'A'=>array('B','C','D'),
'B'=>array('E','F','G'),
'F'=>array('K','L','N'),
'N'=>array('R','S','T'),
'D'=>array('H','I','J'),
'H'=>array('O','P','Q'),
'C'=>array(),
'E'=>array(),
'K'=>array(),
'L'=>array(),
'G'=>array(),
'R'=>array(),
'S'=>array(),
'T'=>array(),
'I'=>array(),
'J'=>array(),
'O'=>array(),
'P'=>array(),
'Q'=>array(),
);

function fatherPath($node,$path=array())// search the father node path
{
	global $tree;
	foreach ($tree as $key => $value) {
		if (in_array($node, $value)) {
			$path[] = $key;
			return fatherPath($key,$path);
		}
	}

	return $path;
}

function pathPress($pathA,$pathB,$nodeA,$nodeB)// search the shortest path
{
	if ($nodeA===$nodeB) return $nodeA;
	$pathB = array_reverse($pathB);
	foreach ($pathB as $key => $value) {
		if (!in_array($value, $pathA)) $pathA[] = $value;
	}
	if (!in_array($nodeA, $pathA)) array_unshift($pathA, $nodeA);
	if (!in_array($nodeB, $pathA)) array_push($pathA, $nodeB);
	$path = implode('->', $pathA);

	return $path;
}

function findShortestPath($nodeA,$nodeB)// main
{
	$nodeA = strtoupper($nodeA);
	$nodeB = strtoupper($nodeB);
	
	$pathA = fatherPath($nodeA);
	$pathB = fatherPath($nodeB);
	
	return pathPress($pathA,$pathB,$nodeA,$nodeB);
}

echo findShortestPath('s','p');

?>