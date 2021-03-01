<?php
define("ROOT_PATH", "/home/xlapcak/public_html/files/");

//Gets substring of path that resembles path to .. directory
//returns string without ROOT_PATH and last directory name
function subtractUpperPath($path)
{
    if (!strcmp($path, ROOT_PATH)) {
        return "";
    }
    $lastOcur = strrpos($path, "/", -2);
    $offset = strlen(ROOT_PATH);
    $length = $lastOcur - strlen($path) + 1;
    return substr($path, $offset, $length);
}

//Gets substring of new path that leads to directory $dir
//returns string of whole path to $dir without ROOT_PATH
function subtractLowerPath($path, $dir)
{
    if (!strcmp($path, ROOT_PATH)) {
        return $dir . '/';
    }
    $offset = strlen(ROOT_PATH);
    $subPath = substr($path, $offset);
    return $subPath . $dir . '/';
}

function substractQuery($path){
    $rootLen = strlen(ROOT_PATH);
    return substr($path, $rootLen);
}
