<?php

function short($text, $length = 100) 
{
    return substr($text, 0, $length) . '...';
}

function formatDate($time)
{
    return date('d.m.Y. G:i', strtotime($time));
}
