@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="btn-group" role="group" aria-label="..." >
                            <a href="/export" >
                                <button type="button" class="btn btn-success">下载最终表格</button>
                            </a>
                        </div>
                            <hr/>
                            <hr/>
                            <hr/>
                            <hr/>
                        <form class="form-horizontal" role="form"
                              action="/import" method="post" enctype="multipart/form-data">
                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>
                                        <i class="fa fa-check-circle fa-lg fa-fw"></i> Success.
                                    </strong>
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input type="file" id="exampleInputFile" name="file">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Step2</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="form-horizontal" role="form"
                              action="/importStep2" method="post" enctype="multipart/form-data">
                            @if (Session::has('importStep2'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>
                                        <i class="fa fa-check-circle fa-lg fa-fw"></i> Success.
                                    </strong>
                                    {{ Session::get('importStep2') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input type="file" id="exampleInputFile" name="file">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
