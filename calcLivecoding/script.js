const displayItem = document.getElementById('display-cal')
const bodyCal = document.getElementById('body-cal')
const calculateItem = document.getElementById('calculate-cal')
const clearItem = document.getElementById('clear-cal')

bodyCal.addEventListener('click', function(event){
    console.log("test")
    displayItem.value += event.target.textContent
})

calculateItem.addEventListener("click", function(){    
    try{
        displayItem.value = eval(displayItem.value)
    } catch {
        displayItem.value = "error"
    }
})

clearItem.addEventListener('click', function(){
    console.log("item berhasil dihapus")
    displayItem.value = ""
})

