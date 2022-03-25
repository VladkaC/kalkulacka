<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href= "style.css" rel="stylesheet" >
    <title>Document</title>
</head>
<body>
    <?php 
    include "math.php";

    $cal = new Math();
    $cal->calcNumber();
    ?>
    <form action="index.php" method = "post" class = "d-flex  justify-content-center align-items-center flex-wrap col-4 border border-dark">
        
        <input type = 'text' id = 'result' value ="<?php echo $cal->bracketZero(); echo $cal->bracketOne() ;?>"style = "pointer-events: none" name = "result" class = "col-12 result">
        <?php   
        
                $array = array(
                    'bracket1' => '(',
                    'bracket2' => ')',
                    'back' => '←',
                    'reset' => 'C',
                    'seven' => 7,
                    'eight' => 8,
                    'nine' => 9,
                    'div' => '/',
                    'four' => 4,
                    'five' => 5,
                    'six' => 6,
                    'multi' => 'x',
                    'one' => 1,
                    'two' => 2,
                    'three' => 3,
                    'sub' => '-',
                    'zero' => 0,
                    'dot' => '.',
                    'add' => '+'
                );
                foreach($array as $k => $value) {
                    echo "<input class = 'col-3' type = 'button' id = '" . $k . "' onclick = 'placeholderCalculation(\"" . $value  . "\")' value = '" . $value . "'>";
                }
            
            ?>
            <button class = "col-3"type = "submit" name = "submit" id = "submit">=</button>
    </form>
      
</body>
<script src = 'script.js'> </script>
</html>