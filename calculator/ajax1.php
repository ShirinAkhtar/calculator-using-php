<?php
$res = $_POST['res'];
$operator = $_POST['operator'];
$num = $_POST['num'];
$opt = $_POST['opt'];
$store = array();

function insert($num, $res)
{
    global $store;
    array_push($store, $num, $res);
    return $store;
}
$store = insert($num, $res);

function operation($operator)
{
    global $opt;
    global $operator;
    global $result;
    global $res;
    global $num;
    if ($opt == '+')
    {
        $result = $res + $num;
        $opt = $operator;

    }
    elseif ($opt == '-')
    {
        $result = $res - $num;
        $opt = $operator;

    }
    elseif ($opt == '*')
    {
        $result = $res * $num;
        $opt = $operator;

    }
    elseif ($opt == '/')
    {
        $result = $res / $num;
        $opt = $operator;

    }
    elseif ($opt == '=')
    {
        $result = $res;
        $opt = $operator;

    }
    return $result;
}
$result = operation($opt);
$storeOpt = array();
$storeOpt['result'] = $result;
$storeOpt['operator'] = $opt;
$resJson = json_encode($storeOpt);
echo $resJson;