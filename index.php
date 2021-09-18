<?php error_reporting(E_ALL ^ E_NOTICE); ?>

<?php session_start();  ?>

<?php 
include("./gerenciamento/config.php");
?>

<?php
$secao_usuario = $_SESSION['usuario'];
$secao_senha   = $_SESSION['senha'];
?>

<!doctype html>

<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">

<title>PROJETO 1</title>
<link rel="shortcut icon" href="favicon.png" type="image/x-png"?>
<style>

		@media only screen and (max-width: 1800px) { body { background-repeat: no-repeat; background-color:black; zoom: 0.67; } }

		 body { background-repeat: no-repeat; background-color:#F1F2F2; }
         *{ margin: 0; padding: 0px; }

		#jb_2 { width:100%; height:86px; padding: 0px; top:0; left:0; font-family: "roboto-light",Arial,sans-serif; background-color:#031E2A; position: fixed; z-index:5; }

		#divConteudo_1 { font-family: "roboto-light",Arial,sans-serif; background-color:#gray;  }

		table { border-collapse: collapse; border: 1px solid #666; }
			#title { background: #5894A8; border-top: 1px solid #a5a5a5; border-bottom: 1px solid #a5a5a5; text-align: center; height: 40;  }
				tr:nth-child(even) { background-color: #E4E4E4; }
					th { font-weight: normal; text-align: left; }
						th, td { padding: 0.1em 1em; }

		::-webkit-scrollbar { width: 10px; }

		::-webkit-scrollbar-track { background: #f1f1f1; }
 
		::-webkit-scrollbar-thumb { background: #888; }

		::-webkit-scrollbar-thumb:hover { background: #555; }

</style>

</head>

<body>

			<div class="jumbotron" id="jb_2">
				<br><br>
				<center><font size=4 color=white id="font_jb_2" name="font_jb_2">PROJETO 1</font></center>
			</div>

			<center><div id="divConteudo_1">	
			
					<center><table>
							<?php 
							$sql = mysql_query("SELECT * FROM produto");
							while($linha =@mysql_fetch_array($sql)){
							$id = $linha['id'];
							$produto = $linha['produto'];
							$valor = $linha['valor'];
							$cadastro = $linha['cadastro'];
							?>
					  <tr>
						<td><center><?php echo $produto ?></center></td>
						<td><center><?php echo $valor ?></center></td>
						<td><center><?php echo $cadastro ?></center></td>
					  </tr>
							<?php } ?>	
					</table></center>
			<div></center>

			<center><div id="divConteudo_1">	
			
					<center><table>
							<?php 
							$sql = mysql_query("SELECT * FROM produto_descricao");
							while($linha =@mysql_fetch_array($sql)){
							$id = $linha['id'];
							$produto = $linha['produto'];
							$descricao = $linha['descricao'];
							?>
					  <tr>
						<td><center><?php echo $produto ?></center></td>
						<td><center><?php echo $descricao ?></center></td>
					  </tr>
							<?php } ?>	
					</table></center>
			<div></center>

			<center><div id="divConteudo_1">	
			
					<center><table>
							<?php 
							$sql = mysql_query("SELECT * FROM produto_imagens");
							while($linha =@mysql_fetch_array($sql)){
							$id = $linha['id'];
							$produto = $linha['produto'];
							$id_imagem = $linha['id_imagem'];
							?>
					  <tr>
						<td><center><?php echo $produto ?></center></td>
						<td><center><img src='fotos/<?php echo$id_imagem ?>' id="imagem_produto"></center></td>
					  </tr>
							<?php } ?>	
					</table></center>
			<div></center>

			<center><div id="divConteudo_1">	
			
					<center><table>
							<?php 
							$sql = mysql_query("SELECT * FROM produto_preco_especial");
							while($linha =@mysql_fetch_array($sql)){
							$id = $linha['id'];
							$produto = $linha['produto'];
							$valor = $linha['valor'];
							$valor_especial = $linha['valor_especial'];
							$data_especial = $linha['data_especial'];
							?>
					  <tr>
						<td><center><?php echo $produto ?></center></td>
						<td><center><?php echo $valor ?></center></td>
						<td><center><?php echo $valor_especial ?></center></td>
						<td><center><?php echo $data_especial ?></center></td>
					  </tr>
							<?php } ?>	
					</table></center>
			<div></center>

			<center><div id="divConteudo_1">	
			
					<center><table>
							<?php 
							$sql = mysql_query("SELECT * FROM categoria");
							while($linha =@mysql_fetch_array($sql)){
							$id = $linha['id'];
							$categoria_primaria = $linha['categoria_primaria'];
							$categoria_secundaria = $linha['categoria_secundaria'];
							$descricao = $linha['descricao'];
							?>
					  <tr>
						<td><center><?php echo $categoria_primaria ?></center></td>
						<td><center><?php echo $categoria_secundaria ?></center></td>
						<td><center><?php echo $descricao ?></center></td>
					  </tr>
							<?php } ?>	
					</table></center>
			<div></center>

			<center><div id="divConteudo_1">	
			
					<center><table>
							<?php 
							$sql = mysql_query("SELECT * FROM categoria_produto");
							while($linha =@mysql_fetch_array($sql)){
							$id = $linha['id'];
							$produto = $linha['produto'];
							$categoria_primaria = $linha['categoria_primaria'];
							$categoria_secundaria = $linha['categoria_secundaria'];
							$descricao = $linha['descricao'];
							?>
					  <tr>
						<td><center><?php echo $produto ?></center></td>
						<td><center><?php echo $categoria_primaria ?></center></td>
						<td><center><?php echo $categoria_secundaria ?></center></td>
						<td><center><?php echo $descricao ?></center></td>
					  </tr>
							<?php } ?>	
					</table></center>
			<div></center>

<?php

//situações mysql de relação possiveis

mysql_query("SELECT produto.*, produto_imagens.* FROM produto left join produto_imagens ON produto.produto = produto_imagens.produto");
mysql_query("SELECT produto.*, produto_preco_especial.* FROM produto left join produto_descricao ON produto.produto = produto_descricao.produto");
mysql_query("SELECT produto.*, produto_preco_especial.* FROM produto left join produto_preco_especial ON produto.produto = produto_preco_especial.produto");
mysql_query("SELECT produto.*, categoria_produto.* FROM produto left join categoria_produto ON produto.produto = categoria_produto.produto");

?>

</body>

</html>