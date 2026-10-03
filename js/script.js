document.addEventListener("DOMContentLoaded", () => {
    const tabelaTbody = document.querySelector("table tbody");
    const botaoAdicionar = document.querySelector(".Botão.adicionar");

    // Função para atualizar os eventos dos botões de editar e excluir nas linhas
    function atualizarEventos() {
        const botoesEditar = document.querySelectorAll(".Botão.editar");
        const botoesExcluir = document.querySelectorAll(".Botão.excluir");

        botoesEditar.forEach(botao => {
            botao.addEventListener("click", (e) => {
                e.preventDefault();
                const linha = e.target.closest("tr");
                const colunas = linha.querySelectorAll("td");

                const novoNome = prompt("Editar Nome:", colunas[1].textContent);
                const novoEmail = prompt("Editar E-mail:", colunas[2].textContent);
                const novoCurso = prompt("Editar Curso:", colunas[3].textContent);

                if (novoNome) colunas[1].textContent = novoNome;
                if (novoEmail) colunas[2].textContent = novoEmail;
                if (novoCurso) colunas[3].textContent = novoCurso;
            });
        });

        botoesExcluir.forEach(botao => {
            botao.addEventListener("click", (e) => {
                e.preventDefault();
                const linha = e.target.closest("tr");
                if (confirm("Tem certeza que deseja excluir este aluno?")) {
                    linha.remove();
                }
            });
        });
    }

    //Adicionar
    botaoAdicionar.addEventListener("click", (e) => {
        e.preventDefault();

        const nome = prompt("Digite o nome do aluno:");
        if (!nome) return;
        const email = prompt("Digite o e-mail do aluno:");
        if (!email) return;
        const curso = prompt("Digite o curso do aluno:");
        if (!curso) return;

        // Calcula o próximo ID com base na quantidade de linhas existentes + 1
        const novoId = tabelaTbody.rows.length + 1;

        const novaLinha = document.createElement("tr");
        novaLinha.innerHTML = `
            <td>${novoId}</td>
            <td>${nome}</td>
            <td>${email}</td>
            <td>${curso}</td>
            <td>
                <a href="#" class="Botão editar">editar</a>
                <a href="#" class="Botão excluir">excluir</a>
            </td>
        `;

        tabelaTbody.appendChild(novaLinha);
        atualizarEventos();
    });

    
    atualizarEventos();


// 1. Botão Adicionar: Redireciona diretamente para o formulário de adição
const btnAdicionar = document.querySelector(".adicionar");

if (btnAdicionar) {
    btnAdicionar.addEventListener("click", function (event) {
        event.preventDefault();
        window.location.href = "php/adicionar.php";
    });
}

// 2. Botões Editar: Redirecionam diretamente para a página do aluno correto
const btnEditar = document.querySelectorAll(".editar");

btnEditar.forEach(function (botao) {
    botao.addEventListener("click", function (event) {
        event.preventDefault();
        window.location.href = this.getAttribute("href");
    });
});

// 3. Botões Excluir: Mantém o alerta de confirmação e redireciona ao aceitar
const btnExcluir = document.querySelectorAll(".excluir");

btnExcluir.forEach(function (botao) {
    botao.addEventListener("click", function (event) {
        event.preventDefault();
        const continuar = confirm("Deseja realmente excluir este aluno?");

        if (continuar) {
            window.location.href = this.getAttribute("href");
        } else {
            alert("Exclusão cancelada!");
        }
    });
});












});