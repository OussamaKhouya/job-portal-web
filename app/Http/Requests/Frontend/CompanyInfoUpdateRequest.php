<?php

namespace App\Http\Requests\Frontend;

use App\Models\Company;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CompanyInfoUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'logo' => ['image', 'max:1500'],
            'banner' => ['image', 'max:1500'],
            'name' => ['required', 'string', 'max:100'],
            'bio' => ['required'],
            'vision' => ['required'],
        ];
        $company = Company::where('user_id', auth()->user()->id)->first();

        if(empty($company) || !$company?->logo){
                $rules['banner'][] = 'required';
        }
        if(empty($company) || !$company?->logo){
            $rules['logo'][] = 'required';
        }
        return $rules;
    }
}
