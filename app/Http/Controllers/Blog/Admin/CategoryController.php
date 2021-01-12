<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCategoryStoreRequest;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Models\BlogCategory;
use App\Repositories\BlogCategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends BaseController
{
    /**
     * @var BlogCategoryRepository
     */
    private $blogCategoryRepository;

    /**
     * CategoryController constructor.
     */
    public function __construct(){
        parent::__construct();

        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->blogCategoryRepository->getAllWithPagination(5);

        return view('blog.admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BlogCategoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryStoreRequest $request)
    {
        $category = new BlogCategory();

        $category->title = $request->title;
        $category->slug = Str::slug($request->title);
        $category->description = $request->description;

        $category->save();

        return redirect()->route('admin.blog.categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @param BlogCategoryRepository $repository
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->blogCategoryRepository->getEdit($id);

        if(empty($category)){
            abort(404);
        }

        return view('blog.admin.categories.edit',
            compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {

        $category = $this->blogCategoryRepository->getEdit($id);
        $category->title = $request->title;
        $category->slug = Str::slug($request->title);
        $category->description = $request->description;
        $category->save();

        return redirect()->route('admin.blog.categories.index');
    }
}
