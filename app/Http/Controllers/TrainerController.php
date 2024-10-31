<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Controllers\Trainer;
use App\Models\Trainer;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainers = Trainer::all();
        return view('trainers.index', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('create');

        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs('public/images', $fileName);
    
            
            $trainer = new Trainer();
            $trainer->name = $request->name;
            $trainer->avatar = $fileName;
            $trainer->save();
    
            return redirect()->route('trainers.index')->with('success', 'Entrenador guardado con éxito');
        }
    
        return redirect()->route('trainers.create')->with('error', 'Error al subir la imagen');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //return 'tengo que regresar el id';

        $trainer = Trainer::find($id);
        //return $trainer;
        //return view('trainers.show');
        return view('trainers.show',compact('trainer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trainer $trainer)
    {
        
        //return $trainer;
        return view('trainers.edit', compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trainer $trainer)
    {
        //return $request;
        //$trainer->fill($request->except('avatar'));
        //$trainer->save( );
        //return "update";
        $request->validate([
            'name' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // El avatar es opcional
        ]);
    
        // Actualizar el nombre y apellido
        $trainer->name = $request->name;
        $trainer->apellido = $request->apellido;
    
        // Verificar si se subió una nueva imagen
        if ($request->hasFile('avatar')) {
            // Eliminar la imagen anterior si existe
            if ($trainer->avatar && Storage::exists('public/images/' . $trainer->avatar)) {
                Storage::delete('public/images/' . $trainer->avatar);
            }
    
            // Subir la nueva imagen
            $file = $request->file('avatar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/images', $fileName);
    
            // Actualizar el campo 'avatar' en la base de datos
            $trainer->avatar = $fileName;
        }
    
        // Guardar los cambios en la base de datos
        $trainer->save();
    
        // Redirigir a la vista de lista de entrenadores con un mensaje de éxito
        return redirect()->route('trainers.index')->with('success', 'Entrenador actualizado correctamente.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            
            $trainer = Trainer::findOrFail($id);
    
            
            if ($trainer->delete()) {
                
                $file_path = 'public/images/'.$trainer->avatar; 
    
                
                Log::info('Ruta del archivo a eliminar: '.$file_path);
    
                
                if (Storage::exists($file_path)) {
                    Storage::delete($file_path);
                    Log::info('Archivo eliminado: '.$file_path);
                    session()->flash('success', 'Entrenador y archivo eliminados correctamente.');
                } else {
                    Log::warning('El archivo no existe: '.$file_path);
                    session()->flash('error', 'El archivo no existe.');
                }
    
                
                return redirect()->route('trainers.index');
            }
    
            
            return redirect()->route('trainers.index')->with('error', 'No se pudo eliminar el entrenador.');
    
        } catch (\Exception $e) {
            
            Log::error('Error al eliminar el entrenador: '.$e->getMessage());
    
            
            return redirect()->route('trainers.index')->with('error', 'Ocurrió un error al intentar eliminar el entrenador.');
        }
    }
    
}
