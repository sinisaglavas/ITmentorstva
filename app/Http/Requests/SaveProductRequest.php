<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // mora biti true da bi radila provera validacije
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:products', // dodato da ime mora biti jedinstveno - ne moze biti ponovo upisano isto ime
            'amount' => 'required|integer',
            'price' => 'required|numeric', // celi i decimalni brojevi
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // image → validira da je fajl slika / mimes → dozvoljeni formati
            'description' => 'required|string',
        ];
    }
}
