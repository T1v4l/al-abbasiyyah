<?php

namespace App\Http\Controllers;

use App\Models\Brosur;
use App\Models\Program;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Menampilkan halaman detail program unggulan.
     */
    public function program()
    {
        $program = Program::latest()->get();
        return view('pages.program', compact('program'));
    }

    public function brosur()
    {
        $brosur = Brosur::latest()->get();
        return view('informasi.brosur', compact('brosur'));
    }
}