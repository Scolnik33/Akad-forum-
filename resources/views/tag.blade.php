@extends('layout')

@section('title')
    {{ $tag }}
@endsection

@section('content')
    <div class="site-hero_2">
        <div class="page-title">
            <div class="big-title montserrat-text uppercase">{{ $tag }}</div>
            <div class="small-title montserrat-text uppercase">home / tag / {{ $tag }}</div>
        </div>
    </div>

    <section style="margin-top: 50px">
        <div class="container">
            <div class="row">
                <div class="section-title" style="margin-bottom: 30px">
                    <span>posts by "{{ $tag }}"</span>
                </div>
            </div>

            <div class="row">
                @foreach($posts as $item)
                    <a href="/single/{{$item['id']}}" class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                        <div class="team_member">
                            @if($item['image'])
                                <img class="bytag_img" src="{{ asset('storage/' . $item['image']) }}" alt="image">
                            @else
                                <img class="bytag_img" src="{{ asset('img/team.jpg') }}" alt="image">
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

    <script src="{{ asset('js/deleteClick.js') }}"></script>
@endsection