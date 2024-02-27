<?php include 'include/head.php'; ?>


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
                <div class="row">
                    <div class="col-12">
                        <?php if(isset($_GET['status']) && $_GET['status'] == 'success'){ ?>
                        <div class="alert alert-success alerts">
                            Product updated successfully.
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <form action="<?= asset('product-update');?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?=$productRow['id']?>">
                    <div class="row">
                        <div class="col-8">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Product</h4>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Product
                                            Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="productname"
                                                value="<?=$productRow['product_name']?>" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-sm-2 col-form-label">Stock
                                            Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="productstock"
                                                value="<?=$productRow['product_stock']?>" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-number-input" class="col-sm-2 col-form-label">Price</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="number" name="productprice"
                                                value="<?=$productRow['product_price']?>" id="example-number-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-sm-2 col-form-label">Product
                                            Details</label>
                                        <div class="col-sm-10">
                                            <textarea required name="productdetail" class="form-control"
                                                rows="5"><?=$productRow['product_detail']?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Category</label>
                                        <div class="col-sm-10">
                                            <select class="custom-select" name="category_id">
                                                <?php foreach($categories as $cat): ?>
                                                <option value="<?= $cat['id'] ?>"
                                                    <?= ($cat['id'] == $productRow['product_category']) ? 'selected' : '' ?>>
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
                                                src="<?= asset("") ?><?=$productRow['product_image']?>"
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
        </div>
        <!-- container-fluid -->
    </div>
    <!-- content -->
</div>

<?php include 'include/footer.php'; ?>