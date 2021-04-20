<?php

function short($text, $length = 100) 
{
    return substr($text, 0, $length) . '...';
}