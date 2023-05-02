@props([
    'title' => '',
    'value' => 0,
    'link' => '',
    'col' => 'col-lg-3 col-6',
    'bgColor' => ''
])

<div class="{{ $col }}">

    <div class="small-box {{ $bgColor }}">
        <div class="inner">
            <h3>{{ $value }}</h3>

            <p>{{ $title }}</p>
        </div>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
        <a href="{{ $link }}" class="small-box-footer"><i
                class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
