@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Panel de Control</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-header bg-primary text-white">
                                    Datos del Usuario y Empresa
                                </div>
                                <div class="card-body">
                                    <p><strong>Nombre:</strong> {{ Auth::user()->name }}</p>
                                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                                    <p><strong>Empresa:</strong> {{ Auth::user()->company->business_name ?? 'Sin empresa asignada' }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-info text-white">
                                    Acciones
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('company.edit') }}" class="btn btn-warning mb-2">Editar Datos de Empresa</a>
                                    <a href="{{ route('profile.show') }}" class="btn btn-success mb-2">Ver Imágenes</a>
                                    <a href="{{ route('profile.download') }}" class="btn btn-danger">Descargar PDF</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
