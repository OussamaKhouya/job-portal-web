@extends('frontend.layouts.master-2')

@section('contents')

    <!-- Breadcrumb -->
    <div class="alice-bg padding-top-70 padding-bottom-70">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="breadcrumb-area">
                        <h1>Company Dashboard</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Company Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="breadcrumb-form">
                        <form action="#">
                            <input type="text" placeholder="Enter Keywords">
                            <button><i data-feather="search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <div class="alice-bg section-padding-bottom">
        <div class="container no-gliters">
            <div class="row no-gliters">
                <div class="col">
                    <div class="dashboard-container">
                        <div class="dashboard-content-wrapper policy-tab">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="privacy-tab" data-toggle="tab" href="#privacy" role="tab" aria-controls="privacy" aria-selected="true">Company Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="terms-tab" data-toggle="tab" href="#terms" role="tab" aria-controls="terms" aria-selected="false">Founding Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="regal-tab" data-toggle="tab" href="#regal" role="tab" aria-controls="regal" aria-selected="false">Account Settings</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="privacy" role="tabpanel" aria-labelledby="privacy-tab">

                                    {{-- Company Info --}}

                                    <form action="{{route('company.profile.company-info')}}" class="dashboard-form" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="dashboard-section row">
                                            <div class="col-sm-4">
                                                <div class="dashboard-section upload-profile-photo {{$errors->has('logo')? 'is-invalid':''}}">
                                                    <div class="update-photo">
                                                        <x-image-preview :source="$company?->logo"></x-image-preview>
                                                    </div>
                                                    <div class="file-upload">
                                                        <input type="file" class="file-input" name="logo"> Logo *
                                                    </div>
                                                </div>
                                                <x-input-error :messages="$errors->get('logo')"  class="mt-2"  />
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="dashboard-section upload-profile-photo {{$errors->has('banner')? 'is-invalid':''}}">
                                                    <div class="update-photo">
                                                        <x-image-preview :source="$company?->banner"></x-image-preview>
                                                    </div>
                                                    <div class="file-upload">
                                                        <input type="file" class="file-input" name="banner"> Banner *
                                                    </div>
                                                </div>
                                                <x-input-error :messages="$errors->get('banner')"   class="mt-2"  />
                                            </div>
                                        </div>

                                        <div class="dashboard-section basic-info-input">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Company Name *</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control {{$errors->has('name')? 'is-invalid':''}}" value="{{$company?->name}}" name="name">
                                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Company Bio *</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control {{$errors->has('bio')? 'is-invalid':''}}" placeholder="" name="bio">{{$company?->bio}}</textarea>
                                                    <x-input-error :messages="$errors->get('bio')" class="mt-2"  />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Company vision *</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control {{$errors->has('vision')? 'is-invalid':''}}" placeholder="" name="vision">{{$company?->vision}}</textarea>
                                                    <x-input-error :messages="$errors->get('vision')"   class="mt-2"  />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9">
                                                <button class="button">Save Changes</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                                <div class="tab-pane fade" id="terms" role="tabpanel" aria-labelledby="terms-tab">
                                    {{-- Founding Info --}}

                                    <form action="{{route('company.profile.founding-info')}}" method="POST" class="dashboard-form job-post-form">
                                        @csrf
                                        <div class="dashboard-section basic-info-input">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">

                                                        <label class="col-form-label">Industry Type *</label>
                                                        <select name="industry_type" class="form-control mselect2 {{$errors->has('industry_type')? 'is-invalid':''}} {{$errors->has('industry_type')? 'is-invalid':''}}" style="width: 100%">
                                                            <option>Select</option>
                                                            <option value="0">T1</option>
                                                        </select>
                                                        <x-input-error :messages="$errors->get('industry_type')" class="mt-2" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Organization Type *</label>
                                                        <select name="organization_type" class="form-control mselect2 {{$errors->has('organization_type')? 'is-invalid':''}}" style="width: 100%">
                                                            <option>Select</option>
                                                            <option value="0">T1</option>
                                                        </select>
                                                        <x-input-error :messages="$errors->get('organization_type')"  class="mt-2"  />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Team Size *</label>
                                                        <div  class="form-group">
                                                            <select name="team_size" class="form-control mselect2 {{$errors->has('team_size')? 'is-invalid': ''}}" style="width: 100%">
                                                                <option>Select</option>
                                                                <option value="0">1-2</option>
                                                                <option value="1">3-10</option>
                                                            </select>
                                                            <x-input-error :messages="$errors->get('team_size')"  class="mt-2"  />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Establishment Date</label>
                                                        <div class="form-group">
                                                            <input name="establishment_date" value="{{$company?->establishment_date}}" type="date" class="form-control {{$errors->has('establishment_date')? 'is-invalid':''}} datepicker" placeholder="Establishment Date">
                                                        <x-input-error :messages="$errors->get('establishment_date')"  class="mt-2"  />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Website</label>
                                                        <div class="form-group">
                                                            <input name="website" value="{{$company?->website}}" type="text" class="form-control {{$errors->has('website')? 'is-invalid':''}}" placeholder="www.website.com">
                                                        <x-input-error :messages="$errors->get('website')"  class="mt-2"  />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label  class="col-form-label">Email *</label>
                                                        <div class="form-group">
                                                            <input  name="email" value="{{$company?->email}}" type="text" class="form-control {{$errors->has('email')? 'is-invalid':''}}" placeholder="">
                                                        <x-input-error :messages="$errors->get('email')"  class="mt-2"  />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Phone *</label>
                                                        <div class="form-group">
                                                            <input name="phone" value="{{$company?->phone}}" type="text" class="form-control {{$errors->has('phone')? 'is-invalid':''}}" placeholder="">
                                                        <x-input-error :messages="$errors->get('phone')"  class="mt-2"  />
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-4">
                                                    <div class="form-group">

                                                        <label class="col-form-label">Country *</label>
                                                        <div class="form-group">
                                                            <select name="country" class="form-control mselect2 {{$errors->has('country')? 'is-invalid':''}}" style="width: 100%">
                                                                <option>Select</option>
                                                                <option value="0">T1</option>
                                                            </select>
                                                            <x-input-error :messages="$errors->get('country')"  class="mt-2"  />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">

                                                        <label class="col-form-label">State</label>
                                                        <div class="form-group">
                                                            <select name="state" value="{{$company?->state}}" class="form-control mselect2 {{$errors->has('state')? 'is-invalid':''}}" style="width: 100%">
                                                                <option>Select</option>
                                                                <option value="0">T1</option>
                                                            </select>
                                                            <x-input-error :messages="$errors->get('state')"  class="mt-2"  />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">

                                                        <label class="col-form-label">City</label>
                                                        <div class="form-group">
                                                            <select name="city" class="form-control mselect2 {{$errors->has('city')? 'is-invalid':''}}" style="width: 100%">
                                                                <option>Select</option>
                                                                <option value="0">T1</option>
                                                            </select>
                                                            <x-input-error :messages="$errors->get('city')"  class="mt-2"  />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Address</label>
                                                        <div class="form-group">
                                                            <input name="address" value="{{$company?->address}}" type="text" class="form-control {{$errors->has('address')? 'is-invalid':''}}" placeholder="">
                                                            <x-input-error :messages="$errors->get('address')"  class="mt-2" />
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Map Link</label>
                                                        <div class="form-group">
                                                            <input name="map_link" value="{{$company?->map_link}}" type="text" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-9">
                                                    <button class="button">Save Changes</button>
                                                </div>
                                            </div>
                                            </div>
                                    </form>

                                </div>
                                <div class="tab-pane fade" id="regal" role="tabpanel" aria-labelledby="regal-tab">

                                    {{-- Account Settings --}}
                                    <form action="{{route('company.profile.account-info')}}" method="POST" class="dashboard-form">
                                        @csrf
                                        <div class="dashboard-section basic-info-input">
                                            <h4 class="d-flex"><i data-feather="user-check"></i>Basic Info</h4>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Username</label>
                                                <div class="col-sm-9">
                                                    <input name="username" value="{{auth()->user()->name}}" type="text" class="form-control {{$errors->has('username')? 'is-invalid':''}}" placeholder="@username">
                                                    <x-input-error :messages="$errors->get('username')" class="mt-2"/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Email Address</label>
                                                <div class="col-sm-9">
                                                    <input name="email" value="{{auth()->user()->email}}" type="text" class="form-control {{$errors->has('email')? 'is-invalid':''}}" placeholder="email@example.com">
                                                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9">
                                                <button type="submit" class="button">Save Changes</button>
                                            </div>
                                        </div>
                                    </form>

                                    <form action="{{route('company.profile.password-update')}}" class="dashboard-form" method="POST">
                                        @csrf
                                        <div class="dashboard-section basic-info-input">
                                            <h4 class="d-flex"><i data-feather="lock"></i>Change Password</h4>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">New Password</label>
                                                <div class="col-sm-9">
                                                    <input name="password" type="password" class="form-control {{$errors->has('password')? 'is-invalid':''}}" placeholder="New Password">
                                                    <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Retype Password</label>
                                                <div class="col-sm-9">
                                                    <input name="password_confirmation" type="password" class="form-control {{$errors->has('password_confirmation')? 'is-invalid':''}}" placeholder="Retype Password">
                                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <button class="button">Save Change</button>
                                                </div>
                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                        @include('frontend.company-dashboard.sidebar')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="call-to-action-bg padding-top-90 padding-bottom-90">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="call-to-action-2">
                        <div class="call-to-action-content">
                            <h2>For Find Your Dream Job or Candidate</h2>
                            <p>Add resume or post a job. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec.</p>
                        </div>
                        <div class="call-to-action-button">
                            <a href="add-resume.html" class="button">Add Resume</a>
                            <span>Or</span>
                            <a href="post-job.html" class="button">Post A Job</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Call to Action End -->

@endsection

