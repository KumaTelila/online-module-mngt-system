<div class="content-wrapper pt-2 pb-5 " style="min-height: 357px;">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid pt-2">
            <div class="card card-default">
                <div class="card-body ">
                    <?php if (isset($msg)) echo $msg; ?>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Department</label>
                                    <select class="form-control" name="Department" data-placeholder="Department" style="width: 100%;">
                                        <option value="" disabled selected>Select your option</option>
                                        <option>Accounting</option>
                                        <option>Computer Science</option>
                                        <option>Economics</option>
                                        <option>Marketting</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Year</label>
                                    <select class="form-control" name="Year" data-placeholder="Year" style="width: 100%;">
                                        <option value="" disabled selected>Select your option</option>
                                        <option>Year 1</option>
                                        <option>Year 2</option>
                                        <option>Year 3</option>
                                        <option>Year 4</option>
                                        <option>Year 5</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Term</label>
                                    <select class="form-control" name="Term" data-placeholder="Term" style="width: 100%;">
                                        <option value="" disabled selected>Select your option</option>
                                        <option>Term 1</option>
                                        <option>Term 2</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Module</label>
                                    <input type="file" name="pdf_file" class="form-control" accept=".pdf, .docx, .ppt, .doc, .document" required />
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="display-flex">
                            <button name="add_module" type="submit" class="btn btn-primary  btn-md float-right">Add</button>
                        </div>
                    </form> <!-- /.row -->
                </div>
            </div>
        </div>
    </section>
</div>