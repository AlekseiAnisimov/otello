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
     * @var array
     */
    private $arrayCells = [];
    
    public function __construct($sideLength = 8) {
        $this->sideLength = $sideLength;
        $this->filled();
    }
    
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
        $this->filled();
    }
    
    /**
     * Getting cell value
     * 
     * @param integer $x
     * @param integer $y
     * @return \Interfaces\Checker|null
     */
    public function checkArrayCells(integer $x, integer $y): ?\Interfaces\Checker
    {
        $value = $this->arrayCells[$x][$y];
        
        return $value;
    }
    
    /**
     * Fill cells with null vallues
     * 
     * @return void
     */
    private function filled(): void
    {
        for ($x = 0; $x < $this->sideLength; $x++) {
            for ($y = 0; $y < $this->sideLength; $y++) {
                $this->arrayCells[$x][$y] = null;
            }
        }
    }

    public function setCellsByValue(array $history): void
    {
        foreach ($history as $key => $value) {
            $this->setCellByCheck($value['val'], $value['x'], $value['y']);
        }
    }

    public function setCellByCheck(Checker $check, integer $x, integer $y): void
    {
        $this->arrayCells[$x][$y] = $check;
    }

    public function findAvailableMoves()
    {
        
    }
    
}
