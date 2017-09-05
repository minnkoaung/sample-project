@extends('layouts.master')
@section('title')
    <title>Widgets</title>
    @endsection
@section('content')
    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li class='active'>Categories</li>
    </ol>
    <div>
        <h2>Category</h2>
        <a href="/category/create">
            <button type="button" class="btn btn-default btn-primary"> Create New </button>
        </a>
    </div>
    
    <hr/>
    @if($categories->count() > 0)
        <table class="table table-hover table-bordered table-striped">
         <thead>
         <th>Id</th>
         <th>Name</th>
         <th>Date Created</th>
         </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td><a href="/category/{{ $category->id }}-{{ $category->slug }}"> {{$category->name}} </a></td>
                    <td>{{ $category->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
    Sorry, no categories
    @endif
    {{ $categories->links() }}
    @endsection