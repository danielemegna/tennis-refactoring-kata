<?php

require_once "TennisGame.php";

class TennisGame1 implements TennisGame
{
	private $player1Score = 0;
	private $player2Score = 0;
	private $player1Name = '';
	private $player2Name = '';

	public function __construct($player1Name, $player2Name)
	{
		$this->player1Name = $player1Name;
		$this->player2Name = $player2Name;
	}

	public function wonPoint($playerName)
	{
		if($playerName == $this->player1Name) {
			$this->player1Score++;
			return;
		}

		$this->player2Score++;
	}

	public function getScore()
	{
		if ($this->isDrawScore()) {
			return $this->printDrawScore();
		}
		
		if ($this->isOverFourScore()) {
			return $this->printOverFourScore();
		}

		return $this->printStandardScore();
	}

	private function printOverFourScore()
	{
		$scoreDiff = $this->player1Score - $this->player2Score;

		if ($scoreDiff == 1)
			return "Advantage player1";
		if ($scoreDiff == -1)
			return "Advantage player2";
		if ($scoreDiff >= 2)
			return "Win for player1";
		if ($scoreDiff <= -2)
			return "Win for player2";
	}

	private function isOverFourScore()
	{
		return ($this->player1Score >= 4 || $this->player2Score >= 4);
	}

	private function printDrawScore()
	{
		if($this->player1Score > 2) 
			return "Deuce";

		return $this->scoreToString($this->player1Score) . "-All";
	}

	private function printStandardScore()
	{
		return $this->scoreToString($this->player1Score) . "-"
		. $this->scoreToString($this->player2Score);
	}

	private function scoreToString($score)
	{
		switch ($score) {
			case 0:
				return "Love";
			case 1:
				return "Fifteen";
			case 2:
				return "Thirty";
			case 3:
				return "Forty";
		}
	}

	private function isDrawScore()
	{
		return $this->player1Score == $this->player2Score;
	}
}

