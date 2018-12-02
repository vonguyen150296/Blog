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
                        <h2 style="margin-top:0px; margin-bottom:0px;">Contact</h2>
                    </div>

                    <div class="panel-body">
                        <!-- item -->
                        <h3><span class="glyphicon glyphicon-align-left"></span> Information</h3>
                        
                        <div class="break"></div>
                        <h4><span class= "glyphicon glyphicon-home "></span> Adress : </h4>
                        <p>15 Avenue du Maréchal Foch </p>

                        <h4><span class="glyphicon glyphicon-envelope"></span> Email : </h4>
                        <p>vonguyen150296@gmail.com</p>

                        <h4><span class="glyphicon glyphicon-phone-alt"></span> Telephone : </h4>
                        <p>07 67 17 94 26 </p>



                        <br><br>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection