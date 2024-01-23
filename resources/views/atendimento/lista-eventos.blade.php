@extends('voyager::master')



@section('content')

    <style>
        @import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
        @import url('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700');
        @import url('https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700');
        body{
            font-family: 'Open Sans', sans-serif;
        }
        *:hover{
            -webkit-transition: all 1s ease;
            transition: all 1s ease;
        }
        section{
            float:left;
            width:100%;
            background: #fff;  /* fallback for old browsers */
            padding:30px 0;
        }
        h1{float:left; width:100%; color:#232323; margin-bottom:30px; font-size: 14px;}
        h1 span{font-family: 'Libre Baskerville', serif; display:block; font-size:45px; text-transform:none; margin-bottom:20px; margin-top:30px; font-weight:700}

        /*Profile Card 3*/
        .profile-card-3 {
        font-family: 'Open Sans', Arial, sans-serif;
        position: relative;
        float: left;
        overflow: hidden;
        width: 100%;
        text-align: center;
        height:368px;
        border:none;
        }
        .h2{
            text-decoration: none;
            border:1px solid black;
        }
        .profile-card-3 .background-block {
            float: left;
            width: 100%;
            height: 200px;
            overflow: hidden;
        }
        .profile-card-3 .background-block .background {
        width:100%;
        vertical-align: top;
        opacity: 0.9;
        -webkit-filter: blur(0.5px);
        filter: blur(0.5px);
        -webkit-transform: scale(1.8);
        transform: scale(2.8);
        }
        .profile-card-3 .card-content {
        width: 100%;
        padding: 15px 25px;
        color:#232323;
        float:left;
        background:#efefef;
        height:50%;
        border-radius:0 0 5px 5px;
        position: relative;
        z-index: 1;
        }
        .profile-card-3 .card-content::before {
            content: '';
            background: #efefef;
            width: 120%;
            height: 100%;
            left: 11px;
            bottom: 51px;
            position: absolute;
            z-index: -1;
            transform: rotate(-13deg);
        }
        .profile-card-3 .profile {
        border-radius: 50%;
        position: absolute;
        bottom: 50%;
        left: 50%;
        max-width: 100px;
        opacity: 1;
        box-shadow: 3px 3px 20px rgba(0, 0, 0, 0.5);
        border: 2px solid rgba(255, 255, 255, 1);
        -webkit-transform: translate(-50%, 0%);
        transform: translate(-50%, 0%);
        z-index:2;
        }
        .profile-card-3 h2 {
        margin: 0 0 5px;
        font-weight: 600;
        font-size:25px;
        }
        .profile-card-3 h2 small {
        display: block;
        font-size: 15px;
        margin-top:10px;
        }
        .profile-card-3 i {
        display: inline-block;
            font-size: 16px;
            color: #232323;
            text-align: center;
            border: 1px solid #232323;
            width: 30px;
            height: 30px;
            line-height: 30px;
            border-radius: 50%;
            margin:0 5px;
        }
        .profile-card-3 .icon-block{
            float:left;
            width:100%;
            margin-top:15px;
        }
        .profile-card-3 .icon-block a{
            text-decoration:none;
        }
        .profile-card-3 i:hover {
        background-color:#232323;
        color:#fff;
        text-decoration:none;
        }

    </style>
    <section>
        <div class="container">
            <div class="row">
                @forelse ($eventos as $evento)
                    <div class="col-md-4">
                        <div class="card profile-card-3">
                            <div class="background-block">
                                <img src="{{$evento->card}}" alt="profile-sample1" class="background"/>
                            </div>

                            <!--
                            <div class="profile-thumb-block">
                                <img src="https://randomuser.me/api/portraits/men/41.jpg" alt="profile-image" class="profile"/>
                            </div>
                            -->

                            <div class="card-content">
                                <a href="#">
                                    <h2>{{$evento->titulo}}
                                        <small>{{$evento->cidade}}</small>
                                    </h2>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="col-md-12"> Não há mais Eventos </p>

                @endforelse

            </div>
        </div>
    </section>

@endsection
