<?php
include_once 'dbconnect.php';

if (isset($_GET['langid'])) {
    $sql = "SELECT * FROM dns_records WHERE ser_no=" . $_GET['langid'];
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
}

// update record
if (isset($_POST['submit'])) {
    $zone = mysqli_real_escape_string($con, $_POST['zone']);
    $host = mysqli_real_escape_string($con, $_POST['host']);
    $type = mysqli_real_escape_string($con, $_POST['type']);
    $data = mysqli_real_escape_string($con, $_POST['data']);
    $ttl  = mysqli_real_escape_string($con, $_POST['ttl']);

    if(mysqli_query($con, "UPDATE dns_records SET zone='$zone', host='$host', type='$type', data='$data', ttl='$ttl' WHERE ser_no=" .  $id)) {
        $success = "Record updated successfully!";
    } else {
        $error = "Error updating record...";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>iCare DNS Tool | Update</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />
    <style type="text/css">
    form {
        margin: 0 auto;
        width: 60%;
    }
    </style>
</head>
<body>
<div class="container" style="margin-top: 20px;">
<div class="row">
    <div class="col-xs-8 col-xs-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <h3>iCare DNS Tool: Update</h3>
            </div>
            <div class="panel-body">
                <form name="insertform" method="post" action="update_language.php">
                    <div class="form-group">
                        <input type="hidden" name="lid" value="<?php if(isset($row['id'])) { echo $row['id']; } ?>" />
                        <input type="text" name="zone" placeholder="Enter ZONE" value="<?php if(isset($row['zone'])) { echo $row['zone']; } ?>" required class="form-control" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="host" placeholder="Enter HOST" value="<?php if(isset($row['host'])) { echo $row['host']; } ?>" required class="form-control" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="type" placeholder="Enter TYPE" value="<?php if(isset($row['type'])) { echo $row['type']; } ?>" required class="form-control" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="data" placeholder="Enter DATA" value="<?php if(isset($row['data'])) { echo $row['data']; } ?>" required class="form-control" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="ttl" placeholder="Enter TTL" value="<?php if(isset($row['ttl'])) { echo $row['ttl']; } ?>" required class="form-control" />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Update" class="btn btn-info btn-block" />
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