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

use Calculator\Contracts\AbstractValueInterface;

abstract class AbstractValue implements AbstractValueInterface {
  /**
   * @var int|float|null $value
   */
  protected $value = null;

  /**
   * Constructor
   *
   * @param int|float|null $value
   */
  public function __construct($value = null)
  {
    $this->value = $value;
  }

  /**
   * returns the actual value.
   *
   * @return int|float|null
   */
  public function getValue()
  {
    return $this->value;
  }

  /**
   * checks whether the value is numeric or not.
   *
   * @return bool
   */
  public function isNumeric(): bool
  {
    return is_numeric($this->value);
  }
}
