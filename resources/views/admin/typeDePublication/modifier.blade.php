@extends('admin.heritage.index')

@section('contenu')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>{{$typeDePublication->nom}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
						 @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif

                        @if(session('notification'))
                            <div class="alert alert-success">
                                {{session('notification')}}
                            </div>
                        @endif

                        <form action="admin/typeDePublication/modifier/{{$typeDePublication->id}}" method="POST">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Category Name</label>
                                <select class="form-control" name="categorie">
                                    @foreach($categorie as $ca)
                                        <option 
                                            @if($typeDePublication->idCategorie == $ca->id)
                                                {{"selected"}}
                                            @endif
                                            value="{{$ca->id}}">{{$ca->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Type of Publication</label>
                                <input class="form-control" name="nom" placeholder="Please Enter Type of Publication Name"  value="{{$typeDePublication->nom}}" />
                            </div>                            
                            <button type="submit" class="btn btn-default">Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection