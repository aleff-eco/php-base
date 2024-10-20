<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ProductSubcategoryController extends Controller
{
    public function index($categoryId)
    {
        $section = 1;
        return view('pages.admin.subcategory', compact('section', 'categoryId'));
    }

    public function create($categoryId)
    {
        $section = 2; 
        return view('pages.admin.subcategory', compact('section','categoryId'));
    }

    public function edit( $categoryId, $subcategoryId)
    {
        $section = 3;
        return view('pages.admin.subcategory', compact('section', 'categoryId' ,'subcategoryId'));
    }

    public function destroy($categoryId, $subcategoryId)
    {
        $section = 4; 
        return view('pages.admin.subcategory', compact('section','categoryId', 'subcategoryId'));
    }
}
