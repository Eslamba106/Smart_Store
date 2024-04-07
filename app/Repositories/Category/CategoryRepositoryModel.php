<?php 

namespace App\Repositories\Category;



interface CategoryRepositoryModel
{
    public function getCategories() ;
    public function add($category) ;

}