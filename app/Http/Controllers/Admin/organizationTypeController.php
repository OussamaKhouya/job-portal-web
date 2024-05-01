<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrganizationType;
use App\Traits\SearchableTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class organizationTypeController extends Controller
{
    use SearchableTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $query = OrganizationType::query();
        $this->search($query, ['name','slug']);
        $organizationTypes = $query->paginate(10);
        return View('admin.organization-type.index', compact('organizationTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View('admin.organization-type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:organization_types,name']
        ]);

        $type = new OrganizationType();
        $type->name = $request->name;
        $type->save();

        notify()->success('created Successfully', 'Success!');

        return to_route('admin.organization-types.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $organizationType = OrganizationType::findOrFail($id);
        return View('admin.organization-type.edit', compact('organizationType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:organization_types,name,'.$id]
        ]);

        $type =  OrganizationType::findOrFail($id);
        $type->name = $request->name;
        $type->save();

        notify()->success('updated Successfully', 'Success!');

        return to_route('admin.organization-types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        try {
            OrganizationType::findOrFail($id)->delete();
            notify()->success('deleted Successfully', 'Success!');
            return response(['message' => 'success'], 200);
        }catch (\Exception $e){
            logger($e);
            notify()->error('deletion error', 'Something Went Wring Try Again!');
            return response(['message' => 'Something Went Wring Try Again!'], 500);
        }
    }
}
