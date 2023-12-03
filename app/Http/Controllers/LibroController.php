<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Autor;
use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $autores = Autor::all();

        // Si hay un nombre de autor en la solicitud, realizar la búsqueda
        if ($request->has('nombre_autor')) {
            $nombreAutor = $request->input('nombre_autor');
            $libros = Libro::whereHas('autor', function ($query) use ($nombreAutor) {
                $query->where('nombre', 'like', '%' . $nombreAutor . '%');
            })->where('estado', true)->get();
        } else {
            // Si no hay un nombre de autor, obtener todos los libros con estado true
            $libros = Libro::where('estado', true)->get();
        }
    
        return view('libros.index', compact('libros', 'autores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $autores = Autor::all(); // Obtener todos los autores
        return view('libros.create', compact('autores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'year' => 'required|integer',
            'id_autor' => 'required|exists:autores,id',
        ]);

        Libro::create($request->all());

        return redirect()->route('libros.index')->with('success', 'Libro creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)
    {
        //
        return view('libros.show', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        //
        $autores = Autor::all();
        return view('libros.edit', compact('libro', 'autores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $libro = Libro::findOrFail($id);
        $request->validate([
            'nombre' => 'required',
            'year' => 'required|integer',
            'id_autor' => 'required|exists:autores,id',
        ]);

        $libro->update($request->all());

        return redirect()->route('libros.index')->with('success', 'Libro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        /* $libro = Libro::findOrFail($id);
        $libro->update(['estado' => false]);
    
      return redirect()->route('libros.index')->with('success', 'Libro eliminado exitosamente'); */ 

        DB::table('libros')->where('id', $id)->update(['estado' => false]);

    return redirect()->route('libros.index')->with('success', 'Libro eliminado exitosamente');
    }

    public function buscarPorNombreAutor(Request $request)
    {
        $nombreAutor = $request->input('nombre_autor');
        $libros = Libro::whereHas('autor', function ($query) use ($nombreAutor) {
            $query->where('nombre', 'like', '%' . $nombreAutor . '%');
        })->get();
    
        $autores = Autor::all();
    
        return view('libros.index', compact('libros', 'autores'));
    }
    
}
