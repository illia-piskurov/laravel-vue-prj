<?php

namespace App\Http\Controllers;

use App\Models\EducationalProgram;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EducationalProgramController extends Controller
{
    public function index() {
        return Inertia::render('EducationalPrograms/Index', [
            'programs' => EducationalProgram::latest()->get()
        ]);
    }
}
