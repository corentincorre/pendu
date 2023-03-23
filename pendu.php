<?php 
$mots = [
'Banane',
'Saphir',
'Girafe',
'Informatique',
'Fuchsia',
'Pamplemousse',
'Emeraude',
'Arpenter',
'Mandoline',
'Cameleon',
'Euphorie',
'Alpinisme',
'Boussole',
'Ibuprofene',
'Grimoire',
'Souvenir',
'Cacahuete',
'Vague',
'Flaner',
'Ananas'
];


class Pendu
{
    function play($mots){
        $this->life = 10;
        $this->mot = $this->randomWord($mots);
        $this->letters = [];
        $win = $this->gameTurn(true);
        while ($this->life > 0 && !$win){
            $win = $this->gameTurn(); 
        }    
    }
    private function randomWord($list){
        $rand = rand(0, count($list)- 1);
        return $list[$rand];
    }

    private function gameTurn($initialize = false){
        $win = true;
        if(!$initialize){
            $letter = $this->askLetter();
            if (strpos(strtoupper($this->mot), strtoupper($letter))!==false){
            $this->letters[] = $letter;
            }
            else {
            $this->life--;
            }
        }
        
        for ($i = 0; $i < strlen($this->mot); $i++) {
            $char = substr($this->mot, $i, 1);
            if (in_array(strtoupper($char), $this->letters)){
                print_r( strtoupper($char));
            }
            else {
            print_r('_');
            $win = false;
            }
        }
        if(!$this->life){
            print_r("\nperdu");
        }
        elseif($win){
            print_r("\ngagné");
        }
        else{
            print_r("\nil reste ".$this->life.' vie'.($this->life > 1 ? 's': ''));
        }
        return $win;
    }

    private function askLetter(){
        $letter = readline("\nEntrer une lettre: ");
        if (strlen($letter)!=1){
            $letter = askLetter();
        }
        return strtoupper($letter);
    }
}

$pendu= new Pendu;
$pendu->play($mots);

