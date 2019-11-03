<!-- {{-- search for target file and inject the content in @slot(<targetcontainer>) --}} -->
@component('layouts.app')
@slot('content')


<div class="card-columns" style="margin:auto;">
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            <h3>Number of task</h3>
        </div>
        <div class="card-body  text-center">
            <h2>{{$total_task}}</h2>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-warning text-white text-center">
            <h3>Inprogress</h3>
        </div>
        <div class="card-body  text-center">
            <h2>{{$ongoing_count}}</h2>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-success text-white text-center">
            <h3>Number of complete</h3>
        </div>
        <div class="card-body text-center">
            <h2>{{$completed_task}}</h2>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <a href="{{ route('create')}}" class="btn btn-primary">
            Create New Todo
        </a>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                @forelse($list_todo as $todo)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$todo->title}}</td>
                    <td>{{$todo->description}}</td>
                    <td>
                        <!-- Option 1 -->
                        @php
                        if($todo->status == 1){
                        $badge = 'badge-success';
                        $status = 'Completed';
                        }
                        else
                        {
                        $badge = 'badge-info';
                        $status = 'In Progress';
                        }
                        @endphp
                        <span class="badge {{$badge}}">{{$status}}</span>
                        <!-- Option 2 -->
                        <!-- <span class="badge {{ $todo->status == 0 ? 'badge-info' : 'badge-success'}}">
                        {{$todo->status == 0 ? 'In progress' : 'Completed'}}
                        </span>                     -->
                    </td>

                    <!-- <td>{{$todo->created_at}}</td> -->
                    <td>{{date('H:i:s d M Y',strtotime($todo->created_at))}}</td>

                    <td>
                        <a href="{{route('edit',$todo)}}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{route('delete',$todo)}}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="6">No todo yet</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endslot

@endcomponent