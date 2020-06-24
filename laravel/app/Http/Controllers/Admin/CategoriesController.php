<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()

    {
        $categories = Category::withCount('products')->paginate(5);
        return view('admin/categories/index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin/categories/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\CreateCategoryRequest $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateCategoryRequest $request, Category $category )
    {
         $newCategory = $category->create([
             'title' => $request->get('title'),
             'description' => $request->get('description')
         ]);
        if (!empty($request->file('image'))){
            $imageService = app()->make(\App\Services\Contract\ImageServiceInterface::class);
            $filePath = $imageService->upload($request->file('image'));
            $newCategory->image()
                ->create([
                    'path' => $filePath
                ]);
        }



         return redirect(route('admin.categories.index'))
             ->with(['status' => 'The category has been created!']);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Category $category)

    {
        $image = array();
        if ($category->image()->exists()){
            $image = $category->image()->first()->toArray();
        }
        return view('admin.categories.edit', compact('category', 'image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCategoryRequest $request
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update([
            'title' => $request->get('title'),
            'description' => $request->get('description')
        ]);

        if (!empty($request->file('image'))){
            $imageService = app()->make(\App\Services\Contract\ImageServiceInterface::class);
            $filePath = $imageService->upload($request->file('image'));
            $oldImage = $category->image()->first();

            if(!is_null($oldImage)){
                $imageService->remove($oldImage->path);
            }

            if (is_null($oldImage)){
                $category->image()
                    ->create([
                        'path' => $filePath
                    ]);

            }else{
                $category->image()
                    ->update([
                        'path' => $filePath
                    ]);
            }


        }


        return redirect(route('admin.categories.index'))
            ->with(['status' => 'The category was successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();
        $category->image()->delete();


        return  redirect(route('admin.categories.index'))
            ->with(['status' => 'The category was successfully removed!']);
    }
}
