<?php 

namespace App\Repositories\Brand;

// use App\Models\Brand;
// use Illuminate\Support\Collection;

interface BrandRepositoryModel
{
    public function getBrands() ;
    public function add($brand) ;
    public function delete($id);


}