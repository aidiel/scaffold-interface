@@extends('layouts.main')
@@section('title','Show')
@@section('content')
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h3>Show {{ucwords(str_replace('_', ' ', $parser->singular()))}}</h3>
        </div>
        <div class="box-body">
    
    <form method = 'get' action = '@{!!url("{{$parser->singular()}}")!!}'>
        <button class = 'btn btn-primary'>Show All {{ucwords(str_replace('_', ' ', $parser->plural()))}}</button>
    </form>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            @foreach($dataSystem->dataScaffold('v') as $value)
            <tr>
                <td>
                    <b><i>{{$value}} : </i></b>
                </td>
                <td>@{!!${{$parser->singular()}}->{{$value}}!!}</td>
            </tr>
            @endforeach
            @if($dataSystem->getRelationAttributes() != null)
            @foreach($dataSystem->getRelationAttributes() as $key=>$value)
            @foreach($value as $key1 => $value1)
            <tr>
                <td>
                    <b><i>{{$value1}} : </i></b>
                </td>
                <td>@{!!${{$parser->singular()}}->{{str_singular($key)}}->{{$value1}}!!}</td>
            </tr>
            @endforeach
            @endforeach
            @endif
        </tbody>
    </table>
    </div>
        </div>
</section>
@@endsection
