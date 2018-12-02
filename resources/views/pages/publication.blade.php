@extends('heritage.index')
@section('contenu')
<!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>Blog News</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">Nguyen VO</a>
                </p>

                <!-- Preview Image -->
                <img class="img-responsive" src="upload/publication/{{$publication->image}}" width="900px" alt="">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span>{{$publication->created_at}}</p>
                <hr>

                <!-- Post Content -->
                <p class="lead">{{$publication->titre}}</p>
                <p>{{$publication->contenu}}</p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                
                <div class="well">
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
                    <h4><a href="login"> Comment ...</a><span class="glyphicon glyphicon-pencil"></span></h4>
                    @if(Auth::user())
                    <form role="form" action="commenter/{{$publication->id}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="contenu"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </form>
                    @endif
                </div>
                
                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                @foreach($publication->commentaire as $c)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$c->users->name}}
                            <small>{{$c->created_at}}</small>
                        </h4>
                        {{$c->contenu}}
                    </div>
                   
                </div>
                @endforeach
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Relatif News</b></div>
                    <div class="panel-body">

                        <!-- item -->
						@foreach($relatif as $re)
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="publication/{{$re->id}}/{{$re->titreSansAccent}}.php">
                                    <img class="img-responsive" src="upload/publication/{{$re->image}}" width="320" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="publication/{{$re->id}}/{{$re->titreSansAccent}}.php"><b>{{$re->titre}}</b></a>
                            </div>
                            <p style="padding-left:5">{{$re->resume}}</p>
                            <div class="break"></div>
                        </div>
                        @endforeach
                        <!-- end item -->
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Popular News</b></div>
                    <div class="panel-body">
						@foreach($populaire as $po)
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="publication/{{$po->id}}/{{$po->titreSansAccent}}.php">
                                    <img class="img-responsive" src="upload/publication/{{$po->image}}" width="320px" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="publication/{{$po->id}}/{{$po->titreSansAccent}}.php"><b>{{$po->titre}}</b></a>
                            </div>
                            <p style="padding-left:5">{{$po->resume}}</p>
                            <div class="break"></div>
                        </div>
                        @endforeach
                        <!-- end item -->
                    </div>
                </div>
                
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection