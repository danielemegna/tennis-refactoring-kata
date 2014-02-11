<?php

require_once "TennisGame.php";

class TennisGame2 implements TennisGame
{
	private $P1point = 0;
	private $P2point = 0;

	private $player1Name = "";
	private $player2Name = "";

	public function __construct($player1Name, $player2Name)
	{
		$this->player1Name = $player1Name;
		$this->player2Name = $player2Name;
	}

	public function getScore()
	{

		if ($this->P1point >= 4 && ($this->P1point - $this->P2point) >= 2)
			return "Win for player1";

		if ($this->P2point >= 4 && ($this->P2point - $this->P1point) >= 2)
			return "Win for player2";

		if ($this->P1point > $this->P2point && $this->P2point >= 3)
			return "Advantage player1";

		if ($this->P2point > $this->P1point && $this->P1point >= 3)
			return "Advantage player2";

		if ($this->P1point == $this->P2point && $this->P1point >= 3)
			return "Deuce";

		if ($this->P1point == $this->P2point && $this->P1point < 4)
			return $this->pointToString($this->P1point) . "-All";

		return $this->pointToString($this->P1point) . '-'. $this->pointToString($this->P2point);

	}

	private function pointToString($point)
	{
		switch($point)
		{
			case 0: return "Love";
			case 1: return "Fifteen";
			case 2: return "Thirty";
			case 3: return "Forty";
			default: throw new Exception("Cannot exec point to string for point '$point'");
		}
	}

	private function P1Score()
	{
		$this->P1point++;
	}

	private function P2Score()
	{
		$this->P2point++;
	}

	public function wonPoint($player)
	{
		if ($player == $this->player1Name) {
			$this->P1Score();
			return;
		}

		$this->P2Score();
	}
}
