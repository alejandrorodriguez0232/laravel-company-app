@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Editar Datos de la Empresa</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('company.update') }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Nombre Empresa *</label>
                                    <input type="text" name="business_name" class="form-control @error('business_name') is-invalid @enderror" 
                                           value="{{ old('business_name', $company->business_name) }}">
                                    @error('business_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label>Teléfono</label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $company->phone) }}">
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email', $company->email) }}">
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label>IBAN (AEAT)</label>
                                    <input type="text" name="iban_para_aeat" class="form-control" value="{{ old('iban_para_aeat', $company->iban_para_aeat) }}">
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label>SWIFT/BIC (AEAT)</label>
                                    <input type="text" name="swift_bic_para_aeat" class="form-control" value="{{ old('swift_bic_para_aeat', $company->swift_bic_para_aeat) }}">
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label>Volumen Operaciones Modelo 390</label>
                                    <input type="number" step="0.01" name="volumen_operaciones_modelo_390" class="form-control" 
                                           value="{{ old('volumen_operaciones_modelo_390', $company->volumen_operaciones_modelo_390) }}">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-check mb-2">
                                    <input type="checkbox" name="inscrito_registro_devolucion_mensual" class="form-check-input" 
                                           value="1" {{ old('inscrito_registro_devolucion_mensual', $company->inscrito_registro_devolucion_mensual) ? 'checked' : '' }}>
                                    <label class="form-check-label">Inscrito en registro de devolución mensual</label>
                                </div>
                                
                                <div class="form-check mb-2">
                                    <input type="checkbox" name="tributa_exclusivamente_regimen_simplificado" class="form-check-input" 
                                           value="1" {{ old('tributa_exclusivamente_regimen_simplificado', $company->tributa_exclusivamente_regimen_simplificado) ? 'checked' : '' }}>
                                    <label class="form-check-label">Tributa exclusivamente régimen simplificado</label>
                                </div>
                                
                                <div class="form-check mb-2">
                                    <input type="checkbox" name="autoliquidacion_conjunta" class="form-check-input" 
                                           value="1" {{ old('autoliquidacion_conjunta', $company->autoliquidacion_conjunta) ? 'checked' : '' }}>
                                    <label class="form-check-label">Autoliquidación conjunta</label>
                                </div>
                                
                                <div class="form-check mb-2">
                                    <input type="checkbox" name="declarado_concurso_acreedores" class="form-check-input" 
                                           value="1" {{ old('declarado_concurso_acreedores', $company->declarado_concurso_acreedores) ? 'checked' : '' }}>
                                    <label class="form-check-label">Declarado concurso acreedores</label>
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label>Fecha Concurso Acreedores</label>
                                    <input type="date" name="fecha_concurso_acreedores" class="form-control" 
                                           value="{{ old('fecha_concurso_acreedores', $company->fecha_concurso_acreedores) }}">
                                </div>
                                
                                <div class="form-check mb-2">
                                    <input type="checkbox" name="concurso_acreedores_autoliquidacion_preconcursal" class="form-check-input" 
                                           value="1" {{ old('concurso_acreedores_autoliquidacion_preconcursal', $company->concurso_acreedores_autoliquidacion_preconcursal) ? 'checked' : '' }}>
                                    <label class="form-check-label">Concurso acreedores autoliquidación preconcursal</label>
                                </div>
                                
                                <div class="form-check mb-2">
                                    <input type="checkbox" name="concurso_acreedores_autoliquidacion_postconcursal" class="form-check-input" 
                                           value="1" {{ old('concurso_acreedores_autoliquidacion_postconcursal', $company->concurso_acreedores_autoliquidacion_postconcursal) ? 'checked' : '' }}>
                                    <label class="form-check-label">Concurso acreedores autoliquidación postconcursal</label>
                                </div>
                                
                                <div class="form-check mb-2">
                                    <input type="checkbox" name="regimen_especial_criterio_caja" class="form-check-input" 
                                           value="1" {{ old('regimen_especial_criterio_caja', $company->regimen_especial_criterio_caja) ? 'checked' : '' }}>
                                    <label class="form-check-label">Régimen especial criterio caja</label>
                                </div>
                                
                                <div class="form-check mb-2">
                                    <input type="checkbox" name="opcion_criterio_caja" class="form-check-input" 
                                           value="1" {{ old('opcion_criterio_caja', $company->opcion_criterio_caja) ? 'checked' : '' }}>
                                    <label class="form-check-label">Opción criterio caja</label>
                                </div>
                                
                                <div class="form-check mb-2">
                                    <input type="checkbox" name="destinatario_operaciones_regimen_especial_criterio_caja" class="form-check-input" 
                                           value="1" {{ old('destinatario_operaciones_regimen_especial_criterio_caja', $company->destinatario_operaciones_regimen_especial_criterio_caja) ? 'checked' : '' }}>
                                    <label class="form-check-label">Destinatario operaciones régimen especial criterio caja</label>
                                </div>
                                
                                <div class="form-check mb-2">
                                    <input type="checkbox" name="aplicacion_prorrata_especial" class="form-check-input" 
                                           value="1" {{ old('aplicacion_prorrata_especial', $company->aplicacion_prorrata_especial) ? 'checked' : '' }}>
                                    <label class="form-check-label">Aplicación prorrata especial</label>
                                </div>
                                
                                <div class="form-check mb-2">
                                    <input type="checkbox" name="revocacion_prorrata_especial" class="form-check-input" 
                                           value="1" {{ old('revocacion_prorrata_especial', $company->revocacion_prorrata_especial) ? 'checked' : '' }}>
                                    <label class="form-check-label">Revocación prorrata especial</label>
                                </div>
                                
                                <div class="form-check mb-2">
                                    <input type="checkbox" name="exonerado_modelo_390" class="form-check-input" 
                                           value="1" {{ old('exonerado_modelo_390', $company->exonerado_modelo_390) ? 'checked' : '' }}>
                                    <label class="form-check-label">Exonerado modelo 390</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Actualizar Empresa</button>
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
