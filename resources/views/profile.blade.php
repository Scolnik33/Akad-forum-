@extends('layout')

@section('title')Профиль@endsection

@section('content')
	<div class="site-hero_2">
		<div class="page-title">
			<div class="big-title montserrat-text uppercase">profile</div>
			<div class="small-title montserrat-text uppercase">home / profile</div>
		</div>
	</div>

	<section>
		<div class="container">
			@if(session()->has('success'))
				<p class="alert alert-success">{{ session()->get('success') }}</p>
			@endif
			<div class="row">
				<div class="section-title" style="margin-bottom: 10px">
					<span>me</span>
				</div>
			</div>

			<div class="testimonials_single">
				<div class="author_pic">
					@if($user['avatar'])
						<img src="{{ asset('storage/' . $user['avatar'])}}" alt="avatar" style="width: 150px; height: 150px">
					@else 
						<img src="{{ asset('img/thumb.jpg') }}" alt="avatar">
					@endif
				</div>
				<h3 class="author_name" style="margin-bottom: 40px; margin-top: 25px">{{ $user['name'] }}</h3>
				<br>
				@if($user['id'] == Auth::id())
					<a href="{{ route('updateprofile', $user['id']) }}" class="btn green" style="padding: 0 10px">Редактировать профиль</a>
				@endif
			</div>
		</div>
	</section>

	<section style="margin-top: 50px">
		<div class="container">
			<div class="row">
				<div class="section-title" style="margin-bottom: 30px">
					<span>my posts</span>
				</div>
			</div>
			
			<div class="row">
				@foreach($posts as $item)
					<a href="{{ route('single', $item['id'] )}}" class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
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

	<div class="container">
		<div class="light-gray-section wow fadeInUp" style="padding:15px 30px;">
			@if(!empty($posts[0]))
				@if(count($posts) == 8)
					<div class="row">
						<p class="italic" style="float:left;line-height:50px;margin:0">
							This is only a small part of his post
						</p>
						<a href=" {{ route('posts', $posts[0]['userId']) }}" class="btn green" style="float:right"><span>view more</span></a>
					</div>
				@else 
					<div class="row">
						<p class="italic" style="float:left;line-height:50px;margin:0">
							There are only a few of them right now, but there will be more soon!
						</p>
					</div>
				@endif
			@else 
				<div class="row">
					<p class="italic" style="margin-bottom: 0">{{ $user['name'] }} doesn't have any posts yet</p>
				</div>
			@endif
		</div>
	</div>
@endsection