
<x-email-layout>
    <div class="bg-white p-5">

        Hello {{$user["name"]}}, <br>

        Woohoo, you can Verify Your Email <br>

        This is the link to reset your password, just click the link below <br> <br>

        <div style="text-align:center">
            <a href="{{route("verify_code", $user["email_verification_code"])}}" style="color: white; text-decoration:none; background-color: green;border: 1px solid green;padding:10px 15px;">
                Click Here To Reset Your Password
            </a>
        </div>
        <br>
        <p>Or copy and paste the following link on your web browser to reset your password</p>

        <p>
            <a href="{{route("verify_code", $user["email_verification_code"])}}">
                {{route("verify_code", $user["email_verification_code"])}}
            </a>
        </p>

        Thanks,<br>
        {{ config('app.name') }}

    </div>
</x-email-layout>
