@extends('layout.app')
@section('content')
    <style>
        @import url("https://fonts.googleapis.com/css?family=Ubuntu:300, 400, 500, 700&display=swap");

        body {
            background: #D9ECF2;
        }

        .profile-card {
            position: absolute;
            width: 28rem;
            top: 50%;
            left: 50%;
            transform: translate(-33%, -50%);
            font-family: "Ubuntu", sans-serif;
            letter-spacing: 0.025em;
            text-align: center;
            color: #002D40;
        }

        .profile-card .cover {
            background-image: url("https://source.unsplash.com/WLUHO9A_xik/1600x900"), linear-gradient(135deg, rgba(26, 166, 183, 0.2), rgba(255, 65, 77, 0.4));
            background-position: center;
            background-size: cover;
            background-blend-mode: overlay;
            height: 14rem;
            width: 100%;
            border-radius: 2rem;
            margin-bottom: -14rem;
            transform: translateY(0);
            transition: transform 500ms ease-in-out, opacity 200ms 300ms;
            opacity: 0;
            box-shadow: 0 2rem 4rem -3rem rgba(0, 45, 64, 0.5), 0 0rem 8rem 0 rgba(0, 45, 64, 0.1);
        }

        .profile-card .pic {
            background-image: url("https://i.ibb.co/TBWDcn5/me.jpg"), linear-gradient(135deg, rgba(26, 166, 183, 0.1), rgba(255, 65, 77, 0.2));
            background-position: center;
            background-size: cover;
            background-blend-mode: overlay;
            position: absolute;
            left: 50%;
            width: 8rem;
            height: 8rem;
            border-radius: 50%;
            transform: translate(-50%, -50%);
            margin-top: -2rem;
            z-index: 2;
            box-shadow: 0 1rem 1.5rem -1rem rgba(0, 45, 64, 0.2), 0 0 0.5rem 0 rgba(0, 45, 64, 0.2), 0 0rem 4rem 0 rgba(0, 0, 0, 0.2);
        }

        .profile-card .profile {
            position: relative;
            background: white;
            width: 100%;
            border-radius: 2rem;
            padding-top: 2rem;
            box-sizing: border-box;
            transition: transform 500ms ease-in-out;
            box-shadow: 0 2rem 4rem -3rem rgba(0, 45, 64, 0.5), 0 0rem 8rem 0 rgba(0, 45, 64, 0.1);
        }

        .profile-card .above-fold {
            padding-top: 3rem;
        }

        .profile-card .above-fold .name {
            font-size: 2rem;
            font-weight: 500;
            margin-bottom: 0.4rem;
        }

        .profile-card .above-fold .role {
            font-size: 1.5rem;
            color: #1AA6B7;
            font-weight: 400;
            margin-bottom: 0.8rem;
        }

        .profile-card .above-fold .location {
            font-size: 1.2em;
            font-weight: 200;
            margin-bottom: 0.5rem;
            opacity: 0.6;
        }

        .profile-card .above-fold .location i {
            margin-right: 0.5rem;
        }

        .profile-card .below-fold {
            max-height: 0;
            overflow: hidden;
            opacity: 0;
            transition: max-height 500ms ease-in-out, opacity 500ms 250ms;
        }

        .profile-card .below-fold .stats {
            border-top: 1px solid rgba(0, 45, 64, 0.1);
            margin-top: 1.5rem;
        }

        .profile-card .below-fold .stat {
            flex-basis: 4rem;
            flex-grow: 2;
            padding: 1rem 0;
            border-right: 1px solid rgba(0, 45, 64, 0.1);
            margin-right: 1px;
            cursor: pointer;
            background: rgba(217, 236, 242, 0.2);
            transition: background 200ms;
        }

        .profile-card .below-fold .stat:hover {
            background: rgba(217, 236, 242, 0.4);
        }

        .profile-card .below-fold .stat:last-child {
            border: none;
        }

        .profile-card .below-fold .stat label {
            font-weight: 400;
            opacity: 0.4;
        }

        .profile-card .below-fold .stat .num {
            font-weight: 700;
            font-size: 2rem;
            color: #1AA6B7;
            margin: 0.5rem;
        }

        .profile-card .below-fold .about {
            margin: -1rem 0 2rem;
            padding: 0 2rem;
            text-align: left;
        }

        .profile-card .below-fold .about p {
            font-weight: 300;
            line-height: 1.5rem;
        }

        .profile-card.expand .cover {
            opacity: 1;
            transform: translateY(-5rem);
            transition: transform 500ms ease-in-out, opacity 200ms 0ms;
        }

        .profile-card.expand .profile {
            transform: translateY(5rem);
        }

        .profile-card.expand .below-fold {
            max-height: 19em;
            opacity: 1;
        }

        .profile-card.expand #expand-button {
            animation: none;
            transform: rotate(180deg);
        }

        .row {
            display: flex;
            justify-content: center;
        }

        .button {
            width: 9rem;
            height: 2rem;
            padding: 1.2rem;
            margin: 1rem 0.5rem 0;
            box-sizing: border-box;
            background: transparent;
            cursor: pointer;
            font-size: 1.2rem;
            line-height: 0;
            text-transform: upper;
            font-weight: 500;
            color: #F56A79;
            border: 2px solid #F56A79;
            border-radius: 2rem;
            transition: background 200ms, color 200ms;
        }

        .button:hover {
            background: #F56A79;
            color: white;
        }

        #expand-button {
            opacity: 0.3;
            font-size: 1.5rem;
            margin: 1rem auto;
            animation: bounce 4s infinite;
            height: 2.5rem;
            width: 2.5rem;
            border-radius: 50%;
            cursor: pointer;
            transition: background 200ms, color 200ms, transform 500ms;
        }

        #expand-button i {
            height: 0;
            margin-top: 0.5rem;
        }

        #expand-button:hover {
            background: #002D40;
            color: white;
        }

        @keyframes bounce {

            0%,
            60%,
            100% {
                transform: translatey(0);
            }

            80% {
                transform: translatey(-8px);
            }

            90% {
                transform: translatey(8px);
            }
        }
    </style>
    <div class="background"></div>
    <div class="profile-card">
        <div class="cover"></div>
        <div class="profile">
            <div class="pic"></div>
            <div class="above-fold">
                <div class="name">
                    {{Str::ucfirst($userInfo->name)}}
                </div>
                <div class="role">
                    {{Str::ucfirst($userInfo->roles->name)}}
                </div>
                <div class="location">
                    <i class="fas fa-envelope"></i>{{$userInfo->email}}
                </div>
                 <br>
                 <br>
                 <br>
            </div>
             
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#expand-button').click(function() {
            $('.profile-card').toggleClass('expand');
        })
    </script>
@endpush
