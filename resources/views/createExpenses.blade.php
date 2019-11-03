@component('layouts.app')
@slot('content')

<div class="row" style="margin:auto;">
    <div class="col-md-8">
        <div class="card-header">
            New Expenses
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{route('store-expenses')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="5" class="form-control @if($errors->has('description')) is-invalid @endif">{{old('description')}}</textarea>
                        @if($errors->has('description')) <span class="invalid-feedback">{{$errors->first('description')}}</span> @endif
                    </div>
                    <div class="form-group">

                        <label for="cost">Cost</label>


                        <input type="text" id='cost' name='cost' class="form-control @if($errors->has('cost')) is-invalid @endif" value="{{old('cost')}}">
                        @if($errors->has('cost'))
                        {{ $errors}}
                        <span class="invalid-feedback">{{$errors->first('cost')}}</span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endslot


@endcomponent