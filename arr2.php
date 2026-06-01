<?
$arr = [0 => 'нуль', 1=>[10, 11], 3=>['name' => 'Ivan'], 4=>'четыре'];
for ($i = 0; $i < count($arr); $i++):
    echo "$arr[$i]" . "<br/>";
endfor;
echo '------------------' . "<br/>";
print_r($arr);