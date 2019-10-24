@component('layouts.app')
<!-- {{-- search for target file and inject the content in @slot(<targetcontainer>) --}} -->
    @slot('content')
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{route('update',$todo)}}">
                            <!-- validation token  -->
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" value="{{ $todo->title }}" class="form-control @if($errors->has('title')) is-invalid @endif">
                                @if($errors->has('title')) <span class="invalid-feedback">{{$errors->first('title')}}</span> @endif
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" rows="5" class="form-control @if($errors->has('description')) is-invalid @endif"> {{ $todo->description }}</textarea>
                                @if($errors->has('description')) <span class="invalid-feedback">{{$errors->first('description')}}</span> @endif
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="0" @if($todo->status == 0 ) selected @endif>In progress</option>
                                    <option value="1" @if($todo->status == 1 ) selected @endif>Completed</option>
                                </select>
                            </div>
                            <!-- add route name instead of url -->
                            <a href="{{ route('home') }}"class="btn btn-warning">Back</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endslot
@endcomponent