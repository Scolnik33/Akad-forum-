@extends('layout')

@section('title')
    {{ $user['name'] }}'s posts
@endsection

@section('content')
    <div class="site-hero_2">
        <div class="page-title">
            <div class="big-title montserrat-text uppercase">{{ $user['name'] }}'s posts</div>
            <div class="small-title montserrat-text uppercase">home / {{$user['name']}} / posts</div>
        </div>
    </div>

    <section style="margin-top: 50px">
        <div class="container">
            <div class="row">
                <div class="section-title" style="margin-bottom: 30px">
                    <span>{{ $user['name'] }}'s posts</span>
                </div>
            </div>

            <div class="row">
                @foreach($posts as $item)
                    <a href="{{ route('single', $item['id'])}} " class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                        <div class="team_member">
                            @if($item['image'])
                                <img src="{{ asset('storage/' . $item['image']) }}" alt="image" style="width: 263px; height: 332px">
                            @else
                                <img src="{{ asset('img/team.jpg') }}" alt="image" style="width: 263px; height: 332px">
                            @endif
                            <div class="team_member_hover">
                                <div class="team_member_info">
                                    <div class="team_member_name" style="margin-bottom: 10px">{{ $item['name'] }}</div>
                                    <div class="team_member_job">{{ Str::limit($item['text'], 50) }}</div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection