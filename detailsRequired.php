<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personal Details</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

    <!--styling-->
    <link rel="stylesheet" href="css/styles.css" >
</head>
<body>
  <h1> Enter Details</h1>

  <!-- insert an image-->
  <img id="image" src="images/download.jpg" alt="tourist image" />

  <!--set action attribute for form -->
    <form method="post" action="saveDetails.php" class="form-horizontal">
        <!-- categorize the details in different parts using fieldset -->
        <fieldset>
            <!--heading of first category personal information-->
            <legend>Personal Information</legend>
            <!-- input for first name-->
            <div class="form-group">
                <label for="firstName" class="col-sm-2"> First Name: *</label>
                <input type="text" class="col-sm-6" id="firstName" name="firstName" placeholder="First name" required/>
            </div>
            <!-- input for last name-->
            <div class="form-group">
                <label for="lastName" class="col-sm-2">Last Name: *</label>
                <input type="text" id="lastName" name="lastName"  placeholder="Last name" class="col-sm-6" required/>
            </div>
            <!-- input for address -->
            <div class="form-group">
                <label for="address" class="col-sm-2">Address: *</label>
                <input id="address" type="text" name="address" class="col-sm-6" required/>
            </div>
            <!-- selection input for province-->
            <div class="form-group">
                <label for="province" class="col-sm-2">Province</label>
                <select id="province" name="province" class="col-sm-6">
                    <!--php for filling the options available for selection-->
                    <?php
                    //Step1 - Connect to db
                    $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200361558', 'gc200361558',  'IWrvd53ZK3');

                    //Step2 - create the sql statement
                    $sql = "SELECT * FROM provinces";

                    //Step3 - prepare and execute the SQL command
                    $cmd = $conn->prepare($sql);
                    $cmd->execute();
                    $provinces = $cmd->fetchAll();

                    //Step4 - Loop oover the results to build the List with <option> </option>
                    foreach ($provinces as $province)
                    {
                        echo '<option>'.$province['province'].'</option>';
                    }

                    //Step4 - disconnect from DB
                    $conn = null;

                    ?>
                </select>
            </div>
            <!--input for phone number-->
            <div class="form-group">
                <label for="phone" class="col-sm-2">Phone: *</label>
                <input id="phone" type="tel" name="phone" class="col-sm-6" required/>
            </div>
            <!--input for email-->
            <div class="form-group">
                <label for="email" class="col-sm-2">Email: *</label>
                <input id="email" type="email" name="email" required placeholder="example@mail.com" class="col-sm-6"/>
            </div>
        </fieldset>
        <fieldset>
            <!--heading for category travel type-->
            <legend> Travel Type</legend>
            <!--radio buttons for selecting travelType-->
            <input type="radio" name="travelType" id="recreational" value="recreational" required/>
            <label for="recreational">Recreational</label>
            <input type="radio" name="travelType" id="exploration" value="exploration" />
            <label for="exploration">Exploration</label>
        </fieldset>
        <fieldset>
            <!--heading for travel details-->
            <legend>Travel Details</legend>
            <div class="form-group">
                <label for="travelDays" class="col-sm-2">Travel Days</label>
                <input type="number" name="travelDays" id="travelDays" placeholder="Number of days" class="col-sm-6" required/>
            </div>
            <div class="form-group">
                <label for="departDate" class="col-sm-2">Date of Departure</label>
                <input type="date" name="departDate" id="departDate" placeholder="YYYY-MM-DD" class="col-sm-6" required/>
            </div>
            <div class="form-group">
                <label for="destination" class="col-sm-2">Destination Country</label>
                <select id="destination" name="destination" class="col-sm-6">
                    <?php
                    //Step1 - Connect to db
                    $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200361558', 'gc200361558',  'IWrvd53ZK3');
                    //Step2 - create the sql statement
                    $sql = "SELECT * FROM destinations";

                    //Step3 - prepare and execute the SQL command
                    $cmd = $conn->prepare($sql);
                    $cmd->execute();
                    $destinations = $cmd->fetchAll();

                    //Step4 - Loop oover the results to build the List with <option> </option>
                    foreach ($destinations as $destination)
                    {
                        echo '<option>'.$destination['destination'].'</option>';
                    }

                    //Step4 - disconnect from DB
                    $conn = null;

                    ?>
                </select>
            </div>
        </fieldset>
        <button class="btn btn-success col-sm-offset-1">Register for travelling</button>
    </form>
</body>

<!--Latest Query -->
<script src="js/jquery-3.2.1.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>

</html>
