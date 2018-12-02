@extends('admin.heritage.index')

@section('contenu')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Publication
                            <small>{{$publication->titre}}</small>
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

                        <form action="admin/publication/modifier/{{$publication->id}}" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Category Name</label>
                                <select class="form-control" name="categorie" id="categorie">
                                    @foreach($categorie as $ca)
                                        <option 
                                            @if($publication->typeDePublication->categorie->id == $ca->id)
                                                {{"selected"}}
                                            @endif
                                            value="{{$ca->id}}">{{$ca->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                             <div class="form-group">
                                <label>Type of Publication</label>
                                <select class="form-control" name="typeDePublication" id="typeDePublication">
                                    @foreach($typeDePublication as $ty)
                                        <option 
                                            @if($publication->idTypeDePublication == $ty->id)
                                                {{"selected"}}
                                            @endif
                                            value="{{$ty->id}}">{{$ty->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="nom" placeholder="Please enter publication name"  value="{{$publication->titre}}" />
                            </div>
                            <div class="form-group">
                                <label>Resume</label>
                                <textarea name="resume" class="form-control ckeditor" id="demo" rows="3" placeholder="PLease enter the resume">{{$publication->resume}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="contenu" class="form-control ckeditor" id="demo" rows="3" placeholder="PLease enter the content">{{$publication->contenu}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Picture</label>
                                <p><img src="upload/publication/{{$publication->image}}" width="400px" ></p>
                                <input class="form-control" name="image" type="file" />
                            </div>
                            <div class="form-group">
                                <label>Prominent</label>
                                <label class="radio-inline">
                                    <input name="prominent" value="1" 
                                    @if($publication->important == 1)
                                    {{"checked"}}
                                    @endif
                                     type="radio">yes
                                </label>
                                <label class="radio-inline">
                                    <input name="prominent" value="0" 
                                    @if($publication->important == 0)
                                    {{"checked"}}
                                    @endif
                                    type="radio">no
                                </label>
                            </div>                             
                            <button type="submit" class="btn btn-default">Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            
        
                <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Publication
                                <small>{{$publication -> titre}}</small>
                            </h1>
                        </div>
                                <!-- /.col-lg-12 -->
                        @if(session('notification'))
                            <div class="alert alert-success">
                                {{session('notification')}}
                            </div>
                        @endif
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr align="center">
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Publication</th>
                                    <th>Content</th>
                                    <th>Date Created</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($publication->commentaire as $c)
                            <tr class="odd gradeX" align="center">
                                <td>{{$c->id}}</td>
                                <td>{{$c->users->name}}</td>
                                <td>{{$c->publication->titre}}</td>
                                <td>{{$c->contenu}}</td>
                                <td>{{$c->created_at}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/commentaire/supprimer/{{$c->id}}/{{$c->publication->id}}"> Delete</a></td>
                                @endforeach</tr>
                        </table>
                </div>
            <!-- /.row -->
    </div>
            <!-- /.container-fluid -->
</div>            
@endsection
@section('javaScript')
<script>
    $(document).ready(function(){
        $("#categorie").change(function(){
            var idCategorie = $(this).val();
            $.get("ajax/typeDePublication/"+idCategorie,function(data){
                $("#typeDePublication").html(data);
            });
        });
    });
</script>
@endsection