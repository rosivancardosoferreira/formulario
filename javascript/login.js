

document.getElementById('btn-entrar').onclick = () => {    
    if (document.getElementById('chave').value === "") {
        document.getElementById('msg-obg').classList.add('block');
        return false;
    } else {
        document.getElementById('msg-obg').classList.remove('block');
        document.getElementById('formulario').action = 'callback/manterLogin.php';
        return true;
    }
}