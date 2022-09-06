<x-layout>

    <div class="row mb-2">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('categories.create') }}">Create a Category</a>
        </div>
    </div>

    <div class="row">
        <table class="table table-bordered border-secondary">
            <thead>
            <tr>
                <th>Category Name</th>
                <th>Category Slug</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        <form action="{{ route('categories.edit', $category->id) }}" method="GET" class="d-inline mx-2">
                            <input type="hidden" name="id" value="{{$category->id}}">
                            <input type="hidden" name="name" value="{{$category->name}}">
                            <input type="hidden" name="slug" value="{{$category->slug}}">
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </form>
                        <form action="/categories/destroy" method="post" class="d-inline mx-2">
                            @csrf
                            {{method_field("delete")}}
                            <input type="hidden" name="id" value="{{$category->id}}">
                            <button type="submit" class="btn btn-danger btn-sm">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



</x-layout>
