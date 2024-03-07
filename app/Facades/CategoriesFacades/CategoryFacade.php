<?php 

namespace App\Facades\Categories;

use App\Repositories\Category\CategoryRepositoryModel;
use Illuminate\Support\Facades\Facade;


class CategoryFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return CategoryRepositoryModel::class;
    }
}