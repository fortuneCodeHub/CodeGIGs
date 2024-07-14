@props(['listing'])

<x-col>
    <div class="p-4 mb-3 bg-light d-md-flex d-block align-items-center">
        <img src="{{$listing->logo ? url("../storage/app/public/".$listing->logo) : asset("images/lvimg.png") }}" class="img-fluid w-50 d-none d-md-block me-3" alt="no-image-present">
        <div class="">
            <h2 class="py-2 mb-2"><a href="listing/{{$listing->id}}" class="list-title">{{$listing->title}}</a></h2>
            <p class="fw-bold mb-3 fs-5">{{$listing->company}}</p>
            {{-- Include the listing tags component --}}
            <x-listing-tags :tagsCsv="$listing->tags" />
            <p class="fs-5 fw-bold mb-3">
                <i class="bi bi-geo-alt-fill"></i>
                {{ $listing->location }}
            </p>
        </div>
    </div>

</x-col>
