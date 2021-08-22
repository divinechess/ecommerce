@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br>
                <img class="card-img-top" style="border-radius: 50%"
                     src="{{ (!empty($editData->profile_photo_path)) ?
                            url('upload/admin_images/'.$editData->profile_photo_path) : url('upload/no_image.jpg') }}" height="100%" width="100%"><br><br>
                <ul class="list-group list-group-flush">
                    <a href="" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                    <a href="" class="btn btn-primary btn-sm btn-block">Change Password</a>
                    <a href="" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>
            </div>   {{-- end column md 2 --}}
            <div class="col-md-2">
            </div>   {{-- end column md 4 --}}
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"> <span class="text-danger">Hi.. </span><strong>{{ Auth::user()->name }}</strong>
                        Welcome To Joe's Shop
                    </h3>

                </div>
            </div>   {{-- end column md 10 --}}

        </div> {{-- end of row --}}
    </div>

</div>

@endsection
