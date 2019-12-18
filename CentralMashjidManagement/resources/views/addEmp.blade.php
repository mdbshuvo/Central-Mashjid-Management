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
    	<h1> New Person </h1>

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
                    <td>Phone</td>
                    <td>
                        <input type="text" name="Phone" id="Phone" placeholder="Phone">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <select name="des_sel">
                            <?php 
                                $rows = DB::select("SELECT DESIGNATION_ID, DESIGNATION_NAME FROM DESIGNATION_SET;"); 

                                $i=0;

                                while ($i < sizeof($rows)) {
                                    echo '<option value="'.$rows[$i]->DESIGNATION_ID.'">'.$rows[$i]->DESIGNATION_NAME.'</option>';
                                    $i = $i+1;
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" id="submit" value="ADD">
                    </td>
                    <td colspan="2">
                        <input type="submit" name="addEqp" id="addEqp" value="ADD EQUIPMENTS">
                    </td>
                    <td colspan="2">
                        <input type="submit" name="cancel" id="cancel" value="CANCEL">
                    </td>
                </tr>
            </table>
        </form>

        <?php
            $des_sel = (isset($_GET['des_sel']) ? $_GET['des_sel'] : null);

            if(isset($_GET['submit'])){
                

                $m_id=0;

                DB::select("CALL GET_M_ID(@M_ID_REQ);");
                $rs2 = DB::select("SELECT @M_ID_REQ AS M_ID_REQ");

                if($des_sel>=1 and $des_sel<=3) $table = "IMAM_MUAJJIN";
                    else $table = "MASHJID_COMITTE";

                DB::insert("INSERT INTO ".$table." (M_ID, NAME, PHONE_NUM, DESIGNATION_ID) VALUES (".$rs2[0]->M_ID_REQ.",'".$_GET['name']."','".$_GET['Phone']."',".$des_sel.")");

            }

            if(isset($_GET['cancel'])){

                header('Location: http://localhost:8000/homepage');
                exit;
            }

            if(isset($_GET['addEqp'])){


                header('Location: http://localhost:8000/addEqp');
                exit;
            }

        ?>
    </body>
</html>
