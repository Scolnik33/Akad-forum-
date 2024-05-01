@extends('layout')

@section('title')Обновить пост@endsection

@section('content')
	<div class="site-hero_2">
		<div class="page-title">
			<div class="big-title montserrat-text uppercase">to update</div>
			<div class="small-title montserrat-text uppercase">home / to update</div>
		</div>
	</div>

	<section>
		<div class="container">
			<div class="row">
				@if(count($errors) > 0)
					<ul class="alert alert-danger" style="margin-left: 15px; margin-right: 15px">
						@foreach($errors->all() as $item)
							<li style="padding: 5px; margin-left: 20px">
								{{ $item }}
							</li>
						@endforeach
					</ul>
				@endif
				<div class="col-md-12">
					<div class="row">
						<form action="{{ route('updatepost', $post['id']) }}" method="post" enctype="multipart/form-data">
							@csrf
							@method('PATCH')
							<div class="col-md-12">
								<div class="input_1" style="margin-bottom:30px">
									<input type="text" name="name" id="name" value="{{$post['name']}}">
									<span class="active">update name</span>
								</div>
							</div>
							<div class="col-md-12">
								<div class="input_1" style="margin-bottom:25px">
									<input type="text" name="tags" id="tags" value="@foreach($post['tags'] as $key => $tag)@if($key + 1 != count($post['tags'])){{ $tag }},@else{{ $tag }}@endif @endforeach">
									<span class="active">update tags (write separated by commas)</span>
								</div>
							</div>
							<div class="col-md-6">
								<input type="text" class="__invisible" name="category" id="category" value="{{ $post['category']}} " style="display: none">
								<input type="reset" class="reset invisible" value="Clear it!" />
								<div class="__select" style="margin-bottom:30px" data-state="">
									<div class="__select__title" data-default="Option 0">{{ $post['category']}} </div>
									<div class="__select__content">
										<input class="__select__input" type="radio" />
										<label class="__select__label"></label>
										<input class="__select__input" type="radio" />
										<label class="__select__label">policy</label>
										<input class="__select__input" type="radio" />
										<label class="__select__label">nature</label>
										<input class="__select__input" type="radio" />
										<label class="__select__label">sport</label>
										<input class="__select__input" type="radio" />
										<label class="__select__label">art</label>
										<input class="__select__input" type="radio" />
										<label class="__select__label">hobby</label>
										<input class="__select__input" type="radio" />
										<label class="__select__label">love</label>
										<input class="__select__input" type="radio" />
										<label class="__select__label">science</label>
										<input class="__select__input" type="radio" />
										<label class="__select__label">money</label>
										<input class="__select__input" type="radio" />
										<label class="__select__label">other</label>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="textarea_1" style="margin-bottom:10px">
									<textarea name="text" id="text">{{$post['text']}}</textarea>
									<span class="active">what do u want to update</span>
								</div>
							</div>
							<div class="col-md-12" style="margin-bottom:30px">
								<input type="file" name="imageFile" id="imageFile" class="invisible invisibleBtn">
								<input type="text" name="imageString" id="imageString" style="display: none" value="{{ $post['image'] }}">
								<button type="button" class="btn grey file"><span>update image</span></button>
							</div>
							<div class="col-md-12">
								<button type="submit" class="btn green"><span>update</span></button>
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
	
	<script src="{{ asset('js/select.js') }}"></script>
	<script src="{{ asset('js/test.js') }}"></script>
@endsection