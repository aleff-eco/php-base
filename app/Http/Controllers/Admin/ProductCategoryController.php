<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubcategory;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //+
        $section = 1;
        return view('pages.admin.category',compact('section'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $section = 2;
        return view('pages.admin.category',compact('section'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $category)
    {
        $section = 3;
        return view('pages.admin.category',compact('section','category'));
    }

    public function show($categoryId)
    {   
        $section = 4;
        // Retorna la vista con los datos de las subcategorías
        return view('pages.admin.subcategory', compact('section', 'categoryId'));
    }

    public function deletecat()
    {
        dd("delete");
        $section = 4;
        return view('pages.admin.category', compact('section','categoryId'));
    }
    

}