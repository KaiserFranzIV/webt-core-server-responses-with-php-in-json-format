<?php

class WeatherEntry implements JsonSerializable{
    //wie normale schreibweise erstellt die beiden Variablen und füllt diese gleich an
    public function __construct(protected int $temperature, protected float $rainprobability){}

    public function jsonSerialize(){
        return ["temperatur"=>$this->temperature, "rainprobability"=>$this->rainprobability];
    }

}

$weatherentries = [new WeatherEntry(12,0.27), new WeatherEntry(10,0.89)];

//var_dump($weatherentries);
/**
foreach($weatherentries as $entry){
    echo $entry->getHTML();
}
*/

header('Content-Type: apllication/json');
echo json_encode($weatherentries);