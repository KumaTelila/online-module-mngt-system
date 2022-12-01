<?php
function requests()
{
    include './conn.php';
    $sql = "SELECT * FROM `request` WHERE `is_approved`= 0 and 'is_rejected' = 0";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $i = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $first_name = $row['first_name'];
        $father_name = $row['father_name'];
        echo " 
        <tr>
         <td>" . $i++ . "</td>
          <td>" . $first_name . " " . $father_name . "</td>
          <td> <a href='admin.php?viewRequest=" . $id . "' class='btn btn-primary btn-sm'>view detail</a></td>    
        </tr>";
    }
}
?>
<div class="content-wrapper " style="min-height: 357px;">
    <div class="content pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">New Request Lists</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 400px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>SR no</th>
                                        <th>Student Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    requests();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>

</div>