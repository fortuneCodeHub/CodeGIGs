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
            <small class="text-black">Reset Password</small>
        </div>
        <form action="{{route("pwd_reset")}}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method("PUT")
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
            <button class="mt-3 w-100 btn btn-lg bg-orange text-white goal" type="submit">Reset Password</button>
            <div class="text-center mb-3 mt-2">
                <p><a href="{{route("home")}}" class="text link" style="text-decoration: none;"><i class="bi bi-chevron-left"></i>Back</a></p>
            </div>
        </form>
    </x-auth-card-position>
    <section style="padding-bottom: 200px"></section>

</x-layout>

