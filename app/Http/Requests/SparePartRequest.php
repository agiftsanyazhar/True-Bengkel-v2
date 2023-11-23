<?php

namespace App\Http\Requests;

use App\Models\{
    Brand,
    SparePart,
};
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\{
    Log,
    Storage,
};
use Illuminate\Support\Str;

class SparePartRequest extends FormRequest
{
    private $uploadPath;

    public function __construct()
    {
        $this->uploadPath = 'uploads/spare-part/';
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'spare_part_code' => 'required|string|unique:spare_parts',
            'brand_id' => 'required|integer',
            'tipe_motor_id' => 'required|integer',
            'name' => 'required|string',
            'headline' => 'required|string',
            'description' => 'required|string',
            'stock' => 'required|integer',
            'price' => 'required|integer',
        ];
    }

    public function store($request)
    {
        try {
            $data = $this->validated();

            $brand = Brand::findOrFail($data['brand_id']);
            $data['slug'] = Str::slug($brand->name) . '-spare-part';

            if ($request->hasFile('image')) {
                $imageName = $request->validate([
                    'image' => 'mimes:jpeg,jpg,png|max:2048'
                ]);

                $imageName = $request->file('image');
                $data['image'] = $imageName->store($this->uploadPath);
            }

            $sparePart = SparePart::create($data);

            $success = true;
            $message = 'Success';
        } catch (\Exception $e) {
            Log::debug($e->getMessage());

            $success = false;
            $message = 'Failure. ' . $e->getMessage();
        }

        return [
            'success' => $success,
            'message' => $message,
            'data' => $sparePart,
        ];
    }

    public function update($request)
    {
        try {
            $data = $this->validated();

            $sparePart = SparePart::findOrFail($request->id);

            if ($request->hasFile('image')) {
                $imageName = $request->validate([
                    'image' => 'mimes:jpeg,jpg,png|max:2048'
                ]);

                $imageName = $request->file('image');
                $data['image'] = $imageName->store($this->uploadPath);
                Storage::delete($sparePart->image);
            }

            $sparePart->update($data);

            $success = true;
            $message = 'Success';
        } catch (\Exception $e) {
            Log::debug($e->getMessage());

            $success = false;
            $message = 'Failure. ' . $e->getMessage();
        }

        return [
            'success' => $success,
            'message' => $message,
            'data' => $sparePart,
        ];
    }
}
