@extends('layouts.app')

@section('content')
    <div class="container rounded bg-white mt-5">
        <div class="row">
            <div class="col-md-3 border-right bg-secondary">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5 text-white"><img class="rounded-circle mt-5"
                        src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?f=y"><span
                        class="font-weight-bold">Admin</span><span class="">admin@mail.com</span><span> </span>
                </div>
            </div>
            <div class="col-md-5">
                <div class="p-3 py-5">
                    {{-- <div class="d-flex justify-content-between align-items-center experience"><span>User Profile</span><span class="border px-3 p-1 add-experience"><i
                                class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                    <div class="col-md-12"><label class="labels">Experience in Designing</label><input
                            type="text" class="form-control" placeholder="experience" value=""></div> <br>
                    <div class="col-md-12"><label class="labels">Additional Details</label><input type="text"
                            class="form-control" placeholder="additional details" value=""></div> --}}

                    <div class="card" style="height: 100%;">
                        <div class="card-header">
                            Profile View
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" id="name" name="name" placeholder="Enter Your Name">
                                <br />
                                <label for="username">Username</label>
                                <input class="form-control" type="text" id="username" name="Username" placeholder="Enter Your Username">
                                <br />
                                <label for="email">Email</label>
                                <input class="form-control" type="email" id="email" name="email" placeholder="Enter Your Email">
                                <br />
                                <label for="contact_number">Contact Number</label>
                                <input class="form-control" type="tel" id="contact_number" name="contact_number" placeholder="Enter Your Contact Number">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
