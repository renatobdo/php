<?php
require_once "conexao.php";
// Obter os dados do formulário
$nome = $_POST["nome"];
$tipo = $_POST["tipo"];
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];
//$imagem = "img/".$_POST["imagem"];

if (isset($_FILES["imagem"])) {

    $diretorio_destino = "img/"; // Pasta onde as imagens serão salvas
    $nome_arquivo = basename($_FILES["imagem"]["name"]); // Nome do arquivo enviado
    $caminho_arquivo = $diretorio_destino . $nome_arquivo; // Caminho completo do arquivo no servidor
    $imagem = $caminho_arquivo;
    // Verifica se o arquivo é uma imagem
    $tipo_arquivo = strtolower(pathinfo($caminho_arquivo, PATHINFO_EXTENSION));
    $tipos_permitidos = array("jpg", "jpeg", "png", "gif");

    if (in_array($tipo_arquivo, $tipos_permitidos)) {
        // Tenta mover o arquivo temporário para o destino
        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminho_arquivo)) {

            // Inserir os dados na tabela 'produtos' mesmo quando a imagem não foi cadastrada
            $sql = "INSERT INTO produtos (tipo, nome, descricao, imagem, preco) VALUES 
            ('$tipo', '$nome', '$descricao', '$imagem', '$preco')";

            if ($conn->query($sql) === TRUE) {
                header("Location: cadastrar-produto-sucesso.php");
                exit();
            } else {
                header("Location: cadastrar-produto.php?erro=1");
                exit();
            }
            $conn->close();
        } else {
            echo "Erro ao realizar o upload da imagem.";
        }
    } else {
        echo "Apenas arquivos do tipo JPG, JPEG, PNG e GIF são permitidos.";
    }
} else {
    // Inserir os dados na tabela 'produtos' mesmo quando a imagem não foi cadastrada
    $sql = "INSERT INTO produtos (tipo, nome, descricao, preco) VALUES 
    ('$tipo', '$nome', '$descricao', '$preco')";

    if ($conn->query($sql) === TRUE) {
        header("Location: cadastrar-produto-sucesso.php");
        exit();
    } else {
        header("Location: cadastrar-produto.php?erro=1");
        exit();
    }
    $conn->close();
}
