
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
  

const adicionarForm = (id, nome = null, cpf = null, data = null, admin = null) => {

        if(id == 0) {

            

            document.querySelector('#exampleModalLabel').textContent = "Adicionar Usuário";
        
        } else {

            document.querySelector('#exampleModalLabel').textContent = "Editar Usuário";
        
        }

        if(nome) {
            
            document.querySelector('#recipient-name').value = nome;
            
        }else{

            document.querySelector('#recipient-name').value = "";
        }

        if(cpf) {

            document.querySelector('#recipient-cpf').value = cpf;

        }else{

            document.querySelector('#recipient-cpf').value = "";
        }

        if(data) {

            document.querySelector('#recipient-data').value = formatardata(data);
        
        }else{

            document.querySelector('#recipient-data').value = "";

        }

        if(admin) {
           
            document.querySelector('#recipient-admin').value = admin;

        }

            document.querySelector('#recipient-id').value = id;


        let myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
            keyboard: false
          })

        myModal.show()


}


const deletar_user = (id) => {

    if(id) {

        window.location.href = `/delete_user.php?id=${id}`;

    }

}