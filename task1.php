<?php
// SIB MIKTI Challenge 2 : Task 1 about gymnastics team
class TeamGym
{
    private $name;
    private $score = [];
    
    // define the constructor method
    public function __construct($name, $score)
    {
        $this->name = $name;
        $this->score = $score;
    }

    // calculate the average score
    public function calculateAverage()
    {
        return array_sum($this->score) / count($this->score);
    }

    // checking the average score against the minimum score of 100
    public function getMinScore()
    {
        return $this->calculateAverage() >= 100;
    }

    // returns the value of the name property
    public function getName()
    {
        return $this->name;
    }

    // accepts a score parameter and then sets the score property
    public function setScore($score)
    {
        $this->score = $score;
    }
}

class CompetitionGym
{
    private $team1;
    private $team2;

    // define the constructor method
    public function __construct($team1, $team2)
    {
        $this->team1 = $team1;
        $this->team2 = $team2;
    }

    // compare average scores to determine the winner
    public function theWinner($team1_score, $team2_score)
    {
        $average_team1 = $team1_score;
        $average_team2 = $team2_score;

        if ($average_team1 > $average_team2) {
            return $this->team1->getMinScore() ? $this->team1 : "Tidak Ada Pemenang";
        } elseif ($average_team2 > $average_team1) {
            return $this->team2->getMinScore() ? $this->team2 : "Tidak Ada Pemenang";
        } elseif ($this->team1->getMinScore() && $this->team2->getMinScore()) {
            return "Seri";
        } else {
            return "Tidak Ada Pemenang";
        }
    }

    // displays each gymnastics team's competition results
    public function showResults($dolphin, $koala, $listData)
    {
        foreach ($listData as $list => $data) {
            $dolphin->setScore($data['team1']);
            $koala->setScore($data['team2']);

            $winner = $this->theWinner($dolphin->calculateAverage(), $koala->calculateAverage());
            if ($list >= 1) {
                echo "<h2>Data Bonus " . ($list + 1) . "</h2>";
            } else {
                echo "<h2>Data " . ($list + 1) . "</h2>";
            }

            echo "Lumba-lumba: " . (implode(", ", $data['team1'])) . " = ", $dolphin->calculateAverage() . "<br>";
            echo "Koala: " . (implode(", ", $data['team2'])) . " = " . $koala->calculateAverage() . "<br>";

            if ($winner == "Seri") {
                echo "Seri";
            } elseif ($winner == "Tidak Ada Pemenang") {
                echo "Tidak ada tim yang memenangkan trofi";
            } else {
                echo "Pemenang: " . $winner->getName() . " dengan skor rata-rata " . $winner->calculateAverage();
            }
            echo "<br><br>";
        }
    }
}

// test data
$data_team1 = [96, 108, 89];
$data_team2 = [88, 91, 110];
$data_bonus1_team1 = [97, 112, 101];
$data_bonus1_team2 = [109, 95, 123];
$data_bonus2_team1 = [97, 112, 101];
$data_bonus2_team2 = [109, 95, 106];

// object creation of TeamGym class
$dolphin = new TeamGym("Lumba-lumba", $data_team1);
$koala = new TeamGym("Koala", $data_team2);

// object creation of CompetitionGym
$result_gymnastic = new CompetitionGym($dolphin, $koala);
$result_gymnastic->showResults($dolphin, $koala, [
    ['team1' => $data_team1, 'team2' => $data_team2],
    ['team1' => $data_bonus1_team1, 'team2' => $data_bonus1_team2],
    ['team1' => $data_bonus2_team1, 'team2' => $data_bonus2_team2],
]);