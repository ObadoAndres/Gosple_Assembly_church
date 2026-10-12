<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SermonRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->is_admin;
    }

    public function rules(): array
    {
        $sermonId = $this->route('sermon') ? ($this->route('sermon')->id ?? null) : null;

        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('sermons', 'slug')->ignore($sermonId)],
            'scripture_reference' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'preacher' => ['nullable', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'sermon_date' => ['nullable', 'date'],
            'video_url' => ['nullable', 'string', 'max:500', 'url'],
            'audio_url' => ['nullable', 'string', 'max:500', 'url'],
            'is_published' => ['sometimes', 'boolean'],
        ];
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $videoUrl = $this->input('video_url');
            $audioUrl = $this->input('audio_url');

            if ($videoUrl && $this->isDangerousUrl($videoUrl)) {
                $validator->errors()->add('video_url', 'Invalid video URL.');
            }

            if ($audioUrl && $this->isDangerousUrl($audioUrl)) {
                $validator->errors()->add('audio_url', 'Invalid audio URL.');
            }
        });
    }

    protected function isDangerousUrl(string $url): bool
    {
        $parsed = parse_url($url);
        if (!isset($parsed['scheme'])) {
            return true;
        }
        return strtolower($parsed['scheme']) === 'javascript';
    }
}
