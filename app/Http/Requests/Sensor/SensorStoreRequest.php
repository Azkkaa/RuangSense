<?php

namespace App\Http\Requests\Sensor;

use App\Models\Device;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SensorStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $apiKey = $this->bearerToken();
        $device = Device::where('api_key', '=', $apiKey)->first();

        if ($device) {
            $this->merge(['device' => $device]);

            return true;
        } else {
            return false;
        }
    }

    protected function failedAuthorization()
    {
        throw new HttpResponseException(response()->json([
            'message' => "Device doesn't found!!"
        ], 404));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'temp' => ['numeric', 'required'],
            'humid' => ['numeric', 'required'],
            'gas_value' => ['numeric', 'required'],
            'temp_status' => ['string', 'required'],
            'humid_status' => ['string', 'required'],
            'gas_status' => ['string', 'required']
        ];
    }

    /**
     * Summary of failedValidation
     * @param Validator $validator
     * @throws HttpResponseException
     * @return never
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => $validator->errors()->first()
        ], 422));
    }
}
