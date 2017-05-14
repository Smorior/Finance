<table id="overview">
		<?php
			print("<tr>");
				print("<th>Symbol</th>");
				print("<th>Name</th>");
				print("<th>Price</th>");
			print("</tr>");
				  
			foreach ($positions as $position)
			{	  
				print("<tr>");
				print("<td>" . $position["symbol"] . "</td>");
				print("<td>" . $position["name"] . "</td>");
				print("<td>" . $position["price"] . "</td>");
				print("</tr>");
			}
		?>
	</table>