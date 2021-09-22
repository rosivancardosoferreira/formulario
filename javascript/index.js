let verifica = 'verdadeiro';
document.getElementsByClassName('select-tipo-atividade')[0].options[0].selected = true;
document.getElementsByClassName('select-area-conhecimento')[0].options[0].selected = true;

function abas(aba) {
    if (aba === '1') {
        document.getElementById('ab1').classList.add('selected');
        document.getElementById('ab2').classList.remove('selected');

        document.getElementById('texto-apresentacao').classList.remove('disabled');
        document.getElementById('inscricao').classList.remove('visible');
    } else {
        document.getElementById('ab2').classList.add('selected');
        document.getElementById('ab1').classList.remove('selected');
        
        document.getElementById('texto-apresentacao').classList.add('disabled');
        document.getElementById('inscricao').classList.add('visible')
        // window.scrollTo(0, 0);
        $('html,body').animate({ scrollTop: 0 }, 700);
    }
}

function numeroParticipantes(numeroPalestrantes) {
    let palestrantes = document.getElementsByClassName('palestrantes');
    let palestrantesInputs = document.getElementsByClassName('campo-participante');
    let palestrantesMsg = document.getElementsByClassName('msg');

    // Remove a visibilidade dos palestrantes 2, 3, 4
    for (let cont = 1; cont < palestrantes.length; cont++) { // classe 1, 2, 3
        palestrantes[cont].classList.remove('visible');
    }

    for (let cont = 0; cont < palestrantesInputs.length; cont++) {
        palestrantesInputs[cont].classList.remove('campo-obg');
    }
    for (let cont = 0; cont < palestrantesMsg.length; cont++) {
        palestrantesMsg[cont].classList.remove('msg-obg');
    }

    for (let cont = 0; cont < document.getElementsByClassName('msg-selects').length; cont++) {
        document.getElementsByClassName('msg-selects')[cont].classList.remove('msg-obg-selects');
    }

    if (numeroPalestrantes > 1) { // 2, 3, 4 palestrantes
        // Torna o restante do participantes visíveis
        for (let cont = 1; cont < numeroPalestrantes; cont++) {
            palestrantes[cont].classList.add('visible');
        }

        let qtdInputs = ((numeroPalestrantes - 1) * (palestrantesInputs.length / (palestrantes.length - 1)));
        let qtdIMsg = ((numeroPalestrantes - 1) * (palestrantesMsg.length / (palestrantes.length - 1)));

        for (let cont = 0; cont < qtdInputs; cont++) {
            palestrantesInputs[cont].classList.add('campo-obg');
        }
        for (let cont = 0; cont < qtdIMsg; cont++) {
            palestrantesMsg[cont].classList.add('msg-obg');
        }
        for (let cont = 0; cont < (numeroPalestrantes - 1); cont++) {
            document.getElementsByClassName('msg-selects')[cont].classList.add('msg-obg-selects');
        }
    }


}

function sugestaoDataHorario(res = 'N') {
    if (res === 'N' && document.getElementById('noInfo').checked === false) {
        document.getElementById('sugestao_data_horario').value = '';
        
        document.getElementById('sugestao_data_horario').classList.remove('block');
    } else {
        document.getElementById('sugestao_data_horario').classList.add('block');
    }
}

function getValueSelected(classeSelect, indice) {
    let box = classeSelect[indice];
    let valor = box.options[box.selectedIndex].value;
    return valor;
}

function horarios() {
    verifica = 'verdadeiro';
    let tipoAtividade = getValueSelected(document.getElementsByClassName('select-tipo-atividade'), 0);
    let areaConhecimento = getValueSelected(document.getElementsByClassName('select-area-conhecimento'), 0);

    if (tipoAtividade !== "" && areaConhecimento !== "") {
        let dados = {
            area_conhecimento: areaConhecimento,
            tipo_atividade: tipoAtividade
        }

        $.ajax({
            method: 'POST', data: dados, url: 'callback/ajaxDataHorario.php', async: true, dataType: 'html',
            beforeSend: function () {
                $('#dados-horario').html('<div class="loader"></div>');
            },
            success: function (resposta) {
                $('#dados-horario').html(resposta);
            }
        });
    } 
}

function verificarVez(posicao) {
    let dados = {        
        posicao: posicao
    }

    $.ajax({
        method: 'POST', data: dados, url: 'callback/ajaxVerificaVez.php', async: false, dataType: 'json',        
        beforeSend: function () {
            console.log('esperando');
        },
        success: function (resposta) {
            verifica = resposta[0];
        }
    });

}


function validaSelects() {
    let retorno = true;
    const select = {
        nParticipantes: document.getElementsByClassName('select-numero-participantes'),
        titulacoes: document.getElementsByClassName('select-titulacao-convidado'),
        areasConhecimentos: document.getElementsByClassName('select-area-conhecimento'),
        tiposAtividades: document.getElementsByClassName('select-tipo-atividade')
    }
    //  Select do número de participantes
    nParticipantes = getValueSelected(select.nParticipantes, 0);
    nParticipantes = parseInt(nParticipantes)
    //   Selects de titulações
    for (let cont = 0; cont < nParticipantes; cont++) {
        titulacao = getValueSelected(select.titulacoes, cont);
        if (titulacao === "") {
            document.getElementsByClassName('msg-obg-selects')[cont + 1].classList.add('block');
            retorno = (retorno && false);
        } else {
            document.getElementsByClassName('msg-obg-selects')[cont + 1].classList.remove('block');
        }
    }
    //   Select de área de conhecimento
    areaConhecimento = getValueSelected(select.areasConhecimentos, 0);
    if (areaConhecimento === "") {
        document.getElementsByClassName('msg-obg-selects')[nParticipantes + 2].classList.add('block');
        retorno = (retorno && false);
    } else {
        document.getElementsByClassName('msg-obg-selects')[nParticipantes + 2].classList.remove('block');
    }
    //   Select do tipo de atividade
    tipoAtividade = getValueSelected(select.tiposAtividades, 0);
    if (tipoAtividade === "") {
        document.getElementsByClassName('msg-obg-selects')[nParticipantes + 1].classList.add('block');
        retorno = (retorno && false);
    } else {
        document.getElementsByClassName('msg-obg-selects')[nParticipantes + 1].classList.remove('block');
    }
    return retorno;
}

function validaInputs() {
    let campo = document.getElementsByClassName('campo-obg');
    let retorno = true;

    for (let cont = 0; cont < campo.length; cont++) {
        if (campo[cont].value === "") {
            document.getElementsByClassName('msg-obg')[cont].classList.add('block');
            retorno = false;
        } else {
            document.getElementsByClassName('msg-obg')[cont].classList.remove('block');
        }
    }
    return retorno;
}

function enviarFormulario() {
    let inputsValidos = validaInputs();
    let selectValidos = validaSelects();
    let radioValido = false;
    let cont = 0;

    for (cont; cont < document.getElementsByName('data_hora').length; cont++) {
        if (document.getElementsByName('data_hora')[cont].checked === true) {
            // Verifica se o radio checked é o último 
            if (cont === (document.getElementsByName('data_hora').length - 1)) {
                if (document.getElementById('sugestao_data_horario').value !== "") {
                    radioValido = true;  
                }
            } else {
                radioValido = true;
            }
            break;
        }
    }
    
    if(radioValido == true) {
        document.getElementById('msg-radio').classList.remove('block');
    } else {
        // Verifica se a div com os horários e mensagem de erro existem
        if (document.getElementById('stg-data') != undefined) {
            document.getElementById('msg-radio').classList.add('block');
        } else {
            radioValido = true;
        }
    }    

    if (inputsValidos && selectValidos && radioValido) {
        if(document.getElementById('stg-data') != undefined){ 
            if(!document.getElementById('noInfo').checked){
                verificarVez(cont);
            }
        }

        if(verifica === 'verdadeiro') {
            console.log(verifica);
            document.getElementById('formulario').action = 'callback/manterAtividade.php';
            return true;
        }else{
            horarios();
            return false;
        }
    } else {
        // Movimenta o Scroll da janela para o campo vazio
        let elem = document.getElementsByClassName('block')[0];
        let targetOffset = $(elem).offset().top;
        $('html,body').animate({ scrollTop: targetOffset - 90 }, 500);
        return false;
    }
}

document.getElementById('ab1').onclick = () => abas('1');
document.getElementById('ab2').onclick = () => abas('2');
document.getElementById('btn-avancar').onclick = () => abas('2');

document.getElementById('numero-palestrantes').onchange = () => numeroParticipantes(document.getElementById('numero-palestrantes').value);

document.getElementById('titleOne').onchange = () => outraTitulacao('0');
document.getElementById('titleTwo').onchange = () => outraTitulacao('1');
document.getElementById('titleThree').onchange = () => outraTitulacao('2');
document.getElementById('titleFour').onchange = () => outraTitulacao('3');
document.getElementsByClassName('select-area-conhecimento')[0].onchange = () => horarios();
document.getElementsByClassName('select-tipo-atividade')[0].onchange = () => horarios();

document.getElementById('btn-enviar').onclick = () => enviarFormulario();