<?php

class UserModel
{
    private $db;

    public function __construct()
    {
        try {
            // Create a PDO database connection
            $this->db = new PDO('mysql:host=localhost;dbname=ticaret', 'root', '12345678');
            // Set PDO error mode to exceptions
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {

            echo "Database connection error: " . $e->getMessage();
            exit();
        }
    }
    public function Login($username, $password)
    {

        $query = "SELECT id, username, password FROM users WHERE username = ? AND password = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$username, md5($password)]);


        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return true;
        }


        return false;
    }














    public function getUserById($userId)
    {
        $query = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function products()
    {
        $sql = "SELECT * FROM product";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function deleteProduct($productId)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM product WHERE id = ?");
            $stmt->execute([$productId]);
        } catch (PDOException $e) {

            echo "Hata: " . $e->getMessage();
        }
    }

    public function getProductImage($productId)
    {
        try {

            $stmt = $this->db->prepare("SELECT product_image FROM product WHERE id = ?");
            $stmt->execute([$productId]);
            // Sonucu al
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result ? $result['product_image'] : '';
        } catch (PDOException $e) {

            echo "Hata: " . $e->getMessage();
            return '';
        }
    }



    public function addProduct($productName, $productDetail, $productPrice, $productStock, $productCategory, $productImage)
    {
        try {

            $sql = "INSERT INTO product (product_name, product_detail, product_price, product_stock, product_category, product_image, product_date) 
                    VALUES (:product_name, :product_detail, :product_price, :product_stock, :product_category, :product_image, NOW())";
            $stmt = $this->db->prepare($sql);


            $stmt->bindParam(':product_name', $productName);
            $stmt->bindParam(':product_detail', $productDetail);
            $stmt->bindParam(':product_price', $productPrice);
            $stmt->bindParam(':product_stock', $productStock);
            $stmt->bindParam(':product_category', $productCategory);
            $stmt->bindParam(':product_image', $productImage);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {

            echo "Hata: " . $e->getMessage();
            return false;
        }
    }


    public function productupdate($params)
    {
        try {

            $sql = "UPDATE product SET ";
            $updateFields = [];
            $updateValues = [];



            if (!empty($params['productname'])) {
                $updateFields[] = "product_name=?";
                $updateValues[] = $params['productname'];
            }
            if (!empty($params['productstock'])) {
                $updateFields[] = "product_stock=?";
                $updateValues[] = $params['productstock'];
            }
            if (!empty($params['productprice'])) {
                $updateFields[] = "product_price=?";
                $updateValues[] = $params['productprice'];
            }
            if (!empty($params['productdetail'])) {
                $updateFields[] = "product_detail=?";
                $updateValues[] = $params['productdetail'];
            }
            if (!empty($params['category_id'])) {
                $updateFields[] = "product_category=?";
                $updateValues[] = $params['category_id'];
            }
            if (!empty($params['productimage'])) {
                $updateFields[] = "product_image=?";
                $updateValues[] = $params['productimage'];
            }

            $sql .= implode(", ", $updateFields);


            $sql .= " WHERE id=?";


            $updateValues[] = $params['id'];


            $stmt = $this->db->prepare($sql);
            $stmt->execute($updateValues);


            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {

            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function getProductById($productId)
    {
        try {

            $stmt = $this->db->prepare("SELECT * FROM product WHERE id = ?");
            $stmt->execute([$productId]);

            $product = $stmt->fetch(PDO::FETCH_ASSOC);

            return $product;
        } catch (PDOException $e) {

            echo "Error: " . $e->getMessage();
            return null;
        }
    }




    public function category($id = null)
    {
        try {
            $sql = "SELECT * FROM category";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $categories;
        } catch (PDOException $e) {

            echo "Error: " . $e->getMessage();
            return [];
        }
    }
    public function categoryIndex()
    {
        try {
            $sql = "SELECT * FROM category";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
            include_once __DIR__ . '/../views/category.php';
        } catch (PDOException $e) {

            echo "Error: " . $e->getMessage();
            return [];
        }
    }



    public function getCategory($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM category WHERE id = ?");
        $stmt->execute([$id]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        include_once __DIR__ . '/../views/category-update.php';
    }


    public function categoryupdate($params)
    {
        if (is_array($params) && !empty($params)) {
            $sql = "UPDATE category SET categoryname = ?, categorydetail = ?";
            if ($params['image_path'] !== null) {
                $sql .= ", image_path = ?";
            }
            $sql .= " WHERE id = ?";

            $stmt = $this->db->prepare($sql);


            $stmt->bindParam(1, $params['categoryname']);
            $stmt->bindParam(2, $params['categorydetail']);


            if ($params['image_path'] !== null) {
                $stmt->bindParam(3, $params['image_path']);
                $stmt->bindParam(4, $params['id']);
            } else {
                $stmt->bindParam(3, $params['id']);
            }


            $stmt->execute();
        }
    }

    public function addCategory($params)
    {
        try {

            $sql = "INSERT INTO category (categoryname, categorydetail, image_path) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($sql);


            $stmt->bindParam(1, $params["categoryname"]);
            $stmt->bindParam(2, $params["categorydetail"]);
            $stmt->bindParam(3, $params["image_path"]);


            $stmt->execute();
        } catch (PDOException $e) {

            throw new Exception("Kategori eklenirken bir hata oluştu: " . $e->getMessage());
        }
    }

    public function getCategoryImage($id)
    {
        try {

            $stmt = $this->db->prepare("SELECT image_path FROM category WHERE id = ?");
            $stmt->execute([$id]);

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result ? $result['image_path'] : '';
        } catch (PDOException $e) {

            echo "Error fetching category image: " . $e->getMessage();
            return '';
        }
    }

    public function deleteCategory($categoryId)
    {
        try {

            $imagePath = $this->getCategoryImage($categoryId);


            if (!empty($imagePath)) {
                unlink($imagePath);
            }

            // Kategoriyi veritabanından sil
            $sql = "DELETE FROM category WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$categoryId]);


            $categoryListURL = asset('category');
            header("Location: $categoryListURL");
            exit();
        } catch (PDOException $e) {

            echo "Hata: " . $e->getMessage();
        }
    }
}
