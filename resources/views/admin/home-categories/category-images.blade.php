<div class="row">
    @forelse($homeCategoryImages as $categoryFile)
        <x-ui.media-file-preview :media="$categoryFile"></x-ui.media-file-preview>
    @empty
        <h4 class="px-3">No Data Available</h4>
    @endforelse
</div>

