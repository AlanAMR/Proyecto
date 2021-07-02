<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ArchivoLaptops implements FromView
{
    public function view(): View
    {
        return view('exports.template_laptops');
    }
}