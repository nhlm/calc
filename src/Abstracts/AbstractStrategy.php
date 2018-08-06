<?php declare(strict_types=1);
/**
 * CLI Calculator Project
 *
 * (c) 2018 by overwatch
 *
 * @author Matthias "Overwatch" Kaschubowski <https://nhlm.icu>
 * @package nhlm.Calculator
 */
namespace Calculator\Abstracts;

use Calculator\Contracts\CalculatorInterface;

abstract class AbstractStrategy {
  /**
   * @var CalculatorInterface $calculator
   */
  protected $calculator;

  public function __construct(CalculatorInterface $calculator)
  {
      $this->calculator = $calculator;
  }
}
