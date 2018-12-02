@extends('heritage.index')
@section('contenu')
<div class="container">
	<!-- slider -->
    	@include('heritage.diapo')
    <div class="row main-left">
        <div class="col-md-3 ">
			@include('heritage.menu')
		</div>
 		<div class="col-md-9 ">
                <div class="panel panel-default">

                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b>{{$typeDePublication->nom}}</b></h4>
                    </div>
					@foreach($publication as $p)
                    <div class="row-item row">
                        <div class="col-md-3">

                            <a href="detail.html">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="upload/publication/{{$p->image}}" alt="">
                            </a>
                        </div>

                        <div class="col-md-9">
                            <h3>{{$p->titre}}</h3>
                            <p>{{$p->resume}}</p>
                            <a class="btn btn-primary" href="publication/{{$p->id}}/{{$p->titreSansAccent}}.php">Read more <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    </div>
					@endforeach
                    <div style="text-align:center"> 
                    {{$publication->links()}}
                    </div>
                    <!-- /.row -->

                </div>
            </div>
     	
     </div>
 </div>
@endsection