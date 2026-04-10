@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card" id="imagen1">
                <div class="card-header bg-primary text-white">
                    <h4>Imagen 1: Datos del Usuario</h4>
                </div>
                <div class="card-body text-center">
                    <div style="border: 2px solid #007bff; padding: 20px; border-radius: 10px;">
                        <h3>DATOS DEL USUARIO</h3>
                        <hr>
                        <p><strong>Nombre:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Empresa:</strong> {{ $company->business_name ?? 'Sin empresa asignada' }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card" id="imagen2">
                <div class="card-header bg-success text-white">
                    <h4>Imagen 2: Datos de la Empresa</h4>
                </div>
                <div class="card-body">
                    <div style="border: 2px solid #28a745; padding: 20px; border-radius: 10px;">
                        <h4>{{ $company->business_name ?? 'Sin empresa' }}</h4>
                        <hr>
                        <p><strong>Teléfono:</strong> {{ $company->phone ?? 'N/A' }}</p>
                        <p><strong>Email:</strong> {{ $company->email ?? 'N/A' }}</p>
                        <p><strong>IBAN AEAT:</strong> {{ $company->iban_para_aeat ?? 'N/A' }}</p>
                        <p><strong>SWIFT/BIC:</strong> {{ $company->swift_bic_para_aeat ?? 'N/A' }}</p>
                        <p><strong>Inscrito devolución mensual:</strong> {{ $company->inscrito_registro_devolucion_mensual ? 'Sí' : 'No' }}</p>
                        <p><strong>Régimen simplificado:</strong> {{ $company->tributa_exclusivamente_regimen_simplificado ? 'Sí' : 'No' }}</p>
                        <p><strong>Autoliquidación conjunta:</strong> {{ $company->autoliquidacion_conjunta ? 'Sí' : 'No' }}</p>
                        <p><strong>Declarado concurso:</strong> {{ $company->declarado_concurso_acreedores ? 'Sí' : 'No' }}</p>
                        @if($company->fecha_concurso_acreedores)
                            <p><strong>Fecha concurso:</strong> {{ $company->fecha_concurso_acreedores }}</p>
                        @endif
                        <p><strong>Volumen operaciones:</strong> {{ $company->volumen_operaciones_modelo_390 ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mt-4">
        <div class="col text-center">
            <a href="{{ route('profile.download') }}" class="btn btn-danger btn-lg">
                Descargar ambas imágenes en PDF
            </a>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-lg">
                Volver al Dashboard
            </a>
        </div>
    </div>
</div>
@endsection
