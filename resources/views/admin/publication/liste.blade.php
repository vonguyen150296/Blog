@extends('admin.heritage.index')
@section('contenu')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Publication
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
                                <th>Type of Publication</th>
                                <th>Name</th>
                                <th>Content</th>
                                <th>Promitent</th>
                                <th>View</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($publication as $p)
                            <tr class="odd gradeX" align="center">
                                <td>{{$p->id}}</td>
                                <td>{{$p->typeDePublication->nom}}</td>
                                <td>{{$p->titre}}
                                    <p><img src="upload/publication/{{$p->image}}" width="100x"></p>
                                </td>
                                <td>{{$p->contenu}}</td>
                                <td>{{$p->important}}</td>
                                <td>{{$p->nombreVue}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/publication/supprimer/{{$p->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/publication/modifier/{{$p->id}}">Edit</a></td>
                            @endforeach</tr>

                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection