@extends('admin.heritage.index')
@section('contenu')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Type of Publication
                            <small>List</small>
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
                                <th>IdCategorie</th>
                                <th>Name without accent</th>
                                <th>Name</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($typeDePublication as $ty)
                            <tr class="odd gradeX" align="center">
                                <td>{{$ty->id}}</td>
                                <td>{{$ty->idCategorie}}</td>
                                <td>{{$ty->nomSansAccent}}</td>
                                <td>{{$ty->nom}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/typeDePublication/supprimer/{{$ty->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/typeDePublication/modifier/{{$ty->id}}">Edit</a></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection