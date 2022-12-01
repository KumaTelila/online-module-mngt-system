<?php
session_start();
include './conn.php';
if (isset($_POST['add_module'])) {
    $Department = $_POST['Department'];
    $Year = $_POST['Year'];
    $Term = $_POST['Term'];
    if (isset($_FILES['pdf_file']['name'])) {
        // If the ‘pdf_file’ field has an attachment
        $file_name = $_FILES['pdf_file']['name'];
        $file_tmp = $_FILES['pdf_file']['tmp_name'];
        // Move the uploaded pdf file into the pdf folder
        move_uploaded_file($file_tmp, "./module/$Department/$Year/$Term/" . $file_name);
        $sql = "INSERT INTO `modules`(`name`, `department`, `year`, `term`) VALUES ('$file_name','$Department','$Year','$Term')";
        $insert1 = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        if ($insert1) {
            $msg = "Successfully Added";
        } else {
            $msg = "Not Added Something goes wrong";
        }
    }
}
if (isset($_POST['approve'])) {
    $id = $_GET['viewRequest'];
    $sql = "UPDATE `request` SET `is_approved`='1' WHERE `id`= '$id'";
        if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Approved successfully')</script>";
        echo "<script>window.location.replace('./admin.php?requests')</script>";
    } else {
        
        echo "<script>alert('some thing went wrong')</script>";
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
        include './inc/nav.php';
        include './inc/side.php';
        if (
            isset($_GET['addModule']) || isset($_GET['viewModule']) || isset($_GET['requests']) || isset($_GET['viewRequest'])
        ) {
            if (isset($_GET['addModule'])) {
                include './add-module.php';
            }
            if (isset($_GET['viewModule'])) {
                include './veiw-module.php';
            }
            if (isset($_GET['requests'])) {
                include './requests.php';
            }
            if (isset($_GET['viewRequest'])) {
                include './veiw-detail.php';
            }
        } else {
            include './admin-dashboard.php';
        }

        ?>
    
    </div>
 <?php
 include './inc/js.php';
 ?>

</body>

</html>