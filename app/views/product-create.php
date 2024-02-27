<?php require 'include/head.php' ?>


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Form Elements</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Stexo</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Add Product</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div>
            <!-- end page-title -->

            <div class="container-fluid">
                <form action="<?= asset('product-create');?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-8">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Product</h4>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Product
                                            Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" required type="text" name="productname"
                                                placeholder="Product Name" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" required class="col-sm-2 col-form-label">Stock Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="productstock" placeholder="Stock Name" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-number-input" required
                                            class="col-sm-2 col-form-label">Price</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="number" placeholder="Price" name="productprice" 
                                                id="example-number-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input"  class="col-sm-2 col-form-label">Product
                                            Details</label>
                                        <div class="col-sm-10">
                                            <textarea name="productdetail" class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Category</label>
                                        <div class="col-sm-10">
                                            <select class="custom-select" name="productcategory">
                                                <option selected>Select The Category</option>
                                                <?php foreach($categories as $cat): ?>
                                                <option value="<?= $cat['id'] ?>">
                                                    <?= $cat['categoryname'] ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>



                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    Add Product
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                    Continue
                                </button>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-4">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Product Image</h4>
                                    <div>
                                        <label for="productImage">
                                            <img class="img-thumbnail cursor-pointer" alt="200x200"
                                                style="width: auto; height: 300px; margin-bottom: 20px;"
                                                src="<?= asset("public") ?>/assets/images/small/img-3.jpg"
                                                data-holder-rendered="true">
                                        </label>
                                        <input name="productimage" type="file" id="productImage" multiple="multiple"
                                            class="uploadImage d-none">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div> <!-- end row -->

            <script>
            function previewImage(input) {
                // Check if the selected file exists
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    // Perform actions when the file is uploaded
                    reader.onload = function(e) {
                        // Find the img element with the img-thumbnail class and set its src to the uploaded image's data URL
                        $('.img-thumbnail').attr('src', e.target.result);
                    }

                    // Read the selected file
                    reader.readAsDataURL(input.files[0]);
                }
            }

            // Call the previewImage function when the File input changes
            $(document).ready(function() {
                $('.uploadImage').change(function() {
                    previewImage(this);
                });
            });
            </script>





        </div>
        <!-- container-fluid -->

    </div>
    <!-- content -->
</div>

<?php require 'include/footer.php' ?>
