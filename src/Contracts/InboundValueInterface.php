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

interface InboundValueInterface extends AbstractValueInterface {
  /**
   * checks whether the value equals zero or not.
   *
   * @return bool
   */
  public function equalsZero(): bool;
}
