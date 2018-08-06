<?php declare(strict_types=1);
/**
 * CLI Calculator Project
 *
 * (c) 2018 by overwatch
 *
 * @author Matthias "Overwatch" Kaschubowski <https://nhlm.icu>
 * @package nhlm.Calculator
 */
namespace Calculator;

use Calculator\Contracts\InboundValueInterface;
use Calculator\Abstracts\AbstractValue;

class InboundValue extends AbstractValue implements InboundValueInterface {
  /**
   * checks whether the value equals zero or not.
   *
   * @return bool
   */
  public function equalsZero(): bool
  {
    return $this->getValue() == 0;
  }
}
