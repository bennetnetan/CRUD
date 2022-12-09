@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-info">
                <div class="card-header"><h4>New Employee</h4></div>
                <div class="card-body">
                    <form action="{{ route('update')}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="firstname">First name</label>
                            <input type="text" name="firstname" id="" class="form-control" placeholder="First name" aria-describedby="helpId" value="{{ $emp->fname }}">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="lastname">Last name</label>
                            <input type="text" name="lastname" id="" class="form-control" placeholder="Last name" aria-describedby="helpId" value="{{ $emp->lname }}">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="idNumber">ID number</label>
                            <input type="number" name="idNumber" id="" class="form-control" placeholder="IdNumber" aria-describedby="helpId"  value="{{ $emp->idnum }}">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="" class="form-control" placeholder="email" aria-describedby="helpId" value="{{ $emp->email }}">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="office">Office</label>
                            <input type="text" name="ofisi" id="" class="form-control" placeholder="Office" aria-describedby="helpId" value="{{ $emp->office }}">
                        </div>

                            <input type="number" name="idn" id="" class="form-control" placeholder="Office" aria-describedby="helpId" value="{{ $emp->id }}" hidden>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info">Submit</button>
                            <a href="{{ route('home') }}" class="btn btn-warning">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
