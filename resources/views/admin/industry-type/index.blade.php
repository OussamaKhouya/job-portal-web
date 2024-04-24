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
                            <h4>All Industry Types</h4>
                            <div class="card-header-action mx-auto w-50">
                                <form action="{{route('admin.industry-types.index')}}" method="GET">
                                    <div class="input-group">
                                        <input name="search" value="{{request('search')}}" type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <a href="{{route('admin.industry-types.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"> Create New</i></a>

                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped" id="sortable-table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th class="w-25">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                     @foreach ($industryTypes as $type)
                                     <tr >
                                        <td>{{$type->name}}</td>
                                        <td>{{$type->slug}}</td>
                                        <td>
                                            <a href="{{route('admin.industry-types.edit', $type->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{route('admin.industry-types.destroy', $type->id)}}" class="btn btn-danger delete-item"><i class="fa fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                     @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                       <div class="card-footer text-right ">
                           <div class="d-inline-block">
                               @if($industryTypes->hasPages())
                                   {{$industryTypes->withQueryString()->links()}}
                               @endif
                           </div>

                       </div>

                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection

