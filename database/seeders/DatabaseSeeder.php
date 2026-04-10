<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $company = Company::create([
            'business_name' => 'Empresa Demo S.L.',
            'phone' => '123456789',
            'email' => 'demo@empresa.com',
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

        User::create([
            'name' => 'Usuario Demo',
            'email' => 'demo@example.com',
            'password' => Hash::make('password'),
            'company_id' => $company->id
        ]);
    }
}
