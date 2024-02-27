<?php
require_once(__DIR__ . '/../models/userModel.php');
class ProductController
{
    public $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function product()
    {
        try {
            // Fetch products
            $products = $this->userModel->products();
            $totalAmount = array_reduce($products, function ($acc, $product) {
                return $acc + $product['product_price'];
            }, 0);

            $productCount = count($products);
            

            // Fetch categories
            $categories = $this->userModel->category();

            include_once __DIR__ . '/../views/product.php';
        } catch (PDOException $e) {
            echo "Hata: " . $e->getMessage();
        }
    }
    



    public function productcreate()
    {

        $categories =  $this->userModel->category();


        include_once __DIR__ . '/../views/product-create.php';
    }


    public function productadd()
    {
        try {

            $productName = $_POST["productname"];
            $productDetail = $_POST["productdetail"];
            $productStock = $_POST["productstock"];
            $productPrice = $_POST["productprice"];
            $productCategory = $_POST["productcategory"];


            if (isset($_FILES["productimage"])) {
                $file = $_FILES["productimage"];


                if ($file['error'] !== UPLOAD_ERR_OK) {
                    throw new Exception("Dosya yükleme hatası: " . $file['error']);
                }


                if ($file['size'] > 5242880) { // 5 MB
                    throw new Exception("Dosya boyutu çok büyük (maksimum 5 MB).");
                }


                $uploadDirectory = 'upload/product/';
                if (!file_exists($uploadDirectory)) {
                    mkdir($uploadDirectory, 0777, true);
                }


                $newFilename = uniqid() . '.' . strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $targetPath = $uploadDirectory . $newFilename;


                if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
                    throw new Exception("Dosya yüklenirken bir sorun oluştu.");
                }


                $productImage = $targetPath;


                if ($this->userModel->addProduct($productName, $productDetail, $productPrice, $productStock, $productCategory, $productImage)) {
                    $product = asset('product');
                    header("Location: $product");
                    exit();
                } else {
                    throw new Exception("Ürün eklenirken bir sorun oluştu.");
                }
            } else {
                throw new Exception("Dosya yüklenemedi.");
            }
        } catch (Exception $e) {
            echo "Hata: " . $e->getMessage();
        }
    }

    public function productdelete()
    {
        try {

            $productId = getID(); // R


            $imagePath = $this->userModel->getProductImage($productId);

            if (!empty($imagePath)) {
                unlink("upload/product/" . $imagePath);
            }


            $this->userModel->deleteProduct($productId);


            $productListURL = asset('product');
            header("Location: $productListURL");
            exit();
        } catch (PDOException $e) {
            echo "Hata: " . $e->getMessage();
        }
    }


    public function productupdate()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $id = $_POST['id'];

            if ($_FILES['productimage']['size'] > 0) {
                // Yeni resim yüklendi
                $oldImagePath = $this->userModel->getProductImage($id);
                if (!empty($oldImagePath) && file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                $uploadDirectory = 'upload/product/';
                $productImage = $uploadDirectory . $_FILES['productimage']['name'];
                if (move_uploaded_file($_FILES['productimage']['tmp_name'], $productImage)) {
                    // Resim başarıyla yüklendi, veritabanındaki resim yolunu güncelle
                    $params = [
                        "productname" => $_POST["productname"],
                        "productdetail" => $_POST["productdetail"],
                        "productprice" => $_POST["productprice"],
                        "productstock" => $_POST["productstock"],
                        "category_id" => $_POST["category_id"],
                        "productimage" => $productImage,
                        "id" => $id
                    ];
                    $this->userModel->productupdate($params);
                } else {

                    echo "Resim yüklenirken hata oluştu.";
                    exit();
                }
            } else {

                $params = [
                    "productname" => $_POST["productname"],
                    "productdetail" => $_POST["productdetail"],
                    "productprice" => $_POST["productprice"],
                    "productstock" => $_POST["productstock"],
                    "category_id" => $_POST["category_id"],

                    "id" => $id
                ];
                $this->userModel->productupdate($params);
            }


            $productUpdateURL = asset('product-update') . "/$id?status=success";
            header("Location: $productUpdateURL");
            exit();
        }



        $productId = getID();
        $productRow = $this->userModel->getProductById($productId);
        $categories = $this->userModel->category();
        include_once __DIR__ . '/../views/product-update.php';
    }
}