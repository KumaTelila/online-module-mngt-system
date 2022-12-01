<?php
$id = $_GET['viewRequest'];
$sql = "SELECT * FROM `request` WHERE `id` = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$id = $row['id'];
$first_name = $row['first_name'];
$father_name = $row['father_name'];
$department = $row['department'];
$year = $row['year'];
$term = $row['term'];
?>

<div class="content-wrapper" style="min-height: 357px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $first_name.' '.$father_name; ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-body pl-5">
                <label class="input-group">ID</label>
                <p><?php echo $id; ?></p>
                <label class="input-group">Student Name</label>
                <p><?php echo $first_name.' '.$father_name; ?></p>
                <label class="input-group">Department</label>
                <p><?php echo $department; ?></p>
                <label class="input-group">Year</label>
                <p><?php echo $year; ?></p>
                <label class="input-group">Term</label>
                <p><?php echo $term; ?></p>
            </div>
        </div>
        <div class="diplay-flex pr-5">
            <form method="POST">
                <input type="submit" name="reject" value="Reject" class="btn btn-primary float-left">
                <input type="submit" name="approve" value="Approve" class="btn btn-primary float-right">
            </form>
        </div>
    </section>
</div>