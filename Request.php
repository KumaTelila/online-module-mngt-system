<?php
session_start();
include './conn.php';
$id = $_SESSION['id'];
if (isset($_POST['request'])) {
    $first_name = $_POST['first_name'];
    $father_name = $_POST['father_name'];
    $Department = $_POST['Department'];
    $Year = $_POST['Year'];
    $Term = $_POST['Term'];
    $sql = "UPDATE `request` SET `first_name`='$first_name',`father_name`='$father_name',
    `department`='$Department',`year`='$Year',`term`='$Term', `is_approved`=0 WHERE `user_id` = $id";
    $insert1 = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if ($insert1) {
        $msg = "Successfully Requested";
    } else {
        $msg = "Not Requested Something goes wrong";
    }
}

function checkApprove($id)
{
    include './conn.php';
    $sql2 = "SELECT * FROM `request` WHERE `user_id` = $id";
    $result2 = mysqli_query($conn, $sql2);
    $row = mysqli_fetch_array($result2);
    if (mysqli_num_rows($result2) > 0) {
        return true;
    } else {
        return false;
    }
}
function displayModules($id)
{
    include './conn.php';
    $sql = "SELECT * FROM `request` WHERE `user_id` = $id and `is_approved`=1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $Department = $row['department'];
        $Year = $row['year'];
        $Term = $row['term'];
        $sql1 = "SELECT * FROM `modules` WHERE `department` = '$Department' AND `year` = '$Year' AND `term` = '$Term' and `is_deleted` = 0";
        $result1 = mysqli_query($conn, $sql1);
        $i = 1;
        while ($row1 = mysqli_fetch_assoc($result1)) {
            $file_name = $row1['name'];
            echo " 
                <tr>
                <td>" . $i++ . "</td>
                  <td>" . $file_name . "</td> 
                  <td> <a href='./module/$Department/$Year/$Term/$file_name' class='btn btn-primary btn-sm'>Download</a></td>    
                </tr>";
        }
    }
}
?>

<html lang="en" style="height: auto;">
<?php
include './inc/header.php';
?>

<body class="layout-fixed" style="height: auto;">
    <div class="wrapper">
        <?php
        include './inc/R-nav.php';
        include './inc/R-side.php';
        if (
            isset($_GET['newRequest']) || isset($_GET['showModule'])
        ) {
            if (isset($_GET['newRequest'])) {
                if (checkApprove($id)) {
                    include './new_request.php';
                } else {
                    include './wait_page.php';
                }
            }
            if (isset($_GET['showModule'])) {
                include './show_module.php';
            } else {
                include './request_body.php';
            }
        }
        ?>
    </div>
    <?php
    include './inc/js.php';
    ?>
</body>

</html>