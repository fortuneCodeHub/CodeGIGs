<x-layout>

    <style>
        body {
            background-color: rgba(245, 245, 245, 0.932);
        }
        .notify-bg {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 80vh;
        }
        .notify-card {
            background-color: white;
            width: 50%;
            margin: auto
        }
        .resend-link-bg {
            position: relative;
            padding: 20px;
        }
        .resend-link {
            text-decoration: none;
            font-size: 16px;
            padding: 10px 15px;
            border: 1px solid rgb(173, 8, 49);
            background-color: rgb(173, 8, 49);
            color: white;
            border-radius: 5px;
            transition: all .6s ease;
            position: absolute;
            top: 0;
            left: 20%;
            right: 20%;
            width: 60%;
        }
        .resend-link:hover {
            color: white;
            left: 19%;
            top: -4%;
        }
        @media (max-width: 991px) {
            .notify-card {
                width: 100%;
            }
        }
    </style>
    <div class="notify-bg">
        <div class="notify-card text-center p-5 bg-light shadow">
            <p class="pb-2">An Email has been sent to your Email Address, pleas check it and verify your email, if you didn't see it tap the button below;</p>
            <div class="resend-link-bg">
                <a href="{{route("resendEmail")}}" class="resend-link fw-bolder">Resend Verification Email</a>
            </div>
        </div>
    </div>

</x-layout>
