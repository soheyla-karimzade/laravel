
{{--@vite(['resources/css/app.css', 'resources/js/app.js',--}}
{{--'resources/js/test.js',node_modules/flowbite/dist/flowbite.js'--}}
{{--,'node_modules/flowbite/dist/datepicker.js'])--}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12 " x-data='setup()'>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-posts.update-post-modal />

                    <x-posts.list />
                </div>
            </div>
        </div>
    </div>


    {{--<script type="text/javascript" src="{{ Vite::asset('resources/js/Posts/postList.js') }}"></script>--}}

<script>
    let routeList ='{{route('api.posts')}}';
    let routeListStore='{{route('api.posts.store')}}';
    let routeListUpdate='{{route('api.posts.update')}}';
    console.log(routeListStore)
    

    document.addEventListener('alpine:init', () => {
        Alpine.store('post', {
            token: '{{$token}}',
        })
    });
</script>
    <script src="{{ mix('js/Posts/PostList.js') }}" ></script>


     {{--<script  type="text/javascript" src="{{ Vite::asset('resources/js/Posts/postList.js') }}" ></script>--}}




</x-app-layout>






