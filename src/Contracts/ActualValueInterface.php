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

interface ActualValueInterface extends AbstractValueInterface {
  /**
   * creates a new instance with the given value.
   *
   * @return ActualValueInterface
   */
  static public function create($value): ActualValueInterface;
}
