@foreach(json_decode($data,true) as $d)
    {{$d['name']}}
    @foreach($d['goods_spec_item'] as $a)
    {{$a['id']}}
    @endforeach
    @endforeach