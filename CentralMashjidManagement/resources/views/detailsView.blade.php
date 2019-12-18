<?php 
	$m_id = 0;
	if(isset($_GET["m_id"]))
	{
		$m_id = $_GET["m_id"];
	}

	$rs = DB::select("SELECT NAME, ADDRESS, AREA, CITY_NAME, DIVISION, ESTD FROM (SELECT * FROM MASJID) AS X, (SELECT * FROM CITY) AS Y WHERE X.CITY_ID = Y.CITY_ID AND M_ID = ".$m_id.";");

	$name = $rs[0]->NAME;
	$address = $rs[0]->ADDRESS;
	$area = $rs[0]->AREA;
	$c_name = $rs[0]->CITY_NAME;
	$div = $rs[0]->DIVISION;
	$estd = $rs[0]->ESTD;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Details</title>

	<style type="text/css">
		body {
			text-align: center;
		}

		h1 {
			color: white;
			background-color: purple;
		}

		h2 {
			margin-top: 20px;
			padding-left: 15px;
			color: white;
			background-color: orange;
		}

		.container {
			margin-left: 20px;
			margin-top: 20px;
		}

		.ele {
			margin: 10px;
			font-size: 20px;
		}
	</style>
</head>
<body>
	<h1> Masjid Details </h1>

	<h2> Basic info</h2>
	<div class="container">
		<div class="ele"> <b> Name : </b> <?php echo $name ;?> </div>
		<div class="ele"> <b> Address : </b> <?php echo $address ;?> </div>
		<div class="ele"> <b> City : </b> <?php echo $c_name;?> </div>
		<div class="ele"> <b> Division : </b> <?php echo $div ;?> </div>
		<div class="ele"> <b> Area covered : </b> <?php echo $area ;?> </div>
		<div class="ele"> <b> ESTD : </b> <?php echo $estd ;?> </div>
	</div>

	<h2> Lead Persons </h2>
	<div class="container">

		<?php

			$rs = DB::select("SELECT NAME, PHONE_NUM, DESIGNATION_NAME AS D_NAME FROM (SELECT * FROM IMAM_MUAJJIN WHERE M_ID = ".$m_id.") AS X, (SELECT * FROM DESIGNATION_SET) AS Y WHERE X.DESIGNATION_ID = Y.DESIGNATION_ID; ");

			if(sizeof($rs) == 0)
			{
				echo "<div class='ele'> <b> No Records found !! </b> </div>";
			}
			else
			{
				$i = 1;
				foreach ($rs as $value) {
					echo $i.".<br> <br>";
					$i = $i+1;

					echo "<div class='ele'> <b> Name : </b> ".$value->NAME." </div>
						<div class='ele'> <b> Phone Number : </b> ".$value->PHONE_NUM." </div>
						<div class='ele'> <b> Designation : </b> ".$value->D_NAME." </div> <br> <br>";
				}
			}

		?>

		
	</div>

	<h2> Masjid Comitte </h2>
	<div class="container">

		<?php

			$rs = DB::select("SELECT NAME, PHONE_NUM, DESIGNATION_NAME AS D_NAME FROM (SELECT * FROM MASHJID_COMITTE WHERE M_ID = ".$m_id.") AS X, (SELECT * FROM DESIGNATION_SET) AS Y WHERE X.DESIGNATION_ID = Y.DESIGNATION_ID; ");

			if(sizeof($rs) == 0)
			{
				echo "<div class='ele'> <b> No Records found !! </b> </div>";
			}
			else
			{
				$i = 1;
				foreach ($rs as $value) {
					echo $i.".<br> <br>";
					$i = $i+1;

					echo "<div class='ele'> <b> Name : </b> ".$value->NAME." </div>
						<div class='ele'> <b> Phone Number : </b> ".$value->PHONE_NUM." </div>
						<div class='ele'> <b> Designation : </b> ".$value->D_NAME." </div> <br> <br>";
				}
			}

		?>

		
	</div>

	<h2> Masjid Equipments </h2>
	<div class="container">

		<?php

			$rs = DB::select("SELECT NAME, COUNT FROM (SELECT * FROM EQUIPMENT WHERE M_ID = ".$m_id.") AS X, (SELECT * FROM EQUIPMENT_SET) AS Y WHERE X.ITEM_ID = Y.ITEM_ID ;");

			if(sizeof($rs) == 0)
			{
				echo "<div class='ele'> <b> No Records found !! </b> </div>";
			}
			else
			{
				$i = 1;
				foreach ($rs as $value) {
					echo "<div class='ele'>".$i.". <b> ".$value->NAME." : </b> ".$value->COUNT." </div>";
					$i = $i+1;
				}
			}

		?>

		
	</div>

	<h2> Masjid Expendature </h2>
	<div class="container">

		<?php

			$rs = DB::select("SELECT YEAR, AMOUNT FROM `EXPENDATURE` WHERE M_ID = ".$m_id.";");

			if(sizeof($rs) == 0)
			{
				echo "<div class='ele'> <b> No Records found !! </b> </div>";
			}
			else
			{
				$i = 1;
				foreach ($rs as $value) {
					echo "<div class='ele'>".$i.". <b> ".$value->YEAR." : </b> ".$value->AMOUNT." </div>";
					$i = $i+1;
				}
			}

		?>

		
	</div>

</body>
</html>