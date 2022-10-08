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
            input{
                margin-right: 5px;
            }
	</style>
    </head>
    <body>
	<h1>Admin access page</h1>
        <?php

	/* Connect to MySQL and select the database. */
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

        if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

        $database = mysqli_select_db($connection, DB_DATABASE);

        $entry_id = htmlentities($_POST['id']);
        $property_address = htmlentities($_POST['address']);
        $property_tenants = htmlentities($_POST['tenants']);
        $property_cost = htmlentities($_POST['cost']);
        $property_viewing_time = htmlentities($_POST['time']);

        if (isset($_POST['addData'])){
            addProperty($connection, $property_address, $property_tenants, $property_cost, $property_viewing_time);
        } elseif (isset($_POST['removeData'])){
            removeProperty($connection, $entry_id);
        }

        ?>
        <p> Available properties, and their viewings are as follows: </p>
        <table>
            <tr>
                <td>ID </td>
                <td>Address </td>
                <td>No. of tenants</td>
                <td>Monthly Rent </td>
                <td>Viewing Date & Time </td>
            </tr>
            <?php

            $result = mysqli_query($connection, "SELECT * FROM PROPERTY_DATA");
            while($query_data = mysqli_fetch_row($result)) {
                echo "<tr>";
                echo "<td>",$query_data[0], "</td>",
                    "<td>",$query_data[1], "</td>",
                    "<td>",$query_data[2], "</td>",
                    "<td>",$query_data[3], "</td>",
                    "<td>",$query_data[4], "</td>";
                echo "</tr>";
            }

            ?>

            <form action="<?PHP echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
                <p>Add an entry: </p>
                <input type="text" name="address" placeholder="Address">
                <input type="text" name="tenants" placeholder="# of tenants">
                <input type="text" name="cost" placeholder="Cost of rent monthly">
                <input type="text" name="time" placeholder="Viewing Date & Time">
                <input type="submit" name="addData" value="Add Entry">
            </form>
            <form action="<?PHP echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
                <p>Remove an entry: </p>
                <input type="text" name="id" placeholder="ID">
                <input type="submit" name="removeData" value="Remove Entry">
            </form>
        </table>
    </body>
</html>

<?php 
function addProperty($connection, $address, $tenants, $cost, $time){
    $a = mysqli_real_escape_string($connection, $address);
    $t = mysqli_real_escape_string($connection, $tenants);
    $c = mysqli_real_escape_string($connection, $cost);
    $ti = mysqli_real_escape_string($connection, $time);

    $query = "INSERT INTO PROPERTY_DATA (ADDRESS, TENANTS, COST, TIME) VALUES ('$a', '$t', '$c', '$ti');";

    if(!mysqli_query($connection, $query)) echo("<p>Error adding property data.</p>");
}

function removeProperty($connection, $id){
            $id = mysqli_real_escape_string($connection, $id);

            $query = "DELETE FROM PROPERTY_DATA WHERE ID = '$id';";

            if(!mysqli_query($connection, $query)) echo("<p>Error removing property data.</p>");
}
?>