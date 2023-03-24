const olho = document.getElementById('olho');
const campo = document.getElementById('senha');
const confirma = document.getElementById('senha_confirma');  

    olho.addEventListener('click', () => {
        alert("teste");
        campo.type = campo.type == 'password' ? 'text' : 'password';

    })
