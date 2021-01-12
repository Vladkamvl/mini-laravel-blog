<?php


namespace App\Repositories;

use App\Models\BlogPost as Model;

class BlogPostRepository extends CoreRepository
{
    /**
     * @return string
     */
    public function getModelClass()
    {
        return Model::class;
    }

    /**
     * Get posts with pagination
     *
     * @param int|null $perPage
     * @return Model
     */
    public function getAllWithPagination($perPage = null){
        $columns = ['id', 'title', 'category_id', 'user_id'];

        $categories = $this->startCondition()
            ->select($columns)
            ->with(['category:id,title', 'user:id,name'])
            ->orderBy('id', 'DESC')
            ->paginate($perPage);

        return $categories;
    }

    /**
     * Get post for editing in admin panel
     *
     * @param int $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEdit($id){
        $post = $this->startCondition()
            ->find($id);

        return $post;
    }
}
