

    function BuscarProduto(Id) {
      let xmlhttp = new XMLHttpRequest();
      console.log("1");

      xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          let objReturnJSON = JSON.parse(this.responseText);

          document.getElementById("id").value = objReturnJSON.id;
          document.getElementById("nome").value = objReturnJSON.nome;
          document.getElementById("valor").value = objReturnJSON.valor;

        } 
        else if(this.readyState < 4){
          console.log("3: " + this.readyState);
        } 
        else{

          console.log("Requisicao falhou: " + this.status);
        }
      }

      console.log("4");
      xmlhttp.open("GET", "http://localhost/Nova Pasta/listarProduto.php?id=" + Id);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send();
    }

function ExibeForm(id, nome, valor, quant){

  document.getElementById("form").style.display = "block";
  document.getElementById("Alterar").style.display = "block";

  document.getElementById("id").value = id;
  document.getElementById("nome").value = nome;
  document.getElementById("valor").value = valor;
}

function ExibeFormIncluir(){
      
  document.getElementById("form").style.display = "block";
  document.getElementById("Incluir").style.display = "block";
}
   
function AlterarProduto(){

  document.getElementById("form").style.display = "none";
  document.getElementById("Incluir").style.display = "none";

  let id = document.getElementById("id").value;
  let nome = document.getElementById("nome").value;
  let valor = document.getElementById("valor").value;

  let xmlhttp = new XMLHttpRequest();
  console.log("1");

  xmlhttp.onreadystatechange = req();
  console.log("4");

  xmlhttp.open("POST", "http://localhost/Nova Pasta/alterarProduto.php");
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("id=" + id + "&nome=" + nome + "&valor=" + valor);

  console.log("form enviado");
}

function AlterarCarrinho(){

  document.getElementById("form").style.display = "none";

  let id = document.getElementById("id").value;
  let nome = document.getElementById("nome").value;
  let valor = document.getElementById("valor").value;

  let xmlhttp = new XMLHttpRequest();
  console.log("1");

  xmlhttp.onreadystatechange = req();
  console.log("4");

  xmlhttp.open("POST", "http://localhost/Nova Pasta/alterarCarrinho.php");
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("id=" + id + "&nome=" + nome + "&valor=" + valor);

  console.log("form enviado");
}

function ExcluirProduto(id){

  let xmlhttp = new XMLHttpRequest(); 
  xmlhttp.onreadystatechange = req();
  xmlhttp.open("POST", "http://localhost/Nova Pasta/excluirProduto.php");
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("id=" + id);
}

function ExcluirCarrinho(id){

  let xmlhttp = new XMLHttpRequest(); 
  xmlhttp.onreadystatechange = req();
  xmlhttp.open("POST", "http://localhost/Nova Pasta/excluirCarrinho.php");
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("id=" + id);
}

function ListarProdutos(){

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
  xmlhttp.open("GET", "http://localhost/Nova Pasta/listarProduto.php");
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send();

  console.log("enviei request get");
}

function CriarCabecalho(){

  let table = document.getElementById("tab");

  let tr = document.createElement("tr");

  let th1 = document.createElement("th");
  th1.textContent = "ID";
  tr.appendChild(th1);

  let th2 = document.createElement("th");
  th2.textContent = "Nome";
  tr.appendChild(th2);

  let th3 = document.createElement("th");
  th3.textContent = "Valor";
  tr.appendChild(th3);

  let th4 = document.createElement("th");
  th4.textContent = "Ações";
  tr.appendChild(th4);

  table.appendChild(tr);
}

