<?php include "../inc/dbinfo.inc"; ?>
<html>
    <head>
	<title>Client Page</title>
        <style>
            body{
                font-family: Verdana, sans-serif;
            }
            table, tr, td{
                border-collapse: collapse;
                border: 1px solid;
            }
            table{
                margin-top: 10px;
                width: 100%;
            }
	</style>
    </head>
    <body>
	<h1>Client access page</h1>
        <?php

	/* Connect to MySQL and select the database. */
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);

        ?>
        <p> Available properties, and their viewings are as follows: </p>
        <table>
            <tr>
                <td>Address </td>
                <td>No. of tenants</td>
                <td>Monthly Rent </td>
                <td>Viewing Date & Time </td>
            </tr>
            <?php

            $result = mysqli_query($connection, "SELECT * FROM PROPERTY_DATA");
            while($query_data = mysqli_fetch_row($result)) {
                echo "<tr>";
                echo "<td>",$query_data[1], "</td>",
                    "<td>",$query_data[2], "</td>",
                    "<td>",$query_data[3], "</td>",
                    "<td>",$query_data[4], "</td>";
                echo "</tr>";
            }

            ?>
        </table>
    </body>
</html>