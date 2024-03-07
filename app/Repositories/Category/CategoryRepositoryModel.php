<?php 

namespace App\Repositories\Category;

use App\Models\Category;
use Illuminate\Support\Collection;

interface CategoryRepositoryModel
{
    public function get() ;
    public function add($category) ;

}