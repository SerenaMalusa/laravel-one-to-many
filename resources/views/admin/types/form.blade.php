@extends('layouts.app')

@section('title') 
    @if(isset($type->id))
        {{ $title = "Modify " . $type->name }}
    @else
        {{ $title = 'Create new type'}}
    @endif

@endsection

@section('content')

    <section>
        <div class="container py-4">
            <h1>{{ $title }}</h1>
        </div>
    </section>    

    

@endsection
