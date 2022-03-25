<?php

class Math {
 
    private $resultNumber = 0;
    private $arr = array();
    private $tempNumber = "";

    public function __construct() {
        $this->resultNumber = $resultNumber;
        $this->arr = $arr = array();
        $this->tempNumber = $tempNumber;
    }

    public function calcNumber() {
        if(isset($_POST['submit'])) {
            $value = $_POST['result'];
            for($i = 0; $i < mb_strlen($value); $i++) {
                if(mb_strpos("_1203456789.", $value[$i])) {
                    $this->tempNumber .= $value[$i];                   
                } else {
                    if($this->tempNumber){
                        array_push($this->arr,$this->tempNumber);
                        $this->tempNumber = "";
                    }
                    array_push($this->arr, $value[$i]);
                }
            }
            if($this->tempNumber){
                array_push($this->arr,$this->tempNumber);
            }  
        }
    }

    public function bracketOne() {
        if(array_search(')', $this->arr) != 0) {    
            for($i = 0; $i < count($this->arr); $i++) {  
                if( $this->arr[$i] == "(") {
                $bracket1= $i;         
                } 
            } 
       
            for($s = count($this->arr); $s > 0; $s--) {  
                if( $this->arr[$s] == ")") {
                    $bracket2 = $s;
                } 
            }

            $part = array();
   
            for($i = 0; $i < count($this->arr); $i++) {
                if($bracket1 < $i && $i < $bracket2) {
                    array_push($part, $this->arr[$i]);
                }
            }
            if($part){ 
                $val=$this->operation($part);
                array_splice($this->arr, $bracket1, $bracket2);
                $this->arr[$bracket1] = $val;

                $calcResult = $this->operation($this->arr);
                return $calcResult;
                
            }
        }
    }

    public function bracketZero() {
        $calcResult = $this->operation($this->arr);
        return $calcResult;
    }

    private function operation($valueArray) {
     
        if(array_search(')', $valueArray) == 0) {    
            for($i = 0; $i < count($valueArray); $i++) {  
                if( $valueArray[$i] == "x") {
                    $res = $valueArray[$i - 1] * $valueArray[$i + 1];
                    unset($valueArray[$i - 1], $valueArray[$i], $valueArray[$i + 1]);
                    $valueArray[$i - 1] = $res;
                    ksort($valueArray);
                    $this->changePole($valueArray);
                    $i = 0;
                } 
            }
        
            for($i = 0; $i < count($valueArray); $i++) {  
                if( $valueArray[$i] == "/") {
                    if($valueArray[$i + 1] != 0) {
                        $res = $valueArray[$i - 1] / $valueArray[$i + 1];
                        unset($valueArray[$i - 1], $valueArray[$i], $valueArray[$i + 1]);
                        $valueArray[$i - 1] = $res;
                        ksort($valueArray);
                        $this->changePole($valueArray);
                        $i = 0;
                    } else {
                        echo "Nulou nelze dělit.";
                        $valueArray[0] = "";
                    }
                } 
            }
        
            for($i = 0; $i < count($valueArray); $i++) {   
                if( $valueArray[$i] == "+") {
                    $res = $valueArray[$i - 1] + $valueArray[$i + 1];
                    unset($valueArray[$i - 1], $valueArray[$i], $valueArray[$i + 1]);
                    $valueArray[$i - 1] = $res;
                    ksort($valueArray);
                    $this->changePole($valueArray);
                    $i = 0;
                } 
            }
            for($i = 0; $i < count($valueArray); $i++) {  
                if( $valueArray[$i] == "-") {
                    $res = $valueArray[$i - 1] - $valueArray[$i + 1];
                    unset($valueArray[$i - 1], $valueArray[$i], $valueArray[$i + 1]);
                    $valueArray[$i - 1] = $res;
                    ksort($valueArray);
                    $this->changePole($valueArray);
                    $i = 0;
                } 
            }
            return $valueArray[0];
        } 
        }

    private function changePole(&$pole){
        $g = 0;
        foreach($pole as $k =>$pol){
            if($k != $g){  
            $pole[$g] = $pol;
            unset($pole[$k]); 
            } 
            $g++;    
        }   
   }
}