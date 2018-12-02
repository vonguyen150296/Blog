@extends('heritage.index')
@section('contenu')
<!-- Page Content -->
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
	            		<h2 style="margin-top:0px; margin-bottom:0px;">Introduction</h2>
	            	</div>

	            	<div class="panel-body">
	            		<!-- item -->
					   <p>
					   	Blog by VO Nguyen
					   </p>

					</div>
	            </div>
        	</div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection