<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>New Masjid</title>

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

        </style>
    </head>

    <body>
    	<h1> New Mashjids </h1>

    	<hr>
        <form name="form" action="" method="get">

            <table>
                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" name="name" id="name" placeholder="Name">
                    </td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>
                        <input type="text" name="address" id="address" placeholder="Address">
                    </td>
                </tr>
                <tr>
                    <td>Area</td>
                    <td>
                        <input type="text" name="Area" id="Area" placeholder="Area">
                    </td>
                </tr>
                <tr>
                    <td>ESTD</td>
                    <td>
                        <input type="date" name="ESTD" id="ESTD" placeholder="ESTD">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <select name="city_sel">
                            <?php 
                                $rows = DB::select("SELECT CITY_ID, CITY_NAME FROM CITY;"); 

                                $i=0;

                                while ($i < sizeof($rows)) {
                                    echo '<option value="'.$rows[$i]->CITY_ID.'">'.$rows[$i]->CITY_NAME.'</option>';
                                    $i = $i+1;
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" id="submit" value="INSERT">
                    </td>
                </tr>
            </table>
        </form>

        <?php
            $city_sel = (isset($_GET['city_sel']) ? $_GET['city_sel'] : null);

            if(isset($_GET['submit'])){
                DB::insert("INSERT INTO MASJID (NAME, ADDRESS, ESTD, AREA, CITY_ID) VALUES ('".$_GET['name']."','".$_GET['address']."' , '".$_GET['ESTD']."', ".$_GET['Area'].", ".$city_sel.");");

                // var_dump($_GET['name']);

                // $m_id=0;

                header('Location: http://localhost:8000/addEmp');
                exit;
            }
        ?>


    </body>

    </html>