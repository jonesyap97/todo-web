@component('layouts.app')
@slot('content')

<div class="card-columns">
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            <h3>Total Expenses</h3>
        </div>
        <div class="card-body text-center">
            <h3>RM {{$total_cost}}</h3>
        </div>
    </div>
</div>

<br>

<div class="row">
    <div class="col-md-12">
        <a href="{{route('new-expenses')}}" class="btn btn-dark">
            Add New Expenses
        </a>
    </div>
</div>

<br>

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Cost</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($expense_list as $list)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$list->description}}</td>
                    <td>{{$list->created_at}}</td>
                    <td>RM {{$list->cost}}</td>
                    <td>
                        <!-- <a href="{{route('delete-expenses',$list)}}" class="btn btn-sm btn-danger">Delete</a> -->
                        <button class="btn btn-sm btn-danger" onclick="confirmdelete()">Delete</button>
                    </td>
                </tr>
                <script>
                    function confirmdelete() {
                        if (confirm("Are you sure you want to delete this entry?")) {
                            location.replace("{{route('delete-expenses',$list)}}")
                        } else {
                            location.replace("{{route('expenses')}}")
                        }
                    }
                </script>

                @empty
                <tr>
                    <td colspan="4">No list yet</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endslot




@endcomponent