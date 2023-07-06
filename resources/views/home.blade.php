@extends('layout.main')
@section('container')
    <ul class="navbar-nav">
        @auth

            <h1 class="text-center">
                Welcome, {{ auth()->user()->name }}
            </h1>
            <br>
            <a class="btn btn-info" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> Dashboard</a>
            <br>
            <form action="/logout" method="POST">
                @csrf
                {{-- <button type="submit" class="btn btn-danger"><i class="bi bi-box-arrow-in-right"></i> Logout</button> --}}

                <div class="button-borders">
                    <button type="submit" class="primary-button"><i class="bi bi-box-arrow-in-right"></i> Logout
                    </button>
                </div>
            </form>
        @else
              <br>
              <br>
              <div class="d-flex justify-content-center">
              <div class="button-borders">
                <a href="/login" class="btn primary-button nav-link {{ $active == 'login' ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
              </div>
            </div>
        @endauth
    </ul>

    <style>
        .primary-button {
            font-family: 'Ropa Sans', sans-serif;
            /* font-family: 'Valorant', sans-serif; */
            color: white;
            cursor: pointer;
            font-size: 13px;
            font-weight: bold;
            letter-spacing: 0.05rem;
            border: 1px solid #0E1822;
            padding: 0.8rem 2.1rem;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 531.28 200'%3E%3Cdefs%3E%3Cstyle%3E .shape %7B fill: %23FF4655 /* fill: %230E1822; */ %7D %3C/style%3E%3C/defs%3E%3Cg id='Layer_2' data-name='Layer 2'%3E%3Cg id='Layer_1-2' data-name='Layer 1'%3E%3Cpolygon class='shape' points='415.81 200 0 200 115.47 0 531.28 0 415.81 200' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E%0A");
            background-color: #eb2550;
            background-size: 200%;
            background-position: 200%;
            background-repeat: no-repeat;
            transition: 0.3s ease-in-out;
            transition-property: background-position, border, color;
            position: relative;
            z-index: 1;
        }

        .primary-button:hover {
            border: 1px solid #FF4655;
            color: white;
            background-position: 40%;
        }

        .primary-button:before {
            content: "";
            position: absolute;
            background-color: #0E1822;
            width: 0.2rem;
            height: 0.2rem;
            top: -1px;
            left: -1px;
            transition: background-color 0.15s ease-in-out;
        }

        .primary-button:hover:before {
            background-color: white;
        }

        .primary-button:hover:after {
            background-color: white;
        }

        .primary-button:after {
            content: "";
            position: absolute;
            background-color: #FF4655;
            width: 0.3rem;
            height: 0.3rem;
            bottom: -1px;
            right: -1px;
            transition: background-color 0.15s ease-in-out;
        }

        .button-borders {
            position: relative;
            width: fit-content;
            height: fit-content;
        }

        .button-borders:before {
            content: "";
            position: absolute;
            width: calc(100% + 0.5em);
            height: 50%;
            left: -0.3em;
            top: -0.3em;
            border: 1px solid #0E1822;
            border-bottom: 0px;
            /* opacity: 0.3; */
        }

        .button-borders:after {
            content: "";
            position: absolute;
            width: calc(100% + 0.5em);
            height: 50%;
            left: -0.3em;
            bottom: -0.3em;
            border: 1px solid #0E1822;
            border-top: 0px;
            /* opacity: 0.3; */
            z-index: 0;
        }

        .shape {
            fill: #0E1822;
        }
    </style>
@endsection
