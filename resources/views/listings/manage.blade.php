<x-layout>

    <style>
        .a-link {
            text-decoration: none;
            font-size: 14px;
        }
        .b-link {
            background-color: transparent;
            border: none;
            color: red;
            font-size: 14px;
        }
        .a-link:hover,
        .b-link:hover {
            text-decoration: underline;
        }
    </style>
    <section class="pb-5">
        <div class="container">
            <div class="p-5 row">
                <table class="table table-hover">
                    <thead></thead>
                    <tbody>
                        @if ($listings->isEmpty())
                            <tr>
                                <p>Ooops, you have not posted any listings</p>
                            </tr>
                        @else
                            @foreach ($listings as $key => $listing)
                                <tr>
                                    <td style="padding: 30px 5px">{{$listing->title}}</td>
                                    <td style="padding: 30px 0px">
                                        <a href= "../listing/{{$listing->id}}/edit" class="a-link"><i class="bi bi-pencil-fill me-1"></i>Edit</a>
                                    </td>
                                    <td style="padding: 30px 0px">
                                        <form action="../listing/{{$listing->id}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="b-link"><i class="bi bi-trash me-1"></i>Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            @if (isset($_GET["search"]) || isset($_GET["tag"]))
                <div class="py-2 text-center">
                    <a href="{{route("home")}}" class="link"><i class="bi bi-chevron-left me-1"></i>Back</a>
                </div>
            @endif
        </div>
    </section>
    <section style="padding-bottom: 200px"></section>
</x-layout>