function CriarLinhaTabela(pobjReturnJSON){

  let table = document.getElementById("tab");
  let tr = document.createElement("tr");

  let td1 = document.createElement("td");
  td1.textContent = pobjReturnJSON.id;
  tr.appendChild(td1);

  let td2 = document.createElement("td");
  td2.textContent = pobjReturnJSON.nome;
  tr.appendChild(td2);

  let td3 = document.createElement("td");
  td3.textContent = pobjReturnJSON.valor;
  tr.appendChild(td3);

  let td4 = document.createElement("td");
  let btnAlterar = document.createElement("button");
  btnAlterar.textContent = "Alterar";

  //Evento Alterar
  btnAlterar.addEventListener("click", function(){
  ExibeForm(pobjReturnJSON.id, pobjReturnJSON.nome, pobjReturnJSON.valor);
  document.getElementById("tab").style.display = "none";
  });
  td4.appendChild(btnAlterar);

  let btnExcluir = document.createElement("button");
  btnExcluir.textContent = "Excluir";

  //Evento Excluir
  btnExcluir.addEventListener("click", function(){
  ExcluirProduto(pobjReturnJSON.id);
  document.getElementById("tab").style.display = "none";
  });
  td4.appendChild(btnExcluir);

  let btnAdicionarCarrinho = document.createElement("button");
  btnAdicionarCarrinho.textContent = "Adicionar ao carrinho";

  //Evento Adicionar ao carrinho
  btnAdicionarCarrinho.addEventListener("click", function(){
  AdicionarCarrinho(pobjReturnJSON.id);
  document.getElementById("tab").style.display = "none";
  });
  td4.appendChild(btnAdicionarCarrinho);

  tr.appendChild(td4);

  // Adicionando a nova linha antes da última linha existente
  table.appendChild(tr);
}

function CriarLinhaTabelaCarrinho(pobjReturnJSON){
  let table = document.getElementById("tab");
  let tr = document.createElement("tr");

  let td1 = document.createElement("td");
  td1.textContent = pobjReturnJSON.id;
  tr.appendChild(td1);

  let td2 = document.createElement("td");
  td2.textContent = pobjReturnJSON.nome;
  tr.appendChild(td2);

  let td3 = document.createElement("td");
  td3.textContent = pobjReturnJSON.valor;
  tr.appendChild(td3);

  let td4 = document.createElement("td");
  let btnAlterar = document.createElement("button");
  btnAlterar.textContent = "Alterar";

  //Evento Alterar
  btnAlterar.addEventListener("click", function(){
  ExibeForm(pobjReturnJSON.id, pobjReturnJSON.nome, pobjReturnJSON.valor);
  document.getElementById("tab").style.display = "none";
  });
  td4.appendChild(btnAlterar);

  let btnExcluir = document.createElement("button");
  btnExcluir.textContent = "Excluir";

  //Evento Excluir
  btnExcluir.addEventListener("click", function(){
  ExcluirCarrinho(pobjReturnJSON.id);
  document.getElementById("tab").style.display = "none";
  });
  td4.appendChild(btnExcluir);

  tr.appendChild(td4);

  // Adicionando a nova linha antes da última linha existente
  table.appendChild(tr);
}

function DeletarTabela(){

  let table = document.getElementById("tab");
  table.innerHTML = ""; // Limpa o conteúdo da tabela
}
    
function inserirProduto(){

  let form = document.getElementById("form");
  console.log("Form: " + form.innerHTML);
  
  let id = document.getElementById("id").value;
  let nome = document.getElementById("nome").value;
  let valor = document.getElementById("valor").value;
  console.log("id" + id + " nome: " + nome + " valor: " + valor);
  
  let form2 = {"id":id, "nome":nome, "valor":valor};
  let objJson = JSON.stringify(form2);
  console.log("objForm2: " + form2);
  console.log("JSON: " + objJson);
  
  let xmlhttp = new XMLHttpRequest();
  console.log("1");
  
  xmlhttp.onreadystatechange = req();
  console.log("4");
  
  xmlhttp.open("POST", "http://localhost/Nova Pasta/adicionarProduto.php");
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("&id=" + id + "&nome=" + nome + "&valor=" + valor);
  
  console.log("form enviado");
}
  
function req(){

  if(this.readyState == 4 && this.status == 200){
    console.log("Ação realizada com sucesso: " + this.responseText);
    console.log("2");
    //document.getElementById("msg").innerHTML = this.responseText;
  }
  else if (this.readyState < 4){
    console.log("3: " + this.readyState);
  } 
  else{
    console.log("Requisicao falhou: " + this.status);
  }
}

function AdicionarCarrinho(id){

  let xmlhttp = new XMLHttpRequest();
  console.log("1");

  xmlhttp.onreadystatechange = req();
  console.log("4");

  xmlhttp.open("POST", "http://localhost/Nova Pasta/adicionarCarrinho.php");
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("&id=" + id);
  console.log("id="+id);

  console.log("enviei form");
}
