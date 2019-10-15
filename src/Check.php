<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
declare (strict_type=1);

namespace Otello;

use Interfaces\Checker;
/**
 * Check
 *
 * @author ork04
 */
class Check implements Checker
{
    
    const DIRECTION_UP = 0;
    const DIRECTION_RIGHT = 1;
    const DIRECTION_DOWN = 2;
    const DIRECTION_LEFT = 3;
    
    /**
     *
     * @var string|null
     */
    private $color = null;
    
    /**
     *
     * @var type integer
     */
    private $checkCount = 0;
    
    /**
     *
     * @var type integer|null
     */
    public $xPosition = null;
    
    /**
     *
     * @var type intger|null
     */
    public $yPosition = null;
    
    /**
     * Return check color
     * 
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }
    
    /**
     * Set color of check
     * 
     * @param integer $color
     * @return void
     */
    public function setColor(integer $color): void
    {
        $this->color = $color;
    }
    
    /**
     * 
     * @param integer $checks
     * @return integer
     */
    public function additionalChecks(integer $checks): integer
    {
        $this->checkCount += $checks;
        
        return $this->checkCount;
    }
    
    /**
     * 
     * @param integer $checks
     * @return integer
     * @throws Exception
     */
    public function decreaseChecks(integer $checks): integer
    {
        if ($checks > $this->checkCount) {
            throw new Exception('Reduce error');
        }
        
        $this->checkCount -= $checks;
        
        return $this->checkCount;
    }
    
    public function moveCheck(Table $table, integer $directionFlag): array
    {
        if (!in_array($directionFlag, $this->whiteListDirection())) {
            throw new Exception("Direction error");
        }
        
        if (sizeof($rowChecks) == 0) {
            
        }
        
        
    }
    
    public function whiteListDirection()
    {
        return [
            self::DIRECTION_UP,
            self::DIRECTION_RIGHT,
            self::DIRECTION_DOWN,
            self::DIRECTION_LEFT,
        ];
    }
}
