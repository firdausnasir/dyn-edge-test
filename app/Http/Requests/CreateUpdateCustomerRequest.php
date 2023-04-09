<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CreateUpdateCustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $icNo = $this->input('ic_no');
        if (Str::length($icNo) === 12) {
            $this->merge([
                'ic_no' => Str::substr($icNo, 0, 6).'-'.Str::substr($icNo, 6, 2).'-'.Str::substr($icNo, 8, 4),
            ]);
        }

        $dob = $this->input('date_of_birth');
        $this->merge([
            'age' => Carbon::parse($dob)->age,
        ]);
    }

    public function rules(): array
    {
        return [
            'full_name'     => 'required|string|max:255',
            'email'         => 'required|email|max:255',
            'ic_no'         => 'required|string|max:255',
            'date_of_birth' => 'required|date_format:Y-m-d|before:tomorrow',
            'age'           => 'required|int',
            'mobile_no'     => 'nullable|string|max:255',
            'phone_no'      => 'nullable|string|max:255',
            'state'         => 'nullable|string|max:255',
            'country_id'    => 'required|exists:countries,id',
        ];
    }
}
