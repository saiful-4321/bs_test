<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JsonRequest extends FormRequest
{
    public function json($key = null, $default = null)
    {
        return json_decode($this->getContent(), true) ?? [];
    }

    public function all($keys = null)
    {
        return array_merge(parent::all(), $this->json());
    }
}
