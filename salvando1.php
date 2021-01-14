
		<?php

		    $produto=$_GET["produto"];
		    $valor=$_GET["valor"];
		    $conexao=mysqli_connect("localhost", "root","");
		    mysqli_select_db("vendas", $conexao);
		    mysqli_query("insert into produtos (produto, valor) values('$produto', '$valor')", $conexao);
		    echo "Dados salvos";
		?>
		
