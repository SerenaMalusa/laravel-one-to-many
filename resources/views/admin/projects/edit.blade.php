@extends('layouts.app')

@section('title', $title = "Modify " . $project->title)

@section('content')
<section>
    <div class="container py-4">
      <h1 class="mb-5">{{ $title }}</h1>

      <form action="{{ route('admin.projects.update', $project) }}" method="POST">
        @csrf
        @method('PATCH')
    
        <div class="row flex-wrap mb-2">
            <div class="col-6 mb-2">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') ?? $project->title }}"/>
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-6 mb-2">

                <div class="row">
                    <div class="col-6">
                        <label for="repository" class="form-label">Repository</label>
                        <input type="text" class="form-control @error('repository') is-invalid @enderror" id="repository" name="repository" value="{{ old('repository') ?? $project->repository }}"/>
                        @error('repository')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-6">
                        <label for="type_id" class="form-label">Type</label>
                        <select class="form-select @error('type_id') is-invalid @enderror" id="type_id" name="type_id">
                            @foreach ($types as $type)
                            <option @if (old('type_id') ?? $project->type_id == $type->id ) selected @endif value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                            <option @if (old('type_id') ?? $project->type_id == null) selected @endif value="{{ null }}">No type</option>
                        </select>
                        @error('type_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                
            </div>
            
            <div class="col">
                <label for="creation_date" class="form-label">Created at</label>
                <input type="date" class="form-control @error('creation_date') is-invalid @enderror" id="creation_date" name="creation_date" value="{{ old('creation_date') ?? $project->creation_date }}" />
                @error('creation_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col">
                <label for="last_commit" class="form-label">Last commit's date</label>
                <input type="date" class="form-control @error('last_commit') is-invalid @enderror" id="last_commit" name="last_commit" value="{{ old('last_commit') ?? $project->last_commit }}" />
                @error('last_commit')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12">
                <label for="description" class="form-label">Description</label>
                <textarea
                    class="form-control mb-3 @error('description') is-invalid @enderror"
                    id="description"
                    name="description"
                    rows="4"
                >{{ old('description') ?? $project->description }}</textarea>
                @error('description')
                    <div class="invalid-feedback mb-3">
                        {{ $message }}
                    </div>
                @enderror
            </div>
    
            <div class="col-12">
                <label for="github_link" class="form-label">Link</label>
                <input type="url" class="form-control @error('github_link') is-invalid @enderror" id="github_link" name="github_link" value="{{ old('github_link') ?? $project->github_link }}"/>
                @error('github_link')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
    
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>

    </div>
  </section>
@endsection