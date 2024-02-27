<?php
require_once(__DIR__ . '/../models/userModel.php');

class CategoryController
{
    public $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }






    public function category()
    {
        try {
            $this->userModel->categoryIndex();
        } catch (PDOException $e) {
            echo "Hata: " . $e->getMessage();
        }
    }

    public function categorycreate()
    {
        include_once __DIR__ . '/../views/category-create.php';
    }

    public function categoryupdate()
    {
      
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $id = $_POST['id'];
           
            if ($_FILES['categoryimage']['size'] > 0) {
               
                $oldImagePath = $this->userModel->getCategoryImage($id);
                if (!empty($oldImagePath) && file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                $uploadDirectory = 'upload/category/';
                $categoryImage = $uploadDirectory . $_FILES['categoryimage']['name'];
                if (move_uploaded_file($_FILES['categoryimage']['tmp_name'], $categoryImage)) {
                   
                    $params = [
                        "categoryname" => $_POST["categoryname"],
                        "categorydetail" => $_POST["categorydetail"],
                        "image_path" => $categoryImage,
                        "id" => $id
                    ];
                    $this->userModel->categoryupdate($params);
                } else {
               
                    echo "Resim yüklenirken hata oluştu.";
                    exit();
                }
            } else {
              
                $params = [
                    "categoryname" => $_POST["categoryname"],
                    "categorydetail" => $_POST["categorydetail"],
                    "id" => $id
                ];
                $this->userModel->categoryupdate($params);
            }

           
            $category = asset('category');
            header("Location: $category-update/$id?status=success");
            exit();
        }


      
        $this->userModel->getCategory(getID());

      
    }





    public function categoryadd()
    {
        try {
            // Kategori adı ve detayını POST verilerinden al
            $categoryname = $_POST["categoryname"];
            $categorydetail = $_POST["categorydetail"];

            // Dosya yükleme alanından gelen dosyayı kontrol et
            if (isset($_FILES["categoryimage"])) {
                // Dosya yükleme işlemi için gerekli kontrolleri yapın
                $file_name = $_FILES['categoryimage']['name'];
                $file_tmp = $_FILES['categoryimage']['tmp_name'];
                $file_size = $_FILES['categoryimage']['size'];

                // Dosya uzantısını kontrol edin ve istenilen bir formatta mı olduğunu doğrulayın (ör. JPEG, PNG gibi)
                $file_ext_array = explode('.', $file_name);
                $file_ext = strtolower(end($file_ext_array));

                // Dosya boyutunu kontrol edin (ör. maksimum 5MB)
                if ($file_size < 5242880) {
                    // Dosya yükleme işlemi
                    $file_destination = 'upload/category/' . $file_name;
                    if (move_uploaded_file($file_tmp, $file_destination)) {
                        // Veritabanına kaydetme işlemi
                        $params = [
                            "categoryname" => $categoryname,
                            "categorydetail" => $categorydetail,
                            "image_path" => $file_destination
                        ];
                        $this->userModel->addCategory($params);

                        // Başarı durumuyla kategori sayfasına yönlendir
                        $category = asset('category');
                        header("Location: $category");
                        exit();
                    } else {
                        throw new Exception("Dosya yükleme hatası.");
                    }
                } else {
                    throw new Exception("Dosya boyutu çok büyük.");
                }
            } else {
                throw new Exception("Dosya yükleme alanı boş.");
            }
        } catch (PDOException $e) {
            echo "Hata: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Hata: " . $e->getMessage();
        }
    }



    public function categorydelete()
    {
        try {

            $this->userModel->deleteCategory(getID());
        } catch (PDOException $e) {
            echo "Hata: " . $e->getMessage();
        }
    }
}