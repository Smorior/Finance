<!-- This displays a message with your current balance, and a table with your current shares -->
<div>
	<div id="message">
		This is the history of your transactions.
	</div>
    <table id="overview">
		<?php
			print("<tr>");
				print("<th>Status</th>");
				print("<th>Company name</th>");
				print("<th>Shares</th>");
				print("<th>Price</th>");
				print("<th>Time</th>");
			print("</tr>");
				  
			foreach ($positions as $position)
			{	  
				print("<tr>");
				print("<td>" . $position["status"] . "</td>");
				print("<td>" . $position["symbol"] . "</td>");
				print("<td>" . $position["shares"] . "</td>");
				print("<td>" . $position["price"] . "</td>");
				print("<td>" . $position["tmp"] . "</td>");
				print("</tr>");
			}
		?>
	</table>
</div>