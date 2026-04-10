<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Datos Usuario y Empresa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .container {
            width: 100%;
        }
        .image-container {
            margin-bottom: 30px;
            page-break-inside: avoid;
        }
        .card {
            border: 2px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #f8f9fa;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            text-align: center;
        }
        .card-header h3 {
            margin: 0;
            color: #333;
        }
        .data-row {
            margin-bottom: 10px;
        }
        .label {
            font-weight: bold;
            display: inline-block;
            width: 200px;
        }
        .value {
            display: inline-block;
        }
        hr {
            margin: 15px 0;
            border: 1px solid #ddd;
        }
        .user-card {
            border-color: #007bff;
        }
        .company-card {
            border-color: #28a745;
        }
        .title {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="title">Información de Usuario y Empresa</h1>
        
        <!-- Imagen 1: Datos del Usuario -->
        <div class="image-container">
            <div class="card user-card">
                <div class="card-header">
                    <h3>IMAGEN 1: DATOS DEL USUARIO</h3>
                </div>
                <div class="data-row">
                    <span class="label">Nombre:</span>
                    <span class="value">{{ $user->name }}</span>
                </div>
                <div class="data-row">
                    <span class="label">Email:</span>
                    <span class="value">{{ $user->email }}</span>
                </div>
                <div class="data-row">
                    <span class="label">Empresa:</span>
                    <span class="value">{{ $company->business_name ?? 'Sin empresa asignada' }}</span>
                </div>
            </div>
        </div>
        
        <!-- Imagen 2: Datos de la Empresa -->
        <div class="image-container">
            <div class="card company-card">
                <div class="card-header">
                    <h3>IMAGEN 2: DATOS DE LA EMPRESA</h3>
                </div>
                <div class="data-row">
                    <span class="label">Nombre Empresa:</span>
                    <span class="value">{{ $company->business_name ?? 'N/A' }}</span>
                </div>
                <div class="data-row">
                    <span class="label">Teléfono:</span>
                    <span class="value">{{ $company->phone ?? 'N/A' }}</span>
                </div>
                <div class="data-row">
                    <span class="label">Email:</span>
                    <span class="value">{{ $company->email ?? 'N/A' }}</span>
                </div>
                <div class="data-row">
                    <span class="label">IBAN AEAT:</span>
                    <span class="value">{{ $company->iban_para_aeat ?? 'N/A' }}</span>
                </div>
                <div class="data-row">
                    <span class="label">SWIFT/BIC:</span>
                    <span class="value">{{ $company->swift_bic_para_aeat ?? 'N/A' }}</span>
                </div>
                <hr>
                <div class="data-row">
                    <span class="label">Inscrito devolución mensual:</span>
                    <span class="value">{{ $company->inscrito_registro_devolucion_mensual ? 'Sí' : 'No' }}</span>
                </div>
                <div class="data-row">
                    <span class="label">Tributa régimen simplificado:</span>
                    <span class="value">{{ $company->tributa_exclusivamente_regimen_simplificado ? 'Sí' : 'No' }}</span>
                </div>
                <div class="data-row">
                    <span class="label">Autoliquidación conjunta:</span>
                    <span class="value">{{ $company->autoliquidacion_conjunta ? 'Sí' : 'No' }}</span>
                </div>
                <div class="data-row">
                    <span class="label">Declarado concurso acreedores:</span>
                    <span class="value">{{ $company->declarado_concurso_acreedores ? 'Sí' : 'No' }}</span>
                </div>
                @if($company->fecha_concurso_acreedores)
                <div class="data-row">
                    <span class="label">Fecha concurso acreedores:</span>
                    <span class="value">{{ $company->fecha_concurso_acreedores }}</span>
                </div>
                @endif
                <div class="data-row">
                    <span class="label">Concurso preconcursal:</span>
                    <span class="value">{{ $company->concurso_acreedores_autoliquidacion_preconcursal ? 'Sí' : 'No' }}</span>
                </div>
                <div class="data-row">
                    <span class="label">Concurso postconcursal:</span>
                    <span class="value">{{ $company->concurso_acreedores_autoliquidacion_postconcursal ? 'Sí' : 'No' }}</span>
                </div>
                <div class="data-row">
                    <span class="label">Régimen especial criterio caja:</span>
                    <span class="value">{{ $company->regimen_especial_criterio_caja ? 'Sí' : 'No' }}</span>
                </div>
                <div class="data-row">
                    <span class="label">Opción criterio caja:</span>
                    <span class="value">{{ $company->opcion_criterio_caja ? 'Sí' : 'No' }}</span>
                </div>
                <div class="data-row">
                    <span class="label">Destinatario operaciones régimen especial:</span>
                    <span class="value">{{ $company->destinatario_operaciones_regimen_especial_criterio_caja ? 'Sí' : 'No' }}</span>
                </div>
                <div class="data-row">
                    <span class="label">Aplicación prorrata especial:</span>
                    <span class="value">{{ $company->aplicacion_prorrata_especial ? 'Sí' : 'No' }}</span>
                </div>
                <div class="data-row">
                    <span class="label">Revocación prorrata especial:</span>
                    <span class="value">{{ $company->revocacion_prorrata_especial ? 'Sí' : 'No' }}</span>
                </div>
                <div class="data-row">
                    <span class="label">Exonerado modelo 390:</span>
                    <span class="value">{{ $company->exonerado_modelo_390 ? 'Sí' : 'No' }}</span>
                </div>
                <div class="data-row">
                    <span class="label">Volumen operaciones modelo 390:</span>
                    <span class="value">{{ $company->volumen_operaciones_modelo_390 ?? 'N/A' }}</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
