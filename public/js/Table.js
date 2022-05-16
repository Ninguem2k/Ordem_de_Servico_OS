var tabela = document.getElementsByClassName('Table_produtos');
console.log(tabela);
    var linhas = tabela.querySelectorAll("tr");
    for (var i = 0; i < linhas.length; i++) {
        var linha = linhas[i];

        linha.addEventListener("click", function () {
//        selLinha(this, false); //Selecione apenas um
            selLinha(this, true);
        });
    }


function selLinha(linha, multiplos) {
    if (!multiplos) {
        var linhas = linha.parentElement.getElementsByTagName("tr");
        for (var i = 0; i < linhas.length; i++) {
            var linha_ = linhas[i];
            linha_.classList.remove("selecionado");
        }
    }
    linha.classList.toggle("selecionado");
}

var btnVisualizar = document.getElementById("ADD");
var AUX = 0;
var dado = [];
var table_aux = document.getElementById('TableAUX');

btnVisualizar.addEventListener("click", function () {
    var selecionados = document.getElementsByClassName("selecionado");
    var ID_OS = document.getElementById("ID_OS").innerText;
    if (selecionados.length < 1) {
        alert("Selecione pelo menos uma linha");
        return false;
    }
    var objetoProdut = [];
    for (var i = 0; i < selecionados.length; i++) {
        var selecionado = selecionados[i];
        selecionado = selecionado.getElementsByTagName("td");
        objetoProdut[0] = {
            Codigo: selecionado[0].innerHTML,
            Name: selecionado[1].innerHTML,
            Quantidade: selecionado[2].innerHTML,
            Valor: selecionado[3].innerHTML,
            ID_OS: ID_OS.innerHTML
        };

        if (VFexistdados(dado, objetoProdut)) {
            dado.push(objetoProdut[0]);
            addElemnts(dado, table_aux);
        } else {
            console.log("Já Cadastrado");
        }

    }

});

function VFexistdados(dado, objetoProdut) {
    var i = 0;
    var x = true;
    while (i < dado.length) {
        if (dado[i].Codigo === objetoProdut[0].Codigo) {
            x = false;
        }
        i++;
    }
    if (x) {
        return true;
    } else {
        return false;
    }
}
function addElemnts(dado) {
    AUX += 0;
    aux = [' <tr><td>' + dado[AUX].Codigo + '</td>  <td>' + dado[AUX].Name + '</td> <td>' + dado[AUX].Quantidade + '</td><td>' + dado[AUX].Valor + '</td><tr>'];
    table_aux.innerHTML += aux;
    AUX += 1;
}



var linhas = table_aux.querySelectorAll("tr");
for (var i = 0; i < linhas.length; i++) {
    var linha = linhas[i];

    linha.addEventListener("click", function () {
//        selLinha(this, false); //Selecione apenas um
        selLinha(this, true);
    });
}

function selLinha(linha, multiplos) {
    if (!multiplos) {
        var linhas = linha.parentElement.getElementsByTagName("tr");
        for (var i = 0; i < linhas.length; i++) {
            var linha_ = linhas[i];
            linha_.classList.remove("selecionado_AUX");
        }
    }
    linha.classList.toggle("selecionado_AUX");
}

var btnVisualizar = document.getElementById("REMOVER");

btnVisualizar.addEventListener("click", function () {
    var selecionadosAUX = document.getElementsByClassName("selecionado_AUX");
    if (selecionadosAUX.length < 1) {
        alert("Selecione pelo menos uma linha");
        return false;
    }
    var objetoProdutAUX = [];
    for (var i = 0; i < selecionadosAUX.length; i++) {
        var selecionadoAUX = selecionadosAUX[i];
        selecionadoAUX = selecionadoAUX.getElementsByTagName("td");
        objetoProdutAUX[0] = {
            Codigo: selecionadoAUX[0].innerHTML,
            Name: selecionadoAUX[1].innerHTML,
            Quantidade: selecionadoAUX[2].innerHTML,
            Valor: selecionadoAUX[3].innerHTML
        };

        if (VFelefoiremovido(dado, objetoProdutAUX)) {
             console.log("Elemento Removido");
            RemoverElemento();
        } else {
            console.log("Elemento não encontrado");
        }

    }

});

function VFelefoiremovido(dado, objetoProdutAUX) {
    var i = 0;
    var x = true;
    while (i < dado.length) {
        if (dado[i].Codigo === objetoProdutAUX[0].Codigo) {
            dado.splice(dado[i], 1);
            x = true;
        }
        i++;
    }
    if (x) {
        return true;
    } else {
        return false;
    }
}
function RemoverElemento() {
    console.log(dado);
//var elemento = document.querySelector("#elemento-para-remover");
//elemento.parentNode.removeChild(elemento);
}

function Salvar() {
    let xhr = new XMLHttpRequest();
    let url = "http://localhost/7System/Controller/Add_ItensOS.php";
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr);
            console.log(xhr.response);
            document.formulario.submit();
        }
    };
    xhr.send(JSON.stringify(dado));
}
