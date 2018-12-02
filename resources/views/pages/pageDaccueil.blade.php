@extends('heritage.index')
@section('contenu')
<div class="container">

    	<!-- slider -->
    	@include('heritage.diapo')
        <!-- end slide -->

        <div class="space20"></div>


        <div class="row main-left">
            <div class="col-md-3 ">
                @include('heritage.menu')
            </div>

            <div class="col-md-9">
	            <div class="panel panel-default">            
	            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;">Blog News</h2>
	            	</div>

	            	<div class="panel-body">
	            		<!-- item -->
	            		@foreach($categorie as $ca)
					    <div class="row-item row">
		                	<h3>
		                		<a href="category.html">{{$ca->nom}}</a> | 	
		                		@foreach($ca->typeDePublication as $ty)
		                		@if($ca->id == $ty->idCategorie)
		                		<small><a href="category.html"><i>{{$ty->nom}}</i></a>/</small>
		                		@endif
		                		@endforeach
		                	</h3>
		                	@foreach($ca->typeDePublication as $ty)
							<?php
								
								 $data = $ty->publication->where('important',1)->sortByDesc('created_at')->take(5);
								 $publication1=$data->shift();
								
							?>
							@endforeach
		                	<div class="col-md-8 border-right">
		                		<div class="col-md-5">
			                        <a href="typeDePublication/{{$ty->id}}/{$ty->nomSansAccent}.php">
			                            <img class="img-responsive" src="upload/publication/{{$publication1['image']}}" alt="">
			                        </a>
			                    </div>

			                    <div class="col-md-7">
			                        <h3>{{$publication1->titre}}</h3>
			                        <p>{{$publication1->resume}}</p>
			                        <a class="btn btn-primary" href="publication/{{$publication1->id}}/{{$publication1->titreSansAccent}}.php">Read more<span class="glyphicon glyphicon-chevron-right"></span></a>
								</div>

		                	</div>
		                    

							<div class="col-md-4">
								@foreach($data->all() as $p)
								<a href="">
									<h4>
										<span class="glyphicon glyphicon-list-alt"></span>
										{{$p['titre']}}
									</h4>
								</a>
								@endforeach
							</div>
							
							<div class="break"></div>
		                </div>
		                @endforeach
		                <!-- end item -->
		                <!-- item -->
					</div>
	            </div>
        	</div>
        </div>
        <!-- /.row -->
    </div>
@endsection