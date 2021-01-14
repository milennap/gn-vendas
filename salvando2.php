	        <?php

		    $nomecomprador=$_GET["nomecomprador"];
		    $cpf=$_GET["cpf"];
		    $telefone=$_GET["telefone"];
		    $conexao=mysqli_connect("localhost", "root","");
		    mysqli_select_db("vendas", $conexao);
		    mysqli_query("insert into compras (nomecomprador, cpf, telefone) values('$nomecomprador', '$cpf', '$telefone')", $conexao);
		    echo "Dados salvos";

		?>
