<?php

namespace App\Repository\Interfaces;

use App\Entity\Category;

/**
 * Interface CategoryRepositoryInterface
 * @package App\Repository\Interfaces
 */
interface CategoryRepositoryInterface
{
    /**
     * @param Category $category
     *
     * @return mixed
     */
    public function save(Category $category);
}