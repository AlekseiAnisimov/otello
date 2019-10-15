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
    private $horizontal = 8;
    
    /**
     *
     * @var integer
     */
    private $vertical = 8;
    
    /**
     * 
     * @return integer
     */
    public function getHorizontal(): integer
    {
        return $this->horizontal;
    }
    
    /**
     * 
     * @param integer $horizontal
     * @return void
     */
    public function setHorizontal(integer $horizontal): void
    {
        $this->horizontal = $horizontal;
    }
    
    /**
     * 
     * @return integer
     */
    public function getVertical(): integer
    {
        return $this->vertical;
    }
    
    /**
     * 
     * @param integer $vertical
     * @return void
     */
    public function setVertical(integer $vertical): void
    {
        $this->vertical = $vertical;
    }
    
    
}
