@extends('MasterTemplate.site')
@section('mainContent')
        @foreach($errors->all() as $error)
            <i style="color: red">{{$error}}</i><br/>
        @endforeach
        <div class="content">
            <div class="row">
                <div class="login-form">
                    <h3>Please Sign In First.</h3>
                    {{Form::open()}}
                        <fieldset>
                            <div class="clearfix">
                                <input type="text" id="username" name="username" placeholder="username" />
                            </div>
                            </div>
                            <button class="btn primary" type="submit">Sign in</button>
                        </fieldset>
                    {{Form::close()}}
                </div>
            </div>
        </div>

@stop