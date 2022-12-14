@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="alert alert-success" role="alert">
                      <h4 class="alert-heading">Success</h4>
                      <p>{{ __('You are logged in!') }}</p>
                      <p class="mb-0"></p>
                    </div>

                    <h3>Employee Details</h3>
                    <br>
                    <p>
                        <h4>Add Employees</h4>
                        <a href="{{ route('create') }}" class="btn btn-dark">New Employee</a>
                    </p>

                    <table class="table table-stripped table-dark table-hover">
                        <thead class="table-secondary">
                            <th>Employee name</th>
                            <th>ID number</th>
                            <th>Email</th>
                            <th>Office</th>
                            <th>Options</th>
                        </thead>
                        <tbody>
                            @forelse ($emp as $emps)
                                <tr>
                                    <td>{{ $emps->fname .' '. $emps->lname}}</td>
                                    <td>{{ $emps->idnum }}</td>
                                    <td>{{ $emps->email }}</td>
                                    <td>{{ $emps->office }}</td>
                                    <td>
                                        <a href="{{ route('edit', $emps->id) }}" class="btn btn-info">Edit</a>
                                        <a href="javascript:void(0)" id="delete-emp" data-url="{{ route('delete', $emps->id) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="5" >No records found</td>
                            @endforelse

                        </tbody>
                    </table>
                    {{-- Default pagination --}}
                    {{-- {{ $emp->render(); }} --}}
                    {{-- Pagination with bootstrap --}}
                    {!! $emp->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document.ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // When user clicks the on show button
        $('body').on('click', '#delete-emp', function(){

            var empURL = $(this).data('url');
            var trObj = $(this);

            if (confirm('Are you sure you want to remove this user?') == true) {
                $.ajax({
                    url: empURL,
                    type: 'DELETE',
                    dataType: 'json',
                    success: function(data) {
                        alert(data.success);
                        trObj.parents("tr").remove();
                    }
                });
            }
        });

    }));
</script>
@endsection
