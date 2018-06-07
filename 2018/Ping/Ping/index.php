<html>
	<body>
		<center><h1>Ping Service</h1></center>
		<hr/>
		<form method="POST">
			<label for="ip">Ip: </label>
			<input type="text" name="ip"/>
			<input type="submit" value="submit"/>
		</form>
		<pre>
		<?php
			if(isset($_POST['ip'])){
				$ip = $_POST['ip'];
				if(strlen($ip) <= 15){
					if(preg_match('/[^a-zA-Z0-9\/\?\*\t\n\.]/',$ip)){exit("IP shouldn't contains special characters except dot....");}
					if(preg_match('/cat|tac|nl|more|less|head|tail|od|strings|base64|sort|pg|uniq|rev/',$ip)){exit("You want to use some bad command? :(");}
					@system("ping -c 4 $ip");
					#echo join('<br/>', $output);
				} else {
					echo "Ip too long :(";
				}
			}
		?>
		</pre>
	</body>
</html>