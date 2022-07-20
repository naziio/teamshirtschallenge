<?php
 include 'Knight.php';
$elementsArray = array();
$play = new Knight('Gamer1',0); // for start the game
$elementsArray = $play->createKnights($elementsArray);
$knightsAlive = array_filter($elementsArray, function($elementArray){
    return !$elementArray->isDead();
});
while (count($knightsAlive) > 1){
    foreach($knightsAlive as $key => $elementArray){ 
        if($elementArray->isDead()){
            continue;
        }else {
            
                $nextElement = next($knightsAlive) ;
                if($nextElement == false){
                    $nextElement = reset($knightsAlive);
                }elseif($nextElement->getName() == $elementArray->getName()){
                    $nextElement = next($knightsAlive) ;
                    if($nextElement == false){
                        $nextElement = reset($knightsAlive);
                    }
                }
            
            if(!$nextElement->isDead()){
                echo "\n";
                print_r($elementArray->getName().' Attack to '.$nextElement->getName());
                echo "\n";
                $nextElement->attack($nextElement,rand(1,6));
                echo "The ".$nextElement->getName()."'s lifePoints is ".$nextElement->getLifePoints()."\n";
                if($nextElement->isDead()){
                    print_r($nextElement->getName().' is dead ');
                    echo "\n";
                    $dead = key($knightsAlive); 
                    unset($knightsAlive[$dead]);
                }
            } 
        }      
    }
}
if(count($knightsAlive)<= 0){
    echo 'The quantity of knigths is not enought for get a winner';
}else {
    print_r("The winner is : ");
    print_r($knightsAlive);
}

?>