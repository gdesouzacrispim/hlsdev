<?php

require_once 'conect.php';
//SESSÃO
session_start();

if(isset($_POST['abrir_livro'])){

//VERIFICAR
if(!isset($_SESSION['logado'])):
    header('Location: /hls/components/login/login.php');
endif;

//DADOS
$id = $_SESSION['id_usuario'];
$id_item = $_POST['cod-item'];
 
$sql = "SELECT * FROM inventario JOIN itens ON itens.id_item = '$id_item' AND inventario.myId= '$id' AND inventario.id_item = '$id_item'";
$resultado = mysqli_query($conn, $sql);
$dados = mysqli_fetch_array($resultado);
$nomelivro = $dados['nome_item'];
$link_livro = $dados['link_item'];
} else {
    header('Location: bag.php');
}
?>

<html>
 <head>
  <title><?php echo $nomelivro?></title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/hls/css/inventario.css" media="screen" />
 </head>
 <body>
 <!-- $link_livro - Variável php. É o src, ele vem do banco. -->
 <iframe id="bookUni" src="<?php echo $link_livro?>" width="100%" height="100%"></iframe>

<script>

</script>

 </body>