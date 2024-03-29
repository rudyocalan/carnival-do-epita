<?php

namespace Hackathon\PlayerIA;
use Hackathon\Game\Result;

/**
 * Class SuparodiPlayer
 * @package Hackathon\PlayerIA
 * @author Rudy
 *
 */
class SuparodiPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
       // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------
        
        // Concrètement, ce que je fais, c'est que je choisi la décision opposé à la décision la plus prise par l'adversaire.
        // “Le simple fait d'être est une grâce. Le simple fait de vivre est saint.” - Quelqu'un.
        
        $opponentSide = $this->result->getStatsFor($this->opponentSide);

        $opponentScissors = $opponentSide["scissors"];
        $opponentRock = $opponentSide["rock"];
        $opponentPaper = $opponentSide["paper"];

        if ($opponentScissors > $opponentPaper) {
          if ($opponentScissors > $opponentRock) {
            return parent::rockChoice();
          }
          return parent::paperChoice();
        }
        if ($opponentPaper > $opponentRock) {
          return parent::scissorsChoice();
        }
        return parent::paperChoice();
  }
};
