<?php
//$a=[[1,2],[3,4],[5,6]];
//$b = array_merge($a[0],$a[1],$a[2]);
//var_dump($b);

//echo (rand(1,0));
/*
class A
{
    public string $name;
    public int $num;
    public function __construct(string $n, int $i)
    {
        $this->name = $n;
        $this->num = $i;
    }
}

$a = new A ('a',2);
$b = new A ('b',2);
$c = new A ('c',3);

$d = [$a,$b,$c];
var_dump($d);

usort($d, function ($a, $b) {
    return ($a->num > $b->num);
});
var_dump($d);
*/
$b = 3;
$a = array_fill(0,$b,0);
for($i=3; $i<=7;$i++){
    $a[] = $i;
}
var_dump($a);



