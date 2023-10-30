<x-layout>
    <div class="text-start ps-5 py-2 my-2">
        <a href="{{route("home")}}" class="fw-bolder text-decoration-none text-black"><i class="bi bi-chevron-left fw-bold me-1"></i>Back</a>
    </div>

    <section class="listing-section">
        <div class="container">
            @if (empty($listing))
                {{ "There is no listing available at the moment" }}
            @else
                <x-list-card :listing="$listing" />
            @endif
        </div>
    </section>
    @include("partials._action-buttons")
    <section style="padding-bottom: 200px"></section>
</x-layout>
