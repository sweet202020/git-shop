@extends('layouts.admin')


@section('content')


<h1 class="text-center">All Type</h1>
@include('partials.message')

@include('partials.errors')

<div class="container-fluid">
    <div class="row">
        <div class="col">

            <form action="{{route('admin.types.store')}}" method="post">
                @csrf

                <div>
                    <input id="name" name="name" type="text" class="form-control mb-3" placeholder="Type name" aria-label="Type name " aria-describedby="button-addon">
                    <button class="btn btn-secondary" type="submit" id="button-addon">Add</button>
                </div>
            </form>
        </div>
        <div class="col">

            <div class="table-responsive-md">
                <table class="table table-striped table-hover table-borderless table-primary align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">

                        @forelse ($types as $type)

                        <tr class="table-primary">
                            <td scope="row">{{$type->id}}</td>
                            <td>
                                <form action="{{route('admin.types.update', $type->id)}}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <input type="text" name="name" id="name" class="form-control" value="{{$type->name}}">
                                    <small>Press enter to update the category name</small>
                                </form>
                            </td>
                            <td>
                                <form action="{{route('admin.types.destroy', $type->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>


                        @empty
                        <tr class="table-primary">
                            <td scope="row">No categories</td>

                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div>



        </div>

    </div>
</div>


@endsection