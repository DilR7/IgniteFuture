@extends('user.layouts.template')
@section('main-content')
    <div class="px-32 pb-16">
        <div class="grid grid-cols-4 text-black gap-6 pt-8">

            <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96">
                <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
                    <img src="https://images.unsplash.com/photo-1499696010180-025ef6e1a8f9?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1470&amp;q=80"
                        alt="card-image" />
                </div>
                <div class="p-4">
                    <div class="flex items-center">
                        <h6 class="text-slate-800 text-xl font-semibold">
                            Wooden House, Florida
                        </h6>

                        <div class="flex items-center gap-0 5 ml-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-5 h-5 text-yellow-600">
                                <path fill-rule="evenodd"
                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-slate-600 ml-1.5">5.0</span>
                        </div>
                    </div>
                </div>

                

                <div class="px-4 pb-4 pt-0 mt-2">
                    <button
                        class="w-full rounded-md bg-slate-800 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                        type="button">
                        Reserve
                    </button>
                </div>
            </div>


        </div>
    </div>
@endsection
