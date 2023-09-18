<?php
include '../room/connect.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../room/images/pcn.png" type="image/x-icon">
    <link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/bootstrap/js/bootstrap.js"></script>
    <script src="../bootstrap/bootstrap/js/bootstrap.min.js"></script>
    

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Poppins&family=Roboto&family=Thasadith&display=swap" rel="stylesheet">

    <title>Admin Panel</title>
</head>

<body>
    <center>
        <div class="container">
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID Number</th>
                            <th>Fullname</th>
                            <th>Contact Number</th>
                            <th>Division</th>
                            <th>Status</th>
                            <th>Date Registered</th>
                            <th>Action</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT *, DATE_FORMAT(timestamp, '%M %d, %Y') as date_format 
                FROM user WHERE category = 'USER'";
                        $result = $connect->query($query);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $row['id_number'] ?></td>
                                <td><?php echo $row['lastname'], ", ", $row["firstname"], " ", $row["middlename"] ?></td>
                                <td><?php echo $row['contactNumber'] ?></td>
                                <td><?php echo $row['division'] ?></td>
                                <?php
                                if($row['status'] === "0"){ ?>
                                    <td class="badge bg-warning text-white"><?php echo "Pending"; ?></td>
                                <?php }else{?>
                                    <td><?php echo "Approved"; }?></td>
                                <td><?php echo $row['date_format'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-success">Approve</button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger">Reject</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </center>
</body>

</html>