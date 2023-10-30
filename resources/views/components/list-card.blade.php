@props(['listing'])

<style>
    #list_blade ul {
        justify-content: center;
    }
    #list_blade ul li a {
        font-size: 16px;
    }
</style>

<div class="text-center p-4">
    <img src="{{$listing->logo ? asset("storage/".$listing->logo) : asset("images/lvimg.png") }}" class="img-fluid" alt="">
</div>
<h2 class="listing-title">{{ $listing->title }}</h2>
<p class="listing-company fw-bold"> {{$listing->company}} </p>

<div id="list_blade">
    <x-listing-tags :tagsCsv="$listing->tags" />
</div>

<p class="listing-location fw-bolder"><i class="bi bi-geo-alt-fill me-1"></i>{{ $listing->location }}</p>
<hr class="pg-divider">
<div class="listing-desc-bg">
    <h2 class="listing-head">Job Description</h2>
    <p class="listing-desc">
        {{$listing->description}}
    </p>
    <div class="listing-btn-bg">
        <a href="mailto:{{$listing->email}}" class="listing-btn"><i class="bi bi-envelope-fill me-1"></i>Contact Employer</a>
        <a href="{{$listing->website}}" class="listing-btn"><i class="bi bi-globe me-1"></i>Visit Project</a>
    </div>
</div>
