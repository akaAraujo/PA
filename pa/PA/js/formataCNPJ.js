//MASCARA CPF CNPJ
const $inputcnpj = document.querySelector('[data-js="inputcnpj"]')
$inputcnpj.addEventListener('input', handleInput, false)

function handleInput (e) {
    var mask = $inputcnpj.value.length;

    if(mask = 14){
       e.target.value = cnpjMask(e.target.value)
    }
}

 function cnpjMask (cnpj){
     return cnpj.replace(/\D/g, '')                           
     .replace(/^(\d{2})(\d)/,"$1.$2")             
     .replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3") 
     .replace(/\.(\d{3})(\d)/,".$1/$2")           
     .replace(/(\d{4})(\d)/,"$1-$2")              
 }