@extends('admin.heritage.index')
@section('contenu')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
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
                                <th>Name</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($categorie as $ca)
                            <tr class="odd gradeX" align="center">
                                <td>{{$ca->id}}</td>
                                <td>{{$ca->nom}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/categorie/supprimer/{{$ca->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/categorie/modifier/{{$ca->id}}">Edit</a></td>
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