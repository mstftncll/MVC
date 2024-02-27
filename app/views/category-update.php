<?php include 'include/head.php'; ?>

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Category Update</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">HomePage</a></li>

                            <li class="breadcrumb-item active">Category Update</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div>
            <!-- end page-title -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <?php if(isset($_GET['status']) && $_GET['status'] == 'success'){ ?>
                            <div class="alert alert-success alerts">
                                Kategori başarıyla güncellendi.
                            </div>
                            <?php } ?>
                    </div>
                </div>
                <form action="<?= asset('category-update');?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$row['id']?>">
                    <div class="row">
                        <div class="col-8">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Category</h4>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Category
                                            Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" value="<?=$row['categoryname']?>"
                                                name="categoryname" id="example-text-input">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-sm-2 col-form-label">Product
                                            Details</label>
                                        <div class="col-sm-10">
                                            <textarea required class="form-control" name="categorydetail"
                                                rows="5"><?=$row['categorydetail']?></textarea>
                                        </div>
                                    </div>



                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    Kaydet
                                </button>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-4">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Category Image</h4>
                                    <div>
                                        <label for="productImage">
                                            <img class="img-thumbnail cursor-pointer" alt="200x200"
                                                style="width: auto; height: 300px; margin-bottom: 20px;"
                                                src="<?= asset("") ?><?=$row['image_path']?>"
                                                data-holder-rendered="true">
                                        </label>
                                        <input name="categoryimage" type="file" id="productImage" multiple="multiple"
                                            class="uploadImage d-none">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


            </div> <!-- end row -->

           





        </div>
        <!-- container-fluid -->

    </div>
    <!-- content -->
    <?php include 'include/footer.php'; ?>

