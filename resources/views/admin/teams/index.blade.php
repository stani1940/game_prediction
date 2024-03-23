@extends('layouts.admin')
@section('title', 'Teams')
@section('content')
    <div class="text-center mb-3">
        <h1>Teams</h1>
        <a href="{{ route('teams.create') }}" class="btn btn-primary">Add team</a>
    </div>
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif
    <table id="datatable" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Team name</th>
            <th>Flag</th>
        </tr>
        </thead>
        <tbody>
        @foreach($teams as $team)
            <tr>
                <td>{{$team->name}}</td>
                <td></td>

                <td>
                    <div class="btn-group">
                        <div class="mr-3">
                            <a href="{{ route('teams.edit' , $team->id) }}" class="btn btn-success">Edit</a>
                        </div>
                        <form action="{{ route('teams.destroy', $team->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" class="btn btn-danger delete_button">
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

