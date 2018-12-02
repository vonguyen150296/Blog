@extends('heritage.index')
@section('contenu')
    <!-- Page Content -->
    <div class="container"><br><br><br>

    	<!-- slider -->
    	<div class="row carousel-holder">
    		<div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
				  	<div class="panel-heading" style="text-align: center">Login</div>
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
				  	<div class="panel-body">
				    	<form action="login" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email">
							</div>
							<br>	
							<div>
				    			<label>Password</label>
							  	<input type="password" class="form-control" name="password">
							</div>
							<br>
							<button type="submit" class="btn btn-default">Login</button>
							
				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-4"></div>
            
        </div>
        <!-- end slide -->
    </div>
    <br><br><br><br>
    <!-- end Page Content -->
@endsection
