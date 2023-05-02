<ol class="breadcrumb float-sm-right">
    <li @class(['breadcrumb-item'])>
        <a href="{{route('dashboard')}}">Dashboard</a>
    </li>
    @foreach($items as $key => $value)
        <li @class(['breadcrumb-item','active' => $loop->last])>
            <a href="{{$value}}">{{$key}}</a>
        </li>
    @endforeach
</ol>
