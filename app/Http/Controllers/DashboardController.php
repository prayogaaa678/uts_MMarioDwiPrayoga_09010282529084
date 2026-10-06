<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('dashboard', [
            'totalBooks'      => Book::count(),
            'totalStock'      => (int) Book::sum('stock'),
            'totalCategories' => Category::count(),
            'categories'      => Category::withCount('books')->orderBy('name')->get(),
            'latestBooks'     => Book::with('category')->latest()->take(5)->get(),
        ]);
    }
}
