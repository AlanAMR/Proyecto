<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ArchivoPasswordEmails implements FromView
{
    public function view(): View
    {
        return view('exports.template_password_emails');
    }
}