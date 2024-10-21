function solve(val){
    var inputText = document.getElementById("resultText");
    inputText.value += val;
}

function btnClearAction(){
    var inputText = document.getElementById("resultText");
    inputText.value = "";
}

function btnBackSpaceAction(){
    var inputText = document.getElementById("resultText");
    inputText.value = inputText.value.slice(0, -1);
}

document.addEventListener('keydown', function(event){
    const key = event.key;
    const validKeys ="0123456789+-*/.%x";
    if(validKeys.includes(key)){
        // solve(key)
        solve(key === '*' ? 'x' : key);
    }else if(key === 'Enter'){
        calculateResult();
    }else if(key === 'Backspace'){
        btnBackSpaceAction();
    }else if(key.toLowerCase() === 'c'){
        btnClearAction();
    }
});

function calculateResult(){
    var num1 = document.getElementById('resultText').value;
    try{
        var num2 = eval(num1.replace('x', '*'));
        document.getElementById('resultText').value = num2;
    }catch{
        document.getElementById('resultText').value = 'Error';
    }

}