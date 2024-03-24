<?php
// SIB MIKTI Challenge 2 : Task 2 about BMI (Body Mass Index)
class BodyMassIndex {
    private $weight;
    private $height;

    // // define the constructor method
    public function __construct($weight, $height) 
    {
        $this->weight = $weight;
        $this->height = $height;
    }

    // calculate the BMI
    public function calculateBmi() {
        return $this->weight / ($this->height * $this->height);
    }

    // check if BMI person1 is higher than person2 
    public static function compareBmi($person1, $person2) {
        return $person1->calculateBmi() > $person2->calculateBmi();
    }
}

// test data 1
$weight1_mark = 78; 
$height1_mark = 1.69; 
$weight1_john = 92; 
$height1_john = 1.95;
// test data 2
$weight2_mark = 95; 
$height2_mark = 1.88; 
$weight2_john = 85; 
$height2_john = 1.76; 

// object creation of BodyMassIndex class
$mark1 = new BodyMassIndex($weight1_mark, $height1_mark);
$john1 = new BodyMassIndex($weight1_john, $height1_john);
$mark2 = new BodyMassIndex($weight2_mark, $height2_mark);
$john2 = new BodyMassIndex($weight2_john, $height2_john);

// comparing the BMI results
$markHigherBMI_1 = BodyMassIndex::compareBmi($mark1, $john1);
$markHigherBMI_2 = BodyMassIndex::compareBmi($mark2, $john2);

// displays the BMI calculation results of each person's test data
echo "<h2>Data Uji 1:</h2>";
echo "<h3>Mark</h3>" . "berat: $weight1_mark<br>" . "tinggi: $height1_mark<br>";
echo "<h3>John</h3>" . "berat: $weight1_john<br>" . "tinggi: $height1_john<br>";
echo "<h3>Hasil BMI</h3>";
echo "BMI Mark: " . $mark1->calculateBmi() . "<br>";
echo "BMI John: " . $john1->calculateBmi() . "<br>";
echo "<h4>Mark memiliki BMI lebih tinggi dari John: " . ($markHigherBMI_1 ? "True" : "False") . "</h4><br>";

echo "<h2>Data Uji 2:</h2>";
echo "<h3>Mark</h3>" . "berat: $weight2_mark<br>" . "tinggi: $height2_mark<br>";
echo "<h3>John</h3>" . "berat: $weight2_john<br>" . "tinggi: $height2_john<br>";
echo "<h3>Hasil BMI</h3>";
echo "BMI Mark: " . $mark2->calculateBmi() . "<br>";
echo "BMI John: " . $john2->calculateBmi() . "<br>";
echo "<h4>Mark memiliki BMI lebih tinggi dari John: " . ($markHigherBMI_2 ? "True" : "False") . "</h4><br>";