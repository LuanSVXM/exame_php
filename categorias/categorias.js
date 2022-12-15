
document.querySelector('.btnAdd').addEventListener('click', () => {

    adicionarForm(0)

})


document.querySelector('#Salvar').addEventListener('click', () => {

    document.querySelector('.formUserModal').submit();

})




const adicionarForm = (id, nome = null) => {

    if (id == 0) {


        document.querySelector('#exampleModalLabel').textContent = "Adicionar Categoria";

    } else {

        document.querySelector('#exampleModalLabel').textContent = "Editar Categoria";

    }

    if (nome) {

        document.querySelector('#recipient-name').value = nome;

    } else {

        document.querySelector('#recipient-name').value = "";
    }

    document.querySelector('#recipient-id').value = id;


    let myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
        keyboard: false
    })

    myModal.show()


}


const deletar_categorias = (id) => {

    if (id) {

        window.location.href = `/petshop/categorias/delete_categorias.php?id=${id}`;

    }

}