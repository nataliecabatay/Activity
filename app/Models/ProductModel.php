<?php
namespace App\Models;
use CodeIgniter\Model;
class ProductModel extends Model{
    protected $table= 'products';
    protected $primaryKey = 'Id';

    protected $allowedFields = ['ProductName','ProductDescription','ProductCategory','ProductQuantity','ProductPrice'];
}

?>