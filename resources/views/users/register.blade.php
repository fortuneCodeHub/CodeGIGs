<x-layout>

    <!-- <img src="Image/explain1.png" class="bg-image" alt="" > -->

    <style>
        .goal:hover {
            background-color: rgb(173, 8, 49);
        }
    </style>
    <x-auth-card-position>
        <div class="text-center auth-header">
            <img class="mb-2" src="images/user-interface-8.svg" alt="">
            <h1 class="h3 mb-2 fw-bold">
                <a href="{{route("home")}}" id="auth-signup">Code<span class="text-black">GIGs</span></a>
            </h1>
            <small class="text-black">Register your account now</small>
            <br>
            <small class="text-black fs-6">To post gigs to find developers</small>
        </div>
        <form action="users" method="POST" enctype="multipart/form-data" >
            @csrf
            {{-- Name --}}
            <div>
                <label for="">Name</label>
                <div class="join-group d-flex align-items-center">
                    <span class="bg-white input-text"><i class="bi bi-person-badge"></i></span>
                    <div class="float-input">
                        <input type="text" value="{{old("name")}}" name="name" class="input" id="floatingInput">
                    </div>
                </div>
                @error('name')
                    <p class="text-danger fs-6 fw-bold">* {{$message}}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label for="">Email</label>
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

            {{-- Password --}}
            <div>
                <label for="">Password</label>
                <div class="join-group d-flex align-items-center">
                    <span class="bg-white input-text"><i class="bi bi-lock-fill"></i></span>
                    <div class="float-input">
                        <input type="password" value="" name="password" class="input" id="floatingInput">
                    </div>
                </div>
                @error('password')
                    <p class="text-danger fs-6 fw-bold">* {{$message}}</p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div>
                <label for="">Confirm Password</label>
                <div class="join-group d-flex align-items-center">
                    <span class="bg-white input-text"><i class="bi bi-lock-fill"></i></span>
                    <div class="float-input">
                        <input type="password" value="" name="password_confirmation" class="input" id="floatingInput">
                    </div>
                </div>
                @error('password_confirmation')
                    <p class="text-danger fs-6 fw-bold">* {{$message}}</p>
                @enderror
            </div>

            <button class="mt-3 w-100 btn btn-lg bg-orange text-white goal" type="submit">Sign Up</button>
            <div class="text-center mb-3 mt-2">
                <p>Already have an account?
                    <a href="{{route("login")}}" class="text link" style="text-decoration: none;">Login</a>
                </p>
                <p><a href="{{route("home")}}" class="text link" style="text-decoration: none;"><i class="bi bi-chevron-left"></i>Back</a></p>
            </div>
        </form>
    </x-auth-card-position>
    <section style="padding-bottom: 200px"></section>

</x-layout>

