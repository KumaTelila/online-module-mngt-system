<div class="content-wrapper pt-2 pb-5 " style="min-height: 357px;">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid pt-2">
            <div class="card card-default">
                <?php if (isset($msg)) echo $msg; ?>
                <div class="card-body ">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>first Name</label>
                                    <input type="text" name="first_name" class="form-control" placeholder="Your first Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Father Name</label>
                                    <input type="text" name="father_name" class="form-control" placeholder="Your Father Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Department</label>
                                    <select class="form-control" name="Department" data-placeholder="Department" style="width: 100%;">
                                        <option value="" disabled selected>Select your department</option>
                                        <option>Accounting</option>
                                        <option>Computer Science</option>
                                        <option>Economics</option>
                                        <option>Marketting</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Year</label>
                                    <select class="form-control" name="Year" data-placeholder="Year" style="width: 100%;">
                                        <option value="" disabled selected>Select your Year</option>
                                        <option>Year 1</option>
                                        <option>Year 2</option>
                                        <option>Year 3</option>
                                        <option>Year 4</option>
                                        <option>Year 5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Term</label>
                                    <select class="form-control" name="Term" data-placeholder="Term" style="width: 100%;">
                                        <option value="" disabled selected>Select your Term</option>
                                        <option>Term 1</option>
                                        <option>Term 2</option>
                                    </select>
                                </div>

                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="display-flex">
                            <button name="request" type="submit" class="btn btn-primary  btn-md float-right">Request</button>
                        </div>
                    </form> <!-- /.row -->
                </div>
            </div>
        </div>
    </section>
</div>