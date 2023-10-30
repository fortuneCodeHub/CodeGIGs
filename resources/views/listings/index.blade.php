<x-layout>

    {{-- @php
        $user = \App\Models\User::where("id", 2)->first();
        echo $user->email_verification_code;
    @endphp --}}
    <style>
        .link {
            color: white;
            background-color: black;
            padding: 10px;
            font-weight: 700;
            font-size: 15px;
            text-decoration: none;
            border: 1px solid black;
            border-radius: 5px;
        }
        .link:hover {
            color: white;
        }
        .link-bg a {
            color: black;
        }
        .link-bg a:hover {
            color: white;
            background-color: rgb(173, 8, 49);
        }
        .link-bg a:focus {
            color: white;
            background-color: rgb(173, 8, 49);
        }
        .link-bg a.active {
            color: white;
            background-color: rgb(173, 8, 49);
        }
    </style>

    {{-- How to include partials --}}
    @include('partials._hero')
    @include('partials._search')

    <section class="pb-5">
        @if (isset($_GET["search"]) || isset($_GET["tag"]))
            @php
                $search = $_GET["search"] ?? $_GET["tag"];
            @endphp
            @if (count($listings) == 0)
                <p class="text-center">{{"There are no listings for $search"}}</p>
            @else
                <div class="container">
                    <div class="p-5 row">
                        @foreach ($listings as $key => $listing)
                            {{-- How to Include Components --}}
                            <x-listing-card :listing="$listing" />
                        @endforeach
                    </div>
                    @if (isset($_GET["search"]) || isset($_GET["tag"]))
                        <div class="py-2 text-center">
                            <a href="{{route("home")}}" class="link"><i class="bi bi-chevron-left me-1"></i>Back</a>
                        </div>
                    @endif
                </div>
                {{-- @if (count($listings) > 4) --}}
                    <div class="mt-3 p-4 link-bg">
                        {{$listings->links()}}
                    </div>
                {{-- @endif --}}
            @endif
        @else
            @if (count($listings) == 0)
                <p>{{"There are no listings at the moment"}}</p>
            @else
                <div class="container">
                    <div class="p-5 row">
                        @foreach ($listings as $key => $listing)
                            {{-- How to Include Components --}}
                            <x-listing-card :listing="$listing" />
                        @endforeach
                    </div>
                    @if (isset($_GET["search"]) || isset($_GET["tag"]))
                        <div class="py-2 text-center">
                            <a href="{{route("home")}}" class="link"><i class="bi bi-chevron-left me-1"></i>Back</a>
                        </div>
                    @endif
                </div>
                {{-- @if (count($listings) > 4) --}}
                    <div class="mt-3 p-4 link-bg">
                        {{$listings->links()}}
                    </div>
                {{-- @endif --}}
            @endif
        @endif
    </section>
    <section style="padding-bottom: 200px"></section>
</x-layout>
