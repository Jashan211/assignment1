<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Save Details</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

    <!--styling-->
    <link rel="stylesheet" href="css/styles.css" >

</head>
<body>
    <h1>Congratulations! You become the member of our tourists list to win a great travel package</h1>

    <!--insert images-->
    <img src="images/image2.jpg" alt="travel image" />
    <img src="images/image.jpg" alt="travelling image" />

    <?php
    //store information of user to database
    $travelType = $_POST['travelType'];
    $travelDays = $_POST['travelDays'];
    $departDate =  $_POST['departDate'];
    $destination = $_POST['destination'];

    //Step 1 - connect to the database
    $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200361558', 'gc200361558',  'IWrvd53ZK3');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Step2 - create the SQL command to INSERT a record
    $sql = "INSERT INTO travel_info (travelType, travelDays, departDate, destinations) 
                          VALUES (:travelType,:travelDays,:departDate, :destination)";

    //Step3 - prepare the SQL command and bind the arguments to SQL injection
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':travelType',$travelType, PDO::PARAM_STR, 15);
    $cmd->bindParam(':travelDays',$travelDays, PDO::PARAM_INT, 3);
    $cmd->bindParam(':departDate',$departDate, PDO::PARAM_INT, 10);
    $cmd->bindParam(':destination',$destination, PDO::PARAM_STR, 20);

    //Step4 - execute
    $cmd->execute();

    //Step5 - disconnect from database
    $conn = null;
    ?>

    <?php
        //Store data from inputs to table in database
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $address = $_POST['address'];
        $province = $_POST['province'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        //Step 1 - connect to the database
        $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200361558', 'gc200361558',  'IWrvd53ZK3');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Step2 - create the SQL command to INSERT a record
        $sql = "INSERT INTO tourist_info (firstName, lastName, address, phone, email, provinces) 
                          VALUES (:firstName,:lastName,:address, :phone, :email, :province);";

        //Step3 - prepare the SQL command and bind the arguments to SQL injection
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':firstName',$firstName, PDO::PARAM_STR, 30);
        $cmd->bindParam(':lastName',$lastName, PDO::PARAM_STR, 30);
        $cmd->bindParam(':address',$address, PDO::PARAM_STR, 60);
        $cmd->bindParam(':phone',$phone, PDO::PARAM_STR, 15);
        $cmd->bindParam(':email',$email,PDO::PARAM_STR,120);
        $cmd->bindParam(':province',$province, PDO::PARAM_STR, 30);

        //Step4 - execute
        $cmd->execute();

        //Step5 - disconnect from database
        $conn = null;

        ?>
        <!--button leads to tables-->
        <a class="btn btn-default" href="displayTourists.php" role="button">Click Here to display list of tourists</a>

</body>

<!--Latest Query -->
<script src="js/jquery-3.2.1.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>

</html>
