@extends('layout')

@section('title')Авторизация@endsection

@section('content')
<div class="site-hero_2">
    <div class="page-title">
        <div class="big-title montserrat-text uppercase">sign in</div>
        <div class="small-title montserrat-text uppercase">home / sign in</div>
    </div>
</div>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <form action="{{ route('signIn') }}" method="POST">
                        @csrf
                        @if (count($errors) > 0)
                            <ul class="alert alert-danger" style="margin-left: 15px; margin-right: 15px">
                                @foreach($errors->all() as $item)
                                    <li style="padding: 5px; margin-left: 20px">
                                        {{ $item }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="col-md-12">
                            <div class="input_1" style="margin-bottom:30px">
                                <input type="text" name="email" id="email" value="{{ old('email') }}">
                                <span class="@if(old('email')) active @endif">your email</span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input_1" style="margin-bottom:20px">
                                <input type="text" name="password" id="password">
                                <span>password</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn green"><span>sign in</span></button>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('register')}} " class="btn grey" style="padding-left:10px; padding-right:10px">Don't have an account?</a>
                        </div>
                    </form>
                </div>

                <h4 class="montserrat-text uppercase" style="margin-top:100px">contact info</h4>
                <p>Lorem ipsum dolor sit amet, conse adipisicing elit. Libero incidunt quod ab mollitia quia dolorum conse.</p>
                
                <p>
                    13D, Functional apartment, Unique colony, <br/>
                    Agadir 86360 <br/>
                    +212 124-566-780 <br/>
                    +212 124-566-780<br/>
                    <div><a href="mailto:email@website.com" class="link">email@website.com</a></div>
                </p>

                <ul class="social-icons" style="margin-top:30px;">
                    <li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
                    <li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
                    <li><a href="#"><i class="icon ion-social-youtube"></i></a></li>
                    <li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
                    <li><a href="#"><i class="icon ion-social-pinterest"></i></a></li>
                    <li><a href="#"><i class="icon ion-social-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection