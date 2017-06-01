<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tourists Details</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

</head>
<body>
    <h1>List of Tourists</h1>

    <?php

    //Step1 - connect to the database
    $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200361558', 'gc200361558',  'IWrvd53ZK3');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //step 2 - create a SQL command
    $sql = "SELECT * 
FROM tourist_info INNER JOIN travel_info ON tourist_info.touristID = travel_info.touristID;";
    //step 3 - prepare the SQL command
    $cmd = $conn->prepare($sql);
    //step 4 - execute and store the results
    $cmd->execute();
    $tourist_info = $cmd->fetchAll();//fetch the data from the table tourist_info
    $cmd->execute();
    $travel_info = $cmd->fetchAll();//fetch the data from the table travel_info
    //step 5 - disconnect from the DB
    $conn = null;
    //create a table and display the results

    //table tourist_info-->

    //table headings
    echo '<table class="table table-striped table-hover table-bordered">
            <tr><th>Tourist ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Province</th></tr>';
    //loop through the records of the table to display each of them
    foreach($tourist_info as $tourist){
        echo'<tr><td class="success">' .$tourist['touristID'] . '</td>
                <td class="danger"> ' .$tourist['firstName'] .'</td>
                <td class="active"> ' .$tourist['lastName'] .'</td>
                <td class="warning"> ' .$tourist['address'] .'</td>
                <td class="info"> ' .$tourist['provinces'] .'</td></tr>';
    }
    echo '</table>';

    echo'Corresponding travel details of tourist';

    //display table travel_info

    //table headings
    echo '<table class="table table-striped table-hover table-bordered table-responsive">
            <tr><th>Tourist ID</th>
                <th>Travel Type</th>
                <th>Travel Days</th>
                <th>Depart Date</th>
                <th>Destination</th></tr>';
    //loop through the records of the table to display each of them
    foreach($travel_info as $travel){
        echo'<tr><td class="info">' . $travel['touristID'] . '</td>
                <td class="active">' . $travel['travelType'] . '</td>
                <td class="warning">' . $travel['travelDays'] . '</td>
                <td class="success">' . $travel['departDate'] . '</td>
                <td class="danger">' . $travel['destinations'] . '</td></tr>';
    }
    echo '</table>';
    ?>

    <!--button leads to new record-->
    <a class="btn btn-info" href="detailsRequired.php" role="button">Add a new Tourist</a>
</body>

    <!--Latest Query -->
    <script src="js/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</html>
