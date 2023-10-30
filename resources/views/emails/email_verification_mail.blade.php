<x-email-layout>
    <div class="bg-white p-5">

        Hello {{$user["name"]}}, <br>

        Thank you for signing up with CodeGIGs <br>

        Woohoo, you can Verify Your Email now, just click the link below <br> <br>

        <div style="text-align:center">
            <a href="{{route("verify_email", $user["email_verification_code"])}}" style="color: white; text-decoration:none; background-color: green;border: 1px solid green;padding:10px 15px;">
                Click Here To Verify your email address
            </a>
        </div>
        <br>
        <p>Or copy and paste the following link on your web browser to verify your email address</p>

        <p>
            <a href="{{route("verify_email", $user["email_verification_code"])}}">
                {{route("verify_email", $user["email_verification_code"])}}
            </a>
        </p>

        Thanks,<br>
        {{ config('app.name') }}

    </div>
</x-email-layout>
