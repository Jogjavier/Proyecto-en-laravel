@extends('layouts.app')
@section('title','trainers')
@section('content')

    <img style="height: 100px; width: 100px; background-color: #EFEFEF; margin: 20px;" 
                             class="card-img-top rounded-circle mx-auto d-block" 
                             src="../images/{{ $trainer->avatar}}"alt="">
                             
                        
                            <h5 class="text-center">{{ $trainer->name }}</h5>
                            <div class="text-center">
                                <p>Entrenador especializado en el área de entrenamiento personal.</p>
                                <a href="/delete/{{ $trainer->id }}" class="btn btn-primary">Delete...</a>
                                <a href="/trainers/{{$trainer->id}}/edit" class="btn btn-secondary">Editar</a>
                            </div>
                            
                           
                        
                        
@endsection