@extends('admin.layouts.master')


@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Industry Types</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header ">
                            <h4>Update Industry Types</h4>
                        </div>
                        <div class="card-body p-0">
                            <form action="{{route('admin.industry-types.update', $industryType->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group px-5">
                                    <label for="industry-type-name">Name</label>
                                    <input id="industry-type-name" name="name" value="{{old('name', $industryType->name)}}" class="form-control {{$errors->has('name')? 'is-invalid':''}} " required >
                                    <x-input-error :messages="$errors->get('name')"  class="mt-2" />
                                </div>

                                <div class="card-footer text-left px-5">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection
