<?php
include("connection.php");
include("sessions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaine Fc - Matches</title>
    <link rel="shortcut icon" href="./imgs/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard-container">
        <?php 
            include("sidebar.php");
        ?>
        <div class="dashboard-right">
            <div class="right-title">
                <h1>View Report</h1>
                <div class="line"></div>
            </div>
            <div class="right-content">
                <div class="buttons">
                    <a href="#" onclick="print()">Print...</a>
                </div>
                <table>
                    <tr>
                        <th>Date</th>
                        <th>Play Ground</th>
                        <th>Referee</th>
                        <th>Adversarie</th>
                        <th>User</th>
                    </tr>
                    <?php
                    $select=$con->query("SELECT * FROM `matches`");
                    if(mysqli_num_rows($select)>0){
                        while($row=mysqli_fetch_assoc($select)){
                    ?>

                    <tr>
                        <td><?php echo $row['date'];?></td>
                        <td><?php echo $row['play_ground'];?></td>
                        <td>
                            <?php
                             $ref_id=$row['ref_id'];
                             $select=$con->query("SELECT * FROM `referees` WHERE `ref_id`='$ref_id'");
                             $ref=mysqli_fetch_assoc($select);
                             $f_name=$ref['f_name'];
                             $l_name=$ref['l_name'];
                             echo $f_name;echo $l_name;
                            ?>
                        </td>
                        <td>
                            <?php
                             $ad_id=$row['ad_id'];
                             $select=$con->query("SELECT * FROM `adversaries` WHERE `ad_id`='$ad_id'");
                             $ad=mysqli_fetch_assoc($select);
                             $name=$ad['name'];
                             echo $name;
                            ?>
                        </td>
                        <td>
                        <?php
                             $user_id=$row['user_id'];
                             $select=$con->query("SELECT * FROM `users` WHERE `user_id`='$user_id'");
                             $user=mysqli_fetch_assoc($select);
                             $username=$user['username'];
                             echo $username;
                            ?>
                        </td>
                    </tr>
                    
                    <?php
                        }
                    }
                    else{
                        echo"<h1>No Matches Available...</h1>";
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>
</body>
</html>