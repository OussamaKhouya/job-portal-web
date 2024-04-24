<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IndustryType;
use App\Traits\SearchableTrait;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndustryTypeController extends Controller
{
    use SearchableTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $query = IndustryType::query();
        $this->search($query, ['name','slug']);
        $industryTypes = $query->paginate(10);
        return View('admin.industry-type.index', compact('industryTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return View('admin.industry-type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:industry_types,name']
        ]);

        $type = new IndustryType();
        $type->name = $request->name;
        $type->save();

        notify()->success('created Successfully', 'Success!');

        return to_route('admin.industry-types.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $industryType = IndustryType::findOrFail($id);
        return View('admin.industry-type.edit', compact('industryType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:industry_types,name,'.$id]
        ]);

        $type =  IndustryType::findOrFail($id);
        $type->name = $request->name;
        $type->save();

        notify()->success('updated Successfully', 'Success!');

        return to_route('admin.industry-types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            IndustryType::findOrFail($id)->delete();
            notify()->success('deleted Successfully', 'Success!');
            return response(['message' => 'success'], 200);
        }catch (\Exception $e){
            logger($e);
            notify()->error('deletion error', 'Something Went Wring Try Again!');
            return response(['message' => 'Something Went Wring Try Again!'], 500);
        }
    }
}
