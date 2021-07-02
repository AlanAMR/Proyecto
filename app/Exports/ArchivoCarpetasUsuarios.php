<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ArchivoCarpetasUsuarios implements FromView
{
    public function view(): View
    {
        return view('exports.template_carpetas_usuarios');
    }
}