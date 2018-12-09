@extends('app')

@section('content')
    <div class = "column" id = "content">
        <div class = "ui hidden section divider"></div>
        <div class = "row">
            <h1 class = "ui huge header">
                <img src="/img/yeungjin1.jpg">「YEUNGJIN INSIDE」에 오신것을 환영합니다.
            </h1>
        </div>
  
        <div class = "ui divider"></div>
        
        <br>
        <h3 class = "ui huge header">비밀번호 찾기</h3>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
  
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('가입 했던 이메일 주소를 입력해 주세요') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                    @if (count($errors) > 0)
                        @foreach($errors->all() as $error)
                            <p class = "alert alert-danger">{{$error}}</p>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('패스워드 재설정 링크 보내기') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
