<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CompanyFoundingInfoUpdateRequest;
use App\Http\Requests\Frontend\CompanyInfoUpdateRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Traits\FileUploadTrait;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Validation\Rules;

class CompanyProfileController extends Controller
{
    use FileUploadTrait;
    function index(): View {
        $company = Company::where('user_id', auth()->user()->id)->first();
        return view('frontend.company-dashboard.profile.index', compact('company'));
    }

    function updateCompanyInfo(CompanyInfoUpdateRequest $request): RedirectResponse
    {
        $logoPath = $this->uploadFile($request, 'logo');
        $bannerPath = $this->uploadFile($request, 'banner');

        $data = [];
        if (!empty($logoPath))  $data['logo'] = $logoPath  ;
        if (!empty($bannerPath))  $data['banner'] = $bannerPath  ;
        $data['name'] = $request->name;
        $data['bio'] = $request->bio;
        $data['vision'] = $request->vision;

        Company::updateOrCreate(
            ['user_id' => auth()->user()->id],
            $data
        );

        notify()->success('Updated Successfully', 'Success!');
        return redirect()->back();
    }


    function updateFoundingInfo(CompanyFoundingInfoUpdateRequest $request): RedirectResponse
    {

        $data = [];
        $data['industry_type_id'] = $request->industry_type;
        $data['organization_type_id'] = $request->organization_type;
        $data['team_size_id'] = $request->team_size;
        $data['establishment_date'] = $request->establishment_date;
        $data['website'] = $request->website;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['state'] = $request->state;
        $data['country'] = $request->country;
        $data['map_link'] = $request->map_link;

        Company::updateOrCreate(
            ['user_id' => auth()->user()->id],
            $data
        );

        notify()->success('Updated Successfully', 'Success!');

        return redirect()->back();
    }

    function updateAccountInfo(Request $request): RedirectResponse
    {
        $request->validate([
                'username' => ['required', 'string', 'max:50'],
                'email' => ['required', 'email'],
            ]);

        Auth::user()->update([
            'name' => $request->username,
            'email' => $request->email
        ]);

        notify()->success('Updated Successfully', 'Success!');

        return redirect()->back();
    }


    function updatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        Auth::user()->update([
            'password' => bcrypt($request->password),
        ]);

        notify()->success('Updated Successfully', 'Success!');

        return redirect()->back();
    }
}
