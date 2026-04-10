<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Company;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'business_name' => ['sometimes', 'string', 'max:255'],
            'phone' => ['sometimes', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return User
     */
    protected function create(array $data)
    {
        $company = Company::create([
            'business_name' => $data['business_name'] ?? $data['name'] . ' Company',
            'phone' => $data['phone'] ?? '',
            'email' => $data['email'],
            'iban_para_aeat' => 'ES9121000418450200051332',
            'swift_bic_para_aeat' => 'CAIXESBBXXX',
            'inscrito_registro_devolucion_mensual' => true,
            'tributa_exclusivamente_regimen_simplificado' => false,
            'autoliquidacion_conjunta' => true,
            'declarado_concurso_acreedores' => false,
            'fecha_concurso_acreedores' => null,
            'concurso_acreedores_autoliquidacion_preconcursal' => false,
            'concurso_acreedores_autoliquidacion_postconcursal' => false,
            'regimen_especial_criterio_caja' => false,
            'opcion_criterio_caja' => false,
            'destinatario_operaciones_regimen_especial_criterio_caja' => false,
            'aplicacion_prorrata_especial' => false,
            'revocacion_prorrata_especial' => false,
            'exonerado_modelo_390' => false,
            'volumen_operaciones_modelo_390' => 100000.00
        ]);

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'company_id' => $company->id
        ]);
    }
}
