<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class AuthRedirectTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Create a company and user for testing
        $company = Company::create([
            'business_name' => 'Test Company',
            'phone' => '123456789',
            'email' => 'test@company.com',
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

        $this->user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'company_id' => $company->id
        ]);
    }

    public function test_login_redirects_to_dashboard()
    {
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($this->user);
    }

    public function test_logout_redirects_to_login()
    {
        $this->actingAs($this->user);
        
        $response = $this->post('/logout');
        
        $response->assertRedirect('/login');
        $this->assertGuest();
    }

    public function test_unauthenticated_user_redirected_to_login_from_dashboard()
    {
        $response = $this->get('/dashboard');
        
        $response->assertRedirect('/login');
    }

    public function test_authenticated_user_can_access_dashboard()
    {
        $response = $this->actingAs($this->user)->get('/dashboard');
        
        $response->assertStatus(200);
        $response->assertViewIs('dashboard');
    }

    public function test_registration_redirects_to_login()
    {
        $userData = [
            'name' => 'New User',
            'email' => 'newuser@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'business_name' => 'New Company',
            'phone' => '123456789'
        ];

        $response = $this->post('/register', $userData);

        $response->assertRedirect('/login');
        $this->assertDatabaseHas('users', [
            'name' => 'New User',
            'email' => 'newuser@example.com'
        ]);
        $this->assertDatabaseHas('companies', [
            'business_name' => 'New Company',
            'email' => 'newuser@example.com'
        ]);
    }
}
