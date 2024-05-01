@extends('layout')

@section('title')Обновление профиля@endsection

@section('content')
<div class="site-hero_2">
    <div class="page-title">
        <div class="big-title montserrat-text uppercase">update profile</div>
        <div class="small-title montserrat-text uppercase">home / profile / update profile</div>
    </div>
</div>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <form action="{{ route('toupdateprofile', $user['id']) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
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
                                <input type="text" name="name" id="name" value="{{ $user['name'] }}">
                                <span class="@if($user['name']) active @endif">new name</span>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:30px">
                            <input type="file" name="avatarFile" id="avatarFile" class="invisible">
                            <input type="text" name="avatarString" id="avatarString" value="{{ $user['avatar'] }}" style="display: none">
                            <button type="button" class="btn grey file"><span>new avatar</span></button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn green"><span>update</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

    <script>
        const fakeFile = document.querySelector('.file');
        const currentFile = document.querySelector('.invisible');
        
        fakeFile.addEventListener('click', () => {
            currentFile.click();
        });
    </script>
@endsection