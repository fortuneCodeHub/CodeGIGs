<x-layout>

    <!-- <img src="Image/explain1.png" class="bg-image" alt="" > -->

    <x-auth-card-position>
        <div class="text-center auth-header">
            <img class="mb-2" src="images/user-interface-8.svg" alt="">
            <h1 class="h3 mb-2 fw-bold">
                <a href="{{route("home")}}" id="auth-signup">Code<span class="text-black">GIGs</span></a>
            </h1>
            <small class="text-black">Create A Gig</small>
            <br>
            <small class="text-black fs-6">Post a gig to find a developer</small>
        </div>
        <form action="{{route("store")}}" method="POST" enctype="multipart/form-data" >
            @csrf
            {{-- Company Name Field --}}
            <div>
                <label for="">Company Name</label>
                <div class="join-group d-flex align-items-center">
                    <span class="bg-white input-text"><i class="bi bi-person-badge"></i></span>
                    <div class="float-input">
                        <input type="text" value="{{old("company")}}" name="company" class="input" id="floatingInput">
                    </div>
                </div>
                @error('company')
                    <p class="text-danger fs-6 fw-bold">* {{$message}}</p>
                @enderror
            </div>
            {{-- Job Title Field --}}
            <div>
                <label for="">Job Title</label>
                <div class="join-group d-flex align-items-center">
                    <span class="bg-white input-text"><i class="bi bi-person-badge"></i></span>
                    <div class="float-input">
                        <input type="text" name="title" value="{{old("title")}}" class="input" id="floatingInput" placeholder="Example: Senior Laravel Developer">
                    </div>
                </div>
                @error('title')
                    <p class="text-danger fs-6 fw-bold">* {{$message}}</p>
                @enderror
            </div>
            {{-- Job Location field --}}
            <div>
                <label for="">Job Location</label>
                <div class="join-group d-flex align-items-center">
                    <span class="bg-white input-text"><i class="bi bi-geo-alt-fill"></i></span>
                    <div class="float-input">
                        <input type="text" value="{{old("location")}}" name="location" class="input" id="floatingInput" placeholder="Example: Ikeja, Lagos city, Nigeria">
                    </div>
                </div>
                @error('location')
                    <p class="text-danger fs-6 fw-bold">* {{$message}}</p>
                @enderror
            </div>
            {{-- Contact Email Field --}}
            <div>
                <label for="">Contact Email</label>
                <div class="join-group d-flex align-items-center">
                    <span class="bg-white input-text"><i class="bi bi-envelope-fill"></i></span>
                    <div class="float-input">
                        <input type="text" value="{{old("email")}}" name="email" class="input" id="floatingInput">
                    </div>
                </div>
                @error('email')
                    <p class="text-danger fs-6 fw-bold">* {{$message}}</p>
                @enderror
            </div>
            {{-- Website/Application URL Field --}}
            <div>
                <label for="">Website/Application URL</label>
                <div class="join-group d-flex align-items-center">
                    <span class="bg-white input-text"><i class="bi bi-globe"></i></span>
                    <div class="float-input">
                        <input type="url" value="{{old("website")}}" name="website" class="input" id="floatingInput">
                    </div>
                </div>
                @error('website')
                    <p class="text-danger fs-6 fw-bold">* {{$message}}</p>
                @enderror
            </div>
            {{-- Tags (Seperate with Comma) --}}
            <div>
                <label for="">Tags (Seperate with Comma)</label>
                <div class="join-group d-flex align-items-center">
                    <span class="bg-white input-text"><i class="bi bi-tag-fill"></i></span>
                    <div class="float-input">
                        <input type="text" value="{{old("tags")}}" name="tags" class="input" id="floatingInput" placeholder="Example: Laravel, Backend, API, Vue">
                    </div>
                </div>
                @error('tags')
                    <p class="text-danger fs-6 fw-bold">* {{$message}}</p>
                @enderror
            </div>
            {{-- Company Logo --}}
            <div>
                <label for="">Company Logo</label>
                <div class="join-group d-flex align-items-center">
                    <span class="bg-white input-text"><i class="bi bi-image-fill"></i></span>
                    <div class="float-input">
                        <input type="file" name="logo" class="input" id="floatingInput">
                    </div>
                </div>
                @error('logo')
                    <p class="text-danger fs-6 fw-bold">* {{$message}}</p>
                @enderror
            </div>
            {{-- Job Description Field --}}
            <div>
                <label for="">Job Description</label>
                <div class="join-group d-flex align-items-center p-2">
                    <div class="float-input">
                        <textarea name="description" class="input" id="" cols="30" rows="10" placeholder="Include tasks, requirements, salary etc">
                            {{old("description")}}
                        </textarea>
                    </div>
                </div>
                @error('description')
                    <p class="text-danger fs-6 fw-bold">* {{$message}}</p>
                @enderror
            </div>
            <button class="mt-3 w-100 btn btn-lg bg-orange text-white" type="submit">Create GIG</button>
            <div class="text-center mb-3 mt-2">
                <p><a href="{{route("home")}}" class="text text-orange link" style="text-decoration: none;"><i class="bi bi-chevron-left"></i>Back</a></p>
            </div>
        </form>
    </x-auth-card-position>
    <section style="padding-bottom: 200px"></section>

</x-layout>
