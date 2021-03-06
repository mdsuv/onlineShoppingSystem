@extends('admin_layout')
@section('title','All Categories')
@section('admin_content')
    <h2>Categories</h2>
    <p class="alert-success">
        <?php
        if (Session::get('message')) {
            echo Session::get('message');
            Session::put('message', null);
        }
        ?>
    </p>
    <table class="table table-striped table-hover">
        <thead class="label-success">
        <tr>
            <th>Id</th>
            <th>Category Name</th>
            <th>Category Description</th>
            <th>Parent Category</th>
            <th>Publication Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        @foreach($all_category_info as $category)
            <tbody>
            <tr>
                <td>{{$category->id}}</td>
                <td class="center">{{$category->name}}</td>
                <td class="center">{{$category->description}}</td>
                <td class="center">{{$category->parent? $category->parent->name: ""}}</td>
                <td class="center">
                    @if($category->publication_status == 1)
                        <span class="label label-success">Active</span>
                    @else
                        <span class="label label-warning">Inactive</span>
                    @endif
                </td>
                <td class="center">
                    @if($category->publication_status == 1)
                        <a class="btn btn-warning" href="{{url('/inactive_category/'.$category->id)}}">
                            <i class="halflings-icon eye-close"></i>
                        </a>
                    @else
                        <a class="btn btn-success" href="{{url('/active_category/'.$category->id)}}">
                            <i class="halflings-icon eye-open"></i>
                        </a>
                    @endif

                    <a class="btn btn-info" href="{{url('/edit_category/'.$category->id)}}">
                        <i class="halflings-icon edit"></i>
                    </a>
                    <a class="btn btn-danger" id="delete" href="{{url('/delete_category/'.$category->id)}}">
                        <i class="halflings-icon trash"></i>
                    </a>
                </td>
            </tr>
            </tbody>

        @endforeach
    </table>
<div class="text-center">
    {!! $all_category_info->links() !!}
</div>

@endsection()