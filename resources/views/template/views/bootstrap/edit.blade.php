@@extends('layouts.main')
@@section('title','Edit')
@@section('content')
<!-- breadcrumbs -->
<div class="container">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="@{!!url('{{$parser->singular()}}')!!}"><i class="fa fa-home"></i> All {{ucwords(str_replace('_', ' ', $parser->plural()))}}</a></li>
            <li class="active"><i>Edit {{ucwords(str_replace('_', ' ', $parser->singular()))}}</i></li>
        </ol>
    </section>
</div>
<!-- /breadcrumbs -->

<div id="pageContent">
    <div class="container">
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3>Edit {{ucwords(str_replace('_', ' ', $parser->singular()))}}</h3>
                </div>
                <div class="box-body">
                    <form method = 'get' action = '@{!!url("{{$parser->singular()}}")!!}'>
                        <button class = 'btn btn-danger'>Show All {{ucwords(str_replace('_', ' ', $parser->plural()))}}</button>
                    </form>
                    <br>
                    <form method = 'POST' action = '@{!! url("{{$parser->singular()}}")!!}/@{!!${{$parser->singular()}}->id!!}/update'>
                        <input type = 'hidden' name = '_token' value = '@{{Session::token()}}'>
                        @foreach($dataSystem->dataScaffold('v') as $value)
                        <div class="form-group">
                            <label for="{{$value}}">{{ucwords(str_replace('_', ' ', $value))}}</label>
                            <input id="{{$value}}" name = "{{$value}}" type="text" class="form-control" value="@{!!${{$parser->singular()}}->{{$value}}!!}" placeholder = "{{ucwords(str_replace('_', ' ', $value))}}">
                        </div>
                        @endforeach
                        @foreach($dataSystem->getForeignKeys() as $key)
                        <div class="form-group">
                            <label>{{$key}} Select</label>
                            <select name = '{{lcfirst(str_singular($key))}}_id' class = "form-control">
                                @@foreach(${{str_plural($key)}} as $key => $value)
                                <option value="@{{$key}}">@{{$value}}</option>
                                @@endforeach
                            </select>
                        </div>
                        @endforeach
                        <button class = 'btn btn-primary' type ='submit'>Update</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@@endsection
