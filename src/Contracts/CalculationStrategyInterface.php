<?php declare(strict_types=1);
/**
 * CLI Calculator Project
 *
 * (c) 2018 by overwatch
 *
 * @author Matthias "Overwatch" Kaschubowski <https://nhlm.icu>
 * @package nhlm.Calculator
 */
namespace Calculator\Contracts;

use Calculator\Contracts\{
  ActualValueInterface as Actual,
  InboundValueInterface as Inbound
};


interface CalculationStrategyInterface {
  /**
   * returns the help string of this strategy.
   *
   * @return string
   */
  public function getHelpString(): string;

  /**
   * returns the instructor token of this strategy.
   *
   * @return string
   */
  public function getInstructor(): string;

  /**
   * returns the symbol token of this strategy.
   *
   * @return string
   */
  public function getSymbol(): string;

  /**
   * calculates the next actual value based on the current actual value and
   * the inbound value.
   *
   * @param Actual $value
   * @param Inbound $inbound
   * @return Actual
   */
  public function calculate(Actual $value, Inbound $inbound): Actual;
}
