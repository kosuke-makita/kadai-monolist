@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12 col-md-offset-3">
            <div class="item">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <img src="{{ $item->image_url }}" alt="">
                    </div>
                    <div class="panel-body">
                        <p class="item-title">{{ $item->name }}</p>
                        <div class="buttons text-center">
                            @if (Auth::check())
                                @include('items.want_button', ['item' => $item])
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="want-users">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        Wantしたユーザ
                    </div>
                    <div class="panel-body">
                        @foreach ($want_users as $user)
                            <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="have-users">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        Haveしたユーザ
                    </div>
                    <div class="panel-body">
                    </div>
                </div>
            </div>
            <p class="text-center"><a href="{{ $item->url }}" target="_blank">楽天詳細ページへ</a></p>
        </div>
    </div>
@endsection@extends('layouts.app')

@section('content')
    <div class="user-profile">
        <div class="icon text-center">
            <img src="{{ Gravatar::src($user->email, 100) . '&d=mm' }}" alt="" class="img-circle">
        </div>
        <div class="name text-center">
            <h1>{{ $user->name }}</h1>
        </div>
        <div class="status text-center">
            <ul>
                <li>
                    <div class="status-label">WANT</div>
                    <div id="want_count" class="status-value">
                        {{ $count_want }}
                    </div>
                </li>
                <li>
                    <div class="status-label">HAVE</div>
                    <div id="have_count" class="status-value">
                        xxx
                    </div>
                </li>
            </ul>
        </div>
    </div>
    @include('items.items', ['items' => $items])
    {!! $items->render() !!}
@endsection
