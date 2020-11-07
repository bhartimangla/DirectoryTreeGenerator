@extends('layouts.app')

@section('content')
<html>
    <head>
        <title>Font Awesome Icons</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/custom.css">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><h2>Directory Tree</h2></div>

                        <div class="card-body">
                            @if (session('info'))
                                <div class="alert alert-success alert-dismissable" role="alert">
                                  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                  {{ session('info') }}
                                </div>
                            @endif

                            <div class="box">
                              <button class='add-folder main-folder' aria-hidden='true' data-id='0' data-toggle='modal' data-target='#addModel'>Add</button> 
                              <ul class="directory-list">
                                {!!$directoryTreeStructure!!}
                              </ul>
                            </div>
                            <div class="container">   
                              <div class="modal fade" id="addModel" tabindex="-1">
                                <div class="modal-dialog">
                                 <div class="modal-content">
                                  <div class="modal-header">
                                    <h3>Add Directory / File</h3>
                                    <i class="fa fa-2x fa-window-close close" data-dismiss="modal"></i>
                                  </div>
                                  <form action="/add-file-directory" method="POST">
                                      @csrf
                                  <div class="modal-body">
                                      <input type="hidden" name="modelId" id="modelId" value=""/>
                                      <div class="form-group">
                                          <input type="radio" id="directory" name="type" value="directory" checked>
                                          <label for="directory">Directory</label>
                                          <input type="radio" id="file" name="type" value="file">
                                          <label for="file">File</label>
                                      </div>
                                      @if ($errors->has('type'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('type') }}</strong>
                                          </span>
                                      @endif
                                      <div class="form-group">
                                        <div class="input-group">
                                          <input type="text" name="name" class="form-control" placeholder="Enter name" />
                                          @if ($errors->has('name'))
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $errors->first('name') }}</strong>
                                              </span>
                                          @endif
                                        </div>
                                      </div>                              
                                    </div>
                                   <div class="modal-footer">
                                        <input type="submit" id="submitDirectory" class="btn btn-primary" value="Submit">
                                        <button type="button" class="btn btn-default close-btn" data-dismiss="modal">Close</button>
                                    </div>
                                  <!-- </form> -->
                                 </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="js/custom.js"></script>
@endsection
