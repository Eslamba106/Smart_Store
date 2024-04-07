<?php 

namespace App\Repositories\Product;


interface ProductRepositoryModel
{
    public function getProducts() ;
    public function add($product) ;
    public function delete($id);


}