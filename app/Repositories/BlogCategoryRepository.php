<?php


namespace App\Repositories;

use App\Models\BlogCategory as Model;

class BlogCategoryRepository extends CoreRepository{

    /**
     * @return string
     */
    public function getModelClass(){
        return Model::class;
    }

    /**
     * Get categories with pagination
     *
     * @param int|null $perPage
     * @return Model
     */
    public function getAllWithPagination($perPage = null){
        $columns = ['id', 'title', 'description'];

        $categories = $this->startCondition()
            ->select($columns)
            ->paginate($perPage);

        return $categories;
    }
    public function getForComboBox(){
        $categories = $this->startCondition()
            ->selectRaw('id, CONCAT (id, ". ", title) as id_title')
            ->toBase()
            ->get();
        return $categories;
    }
    /**
     * Get category for editing in admin panel
     *
     * @param int $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEdit($id){
        $columns = ['id', 'title', 'description'];

        $category = $this->startCondition()
            ->select($columns)
            ->find($id);

        return $category;
    }

}
