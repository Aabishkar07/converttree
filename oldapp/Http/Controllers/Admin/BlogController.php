<?php

namespace App\Http\Controllers\Admin;

use App\FileService\ImageService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(
        protected ImageService $imageservice

    ) {
    }

    public function index()
    {
        abort_unless(Gate::allows('View Blog'), 403);


        $blogs = Blog::orderBy('updated_at', 'DESC')->paginate(4);

        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_unless(Gate::allows('Add Blog'), 403);


        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */



    public function store(StoreBlogRequest $request)
    {

        abort_unless(Gate::allows('Add Blog'), 403);



        $blog_img = $this->imageservice->fileUpload($request->featured_image, "Blog");


        $req = $request->all();
        $req['slug'] = Str::slug($request->title);
        $req['featured_image'] = $blog_img;
        Blog::create($req);

        return redirect()->route('admin.blogs.index')->with('popsuccess', 'Blog Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        abort_unless(Gate::allows('View Blog'), 403);

        return view('admin.blogs.view', compact("blog"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        abort_unless(Gate::allows('Edit Blog'), 403);


        return view('admin.blogs.edit', compact("blog"));
    }
    /**
     * Update the specified resource in storage.
     */



    public function update(UpdateBlogRequest $request, Blog $blog)
    {

        abort_unless(Gate::allows('Edit Blog'), 403);


        $req = $request->all();

        if ($request->hasFile('featured_image')) {

            if ($blog->featured_image) {
                $this->imageservice->imageDelete($blog->featured_image);
            }
            $blog_img = $this->imageservice->fileUpload($request->featured_image, "Blog");
            $req['featured_image'] = $blog_img;
        }

        $req['slug'] = Str::slug($request->title);
        $blog->update($req);

        return redirect()->route('admin.blogs.index')->with('popsuccess', 'Blog Edited');
    }

    public function destroy(Blog $blog)
    {

        abort_unless(Gate::allows('Delete Blog'), 403);


        if ($blog->featured_image) {
            $this->imageservice->imageDelete($blog->featured_image);
        }
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('popsuccess', 'Blog popSuccessfully Deleted');
    }
}
