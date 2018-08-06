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

use Calculator\Contracts\ActualValueInterface;
use Calculator\Abstracts\AbstractValue;

class ActualValue extends AbstractValue implements ActualValueInterface {

  /**
   * creates a new instance with the given value.
   *
   * @return ActualValueInterface
   */
  static public function create($value): ActualValueInterface
  {
    return new static($value);
  }
}
