<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaintOfTheDay;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SaintOfTheDayController extends Controller
{
    public function index()
    {
        $santos = SaintOfTheDay::all();
        return view('saints.index', compact('santos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_santo' => 'required|string|max:255',
            'dia' => 'required|date',
            'frase' => 'required|string|max:255',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagemPath = null;
        if ($request->hasFile('imagem')) {
            $imagemPath = $request->file('imagem')->store('santos', 'public');
        }

        SaintOfTheDay::create([
            'nome_santo' => $request->nome_santo,
            'dia' => $request->dia,
            'frase' => $request->frase,
            'imagem' => $imagemPath,
        ]);

        return redirect()->back()->with('success', 'Santo cadastrado com sucesso!');
    }


    public function showSaintOfTheDay()
    {
        $today = now()->format('m-d'); // Formato de data que você quer comparar

        $santoDoDia = DB::table('saint_of_the_day')
            ->whereRaw("TO_CHAR(dia, 'MM-DD') = ?", [$today])
            ->first();

        return view('dashboard', compact('santoDoDia'));  // Passa o santo encontrado para a view
    }


    public function show($id)
    {
        $santo = SaintOfTheDay::find($id);

        if (!$santo) {
            return redirect()->route('dashboard')->with('error', 'Santo não encontrado');
        }

        return view('saints.show', compact('santo'));
    }

}
