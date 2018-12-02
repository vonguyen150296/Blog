@extends('admin.heritage.index')

@section('contenu')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Publication
                            <small>Add</small>
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
                        <form action="admin/publication/ajouter" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Category Name</label>
                                <select class="form-control" name="categorie" id="categorie">
                                    @foreach($categorie as $ca)
                                    <option value="{{$ca->id}}">{{$ca->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Type of Publication</label>
                                <select class="form-control" name="typeDePublication" id="typeDePublication">
                                    @foreach($typeDePublication as $ty)
                                    <option value="{{$ty->id}}">{{$ty->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="nom" placeholder="Please enter publication name" />
                            </div>
                            <div class="form-group">
                            <div class="form-group">
                                <label>Resume</label>
                                <textarea name="resume" class="form-control ckeditor" id="demo" rows="3" placeholder="PLease enter the resume"></textarea>
                            </div>
                                <label>Content</label>
                                <textarea name="contenu" class="form-control ckeditor" id="demo" rows="3" placeholder="PLease enter the content"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Picture</label>
                                <input class="form-control" name="image" type="file" />
                            </div>
                            <div class="form-group">
                                <label>Prominent</label>
                                <label class="radio-inline">
                                    <input name="prominent" value="1" checked="" type="radio">yes
                                </label>
                                <label class="radio-inline">
                                    <input name="prominent" value="0" type="radio">no
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
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