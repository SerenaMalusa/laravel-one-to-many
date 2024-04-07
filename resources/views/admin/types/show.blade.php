@extends('layouts.app')

@section('title', "Type's detail'")

@section('content')
    <section>
        <div class="container py-4">
            <div class="row justify-content-between align-items-center">
                <h1 class="mb-3 col-6">{{ $type->name }}</h1>
                <div class="col-2 d-flex justify-content-end">
                    <a class="btn btn-primary" href="{{ route('admin.types.index')}}">Types' list</a>
                </div>
                
                <div class="col-6 mb-3">
                    <div class="mb-3">
                        <span class="h2 ms-2">Badge:</span>
                        <span>{!! $type->getBadge() !!}</span>                    
                    </div>
                    
                    <div>
                        <p>{{ $type->description }}</p>
                    </div>            
                </div>
                
                <div class="col-6 d-flex justify-content-end">
                    <a class="btn btn-primary ms-2" href="#">Modify this type</a>
                    <form class="d-inline" action="#" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" id='delete-btn'>Delete this type</button>
                    </form>
                </div>
            </div>

            <h2>Related projects:</h2>
            
            @include('layouts.partials.projects_table', ['projects' => $related_projects])
            
        </div>
    </section>
@endsection

@section('css')
    <style>
        img {
            width: 100%;
        }
    </style>
@endsection