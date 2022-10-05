<div class="custom-header-tabs">
    <ul class="nav p-2">
        @foreach($tabs as $id => $tab)
            <li class="nav-item">
                <a @class(['nav-link','active'=>$loop->first]) href="#tab-{{$id}}" data-toggle="tab">{{$tab}}</a>
            </li>
        @endforeach
    </ul>
</div>