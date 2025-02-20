<?php
require_once "models/Product.php";

class ProductController {
    private $product;

    public function __construct($db) {
        $this->product = new Product($db);
    }

    public function list() {
        echo json_encode($this->product->getAll());
    }

    public function create($data) {
        if (isset($data['name'], $data['price'])) {
            if ($this->product->add($data['name'], $data['price'])) {
                echo json_encode(["message" => "Product added successfully"]);
            } else {
                echo json_encode(["message" => "Failed to add product"]);
            }
        }
    }

    public function update($data) {
        if (isset($data['id'], $data['name'], $data['price'])) {
            if ($this->product->update($data['id'], $data['name'], $data['price'])) {
                echo json_encode(["message" => "Product updated successfully"]);
            } else {
                echo json_encode(["message" => "Failed to update product"]);
            }
        }
    }

    public function delete($data) {
        if (isset($data['id'])) {
            if ($this->product->delete($data['id'])) {
                echo json_encode(["message" => "Product deleted successfully"]);
            } else {
                echo json_encode(["message" => "Failed to delete product"]);
            }
        }
    }
}
?>
