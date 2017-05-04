<?php
include_once 'dbconnect.php';

// fetch records
$sql = "SELECT * FROM dns_records";
$result = mysqli_query($con, $sql);

// delete record
if (isset($_GET['langid'])) {
    $sql = "DELETE FROM dns_records WHERE ser_no=" . $_GET['langid'];
    @mysqli_query($con, $sql);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <title>iCare DNS Tool</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />
</head>
<body>
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading"><h3>iCare DNS Tool</h3></div>

            <div class="panel-body text-right">
            <a href="insert_language.php" class="btn btn-default">Add DNS</a>
            </div>
  
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ZONE</th>
                        <th>HOST</th>
                        <th>TYPE</th>
                        <th>DATA</th>
                        <th>TTL</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $cnt = 1;
                while($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $cnt++; ?></td>
                    <td><?php echo $row['zone']; ?></td>
                    <td><?php echo $row['host']; ?></td>
                    <td><?php echo $row['type']; ?></td>
                    <td><?php echo $row['data']; ?></td>
                    <td><?php echo $row['ttl']; ?></td>
                    <td><a href="update_language.php?langid=<?php echo $row['ser_no']; ?>"><img src="images/edit-icon.png" alt="Edit" /></a></td>
                    <td><a href="javascript: delete_lang(<?php echo $row['ser_no']; ?>)"><img src="images/delete-icon.png" alt="Delete" /></a></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
            <div class="panel-footer"><?php echo mysqli_num_rows($result) . " records found"; ?></div>
            </div>
        </div>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
<script type="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
function delete_lang(id)
{
    if (confirm('Confirm Delete?'))
    {
        window.location.href = 'index.php?langid=' + id;
    }
}
</script>
</body>
</html>