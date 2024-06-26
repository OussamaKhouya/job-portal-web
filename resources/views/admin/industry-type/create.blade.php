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
                            <h4>Create Industry Types</h4>
                        </div>
                        <div class="card-body p-0">
                            <form action="{{route('admin.industry-types.store')}}" method="POST">
                                @csrf
                                <div class="form-group px-5">
                                    <label for="industry-type-name">Name</label>
                                    <input id="industry-type-name" name="name" class="form-control {{$errors->has('name')? 'is-invalid':''}} " required >
                                    <x-input-error :messages="$errors->get('name')"  class="mt-2" />
                                </div>

                                <div class="card-footer text-left px-5">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection

