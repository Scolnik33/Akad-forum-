@extends('layout')

@section('title')Работа@endsection

@section('content')
	<div class="site-hero_2">
		<div class="page-title">
			<div class="big-title montserrat-text uppercase">{{ $post['name'] }}</div>
			<div class="small-title montserrat-text uppercase">home / blog / {{ $post['name']}}</div>
		</div>
	</div>
	
	<section>
		<div class="container">
			@if(session()->has('success'))
				<p class="alert alert-success">{{ session()->get('success') }}</p>
			@endif
			<div class="row">
				<div class="col-md-9 col-sm-12">
					<div class="single_post">
						@if($post['image'])
							<div class="post_media">
								<img class="single_img" src="{{ asset('storage/' . $post['image'])}}" alt="post image">
							</div>
						@endif
						<div class="post_title">
							<div class="post_container">
								<h4 class="montserrat-text uppercase">{{ $post['name'] }}</h4>
								@if ($post['userId'] == Auth::id() || Auth::user()?->role == 'admin')
									<div class="btn_group" style="display: flex; justify-content: space-between; align-items: center">
										<a href="{{ route('toupdate', $post['id']) }}" class="btn green" style="margin-right: 5px">Редактировать</a>
										<form action="{{ route('todelete', $post['id']) }}" method="POST">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn red">Удалить</button>
										</form>
									</div>
								@endif
							</div>
							<div style="display: flex; align-items-center; justify-content: start">
								<div><span class="post_date">Date : {{ Str::limit($post['created_at'], 10, '') }}</span></div>
								<x-bi-eye-fill style="width: 15px; height: 20px; margin: 0 3px 0 10px"/>
								<div>{{ $post['quantityViews'] }}</div>
							</div>
						</div>
						<p>
							{{ $post['text'] }}
						</p>
					</div>

					<div class="pages_pagination">
						@if($prevPage)
							<a href="{{ route('single', $prevPage) }}" class="prev"><i class="icon ion-arrow-left-c"></i></a>
						@endif
						@if($nextPage)
							<a href="{{ route('single', $nextPage) }}" class="next"><i class="icon ion-arrow-right-c"></i></a>
						@endif
					</div>
				</div>

				<div class="col-md-3">
					<div class="sidebar">
						<form method="GET" action="{{ route('single', $post['id']) }}" class="widget">
							<div class="input_2">
								<input type="text" placeholder="search..." name="search" id="search">
								<button type="submit"><i class="icon ion-search"></i></button>
							</div>
						</form>
						<div class="widget">
							<div class="widget_title">posts</div>
							<div class="tab">
								<nav>
									<a href="">popular</a>
									<a href="">latest</a>
									<div class="bottom-line"></div>
								</nav>
								<div class="tab_single shown">
									@foreach($popularPosts as $item)
										<div class="related_post">
											@if($item['image'])
												<div class="thumb"><img src="{{ asset('storage/' . $item['image']) }}" alt="image" style="width: 60px; height: 60px"></div>
											@else 
												<div class="thumb"><img src="{{ asset('img/thumb.jpg')}}" alt="image"></div>
											@endif
											<a href="{{ route('single', $item['id']) }}" class="post_title montserrat-text uppercase">{{ $item['name'] }}</a>
											<div class="post_date">{{ $item['created_at']->day }} {{ $item['created_at']->format('F') }} {{ $item['created_at']->year }}</div>
										</div>
									@endforeach
								</div>
								<div class="tab_single">
									@foreach($latestPosts as $item)
										<div class="related_post">
											@if($item['image'])
												<div class="thumb"><img src="{{ asset('storage/' . $item['image']) }}" alt="image" style="width: 60px; height: 60px"></div>
											@else 
												<div class="thumb"><img src="{{ asset('img/thumb.jpg')}}" alt="image"></div>
											@endif
											<a href="{{ route('single', $item['id']) }}" class="post_title montserrat-text uppercase">{{ $item['name'] }}</a>
											<div class="post_date">{{ $item['created_at']->day }} {{ $item['created_at']->format('F') }} {{ $item['created_at']->year }}</div>
										</div>
									@endforeach
								</div>
							</div>
						</div>

						<div class="widget wow fadeInUp">
							<div class="widget_title">category</div>
							<ul class="list_2">
								<li><a href="/category/{{$post['category']}}">{{ $post['category'] }}</a></li>
							</ul>
						</div>

						<div class="widget wow fadeInUp">
							<div class="widget_title">tags cloud</div>
							<ul class="tags">
								@foreach($post['tags'] as $tag)
									<li><a href="{{ route('tag', $tag) }}">{{ $tag }}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section style="margin-top: 50px">
		<div class="container">
			<div class="row">
				<div class="section-title" style="margin-bottom: 10px">
					<span>Comments</span>
				</div>
			</div>
	</section>

	<section style="margin-top: 50px">
		<div class="container">
			<div class="row">
				<div class="col-md-12" style="display: flex; justify-content: center">
					@if(count($comments) == 0)
						<div class="light-gray-section wow fadeInUp" style="padding:15px 30px; width: 100%">
							<div class="row">
								<p class="italic" style="float:left;line-height:50px;margin:0">
									There is no comments yet... Be first!
								</p>
							</div>
						</div>
					@else 
						<div class="testimonials wow fadeInUp">
							<ul class="slides">
								@foreach($comments as $item)
									<li class="testimonials_single" style="margin-bottom: 30px">
										<a href="{{ route('profile', $item['userId']) }}">
											<div class="author_pic" style="width: 75px; height: 75px; margin-bottom: 20px">
												@if($item->getUser()->avatar)
													<img src="{{ asset('storage/' . $item->getUser()->avatar) }}" alt="avatar" style="width: 75px; height: 75px">
												@else
													<img src="{{ asset('img/face.jpg')}}" alt="avatar" style="width: 75px; height: 75px">
												@endif
											</div>
											<div class="author_name" style="margin-bottom: 10px">{{ $item->getUser()->name }}</div>
										</a>
										<p style="margin-top: 10px; font-size: 16px">
											<span class="comment_text">{{ $item['comment'] }}</span>
											<div class="textarea_1 comment_edit" style="margin-bottom:10px; width: 100%">
												<textarea class="area_comment">{{ $item['comment'] }}</textarea>
											</div>
										</p>
										@if (Auth::id() == $item['userId'] || Auth::user()?->role == 'admin')
											<div style="display: flex; justify-content: flex-end">
												<button class="btn green comment_btn_edit">Редактировать</button>
												<form action="{{ route('toupdatecomment', $item['id'])}}" method="POST">
													@csrf
													@method('PATCH')
													<input type="text" name="comment" id="comment" class="input_comment" style="display: none">
													<button type="submit" class="btn green comment_btn_ready">Готово</button>
												</form> 
												<form action="{{ route('todeletecomment', $item['id']) }}" method="POST">
													@csrf
													@method('DELETE')
													<button type="submit" class="btn red" style="margin-left: 10px">Удалить</button>
												</form>
											</div>
										@endif
									</li>	
								@endforeach
							</ul>
						</div>
					@endif
				</div>
			</div>	
		</div>
	</section>

	<section style="margin-top: 50px">
		<div class="container">
			<div class="col-md-12">
				<div class="row">
					<div class="white-section" style="padding:20px">
						<span class="montserrat-text uppercase" style="font-size:24px">let's express our opinion</span>
						@error('comment')
							<div class="alert alert-danger" style="margin-bottom: 0; margin-top: 10px">
								{{ $message }}
							</div>
						@enderror
						<form action="{{ route('tocomment') }}" method="POST">
							@csrf
							<input class="invisible" type="text" name="postId" id="postId" value="{{ $post['id'] }}">
							<div class="textarea_1">
								<textarea type="text" name="comment" id="comment"></textarea>
								<span>your comment</span>
							</div>
							<button type="submit" class="btn green" style="margin-top:20px"><span>comment</span></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{ asset('js/editcomment.js') }}"></script>
@endsection