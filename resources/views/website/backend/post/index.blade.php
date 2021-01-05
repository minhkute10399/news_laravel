@extends('website.backend.layouts.main')

@section('content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Post</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
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
                                                        #
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 110px;" aria-label="Last name: activate to sort column ascending">
                                                        Title
                                                    </th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1"style="width: 112px;" aria-sort="ascending" aria-label="First name: activate to sort column descending">
                                                        Author
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive"rowspan="1" colspan="1" style="width: 110px;"aria-label="Last name: activate to sort column ascending">
                                                        View
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive"rowspan="1" colspan="1" style="width: 110px;"aria-label="Last name: activate to sort column ascending">
                                                        Category
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive"rowspan="1" colspan="1" style="width: 110px;"aria-label="Last name: activate to sort column ascending">
                                                        Created at
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive"rowspan="1" colspan="1" style="width: 110px;"aria-label="Last name: activate to sort column ascending">
                                                        Updated at
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive"rowspan="1" colspan="1" style="width: 110px;"aria-label="Last name: activate to sort column ascending">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($posts as $post)
                                                    <tr role="row" class="odd">
                                                        <td>{{ $post->id }}</td>
                                                        <td>{{ $post->title }}</td>
                                                        <td>{{ $post->author->name }}</td>
                                                        <td>{{ $post->view }}</td>
                                                        <td>{{ $post->category->name }}</td>
                                                        <td>{{ $post->created_at }}</td>
                                                        <td>{{ $post->updated_at }}</td>
                                                        <td style="display: flex; align-items: center; ">
                                                            <a href="{{ route('posts.show', [$post->id]) }}">
                                                                <i class="fas fa-eye"></i>Show
                                                            </a>

                                                            <form action="{{ route('posts.destroy', [$post->id]) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"onclick="return confirm('Want to delete ?')" class="btn btn-app">
                                                                    <i class="fa fa-remove"></i>Block
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
