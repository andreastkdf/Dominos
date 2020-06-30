<?php

class Piece {
  private $id;

  /**
   * The first set of the piece.
   *
   * @var int
   */
  private $x;

  /**
   * Second set of the piece.
   *
   * @var int
   */
  private $y;

  /**
   * The turn property used when turning a piece.
   *
   * @var bool
   */
  private $turn;

  /**
   * Constructor of Piece class.
   *
   * @param integer $x
   *  The first set of the piece.
   * @param integer $y
   *  The second set of the piece.
   */
  public function __construct(int $x, int $y) {
    // Set properties.
    $this->x = $x;
    $this->y = $y;
    $this->id = $x . $y;
    $this->turn = false;
  }

  /**
   * Get the sets of the piece.
   *
   * @return int[]
   *  The array of the piece sets.
   */
  public function getSets() {
    return [$this->x, $this->y];
  }

  /**
   * Gets the Piece Id.
   *
   * @return int
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Gets the first set of the piece,
   * placed on the left.
   *
   * @return void
   */
  public function getX() {
    // Depending on turn value.
    return $this->turn ? $this->y : $this->x;
  }

  /**
   * Gets the second set of the piece,
   * placed on the right.
   *
   * @return int
   */
  public function getY() {
    return $this->turn ? $this->x : $this->y;
  }

  /**
   * Returns a "rendered" piece.
   *
   * @return string
   */
  public function getPieceName() {
    return '| ' . $this->getX() . ' -- ' . $this->getY() . ' |';
  }

  /**
   * Determines if the piece is double.
   *
   * @return bool
   */
  public function isDouble() {
    return $this->x == $this->y;
  }

  /**
   * Turn the piece.
   *
   * @return void
   */
  public function turn() {
    $this->turn = true;
  }
}