<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $company = $user->company;
        
        return view('profile.show', compact('user', 'company'));
    }

    public function downloadImages()
    {
        $user = Auth::user();
        $company = $user->company;
        
        $pdf = Pdf::loadView('pdf.company-images', compact('user', 'company'));
        
        return $pdf->download('datos_usuario_empresa.pdf');
    }
}
