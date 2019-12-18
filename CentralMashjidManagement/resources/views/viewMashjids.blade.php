<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>All Majsid</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            table {
			  font-family: arial, sans-serif;
			  border-collapse: collapse;
			  width: 100%;
			}

			td, th {
			  border: 1px solid #dddddd;
			  text-align: left;
			  padding: 8px;
			}

			tr:nth-child(even) {
			  background-color: #dddddd;
			}

            a {
                text-decoration: none;
                color: green;
                font-size: 20px;
            }

            a:hover {
                color: lightgreen;
            }
            
        </style>
    </head>

    <body>
    	<h1> The List of All Mashjids </h1>

    	<hr>

    	<table>
    		<tr>
	    		<th>Mashjid ID</th>
	    		<th>Name</th>
	    		<th>Address</th>
	    		<th>Equipment</th>
                <th>Total Expendature</th>
                <th>Details</th>
	    	</tr>

	    		<?php
	    			$rows = DB::select("SELECT m.M_ID as M_ID, NAME, ADDRESS, EQUIPMENTS FROM MASJID as m left join (select sum(count) as EQUIPMENTS, m_id from equipment GROUP by m_id) as dum on m.m_id = dum.m_id;");

    				$i=0;
    				while ($i<sizeof($rows)) {
    					$row = $rows[$i];

    					$total = DB::select("SELECT GET_TOTAL(".$row->M_ID.") AS TOTAL");

    					echo "<tr> <td>".$row->M_ID."</td> <td>".$row->NAME."</td> <td>".$row->ADDRESS."</td> <td> ".$row->EQUIPMENTS." </td> <td> ".$total[0]->TOTAL." </td> <td> <a href='/detailsView?m_id=".$row->M_ID."'>Click me</a> </td> </tr>";
    					$i=$i+1;
    				}

	    		?>

    	</table>

    </body>

    </html>