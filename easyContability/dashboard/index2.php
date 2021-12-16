<?php

/** @var PDO */
$conn   = new PDO('mysql:host=localhost;dbname=demoday', 'root', '');
$action = $_POST['action'] ?? null;

if ($action == 'add') {
    $nome            = $_POST['nome'];
    $disponibilidade = $_POST['disponibilidade'];
    $quantidade      = $_POST['quantidade'];
    $validade        = $_POST['validade'];
    $tipo            = $_POST['tipo'];

    $stmt = $conn->prepare("INSERT INTO estoque (nome, disponibilidade, quantidade, validade, tipo) VALUES (:nome, :disponibilidade, :quantidade, :validade, :tipo)");
    $stmt->execute([
        'nome'            => $nome,
        'disponibilidade' => $disponibilidade,
        'quantidade'      => $quantidade,
        'validade'        => $validade,
        'tipo'            => $tipo
    ]);
}

if ($action == 'update') {
    $id              = $_POST['id'];
    $nome            = $_POST['nome'];
    $disponibilidade = $_POST['disponibilidade'];
    $quantidade      = $_POST['quantidade'];
    $validade        = $_POST['validade'];
    $tipo            = $_POST['tipo'];

    $stmt = $conn->prepare("UPDATE estoque SET nome = :nome, disponibilidade = :disponibilidade, quantidade = :quantidade, validade = :validade, tipo = :tipo WHERE id = :id");
    $stmt->execute([
        'nome'            => $nome,
        'disponibilidade' => $disponibilidade,
        'quantidade'      => $quantidade,
        'validade'        => $validade,
        'tipo'            => $tipo,
        'id'              => $id
    ]);
}

$stmt = $conn->prepare('SELECT * FROM estoque LIMIT 1');
$stmt->execute();

$estoque = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $conn->prepare('SELECT * FROM estoque');
$stmt->execute();

$estoques = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="/demoday/assets/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <title>Dashboard</title>
</head>

