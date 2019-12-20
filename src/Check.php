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
     * @var integer|null
     */
    public $x = null;

    /**
     * @var integer|null
     */
    public $y = null;

    /**
     *
     * @var string|null
     */
    private $color = null;
    
    /**
     *
     * @var type Table
     */
    private $table;
    
    public function __construct(Table $table) {
        $this->table = $table;
    }
    
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
    
    public function moveCheck(): bool
    {
        $itteration = 0;
        $result = false;
        
        for ($fromX = $this->x - 1; $fromX <= $this->x + 1; $fromX++) {
            for ($fromY = $this->y - 1; $fromY <= $this->y + 1; $fromY++) {
                $itteration++;
                $cell = $this->table->checkArrayCells($fromX, $fromY);

                if (is_null($cell) || $cell instanceof self) {
                    continue;
                }
                
                $arr = $this->findAndFilledBySelf($fromX, $fromY, $itteration);

                if (sizeof($arr) == 0) {
                    continue;
                }

                $this->table->setCellsByValue($arr);
            }
        }
        
        return $result;
    }
    
    private function findAndFilledBySelf(integer $newX, integer $newY, integer $itteration): bool
    {
        $history = [];
        
        switch ($itteration) {
            case 1:
                for ($x = $newX; $x >= 0; $x--) {
                    for ($y = $newY; $y >= 0; $y--) {
                        $cell = $this->table->checkArrayCells($fromX, $fromY);
                        
                        if (is_null($cell)) {
                            return [];
                        }
                        
                        if ($cell->color != $this->color) {
                            continue;
                        }
                         
                        $history[]['val'] = $cell;
                        $history[]['x'] = $x;
                        $history[]['y'] = $y;
                    }
                }
                break;

            default:
                break;
        }

        return  $history;
    }


    public function whiteListDirection(): array
    {
        return [
            self::DIRECTION_UP,
            self::DIRECTION_RIGHT,
            self::DIRECTION_DOWN,
            self::DIRECTION_LEFT,
        ];
    }
    
    private function validatePointPosition(integer $point): bool
    {
        if ($point < 0 && $point > $this->table->getSideLength()) {
            return false;
        }
        
        return true;
    }
    
    private function getEndPoint(integer $xPosition, integer $yPosition, $rowChecks, integer $directionFlag): ?integer
    {
        switch ($directionFlag) {
            case self::DIRECTION_UP:
                $endPoint = (sizeof($rowChecks) + $yPosition) + 1; 
                break;
            case self::DIRECTION_RIGHT:
                $endPoint = (sizeof($rowChecks) + $xPosition) + 1;
                break;
            case self::DIRECTION_DOWN:
                $endPoint = ($yPosition - sizeof($rowChecks)) - 1;
                break;
            case self::DIRECTION_LEFT:
                $endPoint = ($xPosition - sizeof($rowChecks)) - 1;
                break;
            default:
                break;
        }
        
        if (!$this->validatePointPosition($endPoint)) {
            return false;
        }
        
        return $endPoint;
    }
}
