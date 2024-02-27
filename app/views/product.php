<!-- START ROW -->
<?php
// index.php
include_once 'include/head.php'; // Include the Masterpage file
?>


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Products</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Stexo</a></li>
                            <li class="breadcrumb-item active">Home</li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end page-title -->
            <div class="row">
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-heading p-4">
                            <div class="mini-stat-icon float-right">
                                <i class="mdi mdi-cube-outline bg-primary  text-white"></i>
                            </div>
                            <div>
                                <h5 class="font-16">Total Product</h5>
                            </div>
                            <h3 class="mt-4"><?=$productCount?></h3>
                            <div class="progress mt-4" style="height: 4px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 75%"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-heading p-4">
                            <div class="mini-stat-icon float-right">
                                <i class="mdi mdi-briefcase-check bg-success text-white"></i>
                            </div>
                            <div>
                                <h5 class="font-16">Total Amount</h5>
                            </div>
                            <h3 class="mt-4"><?=$totalAmount?></h3>
                            <div class="progress mt-4" style="height: 4px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 88%"
                                    aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>

               
            </div>


            <!-- START ROW -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-lg-6">
                                    <h4 class="mt-0 header-title mb-4">Products List</h4>
                                </div>
                                <div class="col-lg-6 d-flex justify-content-end ">
                                    <a href="<?= asset("product-create") ?>"><button type="button"
                                            class="btn btn-primary px-4 ">Add Product</button></a>
                                </div>
                            </div>




                            <div class="table-responsive">
                                <table id="datatable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product Image </th>
                                            <th>Product Name</th>
                                            <th>Stock No</th>
                                            <th>Detail</th>
                                            <th>Amount</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <!-- Table Body -->
                                    <tbody>
                                    <?php foreach ($products as $product) :
                                            $id=$product['id'];
                                            ?>
                                        <tr>
                                            <td>
                                                <?=$id?>
                                            </td>
                                            <td> 
                                                <div>
                                                    <img src="<?= asset('') ?>/<?= $product['product_image'] ?>"
                                                        alt="<?= $product['product_name'] ?>"
                                                        class="thumb-md rounded-circle mr-2">
                                                    <?= $product['product_name'] ?>
                                                </div>
                                            </td>
                                            <td><?= $product['product_name'] ?></td>
                                            <td><?= $product['product_stock'] ?></td>
                                            <td><?= $product['product_detail'] ?></td>
                                            <td><?= $product['product_price'] ?></td>
                                            <td>
                                                <?php foreach ($categories as $category) {
                                                        if ($category['id'] == $product['product_category']) {
                                                            echo $category['categoryname'];
                                                            break; // Stop looping once category is found
                                                        }
                                                    } ?>
                                            </td>
                                            <td>
                                                <div>
                                                    <a href="<?= asset('product-update/' . $id) ?>"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="<?= asset('product-delete/' . $id) ?>"
                                                        class="btn btn-primary btn-sm">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!-- END ROW -->






        </div>
        <!-- container-fluid -->

    </div>
    <!-- content -->

    <?php include_once 'include/footer.php';
 ?>
