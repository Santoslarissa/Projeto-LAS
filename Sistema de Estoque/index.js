const button = document.getElementById('button')

button.addEventListener("click", (Event) => {

  const nome = document.getElementById('nome')
  const email = document.getElementById('email')
  const senha = document.getElementById('senha')
  const confsenha = document.getElementById('confsenha')

  //Validações para campos vazios

    if (nome.value == ''){
        nome.classList.add("errorInput")
    } else 
        nome.classList.remove("errorInput")

    if (email.value == ''){
        email.classList.add("errorInput")
    } else 
        email.classList.remove("errorInput")

    if (senha.value == ''){
        senha.classList.add("errorInput")
    }else 
        senha.classList.remove("errorInput")

    if (confsenha.value == ''){
        confsenha.classList.add("errorInput")
    }else 
        confsenha.classList.remove("errorInput")


   // IndexOf é responsavel por identificar caracteres nos valores digitados
   //No primeiro caso, se houver um @ / . ele vai retornar a posição que ele ta,quando nao existir retorna -1
   // 2° - Sempre que o resultado da subtração for 1, quer dizer que o ponto esta logo em seguida do @...e para o email isso não é valido

    if(email.value.indexOf("@") == -1 || email.value.indexOf(".") == -1 || (email.value.indexOf(".") - email.value.indexOf("@")==1)){
        email.classList.add("errorInput")
        alert ('Email inválido')
    }else 
        email.classList.remove("errorInput")
    // Senha maior que 8 
    if(senha.value.length < 8 ){
        senha.classList.add("errorInput")
        alert('A senha deve possuir mais de 8 digitos')
    }else 
        senha.classList.remove("errorInput")

    // Os campos Senha e Confirmar senha devem ser iguais 
    if(confsenha.value != senha.value  ){
        confsenha.classList.add("errorInput")
        senha.classList.add("errorInput")
        alert('As senhas devem ser iguais')
    }

})