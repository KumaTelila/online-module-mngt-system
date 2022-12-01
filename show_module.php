<div class="content-wrapper " style="min-height: 357px;">
    <div class="content pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-gray">
                        <div class="card-header">
                            <h3 class="card-title">Module List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 400px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>S/Number</th>
                                        <th>Module</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    displayModules($id);
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