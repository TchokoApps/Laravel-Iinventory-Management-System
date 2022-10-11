@extends('backend.master')
@section('page-content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create  Category Page</h4><br><br>

                    <form method="POST" action="{{ route('backend.category.store') }}" class="custom-validation">
                        @csrf
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                            <div class="form-group col-sm-10">
                                <input class=" form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" required>
                                @error('name')
                                <div class="alert bg-red">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->
                        <input type="submit" class="btn btn-primary waves-effect waves-light" value="Create  Category" required>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->

@endsection
