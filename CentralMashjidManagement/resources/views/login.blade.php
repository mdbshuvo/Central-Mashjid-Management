<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>

	<style type="text/css">
		body {
			background-image: url('images/Baitul-Mukarram-3-blur.jpg');
			background-size: cover;
			text-align: center;
		}

		.welcome-head {
			background-color: lightblue;
		}

		.ele {
			background-color: white;
			width: 250px;
			height: 300px;
			border-radius: 10px;
			position: relative;
			top: 0;
			left: 50%;
			transform: translate(-125px, 0);
			opacity: 0.9;
		}

		.hidden {
			background-color: red;
			color: white;
			text-align: center;
			font-size: 20px;
			margin-top: 20px; 
		}
	</style>
</head>
<body>
	<h1 class="welcome-head">Please log in to continue<h1>

	<div class="container">

		<div class="ele">
			
			<form name="form" action="" method="get">
			<div class="sub">
				<b>Username</b><input type="text" name="username" id="username">
			</div>

			<div class="sub">
				<b>Password</b><input type="password" name="password" id="password">
			</div>

			<div class="sub">
				<input type="submit" name="submit" id="submit" value="LOG IN">
			</div>
		</form>

		<?php

            $style = "style='display:none;'";
            
            if(isset($_GET['submit'])){

                $rs2 = DB::select("SELECT PASSWORD FROM ADMIN WHERE USERNAME = '".$_GET['username']."';");

                if(sizeof($rs2) == 0)
                {
                	$style = "style='display:block;'";
                }
                else if($rs2 == $_GET['password'])
                {
                	$style = "style='display:block;'";
                }
                else
                {
                	$style = "style='display:none;'";
                	header('Location: http://localhost:8000/homepage');
                	exit;
                }
            }

        ?>

		<div class="hidden" <?php echo $style ?>>
			The Username or Password didnot match!!
		</div>

		</div>

	</div>

	
</body>
</html>