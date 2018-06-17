<?php

namespace App\Http\Requests;

class CapRequest extends Request
{
    public function rules()
    {
        switch($this->method())
        {
            // CREATE
            case 'POST':
            {
                return [
                    // CREATE ROLES

                        'name' => 'required|unique:caps|max:255',
                        'price' => 'required',
                        'supplier_id' => 'required',
                        'category_id'  => 'required',

                ];
            }
            // UPDATE
            case 'PUT':
            case 'PATCH':
            {
                return [
                    // UPDATE ROLES

                    'price' => 'required',
                    'supplier_id' => 'required',
                    'category_id'  => 'required',
                ];
            }
            case 'GET':
            case 'DELETE':
            default:
            {
                return [];
            };
        }
    }

    public function messages()
    {
        return [
            // Validation messages
        ];
    }
}
