@extends('website.backend.layouts.main')

@section('content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Category</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <a href="{{ route('categories.create') }}" class="btn btn-success">Add Category</a>
                            <div id="datatable-responsive_wrapper"class="dataTables_wrapper container-fluid dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div id="datatable-responsive_filter" class="dataTables_filter">
                                            <label>Search:
                                                <input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable-responsive">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"  cellspacing="0" width="100%" role="grid" aria-describedby="datatable-responsive_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1"style="width: 112px;" aria-sort="ascending" aria-label="First name: activate to sort column descending">
                                                        Name
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive"rowspan="1" colspan="1" style="width: 110px;"aria-label="Last name: activate to sort column ascending">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($items as $item)
                                                    <tr role="row" class="odd">
                                                        <td>{{ $item->name }}</td>
                                                        <td style="display: flex; align-items: center; ">
                                                            <a class="btn btn-app" href="{{ route('categories.edit', [$item->id]) }}">
                                                                <i class="fa fa-edit"></i>Edit
                                                            </a>
                                                            <a class="btn btn-app" href="{{ route('categories.show', [$item->id]) }}">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                            <form action="{{ route('categories.destroy', [$item->id]) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"onclick="return confirm('Want to delete ?')" class="btn btn-app">
                                                                    <i class="fa fa-remove"></i> Delete
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
