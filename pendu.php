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

function randomWord($list){
    $rand = rand(0, count($list)- 1);
    return $list[$rand];
}

function gameTurn($mot, $letters, $life){
    $win = true;
    for ($i = 0; $i < strlen($mot); $i++) {
        $char = substr($mot, $i, 1);
        if (in_array(strtoupper($char), $letters)){
            print_r( strtoupper($char));
        }
        else {
        print_r('_');
        $win = false;
        }
    }
    if(!$life){
        print_r("\nperdu");
    }
    elseif($win){
        print_r("\ngagné");
    }
    else{
        print_r("\nil reste ".$life.' vie'.($life > 1 ? 's': ''));
    }
    return $win;
}
function isLetterInWord($mot,$letter){
    return str_contains(strtoupper($mot), strtoupper($letter));
}
function askLetter(){
    $letter = readline("\nEntrer une lettre: ");
    if (strlen($letter)!=1){
        $letter = askLetter();
    }
    return strtoupper($letter);
}

function play($mots){
    $life = 10;
    $win = false;
    $mot = randomWord($mots);
    $letters = [];
    gameTurn($mot, $letters,$life);
    while ($life > 0 && !$win){
       $letter = askLetter();
       if (strpos(strtoupper($mot), strtoupper($letter))!==false){
        $letters[] = $letter;
       }
       else {
        $life--;
       }
       $win = gameTurn($mot, $letters,$life); 

    }
    
}

play($mots);
