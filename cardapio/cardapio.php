<?php
require_once("..\_connect.php");
session_start();
$numero_mesa = $_SESSION['mesa']['numero'];
$status_mesa = $_SESSION['mesa']['status'];
?>

<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="content-type" content="charset=utf8"/>
</head>

<body>

  <script src="jquery-1.10.2.js"></script>
  <script src="jquery-ui.js"></script>
  <link rel="stylesheet" href="jquery-ui.css"/>
  
  <script>
  $(document).ready(function(){
    $("#nome_mesa").tabs();
    $( "#tabs" ).tabs();
    $( ".spinner" ).spinner();
    $(".spinner").width(66);
    $("#pedidos").tabs();
  });  
  </script>

<?php
if ($status_mesa == "livre") {
  $bgMesa =  "green";
}
elseif ($status_mesa == "ocupada") {
  $bgMesa = "red";
}
?>

<DIV id="nome_mesa">
  <ul style="background-color: <?php echo $bgMesa; ?>;">
    <li><a href="#tabs-1">Mesa: <?php  echo $numero_mesa; ?></a></li>
  </ul>
</DIV>
   

<div id="tabs">

  <ul>

    <?php
    //LISTA SOMENTE AS CATEGORIAS
    $rs_categoria = $pdo->query("SELECT * FROM categoria");
    $idcategoria = 0;
    foreach ($rs_categoria as $registro_categoria) {
      ++$idcategoria;      
    ?>
    <li><a href="#tabs-<?php echo $idcategoria ?>"><?php echo $registro_categoria['nome']; ?></a></li>
    <?php 
    }
    ?>
  </ul>

  <?php 
  //LISTA ITEMS DE CADA CATEGORIA
  $rs_categoria = $pdo->query("SELECT * FROM categoria");
  $idcategoria = 0;
  foreach ($rs_categoria as $registro_categoria) {
    ++$idcategoria; 
  //}     
  
  ?>  

  <div id="tabs-<?php echo $idcategoria; ?>">
    <table>
      <tr>
        <td></td>
        <td>Nome</td>
        <td>Descricao</td>
        <td>Preço</td>
        <td>Quantidade</td>               
      </tr>
<form method="POST" action="encaminhar.php">
      <?php
      $rs_item = $pdo->query("SELECT * FROM item WHERE idcategoria=$idcategoria");      
      foreach ($rs_item as $registro_item) {        
        //}
      ?>
      
      <tr class="item_cardapio">
        <td><input type="checkbox"></td>
        <form method="POST" action="encaminhar.php">
        <td id="<?php echo $registro_item['nome'].'_'.$idcategoria; ?>" name="<?php echo $registro_item['nome'].'_'.$idcategoria; ?>"><?php echo $registro_item['nome']; ?></td>
        <td id="<?php echo $registro_item['descricao'].'_'.$idcategoria; ?>" name="<?php echo $registro_item['descricao'].'_'.$idcategoria; ?>"><?php echo $registro_item['descricao']; ?></td>
        <td id="<?php echo $registro_item['preco'].'_'.$idcategoria; ?>" name="<?php echo $registro_item['preco'].'_'.$idcategoria; ?>"><?php echo $registro_item['preco']; ?></td>
        <td id="qtd" name="qtd"><input class="spinner" name="qtd"></td>
        <input type="hidden" name="numero_mesa" value="<?php  echo $numero_mesa; ?>">

      </tr>
      <?php 
      }
      ?>
        <input type="submit" value="Fazer pedido">
        </form>

    </table>    
  </div>
  <?php 
  }
  ?>

</div>


<style type="text/css">
tr.item_cardapio td {
  border-bottom: 3px solid black;
  border-right: 3px solid black;
}

#qtd{
  width: 10%;
}
</style>



<DIV id="pedidos">
  <ul style="background-color: <?php echo $bgMesa; ?>;">
    <li><a href="#tabs-1">Pedidos Mesa: <?php  echo $numero_mesa; ?></a></li>
  </ul>
</DIV>

 
 
</body>
</html>