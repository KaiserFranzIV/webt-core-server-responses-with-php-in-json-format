<?php
header('Content-Type: apllication/json');
class ost implements JsonSerializable{
    public static int $count = 0;
    public int $id;
    public string $name;
    public string $gameName;
    public string $release;
    public string $tracklist;
    function __construct($name,$gameName,$release,$tracklist){
        $this->name = $name;
        $this->gameName = $gameName;
        $this->release = $release;
        $this->tracklist = $tracklist;
        $this->id = self::$count++;
    }
    public function jsonSerialize(){
        return ["id"=>$this->id,"name"=>$this->name,"gameName"=>$this->gameName,"release"=>$this->release, "tacklist"=>$this->tracklist];
    }
}

class song implements JsonSerializable{
    protected string $id;
    public string $name;
    public string $artist;
    public int $tracknum;
    public int $duration;
    function __construct($name,$artist,$tracknum,$duration){
        $this->id = uniqid('song');
        $this->name = $name;
        $this->artist = $artist;
        $this->tracknum = $tracknum;
        $this->duration = $duration;
    }
    public function jsonSerialize(){
        return ["id"=>$this->id,"name"=>$this->name,"artist"=>$this->artist,"tracknum"=>$this->tracknum, "duration"=>$this->duration];
    }
}

class seeder{
    public function run(): array{
        $osts = [];
        for ($i = 0; $i < 3; $i++){
            $arr = [];
                for ($j = 0; $j < 4; $j++){
                    $arr[$j] = new song("Song ".$j, ($j*50)." cent", $j, 120);
                }
            $osts[$i] = new ost("OST_". $i, "Game " .$i, "06.11.2006", json_encode($arr));
        }
        return $osts;
        
    }
    
}