<!-- Jumbotron Begins -->
<section class="jumbotron" style="background-image: url({{asset("images/work-img.JPG")}})">
    <div class="rp-bg"></div>
    <div class="container jumb-bg">
        <h1 class="jumb-header"><span class="text-rp">CODE</span>GIGS</h1>
        <p class="jumb-text">Find & Post Jobs & Projects </p>
        <div class="jumb-btn-bg">
            @auth
                <a href="{{route("create")}}" class="jumb-btn text-uppercase shadow">Post or list a gig now</a>
            @else
                <a href="" class="jumb-btn text-uppercase shadow">Sign up to list a gig</a>
            @endauth

        </div>
    </div>
</section>
