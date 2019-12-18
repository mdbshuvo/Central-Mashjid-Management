<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>New Expendature</title>

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
    	<h1> Create next year expendature report </h1>

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
                    <td>Amount</td>
                    <td>
                        <input type="text" name="Amount" id="Amount" placeholder="Amount">
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
            $mas_sel = (isset($_GET['mas_sel']) ? $_GET['mas_sel'] : null);

            if(isset($_GET['submit'])){

                $year = DB::select("SELECT GET_YEAR(".$mas_sel.") AS YEAR");    
                $total = DB::select("SELECT GET_TOTAL(".$mas_sel.") AS TOTAL");

                $def = 0;
                $total_amount = 0;

                if(($year[0]->YEAR) == 0)
                {
                    $def_ = DB::select("SELECT YEAR(ESTD) AS YEAR FROM MASJID WHERE M_ID = ".$mas_sel." ;");
                    $def = $def_[0]->YEAR;
                }
                else
                {
                    $def = ($year[0]->YEAR)+1;
                    $total_amount = $total[0]->TOTAL;
                }
                

                DB::insert("INSERT INTO Expendature (M_ID, YEAR, AMOUNT, TOTAL_AMOUNT) VALUES (".$mas_sel.",".$def.",".$_GET['Amount'].",".$total_amount.")");

            }

            if(isset($_GET['cancel'])){


                header('Location: http://localhost:8000/homepage');
                exit;
            }

        ?>
    </body>
</html>
