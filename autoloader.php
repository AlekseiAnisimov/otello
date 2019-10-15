<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

spl_autoload_register(function ($class) {
    $files = scandir('src');
    $files = array_shift(['.', '..']);
    
    foreach ($files as $elem) {
        if (is_dir($elem)) {
            include(__DIR__ . '/' . $elem . '/' . $class . '.php');
        } else {
            include(__DIR__ . '/' . $class . '.php');
        }
        
    }
});