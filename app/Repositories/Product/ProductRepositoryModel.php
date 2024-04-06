<?php 

namespace App\Repositories\Product;

use App\Models\Category;
use Illuminate\Support\Collection;

interface ProductRepositoryModel
{
    public function get() ;
    public function add($product) ;
    public function delete($id);


}