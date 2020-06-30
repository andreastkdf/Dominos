<?php

// The user names. (Reminder 2 - 4 players allowed)
const USERS = ["One", "Two", "Three", "Four"];

class Player {
  /**
   * The player id,
   *
   * @var int
   */
  private $id;

  /**
   * The player username
   *
   * @var string
   */
  private $userName;

  /**
   * The player pieces
   *
   * @var Piece[]
   */
  private $pieces = [];

  /**
   * The Player class constructor.
   *
   * @param int $id
   *  The player id.
   */
  public function __construct(int $id) {
    $this->id = $id;
    $this->userName = USERS[$id];
  }

  /**
   * Gets the player's id.
   *
   * @return int
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Gets the player's username.
   *
   * @return string
   */
  public function getUserName() {
    return 'Player ' . $this->userName;
  }

  /**
   * Gets the player's pieces.
   *
   * @return Piece[]
   */
  public function getPieces() {
    return $this->pieces;
  }

  /**
   * Sets the player's pieces
   *
   * @param array $pieces
   * @return void
   */
  public function setPieces(array $pieces) {
    foreach ($pieces as $piece) {
      $this->pieces[$piece->getId()] = $piece;
    }
  }

  /**
   * Draw the piece given.
   * Removes it from player's array of pieces.
   *
   * @param Piece $piece
   * @return void
   */
  public function drawPiece(Piece $piece) {
    $this->pieces[$piece->getId()] = $piece;
  }

  /**
   * Player the player's first piece
   *
   * @return void
   */
  public function playFirstPiece() {
    $piece = reset($this->pieces);

    unset($this->pieces[$piece->getId()]);
    return $piece;
  }

  /**
   * Plays the piece given.
   *
   * @param Piece $piece
   * @return void
   */
  public function playPiece(Piece $piece) {
    unset($this->pieces[$piece->getId()]);
  }

  /**
   * Gets the players bigger double.
   *
   * @return int
   */
  public function getBiggerDouble() {
    if (empty($this->pieces)) {
      return 0;
    }

    $doubles = array_filter($this->pieces,
      function ($p) {
        return $p->isDouble();
      }
    );

    if (empty($doubles)) {
      return [];
    }

    $maxDouble = reset($doubles);
    $max = $maxDouble->getX();

    foreach ($doubles as $doublePiece) {
      if ($doublePiece->getX() > $max) {
        $maxDouble = $doublePiece;
        $max = $doublePiece->getX();
      }
    }

    return $maxDouble;
  }

  /**
   * Gets the total numbers of dots of the player's pieces.
   *
   * @return int
   */
  public function getTotalDots() {
    $totalDots = 0;
    foreach ($this->pieces as $piece) {
      $totalDots += $piece->getX() + $piece->getY();
    }
    return $totalDots;
  }
}
