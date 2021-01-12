<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogPostStoreRequest;
use App\Models\BlogPost;
use App\Repositories\BlogCategoryRepository;
use App\Repositories\BlogPostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends BaseController
{

    /**
     * @var BlogPostRepository
     */
    private $blogPostRepository;

    /**
     * @var BlogCategoryRepository
     */
    private $blogCategoryRepository;

    /**
     * PostController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->blogPostRepository = app(BlogPostRepository::class);
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->blogPostRepository->getAllWithPagination(20);

        return view('blog.admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriesForComboBox = $this->blogCategoryRepository->getForComboBox();

        return view('blog.admin.posts.create', compact('categoriesForComboBox'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogPostStoreRequest $request)
    {
        $post = new BlogPost();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->user_id = 1;
        /*
         * TODO
         * 1. Доделать авторизацию
         * 2. Переделать логику создания
         */
        $post->category_id = $request->category_id;
        $post->text = $request->text;

        $post->save();

        return redirect()->route('admin.blog.posts.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->blogPostRepository->getEdit($id);
        $categoriesForComboBox = $this->blogCategoryRepository->getForComboBox();

        return view('blog.admin.posts.edit', compact('post', 'categoriesForComboBox'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = $this->blogPostRepository->getEdit($id);
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->text = $request->text;
        $post->save();

        return redirect()->route('admin.blog.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
