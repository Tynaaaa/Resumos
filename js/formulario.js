let formulario = document.querySelector("#form-resumo");

function mostrarFormulario() {
    // redireciona para a página do form
    window.location.href = "novo-resumo.php";
}

function cancelarFormulario() {
    // volta para a página anterior
    window.history.back();
}