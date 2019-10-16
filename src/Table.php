<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
declare (strict_types=1);

namespace Otello;


/**
 * Description of Table
 *
 * @author ork04
 */
class Table
{
    /**
     *
     * @var integer
     */
    private $sideLength = 8;
    
    /**
     * 
     * @return integer
     */
    public function getSideLength(): integer
    {
        return $this->sideLength;
    }
    
    /**
     * 
     * @param integer $horizontal
     * @return void
     */
    public function setSideLength (integer $length): void
    {
        $this->sideLength = $length;
    }
    
}
