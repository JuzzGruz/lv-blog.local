@extends('layouts.main')

@section('content')

<main>
        <div class="p-4 sm:p-8 bg-black dark:bg-sky-400 shadow sm:rounded-lg">
            <div class="col-12 p-0">
                @include('personal.profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-black dark:bg-sky-400 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('personal.profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-black dark:bg-sky-400 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('personal.profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</main>

@endsection