<?php 
function gererator() 
{
    for ($i=0; $i<5; $i++) 
    {
        yield $i . "-";
    }
}

foreach(gererator() as $number)
{
    echo $number; 
}