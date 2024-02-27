<?php include 'include/head.php'; ?>


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Categories</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Eticaret</a></li>
                            <li class="breadcrumb-item active">HomePage</li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- START ROW -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-lg-6">
                                    <h4 class="mt-0 header-title mb-4">Category List</h4>
                                </div>
                                <div class="col-lg-6 d-flex justify-content-end ">
                                    <a href="<?= asset("category-create") ?>"><button type="button"
                                            class="btn btn-primary px-4 ">Kategori Ekle</button></a>
                                </div>
                            </div>
                            <?php
                            if (isset($categories) && count($categories) > 0) { 
                            ?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Category İmage </th>
                                            <th scope="col">Category Name</th>
                                            <th scope="col" colspan="2">Durum</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($categories as $item) :
                                                $id = $item['id'];
                                                $baslik = $item['categoryname'];
                                                $resim = $item['image_path'];
                                            ?>
                                        <tr>
                                            <td>
                                                <div>
                                                    <img src="<?= asset($resim) ?>" alt=""
                                                        class="thumb-md rounded-circle mr-2">
                                                </div>
                                            </td>
                                            <td><?= $baslik ?></td>
                                            <td>
                                                <div>
                                                    <a href="<?= asset('category-update/' . $id) ?>"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="<?= asset('category-delete/' . $id) ?>"
                                                        class="btn btn-primary btn-sm">Delete</a>

                                                </div>
                                                <div>
                                                </div>
                                            </td>
                                        </tr>

                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php
                            } else {
                                echo "Kategori Bulunamadı";
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
            <!-- END ROW -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- content -->

    <?php include 'include/footer.php'; ?>