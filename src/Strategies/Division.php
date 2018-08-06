<?php declare(strict_types=1);
/**
 * CLI Calculator Project
 *
 * (c) 2018 by overwatch
 *
 * @author Matthias "Overwatch" Kaschubowski <https://nhlm.icu>
 * @package nhlm.Calculator
 */
namespace Calculator\Strategies;

use Calculator\Contracts\{
  CalculationStrategyInterface,
  ActualValueInterface as Actual,
  InboundValueInterface as Inbound
};

use Calculator\Abstracts\AbstractStrategy;

class Division extends AbstractStrategy implements CalculationStrategyInterface {
  /**
   * returns the help string of this strategy.
   *
   * @return string
   */
  public function getHelpString(): string
  {
    return 'Executes a Division Sequence.';
  }

  /**
   * returns the instructor token of this strategy.
   *
   * @return string
   */
  public function getInstructor(): string
  {
    return 'div';
  }

  /**
   * returns the symbol token of this strategy.
   *
   * @return string
   */
  public function getSymbol(): string
  {
    return '/';
  }

  /**
   * calculates the next actual value based on the current actual value and
   * the inbound value.
   *
   * @param Actual $value
   * @param Inbound $inbound
   * @return Actual
   */
  public function calculate(Actual $value, Inbound $inbound): Actual
  {
    if ( $inbound->equalsZero() ) {
      throw new \Exception('Division by Zero');
    }

    return $value::create($value->getValue() / $inbound->getValue());
  }
}
