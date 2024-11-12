<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FAQ;
use App\Models\Category;

class FAQController extends Controller
{
    // Display a listing of the FAQs
    public function index()
    {
        $faqs = FAQ::with('category')->paginate(10);
        return view('admin.faqs.index', compact('faqs'));
    }

    // Show the form for creating a new FAQ
    public function create()
    {
        $categories = Category::all();
        return view('admin.faqs.create', compact('categories'));
    }

    // Store a newly created FAQ in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        FAQ::create($validated);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ created successfully.');
    }

    // Show the form for editing the specified FAQ
    public function edit(FAQ $faq)
    {
        $categories = Category::all();
        return view('admin.faqs.edit', compact('faq', 'categories'));
    }

    // Update the specified FAQ in storage
    public function update(Request $request, FAQ $faq)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq->update($validated);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ updated successfully.');
    }

    // Remove the specified FAQ from storage
    public function destroy(FAQ $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ deleted successfully.');
    }
}