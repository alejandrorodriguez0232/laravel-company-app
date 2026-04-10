<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
{
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'business_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'iban_para_aeat' => 'nullable|string|max:34',
            'swift_bic_para_aeat' => 'nullable|string|max:11',
            'inscrito_registro_devolucion_mensual' => 'boolean',
            'tributa_exclusivamente_regimen_simplificado' => 'boolean',
            'autoliquidacion_conjunta' => 'boolean',
            'declarado_concurso_acreedores' => 'boolean',
            'fecha_concurso_acreedores' => 'nullable|date',
            'concurso_acreedores_autoliquidacion_preconcursal' => 'boolean',
            'concurso_acreedores_autoliquidacion_postconcursal' => 'boolean',
            'regimen_especial_criterio_caja' => 'boolean',
            'opcion_criterio_caja' => 'boolean',
            'destinatario_operaciones_regimen_especial_criterio_caja' => 'boolean',
            'aplicacion_prorrata_especial' => 'boolean',
            'revocacion_prorrata_especial' => 'boolean',
            'exonerado_modelo_390' => 'boolean',
            'volumen_operaciones_modelo_390' => 'nullable|numeric|min:0'
        ];
    }

    public function messages(): array
    {
        return [
            'business_name.required' => 'El nombre de la empresa es obligatorio',
            'business_name.max' => 'El nombre no puede exceder los 255 caracteres',
            'email.email' => 'Debe ser un email válido',
            'fecha_concurso_acreedores.date' => 'La fecha debe ser válida',
            'volumen_operaciones_modelo_390.numeric' => 'El volumen debe ser un número',
        ];
    }
}
