<?php

class reverseString{

  public $name;
  public $newString="";

  public function reverse(string $name=null): ?string 
  {

    $this->name = $name;
    $explode = str_split($this->name);
    $count = count($explode); 
    $output = "";

    for($i=$count;$i >=0;$i--){
        $output .=$explode[$i];
    }
   
    return  $this->newString = $output;
  }
 

}

// $newName = new reverseString();
// echo $newName->reverse("Jackson");

?>