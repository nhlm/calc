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

interface AbstractValueInterface {
  /**
   * returns the actual value.
   *
   * @return int|float|null
   */
  public function getValue();

  /**
   * checks whether the value is numeric or not.
   *
   * @return bool
   */
  public function isNumeric(): bool;
}
