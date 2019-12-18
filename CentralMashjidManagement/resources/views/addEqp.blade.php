<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>New Entry</title>

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
    	<h1> New Equipment </h1>

    	<hr>
        <form name="form" action="" method="get">

            <table>
                <tr>
                    <td colspan="2">
                        <select name="it_sel">
                            <?php 
                                $rows = DB::select("SELECT ITEM_ID, NAME FROM EQUIPMENT_SET;"); 

                                $i=0;

                                while ($i < sizeof($rows)) {
                                    echo '<option value="'.$rows[$i]->ITEM_ID.'">'.$rows[$i]->NAME.'</option>';
                                    $i = $i+1;
                                }
                            ?>
                        </select>
                    </td>
                    <td>
                        <input type="number" name="num_eqp" placeholder="Give how much">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" id="submit" value="ADD">
                    </td>
                    <td colspan="2">
                        <input type="submit" name="cancel" id="cancel" value="CANCEL">
                    </td>
                </tr>
            </table>
        </form>

        <?php
            $it_sel = (isset($_GET['it_sel']) ? $_GET['it_sel'] : null);

            if(isset($_GET['submit'])){

                DB::select("CALL GET_M_ID(@M_ID_REQ);");
                $rs2 = DB::select("SELECT @M_ID_REQ AS M_ID_REQ");

                DB::insert("INSERT INTO EQUIPMENT (M_ID, ITEM_ID, COUNT) VALUES (".$rs2[0]->M_ID_REQ.",".$it_sel.",".$_GET['num_eqp'].")");

            }

            if(isset($_GET['cancel'])){

                header('Location: http://localhost:8000/homepage');
                exit;
            }

        ?>
    </body>
</html>
