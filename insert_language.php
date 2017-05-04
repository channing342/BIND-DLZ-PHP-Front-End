<?php
include_once 'dbconnect.php';

// insert record
if (isset($_POST['submit'])) {
    $zone = mysqli_real_escape_string($con, $_POST['zone']);
    $host = mysqli_real_escape_string($con, $_POST['host']);
    $type = mysqli_real_escape_string($con, $_POST['type']);
    $data = mysqli_real_escape_string($con, $_POST['data']);
    $ttl  = mysqli_real_escape_string($con, $_POST['ttl']);

    if(mysqli_query($con, "INSERT INTO dns_records(zone,host,type,data,ttl) VALUES('$zone','$host','$type','$data','$ttl')")) {
        $success = "Record inserted successfully!";
    } else {
        $error = "Error inserting record...";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />
    <style type="text/css">
    form {
        margin: 0 auto;
        width: 30%;
    }
    </style>
</head>
<body>
<div class="container" style="margin-top: 20px;">
<div class="row">
    <div class="col-xs-8 col-xs-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <h3>iCare DNS Tool | Insert</h3>
            </div>
            <div class="panel-body">
                <form name="insertform" method="post" action="insert_language.php">
                    <div class="form-group">
                        <input type="text" name="zone" placeholder="Enter ZONE" required class="form-control" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="host" placeholder="Enter HOST" required class="form-control" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="type" placeholder="Enter TYPE" required class="form-control" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="data" placeholder="Enter DATA" required class="form-control" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="ttl" placeholder="Enter TTL" required class="form-control" />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Insert" class="btn btn-info btn-block" />
                    </div>
                    <span class="text-success"><?php if (isset($success)) { echo $success; } ?></span>
                    <span class="text-danger"><?php if (isset($error)) { echo $error; } ?></span>
                </form>
            </div>
            <div class="panel-footer text-center">
                <a href="index.php">« Back to index page</a>
            </div>
        </div>
    </div>
</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
</body>
</html>