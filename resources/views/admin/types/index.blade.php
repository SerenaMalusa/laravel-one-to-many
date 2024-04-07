@extends('layouts.app')

@section('title', $title = "Types' list")

@section('content')
    <section>
        <div class="container py-4">
            <div class="row justify-content-between align-items-center">
                <h1 class="mb-3 col-6">{{ $title }}</h1>
                    <div class="col-2 text-end">
                        <a class="btn btn-primary" href="#">Create a new Type</a>
                    </div>
            </div>

            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Colour</th>
                        <th scope="col">Total related projects</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($types as $type)
                    <tr>
                        <td>{{ $type->id }}</th>
                        <td>{{ $type->name }}</th>
                        <td>{!! $type->getColour() !!}</td>
                        <td>{{ sizeof($type->projects) }}</td>
                        <td class="text-center">
                            <a href="#">
                                <i class="fa-solid fa-circle-info"></i>
                            </a>
                            <a href="#">
                            <i class="fa-solid fa-file-pen"></i>
                            </a>
                            <form class="d-inline-block" action="#" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="border border-0 delete-button" type="submit" data-title='{{ $type->name }}'>
                                <i class="fa-solid fa-trash-can text-danger"></i>
                            </button>
                            </form>
                          </td>
                    </tr>
                    @endforeach
                  </tbody>
            </table>

            {{ $types->links() }}
        </div>
    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        button.delete-button {
          padding: 0;
          margin: 0;
          background: none;
          display: flex;
          align-items: flex-start;
        }
      </style>
@endsection