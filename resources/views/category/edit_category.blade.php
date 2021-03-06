@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>Update Category</h2>
                <form method="post" action="{{url('/update_category/'.$category->id)}}">
                    <fieldset>
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="control-label">Category Name</label>
                            <div class="controls">
                                <input class="form-control" type="text" name="name" value="{{$category->name}}"
                                       required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Category Description</label>
                            <div class="controls">
                        <textarea class="form-control" rows="5" name="description"
                                  required="">{{$category->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-label">Select Parent Category</div>
                            <div class="controls">
                                <select name="category_id" class="form-control">
                                    <option value="">No parent category</option>
                                    @foreach ($parent_category as $p_category)
                                        <option value="{{$p_category->id}}"
                                                @if($p_category->id==$category->category_id) selected @endif>{{$p_category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a class="btn" href="{{route('all_categories')}}">Cancel</a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection()