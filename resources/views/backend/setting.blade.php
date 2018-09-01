@extends('layouts.app')

@section('content')
    @if (Session::has('status'))
        <div class="alert alert-info">
            <span>{{ Session::get('status') }}</span>
        </div>
    @endif
    <div class="container">
        <form action="{{ route('admin.setting.store') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="url_callback_bot">Url callback для TelegramBot:</label>
                <div class="input-group">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#" onclick="document.getElementById('url_callback_bot').value='{{ url('') }}'">
                                    Enter URL
                                </a>
                            </li>
                            <li><a href="#" onclick="event.preventDefault(); document.getElementById('setwebhook').submit()">Sent URL</a></li>
                            <li><a href="#" onclick="event.preventDefault(); document.getElementById('getwebhookinfo').submit()">Get Info</a></li>
                        </ul>
                    </div>
                    <input type="url" class="form-control" name="url_callback_bot" id="url_callback_bot" value="{{ $url_callback_bot or '' }}">
                </div>
            </div>

            {{--<div class="form-group">--}}
                {{--<label for="telegram_bot_name">Telegram Bot name:</label>--}}
                {{--<div class="input-group">--}}
                    {{--<input type="text" class="form-control" name="telegram_bot_name" id="telegram_bot_name" value="{{ $telegram_bot_name or '' }}">--}}
                {{--</div>--}}
            {{--</div>--}}
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

        <form id="setwebhook" action="{{ route('admin.setting.setwebhook') }}" method="post" style="display: none">
            {{ csrf_field() }}
            <input type="hidden" name="url" value="{{ $url_callback_bot or '' }}">
        </form>

        <form id="getwebhookinfo" action="{{ route('admin.setting.getwebhookinfo') }}" method="post" style="display: none">
            {{ csrf_field() }}
        </form>
    </div>

@endsection
