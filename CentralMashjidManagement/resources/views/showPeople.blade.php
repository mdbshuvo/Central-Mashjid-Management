<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>All People</title>

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
            
        </style>
    </head>

    <body>
    	<h1> The List of All People </h1>

    	<hr>

    	<table>
    		<tr>
	    		<th>Name</th>
	    		<th>Masjid</th>
	    		<th>Designation</th>
                <th>Phone Number</th>
	    	</tr>

	    		<?php
	    			$rows = DB::select("SELECT NAME, M_NAME, DESIGNATION_NAME, PHONE_NUM FROM (SELECT X.NAME AS NAME, Y.NAME AS M_NAME, DESIGNATION_ID, PHONE_NUM FROM (( SELECT M_ID, NAME, DESIGNATION_ID, PHONE_NUM FROM IMAM_MUAJJIN ) UNION ( SELECT M_ID, NAME, DESIGNATION_ID, PHONE_NUM FROM MASHJID_COMITTE )) AS X, (SELECT * FROM MASJID ) AS Y WHERE X.M_ID = Y.M_ID) AS P, ( SELECT * FROM DESIGNATION_SET) AS Q WHERE P.DESIGNATION_ID = Q.DESIGNATION_ID ;");

    				$i=0;
    				while ($i<sizeof($rows)) {
    					$row = $rows[$i];

    					echo "<tr> <td>".$row->NAME."</td> <td>".$row->M_NAME."</td> <td>".$row->DESIGNATION_NAME."</td> <td> ".$row->PHONE_NUM." </td> </tr>";
    					$i=$i+1;
    				}

	    		?>

    	</table>

    </body>

    </html>