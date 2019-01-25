@extends('unify.layouts.personal-office')
@section('main-content')
    <div class="row gutters">
        <div class="col-12">
            <div class="card">
                <form method="post">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputTitle" class="control-label">@lang('unify/personal-office/issues/new.title_')</label>
                            <input type="text" name="title"
                                   class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                   id="inputTitle"
                                   placeholder="@lang('unify/personal-office/issues/new.title_')"
                                   autocomplete="off">
                            @if ($errors->has('title'))
                                <span class="form-text text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="inputBody" class="control-label">@lang('unify/personal-office/issues/new.text')</label>
                            <textarea name="body"
                                      class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"
                                      id="inputBody"
                                      placeholder="@lang('unify/personal-office/issues/new.text')"
                                      rows="4"
                                      autocomplete="off"></textarea>
                            @if ($errors->has('body'))
                                <span class="form-text text-danger">{{ $errors->first('body') }}</span>
                            @endif
                        </div>
                        <button class="btn btn-primary" type="submit">@lang('unify/personal-office/issues/new.submit')</button>
                        <a href="{{route('personal-office.issues.index')}}" class="btn btn-outline-light">@lang('unify/personal-office/issues/new.back')</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
