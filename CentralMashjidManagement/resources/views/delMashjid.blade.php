<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Delete Entry</title>

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
    	<h1> Delete Masjid Data !! </h1>

    	<hr>
        <form name="form" action="" method="get">

            <table>
                <tr>
                    <td colspan="2">
                        <select name="mas_sel">
                            <?php 
                                $rows = DB::select("SELECT M_ID, NAME FROM MASJID;"); 

                                $i=0;

                                while ($i < sizeof($rows)) {
                                    echo '<option value="'.$rows[$i]->M_ID.'">'.$rows[$i]->NAME.'</option>';
                                    $i = $i+1;
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="confirm" id="confirm" onchange="document.getElementById('delete').disabled = !this.checked;"> I am sure!!
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="delete" id="delete" disabled="true" value="DELETE">
                    </td>
                    <td colspan="2">
                        <input type="submit" name="cancel" id="cancel" value="CANCEL">
                    </td>
                </tr>
            </table>
        </form>

        <?php
            $mas_sel = (isset($_GET['mas_sel']) ? $_GET['mas_sel'] : null);

            if(isset($_GET['delete'])){

                DB::insert("DELETE FROM MASJID WHERE M_ID = ".$mas_sel." ;");
                header('Location: http://localhost:8000/homepage');
                exit;

            }

            if(isset($_GET['cancel'])){

                header('Location: http://localhost:8000/homepage');
                exit;
            }

        ?>
    </body>
</html>
