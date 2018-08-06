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

use Calculator\Contracts\{
  ActualValueInterface,
  InboundValueInterface,
  CalculatorInterface,
  CalculationStrategyInterface
};

class Calculator implements CalculatorInterface {
  /**
   * @var CalculationStrategyInterface[] $strategies
   */
  protected $strategies = [];

  /**
   * @var CalculationStrategyInterface[] $symbols
   */
  protected $symbols = [];

  /**
   * @var ActualValueInterface
   */
  protected $actualValue;

  public function __construct(string ... $supportedStrategies)
  {
    foreach ( $supportedStrategies as $className ) {
      if ( ! class_exists($className, true) ) {
        throw new \Exception('Unknown Strategy: '.$className);
      }

      if ( ! is_a($className, CalculationStrategyInterface::class, true) ) {
        throw new \Exception('Unsupported Strategy Abstraction: '.$className);
      }

      $strategy = new $className($this);
      $this->strategies[$strategy->getInstructor()] = $strategy;
      $this->symbols[$strategy->getSymbol()] = $strategy;
    }

    $this->actualValue = new ActualValue(0);
  }

  /**
   * returns a generator with all known strategies.
   *
   * @return \Generator
   */
  public function getStrategies(): \Generator
  {
    foreach ( $this->strategies as $strategy ) {
      yield $strategy;
    }
  }

  /**
   * returns the actual value object.
   *
   * @return ActualValueInterface
   */
  public function getActualValue(): ActualValueInterface
  {
    return $this->actualValue;
  }

  /**
   * returns the requested strategy by its instructor or null if not known.
   *
   * @return CalculationStrategyInterface|null
   */
  public function getStrategyByInstructor(string $instructor): ? CalculationStrategyInterface
  {
    return $this->strategies[$instructor] ?? null;
  }

  /**
   * returns the requested strategy by its symbol or null if not known.
   *
   * @return CalculationStrategyInterface|null
   */
  public function getStrategyBySymbol(string $symbol): ? CalculationStrategyInterface
  {
    return $this->symbols[$symbol] ?? null;
  }

  /**
   * executes a sequence given by the strategy parameter using the given inbound
   * value.
   *
   * @param CalculationStrategyInterface $strategy
   * @param InboundValueInterface $inbound
   */
  public function calculateByStrategy(CalculationStrategyInterface $strategy, InboundValueInterface $inbound): void
  {
    if ( ! array_key_exists($strategy->getInstructor(), $this->strategies) ) {
      throw new \Exception('Provided Strategy was not known to the calculator: '.$strategy->getInstructor());
    }

    $this->actualValue = $strategy->calculate($this->getActualValue(), $inbound);
  }

  /**
   * executes a sequence choosen by the instructor parameter, if known, using
   * the given inbound value.
   *
   * @param string $instructor
   * @param InboundValueInterface $inbound
   */
  public function calculateByInstructor(string $instructor, InboundValueInterface $inbound): void
  {
    $strategy = $this->getStrategyByInstructor($instructor);

    if ( ! ( $strategy instanceof CalculationStrategyInterface ) ) {
      throw new \Exception('Provided instructor is not known: '.$instructor);
    }

    $this->calculateByStrategy($strategy, $inbound);
  }

  /**
   * executes a sequence choosen by the symbol parameter, if known, using the
   * given inbound value.
   *
   * @param string $symbol
   * @param InboundValueInterface $inbound
   */
  public function calculateBySymbol(string $symbol, InboundValueInterface $inbound): void
  {
    $strategy = $this->getStrategyBySymbol($symbol);

    if ( ! ( $strategy instanceof CalculationStrategyInterface ) ) {
      throw new \Exception('Provided symbol is not known: '.$symbol);
    }

    $this->calculateByStrategy($strategy, $inbound);
  }
}
