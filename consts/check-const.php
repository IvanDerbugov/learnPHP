<?
const a = 10;
if(!defined("a")) 
{
    define("a", 11);
    echo 'константа есть';
}
else
    echo 'константа \'a\' уже определена';