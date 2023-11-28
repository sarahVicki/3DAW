function ListarCandidatos(){

    let xmlhttp = new XMLHttpRequest();
    console.log("1");
    
    xmlhttp.onreadystatechange = function(){
    
      if (this.readyState == 4 && this.status == 200){
    
        console.log("Chegou a resposta OK: " + this.responseText);
        console.log("2");
        let objReturnJSON = JSON.parse(this.responseText);
    
        // tornando o cabeçalho visível
        document.getElementById("tab").style.display="block";
        CriarCabecalho();
    
        for (let i = 0; i < objReturnJSON.length; i++) {
          let linha = objReturnJSON[i];
          CriarLinhaTabela(linha);
        }
      } 
      else if(this.readyState < 4){console.log("3: " + this.readyState);} 
      else{console.log("Requisicao falhou: " + this.status);}
    }
    
    console.log("4");
    xmlhttp.open("GET", "http://localhost/av2/listarCandidatos.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();
    
    console.log("enviei request get");
}

function CriarCabecalho(){

    let table = document.getElementById("tab");
    
    let tr = document.createElement("tr");
    
    let th1 = document.createElement("th");
    th1.textContent = "Nome";
    tr.appendChild(th1);
    
    let th2 = document.createElement("th");
    th2.textContent = "CPF";
    tr.appendChild(th2);
    
    let th3 = document.createElement("th");
    th3.textContent = "Identidade";
    tr.appendChild(th3);

    let th4 = document.createElement("th");
    th4.textContent = "Email";
    tr.appendChild(th4);

    let th5 = document.createElement("th");
    th5.textContent = "Cargo";
    tr.appendChild(th5);

    let th6 = document.createElement("th");
    th6.textContent = "Sala";
    tr.appendChild(th6);
    
    let th7 = document.createElement("th");
    th7.textContent = "Ações";
    tr.appendChild(th7);
    
    table.appendChild(tr);
}

function CriarLinhaTabela(pobjReturnJSON){

    let table = document.getElementById("tab");
    let tr = document.createElement("tr");
    
    let td1 = document.createElement("td");
    td1.textContent = pobjReturnJSON.nome;
    tr.appendChild(td1);
    
    let td2 = document.createElement("td");
    td2.textContent = pobjReturnJSON.cpf;
    tr.appendChild(td2);
    
    let td3 = document.createElement("td");
    td3.textContent = pobjReturnJSON.identidade;
    tr.appendChild(td3);

    let td4 = document.createElement("td");
    td4.textContent = pobjReturnJSON.email;
    tr.appendChild(td4);

    let td5 = document.createElement("td");
    td5.textContent = pobjReturnJSON.cargo;
    tr.appendChild(td5);

    let td6 = document.createElement("td");
    td6.textContent = pobjReturnJSON.sala;
    tr.appendChild(td6);
    
    let td7 = document.createElement("td");
    let btnAlterar = document.createElement("button");
    btnAlterar.textContent = "Alterar Sala";
    
    //Evento Alterar
    btnAlterar.addEventListener("click", function(){
    ExibeForm(pobjReturnJSON.nome, pobjReturnJSON.cpf, pobjReturnJSON.sala);
    document.getElementById("tab").style.display = "none";
    });
    td7.appendChild(btnAlterar);
    
    tr.appendChild(td7);
    
    // Adicionando a nova linha antes da última linha existente
    table.appendChild(tr);
}
    
function DeletarTabela(){

    let table = document.getElementById("tab");
    table.innerHTML = ""; // Limpa o conteúdo da tabela
}

function ExibeForm(nome, cpf, sala){

    document.getElementById("form").style.display = "block";
    document.getElementById("Alterar").style.display = "block";
    
    document.getElementById("nome").value = nome;
    document.getElementById("cpf").value = cpf;
    document.getElementById("sala").value = sala;
}

function AlterarSala(){

    document.getElementById("form").style.display = "none";
    document.getElementById("Incluir").style.display = "none";

    let nome = document.getElementById("nome").value;
    let cpf = document.getElementById("cpf").value;
    let sala = document.getElementById("sala").value;

    let xmlhttp = new XMLHttpRequest();
    console.log("1");

    xmlhttp.onreadystatechange = req();
    console.log("4");

    xmlhttp.open("POST", "http://localhost/av2/alterarSala.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("&nome=" + nome + "&cpf=" + cpf + "&sala=" + sala);

    console.log("form enviado");
}

function req(){

    if(this.readyState == 4 && this.status == 200){
      console.log("Ação realizada com sucesso: " + this.responseText);
      console.log("2");
    }
    else if (this.readyState < 4){
      console.log("3: " + this.readyState);
    } 
    else{
      console.log("Requisicao falhou: " + this.status);
    }
}

function incluirFiscal(){

    let form = document.getElementById("form");
    console.log("Form: " + form.innerHTML);

    let nome = document.getElementById("nome").value;
    let cpf = document.getElementById("cpf").value;
    let sala = document.getElementById("sala").value;

    console.log("nome" + nome + " cpf: " + cpf + " sala: " + sala);
    
    let form2 = {"nome":nome, "cpf":cpf, "sala":sala};
    let objJson = JSON.stringify(form2);
    console.log("objForm2: " + form2);
    console.log("JSON: " + objJson);
    
    let xmlhttp = new XMLHttpRequest();
    console.log("1");
    
    xmlhttp.onreadystatechange = req();
    console.log("4");
    
    xmlhttp.open("POST", "http://localhost/av2/incluirFiscal.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("&nome=" + nome + "&cpf=" + cpf + "&sala=" + sala);
    
    console.log("form enviado");
   
}

function ExibeFormIncluir(){
    
    document.getElementById("form").style.display = "block";
    document.getElementById("Incluir").style.display = "block";
}

function ValidaForm(pnome, pcpf, psala) {

    if (pnome == ""){
        alert("Formulário não preenchido completamente");
    }
    else{
        if (pcpf == ""){
            alert("Formulário não preenchido completamente");
        }
        else{
            if (psala == ""){
                alert("Formulário não preenchido completamente");
            }
            else{
                incluirFiscal();
            }
        }
    }

}
