@extends('layouts.app')

@section('title', $title = "Projects' list")

@section('content')
<section>
    <div class="container py-4">
      <div class="row justify-content-between align-items-center">
        <h1 class="mb-3 col-6">{{ $title }}</h1>
        @auth
            <div class="col-2 text-end">
                <a class="btn btn-primary" href="{{ route('admin.projects.create') }}">Create a new Project</a>
            </div>
        @endauth    
    </div>

      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Title</th>
            <th scope="col">Link</th>
            <th scope="col">Repository</th>
            <th scope="col">Last commit</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->title }}</th>
                    <td>
                        <a href={{ $project->github_link }} target="_blank">{{ $project->github_link }}</a>
                    </td>
                    <td>{{ $project->repository }}</td>
                    <td>{{ $project->last_commit }}</td>
                    <td class="text-center">
                      <a href="{{ route('projects.show', $project )}}">
                          <i class="fa-solid fa-circle-info"></i>
                      </a>
                    @auth
                        <a href="{{ route('admin.projects.edit' , $project)}}">
                          <i class="fa-solid fa-file-pen"></i>
                        </a>
                        <form class="d-inline-block" action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="border border-0 delete-button" type="submit" data-title='{{ $project->title }}'>
                            <i class="fa-solid fa-trash-can text-danger"></i>
                        </button>
                        </form>
                    </td>
                    @endauth
                </tr>
            @endforeach
          
        </tbody>
      </table>
      
      {{ $projects->links() }}
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

@section('js')
    <script>

      const deleteButtons = document.querySelectorAll('.delete-button');

        if(deleteButtons) {

          deleteButtons.forEach(button => {
          
            button.addEventListener('click', function (event) {

              if(!confirm('This action will permanently delete the post ' + this.dataset.title)) {

                event.preventDefault();

              }

            })
        });

      }

      // 
      

    </script>
@endsection