<body>
    <div class="container">
        <div class="left">
            <div class="navigation">
                <h1>Easy</h1>
                <ul>
                    <li>
                        <a href="#painel" class="page-link">
                            <span class="icon"><i class="fas fa-home"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="#mensagens" class="page-link">
                            <span class="icon"><i class="fas fa-database"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="#customizar" class="page-link">
                            <span class="icon"><i class="fas fa-lightbulb"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="#sair" class="page-link">
                            <span class="icon"><i class="fas fa-comment-dots"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="#senhas" class="page-link">
                            <span class="icon"><i class="fas fa-book"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="#ajuda" class="page-link">
                            <span class="icon"><i class="fas fa-dollar-sign"></i></span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="config">
                <a href="#config" class="page-link">
                    <span class="icon"><i class="fas fa-cog"></i></span>
                </a>
            </div>
        </div>

        <div class="right">

            <div class="topbar">
                <i class="fas fa-bars menu"></i>

                <input type="text" placeholder="Pesquisar">

                <div class="icons">
                    <i class="fas fa-bell not"></i>
                    <i class="fas fa-user"></i>
                </div>
            </div>

            <section class="page active" id="painel">
                <div class="cards">
                    <div class="card">
                        <div class="lados">
                            <div class="valores">
                                <h1>1,504</h1>
                                <p>Estoque</p>
                            </div>

                            <div class="icon">
                                <ion-icon name="eye-outline"></ion-icon>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="lados">
                            <div class="valores">
                                <h1>80</h1>
                                <p>Vendas</p>
                            </div>

                            <div class="icon">
                                <ion-icon name="cart-outline"></ion-icon>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="lados">
                            <div class="valores">
                                <h1>R$1.284</h1>
                                <p>Lucro</p>
                            </div>

                            <div class="icon">
                                <ion-icon name="trending-up-outline"></ion-icon>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="lados">
                            <div class="valores">
                                <h1>R$7.842</h1>
                                <p>Ganhos</p>
                            </div>

                            <div class="icon">
                                <ion-icon name="cash-outline"></ion-icon>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="graficos">
                    <div class="grafico1">
                        <div class="sla">
                            <canvas id="graficoPie"></canvas>
                        </div>
                    </div>

                    <div class="grafico2">
                        <div class="sla sla2">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>

            </section>

            <section class="page" id="customizar">
                <h1>Easy</h1>

                <div class="slaa">
                    <div class="dicas">

                        <h3>
                            Por que o plano de abertura é importante para minha empresa?
                        </h3>
                        <p>
                            É importante tanto para quem está abrindo o negócio quanto 
                            para quem está ampliando o empreendimento. 
                            Organiza as ideias ao iniciar um novo empreendimento.
                            Orienta a expansão de empresas já em atividade.
                            Facilita a comunicação entre sócios, funcionários, clientes,
                            investidores, fornecedores e parceiros.
                        </p>

                        <h3>Como obter um bom plano de abertura?</h3>
                        <p>
                            .Analisar o mercado é uma das etapas 
                            para a elaboração do plano de abertura.<br>

                            .Saber quem são seus clientes, concorrentes e fornecedores, 
                            além de detalhar quais são os produtos ou serviços que vai oferecer
                        </p>

                        <h3>Produto ou serviços?</h3>
                        <p>
                            .Trazer informações detalhadas sobre quem é seu público - alvo, 
                            onde ele se encontra, se ele é pessoa física ou jurídica, 
                            como ele se comporta e o que ele busca no mercado.<br>

                            .Trazer qualidade e custo-benefício, obter um preço diferencial 
                            é importante e trará clientes.

                        </p>

                        <h3>Plano Operacional e financeiro.</h3>

                        <p>
                            .O plano operacional descreve como a empresa está estruturada:
                            localização, instalações físicas e equipamentos.<br>

                            .No plano financeiro, o empreendedor terá noção do quanto deve investir para concretizar a empresa. 
                            O documento deve conter, basicamente, as estimativas de custos iniciais, de despesas e receitas, 
                            capital de giro e fluxo de caixa e de lucros.
                        </p>
                    </div>

                    <div class="fotinha">
                        <img src="http://localhost/demoday/assets/dicas.png" alt="">
                    </div>
                </div>

                <!-- <form action="" method="POST">
                    <legend>Cadastro</legend>

                    <label for="">Nome</label>
                    <input type="text" name="nome" value="<?= $estoque['nome'] ?? '' ?>">

                    <label for="">disponibilidade</label>
                    <input type="text" name="disponibilidade" value="<?= $estoque['disponibilidade'] ?? '' ?>">

                    <label for="">quantidade</label>
                    <input type="number" name="quantidade" value="<?= $estoque['quantidade'] ?? '' ?>">

                    <label for="">Validade</label>
                    <input type="date" name="validade" value="<?= $estoque['validade'] ?? '' ?>">

                    <label for="">Tipo</label>
                    <input type="text" name="tipo" value="<?= $estoque['tipo'] ?? '' ?>">

                    <input type="hidden" name="action" value="<?= isset($estoque['id']) ? 'update' : 'add' ?>">

                    <input type="hidden" name="id" value="<?= $estoque['id'] ?? 0 ?>">

                    <button><?= isset($estoque['id']) ? 'Atualizar' : 'Adicionar' ?></button>
                </form> -->
            </section>

            <section class="page" id="mensagens">

                <div class="crud">
                    <div class="crudCadastro">
                        <form action="" method="POST">
                            <legend>Cadastrar produto</legend>

                            <!-- <label for="">Nome</label> -->
                            <input type="text" placeholder="Nome" name="nome">

                            <!-- <label for="">disponibilidade</label> -->
                            <input type="text" placeholder="Disponibilidade" name="disponibilidade"">

                            <!-- <label for="">quantidade</label> -->
                            <input type=" number" placeholder="Quantidade" name="quantidade">

                            <!-- <label for="">Validade</label> -->
                            <input type="date" placeholder="Validade" name="validade">

                            <!-- <label for="">Tipo</label> -->
                            <input type="text" placeholder="Tipo" name="tipo">

                            <input type="hidden" name="action">

                            <input type="hidden" name="id">

                            <button><?= isset($estoque['id']) ? 'Atualizar' : 'Adicionar' ?></button>
                        </form>
                    </div>

                    <div class="crudd">
                        <table class="table table-alternate">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Disponibilidade</th>
                                    <th>Quantidade</th>
                                    <th>Validade</th>
                                    <th>Tipo</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($estoques as $estoque) { ?>
                                    <tr>
                                        <td><?= $estoque['id'] ?? '' ?></td>
                                        <td><?= $estoque['nome'] ?? '' ?></td>
                                        <td><?= $estoque['disponibilidade'] ?? '' ?></td>
                                        <td><?= $estoque['quantidade'] ?? '' ?></td>
                                        <td><?= $estoque['validade'] ?? '' ?></td>
                                        <td><?= $estoque['nome'] ?? '' ?></td>
                                        <td>
                                            <a href="#"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="#"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div>
                </div>

                <div class="storage">
                    <div class="storage1">
                        <h2>Armazenamento</h2>

                        <img src="http://localhost/demoday/assets/progressBar.png" alt="Progress bar">
                        <div class="progress"></div>

                        <div class="espaco">
                            <div class="espacoLivre">
                                <i class="fas fa-circle"></i>
                                Livre 23.54 GB
                            </div>
                            <div class="espacoUsado">
                                <i class="fas fa-circle"></i>
                                Usado 70.22GB
                            </div>
                        </div>
                    </div>

                    <div class="storage2">
                        <img src="http://localhost/demoday/assets/storage.png" alt="">

                        <p>Precisa de mais espaço? Faça um upgrade.</p>

                        <button>Atualizar</button>
                    </div>
                </div>

            </section>

            <section class="page" id="ajuda">
                <div class="payment">
                    <h1>Escolher plano</h1>

                    <div class="nomePlano">
                        <h2>Plano básico</h2>

                        <p>R$0,00</p>
                    </div>

                    <div class="total">
                        <div class="subtotal bor">
                            <h2>Subtotal:</h2>

                            <p>RS0,00</p>
                        </div>

                        <div class="subtotal">
                            <h2>Total:</h2>

                            <p>RS0,00</p>
                        </div>
                    </div>

                    <div class="metodoPagamento">
                        <h2>Método de pagamento:</h2>

                        <p>Mastercard <a href="#">(escolher)</a></p>

                        <p>R$0,00</p>
                    </div>

                    <div class="termos">
                        <input type="checkbox" name="" id="">
                        <label for="">
                            Eu concordo com os termos de uso do <a href="#">acordo de assinante do easy</a> (última atualização 08 Dez, 2021.) <br>
                            Mastercard (Nacional) as transações são autorizadas por meio do site BoaCompra.<br>
                            Clique no botão abaixo para abrir um novo navegador da web para iniciar a transação.

                        </label>
                    </div>

                    <button>Continuar compra</button>
                </div>

                <!-- <div class="planos">
                    <div class="plano1">
                        <h3>Plano básico</h3>

                        <p>R$0,00</p>

                        <p>alguma coisa</p>
                    </div>

                    <div class="plano2">
                        <h3>Plano básico</h3>

                        <p>R$0,00</p>

                        <p>alguma coisa</p>
                    </div>

                    <div class="plano3">
                        <h3>Plano básico</h3>

                        <p>R$0,00</p>

                        <p>alguma coisa</p>
                    </div>
                </div> -->
            </section>

            <section class="page" id="config">
                <form action="">
                    <h1>Conta</h1>

                    <div class="photo">
                        <img src="http://localhost/demoday/assets/user.png" alt="">

                        <button class="enviar">Enviar</button>

                        <button class="remover">Remover</button>
                    </div>

                    <div class="nome borda">
                        <div class="nome1">
                            <label for="Nome">Nome</label>
                            <input type="text" name="" id="">
                        </div>

                        <div class="nome2">
                            <label for="Nome">Sobrenome</label>
                            <input type="text" name="" id="">
                        </div>
                    </div>

                    <div class="contatos borda">
                        <div class="email">
                            <label for="Nome">Endereço de email</label>
                            <input type="email" name="" id="">
                        </div>

                        <div class="numero">
                            <label for="Nome">Número de celular</label>
                            <input type="text" name="" id="">
                        </div>
                    </div>

                    <div class="senha borda">
                        <div class="senha1">
                            <label for="Nome">Senha</label>
                            <input type="password" name="" id="">
                        </div>

                        <div class="senha2">
                            <label for="Nome">Repetir senha</label>
                            <input type="password" name="" id="">
                        </div>
                    </div>

                    <div class="delete borda">
                        <div class="del">
                            <h2>Deletar conta</h2>
                            <p>
                                Ao deletar sua conta você perderá todos os seus dados.
                            </p>
                        </div>

                        <a href="#">Deletar conta</a>
                    </div>

                    <button class="save">Salvar mudanças</button>
                </form>

                <img class="con" src="http://localhost/demoday/assets/config.png" alt="" srcset="">
            </section>

            <section class="page" id="senhas">
                <h1>Cursos</h1>

                <div class="cursos">
                    <div class="curso pago">
                        <span>Premium</span>
                        <img src="http://localhost/easyContability/assets/calc.png" alt="">

                        <h3>Financeiro [7 Horas]</h3>
                        <p>Saiba o essencial de finanças para pequenas e médias empresas e como fazer gestão financeira efetiva.</p>
                        <div class="btn">
                            <button>Começar</button>
                        </div>
                    </div>

                    <div class="curso gratuito">
                        <span>Gratuito</span>
                        <img src="http://localhost/easyContability/assets/pencil.png" alt="">

                        <h3>Controle de gastos <br> [5 Horas]</h3>
                        <p>Aprenda a criar um plano de controle de gastos e tenha noções básicas de contabilidade.</p>
                        <div class="btn">
                            <button>Começar</button>
                        </div>
                    </div>

                    <div class="curso gratuito">
                        <span>Gratuito</span>
                        <img src="http://localhost/easyContability/assets/ideiaa.png" alt="">

                        <h3>Gestão de estoque <br> [5.5 Horas]</h3>
                        <p>Tenha controle de estoque e gestão de ordens e serviços em geral. <br></p>
                        <div class="btn">
                            <button>Começar</button>
                        </div>
                    </div>

                    <div class="curso gratuito">
                        <span>Gratuito</span>
                        <img src="http://localhost/easyContability/assets/c.png" alt="">

                        <h3>Plano de negócios <br> [2 Horas]</h3>
                        <p>Obtenha um bom plano de negócio analisando o mercado e seu público alvo. <br></p>
                        <div class="btn">
                            <button>Começar</button>
                        </div>
                    </div>
                </div>
            </section>

            <section class="page" id="sair">

                <div class="container2">
                    <div class="messaging">
                        <div class="inbox_msg">
                            <div class="inbox_people">
                                <div class="headind_srch">
                                    <div class="recent_heading">
                                        <h4>Recente</h4>
                                    </div>
                                    <div class="srch_bar">
                                        <div class="stylish-input-group">
                                            <input type="text" class="search-bar" placeholder="Procurar">
                                            <span class="input-group-addon">
                                                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="inbox_chat">
                                    
                                    <div class="chat_list andre">
                                        <div class="chat_people">
                                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                            <div class="chat_ib">
                                                <h5>André Bittencourt <span class="chat_date">Mar 12</span></h5>
                                                <p>Especialista em finanças</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat_list">
                                        <div class="chat_people">
                                            <div class="chat_img"> <img src="http://localhost/easyContability/assets/a.png" alt="sunil"> </div>
                                            <div class="chat_ib">
                                                <h5>Bruno Castro<span class="chat_date">Out 7</span></h5>
                                                <p>Contador</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat_list">
                                        <div class="chat_people">
                                            <div class="chat_img"> <img src="http://localhost/easyContability/assets/b.png" alt="sunil"> </div>
                                            <div class="chat_ib">
                                                <h5>Wellington Silva<span class="chat_date">Dez 25</span></h5>
                                                <p>Planejamento e gestão de estoque</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mesgs">
                                <div class="msg_history">
                                    <div class="incoming_msg">
                                        <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                        <div class="received_msg">
                                            <div class="received_withd_msg">
                                                <p>Olá, me chamo André, sou especialista em finanças e estou aqui para sanar suas dúvidas. Em que posso te ajudar?</p>
                                                <span class="time_date"> 11:01 AM | Junho 9</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="outgoing_msg">
                                        <div class="sent_msg">
                                            <p>Bom dia André, então gostaria de tirar algumas dúvidas com você sobre meu comércio</p>
                                            <span class="time_date"> 11:01 AM | Junho 9</span>
                                        </div>
                                    </div>
                                    <div class="incoming_msg">
                                        <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                        <div class="received_msg">
                                            <div class="received_withd_msg">
                                                <p>Tudo bem, e quais seriam?</p>
                                                <span class="time_date"> 11:01 AM | Ontem</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="outgoing_msg">
                                        <div class="sent_msg">
                                            <p>Então gostaria de ter certeza de garantir um futuro rentábil ao investir meu capital no meu comércio, mas tenho remorso sobre</p>
                                            <span class="time_date"> 11:01 AM | Hoje</span>
                                        </div>
                                    </div>
                                    <div class="incoming_msg">
                                        <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                        <div class="received_msg">
                                            <div class="received_withd_msg">
                                                <p>Por favor, me informe como pretende iniciar o investimento em seu comércio para darmos continuidade.</p>
                                                <span class="time_date"> 11:01 AM | Hoje</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="type_msg">
                                    <div class="input_msg_write">
                                        <input type="text" class="write_msg" placeholder="Digite uma mensagem" />
                                        <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>







            </section>
        </div>


        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js"></script>
        <script src="script.js"></script>
        <script src="my_chart.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>

<!-- <i class="fas fa-stream"></i> -->
<!-- <i class="fas fa-bell"></i> -->
<!-- <i class="fas fa-user"></i> -->
<!-- <i class="fas fa-cog"></i> -->