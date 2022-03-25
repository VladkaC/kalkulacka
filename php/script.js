
var inputString = "";

 function placeholderCalculation(button) { 
    if(button == "C") {
        inputString = "";
    } else if(button == "←") {
        inputString = inputString.substring(0,inputString.length-1);
    } else {
        inputString += button;
    }
    
    document.getElementById('result').value = inputString;
};



document.addEventListener("keydown", function(event){
    
    switch(event.key) {
        case "0": inputString += '0';
        break;
        case "1": inputString += '1';
        break;
        case "2": inputString += '2';
        break;
        case "3": inputString += '3';
        break;
        case "4": inputString += '4';
        break;
        case "5": inputString += '5';
        break;
        case "6": inputString += '6';
        break;
        case "7": inputString += '7';
        break;
        case "8": inputString += '8';
        break;
        case "9": inputString += '9';
        break;
        case "+": inputString += '+';
        break;
        case "-": inputString += '-';
        break;
        case "x": inputString += 'x';
        break;
        case "/": inputString += '/';
        break;
    }
    document.getElementById('result').value = inputString;

   if(event.key === 'Enter' ) {
       console.log("Ahoj");
    document.getElementById('submit').click();   
   }    
}
)