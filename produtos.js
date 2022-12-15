
document.querySelector('.btnAdd').addEventListener('click', () => {

    adicionarForm(0)

})


document.querySelector('#Salvar').addEventListener('click', () => {

        document.querySelector('.formUserModal').submit();

})


const  formatardata = (data) =>  {
    var dia  = data.split("/")[0];
    var mes  = data.split("/")[1];
    var ano  = data.split("/")[2];
  
    return ano + '-' + ("0"+mes).slice(-2) + '-' + ("0"+dia).slice(-2);
    // Utilizo o .slice(-2) para garantir o formato com 2 digitos.
  }
  

const adicionarForm = (id, nome = null, estoque = null, valor = null, categoria = null) => {

        if(id == 0) {

            

            document.querySelector('#exampleModalLabel').textContent = "Adicionar Produto";
        
        } else {

            document.querySelector('#exampleModalLabel').textContent = "Editar Produto";
        
        }

        if(nome) {

            document.querySelector('#nome').value = nome;

        }else{

            document.querySelector('#nome').value = "";

        }


        if(estoque) {
            document.querySelector('#estoque').value = estoque;

        }else{

            document.querySelector('#estoque').value = "";

        }

        if(valor) {

            document.querySelector('#preco').value = valor;

        }else{

            document.querySelector('#preco').value = "";

        }


        if(categoria) {

            document.querySelector('#categoria').value = categoria;

        }else{

            document.querySelector('#categoria').value = "";

        }




            document.querySelector('#recipient-id').value = id;


        let myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
            keyboard: false
          })

        myModal.show()


}


const deletar_produtos = (id) => {

    if(id) {

        window.location.href = `/deletar_produto.php?id=${id}`;

    }

}