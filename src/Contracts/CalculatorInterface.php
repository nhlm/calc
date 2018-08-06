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

interface CalculatorInterface {
  /**
   * returns a generator with all known strategies.
   *
   * @return \Generator
   */
  public function getStrategies(): \Generator;
  /**
   * returns the actual value object.
   *
   * @return ActualValueInterface
   */
  public function getActualValue(): ActualValueInterface;

  /**
   * returns the requested strategy by its instructor or null if not known.
   *
   * @return CalculationStrategyInterface|null
   */
  public function getStrategyByInstructor(string $instructor): ? CalculationStrategyInterface;

  /**
   * returns the requested strategy by its symbol or null if not known.
   *
   * @return CalculationStrategyInterface|null
   */
  public function getStrategyBySymbol(string $symbol): ? CalculationStrategyInterface;

  /**
   * executes a sequence given by the strategy parameter using the given inbound
   * value.
   *
   * @param CalculationStrategyInterface $strategy
   * @param InboundValueInterface $inbound
   */
  public function calculateByStrategy(CalculationStrategyInterface $strategy, InboundValueInterface $inbound): void;

  /**
   * executes a sequence choosen by the instructor parameter, if known, using
   * the given inbound value.
   *
   * @param string $instructor
   * @param InboundValueInterface $inbound
   */
  public function calculateByInstructor(string $instructor, InboundValueInterface $inbound): void;

  /**
   * executes a sequence choosen by the symbol parameter, if known, using the
   * given inbound value.
   *
   * @param string $symbol
   * @param InboundValueInterface $inbound
   */
  public function calculateBySymbol(string $symbol, InboundValueInterface $inbound): void;
}
