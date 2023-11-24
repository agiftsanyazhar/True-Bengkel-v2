<?php

namespace App\Http\Requests;

use App\Models\{
    About,
};
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\{
    Log,
    Storage,
};

class AboutRequest extends FormRequest
{
    private $uploadPath;

    public function __construct()
    {
        $this->uploadPath = 'uploads/about/';
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
            'name' => 'required|string',
            'headline' => 'required|string',
            'about' => 'required|string',
            'location' => 'required|string',
            'location' => 'required|string',
            'map' => 'required|string',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required|string',
            'opening_hours' => 'required|string',
            'closing_hours' => 'required|string',
            'hero_image' => 'mimes:jpeg,jpg,png|max:2048',
            'about_image' => 'mimes:jpeg,jpg,png|max:2048',
        ];
    }

    public function update($request)
    {
        try {
            $data = $this->validated();

            $about = About::findOrFail(1);

            if ($request->hasFile('hero_image')) {
                $heroImage = $request->file('hero_image');
                $data['hero_image'] = $heroImage->store($this->uploadPath);
                if ($about->hero_image) {
                    Storage::delete($about->hero_image);
                }
            }

            if ($request->hasFile('about_image')) {
                $aboutImage = $request->file('about_image');
                $data['about_image'] = $aboutImage->store($this->uploadPath);
                if ($about->about_image) {
                    Storage::delete($about->about_image);
                }
            }

            $about->update($data);

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
            'data' => $about,
        ];
    }
}
