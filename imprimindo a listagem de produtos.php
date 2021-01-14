
			<?php
			      echo "<font face="arial" size="16"> <p align="center"> <B> Listagem de produtos </B> </p> </font>";
			      $conexao=mysqli_connect("localhost", "root","");
			      mysqli_select_db("vendas", $conexao);
			      $consulta="select * from produtos";
			      $resultado=mysqli_query($consulta, $conexao);
			      $linha=1;
		              while($linha=mysqli_fetch_row($resultado)){
			      	echo .$linha. "</br>" <form> <button onclick="window.location.href='gerarboleto.php'"> Comprar </button> </form> </br> </br>;
				$linha++;
		 	      }
			      


			?>


