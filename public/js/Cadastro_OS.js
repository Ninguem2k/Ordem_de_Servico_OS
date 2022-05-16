
var tabela = document.getElementById('Tableprodutos');
var linhas = tabela.getElementsByTagName("tr");
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
    var ID_OS = document.getElementById('ID_OS').innerText;
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
            ID_OS: ID_OS
        };

        if (VFexistdados(dado, objetoProdut)) {
            dado.push(objetoProdut[0]);
            addElemnts(dado, table_aux);
            remover();
            Calc_VTotal();
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

    let row = document.createElement('tr');
    let row_data_1 = document.createElement('td');
    row_data_1.innerHTML = dado[AUX].Codigo;
    let row_data_2 = document.createElement('td');
    row_data_2.innerHTML = dado[AUX].Name;
    let row_data_3 = document.createElement('td');
    row_data_3.innerHTML = dado[AUX].Quantidade;
    let row_data_4 = document.createElement('td');
    row_data_4.innerHTML = dado[AUX].Valor;

    row.appendChild(row_data_1);
    row.appendChild(row_data_2);
    row.appendChild(row_data_3);
    row.appendChild(row_data_4);
    table_aux.appendChild(row);
    AUX += 1;

}


//--------------------------------REMOVER----------------------------------
function remover() {

    var TableprodutosAUX = document.getElementById('TableAUX');
    var linhasAUX = TableprodutosAUX.querySelectorAll("tr");
    for (var i = 0; i < linhasAUX.length; i++) {
        var linhaAUX = linhasAUX[i];

        linhaAUX.addEventListener("click", function () {
            selLinhaAUX(this, false); //Selecione apenas um
//            selLinhaAUX(this, true);
        });
    }

    function selLinhaAUX(linhaAUX, multiplosAUX) {
        if (!multiplosAUX) {
            var linhasAUX = linhaAUX.parentElement.getElementsByTagName("tr");
            for (var i = 0; i < linhasAUX.length; i++) {
                var linhaAUX_ = linhasAUX[i];
                linhaAUX_.classList.remove("selecionadoAUX");
            }
        }

        linhaAUX.classList.toggle("selecionadoAUX");
    }

    var btnRemover = document.getElementById("REMOVER");

    btnRemover.addEventListener("click", function () {
        var selecionadosAUX = document.getElementsByClassName("selecionadoAUX");
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
                AUX += -1;
                var indice = dado.indexOf(dado[i]);
                dado.splice(indice, 1);
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
        var elemento = document.getElementsByClassName("selecionadoAUX");
        for (var i = 0; i < elemento.length; i++) {
            table_aux.removeChild(elemento[i]);
        }
    }
}

function Calc_VTotal() {
    var Vprodutos = 0;
    var Vproduto = 0;
    var Desconto = document.getElementById("Desconto");
    var Valordosprodutos = document.getElementById("Vprodutos");
    var Valordesconto = document.getElementById("Vdesconto");
    var Valortotal = document.getElementById("Vtotal");
    var linhas = table_aux.getElementsByTagName("tr");

    for (var i = 0; i < linhas.length; i++) {
        var linha = linhas[i];
        Vproduto = linha.getElementsByTagName("td")[3].innerHTML;
        Vprodutos = Number(Vproduto) + Vprodutos;
    }

    Valordosprodutos.innerHTML= 'R$ '+Vprodutos;
    Valordesconto.innerHTML= 'R$ '+Desconto.value+'%';
    var Total = Vprodutos-(Vprodutos * (Desconto.value / 100));
    Valortotal.innerHTML= 'R$ '+ Total;
    document.getElementById('Valor_total').value =  Total;
}

function Salvar() {
    let xhr = new XMLHttpRequest();
    let url = "../Controller/Add_ItensOS.php";
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
