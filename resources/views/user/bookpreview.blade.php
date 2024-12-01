@extends('user.layouts.template')
@section('main-content')
    <div class="px-32 pb-16">
        <div class="py-8 text-start font-semibold text-4xl">Art and Culture</div>
        <div class="grid grid-cols-6 text-black gap-6">
            <div class="flex flex-col text-center gap-4 col-span-2 pr-4">
                <div>
                    <img src="{{ secure_asset('build/assets/BookPreview.jpg') }}" alt="" class="">
                </div>
                <div class="flex flex-col items-start">
                    <div class="flex justify-center w-full p-4 border-2 border-gray-200">Rating </div>
                    <div class="flex flex-col w-full py-4 px-4 border-x-2 border-gray-200 text-xs gap-2 font-medium">
                        <div class="flex justify-between">
                            <div>Published Date</div>
                            <div class="text-gray-500">20 May 2020</div>
                        </div>
                        <div class="flex justify-between">
                            <div>Author</div>
                            <div class="text-gray-500">Budi Santoso</div>
                        </div>
                        <div class="flex justify-between">
                            <div>Publisher</div>
                            <div class="text-gray-500">PT. Berkah Jaya</div>
                        </div>
                        <div class="flex justify-between">
                            <div>Language</div>
                            <div class="text-gray-500">Indonesia</div>
                        </div>
                        <div class="flex justify-between">
                            <div>Category</div>
                            <div class="text-gray-500">Art and Culture</div>
                        </div>
                    </div>
                    <div class="flex flex-col py-4 border-2 w-full gap-4">
                        <button class="p-2 bg-dodger-blue-500 text-white mx-4 rounded-md font-medium">READ NOW</button>
                        <button
                            class="p-2 bg-dodger-blue-200 text-dodger-blue-600 mx-4 rounded-md font-medium">BOOKMARK</button>
                    </div>
                    <div class="flex flex-col py-4 border-x-2 w-full gap-2 items-start px-4">
                        <p class="font-medium">This book includes:</p>
                        <div class="flex flex-col gap-2 text-dodger-blue-500 text-xs">
                            <div class="flex gap-2">
                                <p>Limited access</p>
                            </div>
                            <div class="flex gap-2">
                                <p>Excercise file & downloadable resources</p>
                            </div>
                            <div class="flex gap-2">
                                <p>Shareable certificate of completion</p>
                            </div>
                            <div class="flex gap-2">
                                <p>Access on mobile, tablet, and TV</p>
                            </div>
                            <div class="flex gap-2">
                                <p>English subtitles</p>
                            </div>
                            <div class="flex gap-2">
                                <p>100% online courses</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col py-4 border-2 w-full gap-2 items-start px-4">
                        <p class="font-medium">Share this book:</p>
                        <div class="flex flex-col gap-2 text-dodger-blue-500 text-xs font-medium">
                            <button class="p-2 px-4 bg-gray-100">Copy Link</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col text-center gap-5 col-span-4 items-start">
                <div class="flex gap-3 text-sm text-gray-500"><a>Home</a> > <a>Couse</a> > <a>Book Preview</a></div>
                <div class="flex flex-col text-sm text-justify gap-4">
                    <div class="font-semibold  text-2xl">Book Preview</div>
                    <img src="{{ secure_asset('build/assets/BookPreview1.jpg') }}" alt="">
                </div>
                <div class="flex flex-col text-sm text-justify gap-4">
                    <p class="font-semibold text-lg">Description</p>
                    <p class="text-gray-600">The Arts and Culture textbook offers comprehensive content covering visual
                        arts, music, dance, and
                        theater. Each chapter is designed to provide an in-depth understanding of the history, development,
                        and basic techniques of these art forms, supplemented with relevant practical examples. In the
                        visual arts section, students are introduced to visual elements such as line, shape, and color, as
                        well as techniques for creating two- and three-dimensional artworks. Meanwhile, the music section
                        covers the basics of music theory, traditional Indonesian musical instruments, and simple musical
                        compositions that students can practice.</p>
                    <p class="text-gray-600">
                        The dance section introduces students to various traditional dances from different regions of
                        Indonesia, along with basic movement techniques and the symbolic meanings behind the dances. The
                        book also encourages creativity through project-based tasks, such as choreographing simple dance
                        routines. In the theater section, students learn the fundamentals of acting, directing, and other
                        elements of theatrical performances, from script preparation to stage presentation.
                    </p>
                    <p class="text-gray-600"> Overall, this book is designed to cultivate art appreciation among students
                        through an interactive
                        and project-based approach. Each chapter concludes with evaluation questions, individual tasks, and
                        group assignments that encourage students to apply their knowledge in real-world creative works. The
                        book also emphasizes the concept of art as a means of communication and cultural expression, aiming
                        to shape students into more creative, collaborative individuals with a deeper understanding of the
                        nation's cultural heritage.</p>
                </div>
                <div class="flex flex-col text-sm text-justify p-7 bg-dodger-blue-200 w-full gap-3">
                    <p class="font-semibold text-lg">What will you learn in this book</p>
                    <div class="grid grid-cols-2 gap-10 text-justify">
                        <div class="text-xs flex flex-col gap-6">
                            <div>
                                <p>Learn about various visual arts techniques such as painting, sculpture, and crafts, along
                                    with the cultural significance behind these art forms.</p>
                            </div>

                            <div>
                                <p>Understand traditional Indonesian music by exploring different instruments, rhythms, and
                                    the theory of music composition.</p>
                            </div>

                            <div>
                                <p>Explore the rich diversity of Indonesian dance, including traditional regional dances and
                                    their symbolic meanings, as well as basic choreography techniques.</p>
                            </div>
                        </div>

                        <div class="text-xs flex flex-col gap-6">
                            <div>
                                <p>Learn about various visual arts techniques such as painting, sculpture, and crafts, along
                                    with the cultural significance behind these art forms.</p>
                            </div>

                            <div>
                                <p>Understand traditional Indonesian music by exploring different instruments, rhythms, and
                                    the theory of music composition.</p>
                            </div>

                            <div>
                                <p>Explore the rich diversity of Indonesian dance, including traditional regional dances and
                                    their symbolic meanings, as well as basic choreography techniques.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col text-sm text-justify  w-full gap-3">
                    <p class="font-semibold text-lg">Book Rating</p>
                    <div class="grid grid-cols-4 gap-6">
                        <div class="col-span-1 flex flex-col p-4 border-2 text-center gap-2">
                            <p class="font-semibold text-4xl">4.9</p>
                            <div class="flex gap-1 w-full justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="w-3 h-3 text-dodger-blue-600">
                                    <path
                                        d="M12 .587l3.668 7.431L24 9.587l-6 5.848L19.336 24 12 20.091 4.664 24 6 15.435l-6-5.848 8.332-1.569L12 .587z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="w-3 h-3 text-dodger-blue-600">
                                    <path
                                        d="M12 .587l3.668 7.431L24 9.587l-6 5.848L19.336 24 12 20.091 4.664 24 6 15.435l-6-5.848 8.332-1.569L12 .587z" />
                                </svg>
                            </div>
                            <p>Course Rating</p>
                        </div>

                        <div class="col-span-3 flex flex-col text-center justify-between">
                            <div class="flex items-center gap-3 text-gray-600 text-xs">
                                <div class="flex gap-1 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        class="w-3 h-3 text-dodger-blue-600">
                                        <path
                                            d="M12 .587l3.668 7.431L24 9.587l-6 5.848L19.336 24 12 20.091 4.664 24 6 15.435l-6-5.848 8.332-1.569L12 .587z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        class="w-3 h-3 text-dodger-blue-600">
                                        <path
                                            d="M12 .587l3.668 7.431L24 9.587l-6 5.848L19.336 24 12 20.091 4.664 24 6 15.435l-6-5.848 8.332-1.569L12 .587z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        class="w-3 h-3 text-dodger-blue-600">
                                        <path
                                            d="M12 .587l3.668 7.431L24 9.587l-6 5.848L19.336 24 12 20.091 4.664 24 6 15.435l-6-5.848 8.332-1.569L12 .587z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        class="w-3 h-3 text-dodger-blue-600">
                                        <path
                                            d="M12 .587l3.668 7.431L24 9.587l-6 5.848L19.336 24 12 20.091 4.664 24 6 15.435l-6-5.848 8.332-1.569L12 .587z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        class="w-3 h-3 text-dodger-blue-600">
                                        <path
                                            d="M12 .587l3.668 7.431L24 9.587l-6 5.848L19.336 24 12 20.091 4.664 24 6 15.435l-6-5.848 8.332-1.569L12 .587z" />
                                    </svg>
                                </div>
                                <div class="flex items-center">5 Star Rating</div>
                                <div class="w-64 bg-blue-200 rounded-sm ">
                                    <div class="bg-blue-500 h-[8px] rounded-sm" style="width: 70%;"></div>
                                </div>
                                <p class="font-medium">75%</p>
                            </div>

                            <div class="flex items-center gap-3 text-gray-600 text-xs">
                                <div class="flex gap-1 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        class="w-3 h-3 text-dodger-blue-600">
                                        <path
                                            d="M12 .587l3.668 7.431L24 9.587l-6 5.848L19.336 24 12 20.091 4.664 24 6 15.435l-6-5.848 8.332-1.569L12 .587z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        class="w-3 h-3 text-dodger-blue-600">
                                        <path
                                            d="M12 .587l3.668 7.431L24 9.587l-6 5.848L19.336 24 12 20.091 4.664 24 6 15.435l-6-5.848 8.332-1.569L12 .587z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        class="w-3 h-3 text-dodger-blue-600">
                                        <path
                                            d="M12 .587l3.668 7.431L24 9.587l-6 5.848L19.336 24 12 20.091 4.664 24 6 15.435l-6-5.848 8.332-1.569L12 .587z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        class="w-3 h-3 text-dodger-blue-600">
                                        <path
                                            d="M12 .587l3.668 7.431L24 9.587l-6 5.848L19.336 24 12 20.091 4.664 24 6 15.435l-6-5.848 8.332-1.569L12 .587z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        class="w-3 h-3 stroke-dodger-blue-600 text-white ">
                                        <path
                                            d="M12 .587l3.668 7.431L24 9.587l-6 5.848L19.336 24 12 20.091 4.664 24 6 15.435l-6-5.848 8.332-1.569L12 .587z" />
                                    </svg>
                                </div>
                                <div class="flex items-center">4 Star Rating</div>
                                <div class="w-64 bg-blue-200 rounded-sm ">
                                    <div class="bg-blue-500 h-[8px] rounded-sm" style="width: 50%;"></div>
                                </div>
                                <p class="font-medium">50%</p>
                            </div>

                            <div class="flex items-center gap-3 text-gray-600 text-xs">
                                <div class="flex gap-1 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        class="w-3 h-3 text-dodger-blue-600">
                                        <path
                                            d="M12 .587l3.668 7.431L24 9.587l-6 5.848L19.336 24 12 20.091 4.664 24 6 15.435l-6-5.848 8.332-1.569L12 .587z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        class="w-3 h-3 text-dodger-blue-600">
                                        <path
                                            d="M12 .587l3.668 7.431L24 9.587l-6 5.848L19.336 24 12 20.091 4.664 24 6 15.435l-6-5.848 8.332-1.569L12 .587z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        class="w-3 h-3 text-dodger-blue-600">
                                        <path
                                            d="M12 .587l3.668 7.431L24 9.587l-6 5.848L19.336 24 12 20.091 4.664 24 6 15.435l-6-5.848 8.332-1.569L12 .587z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        class="w-3 h-3 stroke-dodger-blue-600 text-white ">
                                        <path
                                            d="M12 .587l3.668 7.431L24 9.587l-6 5.848L19.336 24 12 20.091 4.664 24 6 15.435l-6-5.848 8.332-1.569L12 .587z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        class="w-3 h-3 stroke-dodger-blue-600 text-white ">
                                        <path
                                            d="M12 .587l3.668 7.431L24 9.587l-6 5.848L19.336 24 12 20.091 4.664 24 6 15.435l-6-5.848 8.332-1.569L12 .587z" />
                                    </svg>
                                </div>
                                <div class="flex items-center">3 Star Rating</div>
                                <div class="w-64 bg-blue-200 rounded-sm ">
                                    <div class="bg-blue-500 h-[8px] rounded-sm" style="width: 45%;"></div>
                                </div>
                                <p class="font-medium">45%</p>
                            </div>

                            <div class="flex items-center gap-3 text-gray-600 text-xs">
                                <div class="flex gap-1 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        class="w-3 h-3 text-dodger-blue-600">
                                        <path
                                            d="M12 .587l3.668 7.431L24 9.587l-6 5.848L19.336 24 12 20.091 4.664 24 6 15.435l-6-5.848 8.332-1.569L12 .587z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        class="w-3 h-3 text-dodger-blue-600">
                                        <path
                                            d="M12 .587l3.668 7.431L24 9.587l-6 5.848L19.336 24 12 20.091 4.664 24 6 15.435l-6-5.848 8.332-1.569L12 .587z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        class="w-3 h-3 stroke-dodger-blue-600 text-white ">
                                        <path
                                            d="M12 .587l3.668 7.431L24 9.587l-6 5.848L19.336 24 12 20.091 4.664 24 6 15.435l-6-5.848 8.332-1.569L12 .587z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        class="w-3 h-3 stroke-dodger-blue-600 text-white ">
                                        <path
                                            d="M12 .587l3.668 7.431L24 9.587l-6 5.848L19.336 24 12 20.091 4.664 24 6 15.435l-6-5.848 8.332-1.569L12 .587z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        class="w-3 h-3 stroke-dodger-blue-600 text-white ">
                                        <path
                                            d="M12 .587l3.668 7.431L24 9.587l-6 5.848L19.336 24 12 20.091 4.664 24 6 15.435l-6-5.848 8.332-1.569L12 .587z" />
                                    </svg>
                                </div>
                                <div class="flex items-center">2 Star Rating</div>
                                <div class="w-64 bg-blue-200 rounded-sm ">
                                    <div class="bg-blue-500 h-[8px] rounded-sm" style="width: 20%;"></div>
                                </div>
                                <p class="font-medium">20%</p>
                            </div>
                            <div class="flex items-center gap-3 text-gray-600 text-xs">
                                <div class="flex gap-1 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        class="w-3 h-3 text-dodger-blue-600">
                                        <path
                                            d="M12 .587l3.668 7.431L24 9.587l-6 5.848L19.336 24 12 20.091 4.664 24 6 15.435l-6-5.848 8.332-1.569L12 .587z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        class="w-3 h-3 stroke-dodger-blue-600 text-white ">
                                        <path
                                            d="M12 .587l3.668 7.431L24 9.587l-6 5.848L19.336 24 12 20.091 4.664 24 6 15.435l-6-5.848 8.332-1.569L12 .587z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        class="w-3 h-3 stroke-dodger-blue-600 text-white ">
                                        <path
                                            d="M12 .587l3.668 7.431L24 9.587l-6 5.848L19.336 24 12 20.091 4.664 24 6 15.435l-6-5.848 8.332-1.569L12 .587z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        class="w-3 h-3 stroke-dodger-blue-600 text-white ">
                                        <path
                                            d="M12 .587l3.668 7.431L24 9.587l-6 5.848L19.336 24 12 20.091 4.664 24 6 15.435l-6-5.848 8.332-1.569L12 .587z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        class="w-3 h-3 stroke-dodger-blue-600 text-white ">
                                        <path
                                            d="M12 .587l3.668 7.431L24 9.587l-6 5.848L19.336 24 12 20.091 4.664 24 6 15.435l-6-5.848 8.332-1.569L12 .587z" />
                                    </svg>
                                </div>
                                <div class="flex items-center">1 Star Rating</div>
                                <div class="w-64 bg-blue-200 rounded-sm ">
                                    <div class="bg-blue-500 h-[8px] rounded-sm" style="width: 10%;"></div>
                                </div>
                                <p class="font-medium">10%</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col text-sm text-justify  w-full gap-3">
                    <p class="font-semibold text-lg">Students Feedback</p>
                    <div class ="flex gap-4">
                        <div>
                            <img src="{{ secure_asset('build/assets/profile1.jpeg') }}" alt=""
                                class="h-8 w-12 rounded-full">
                        </div>
                        <div class="flex flex-col gap-2">
                            <p class="font-medium">Diddy</p>
                            <div class="flex gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="w-3 h-3 text-dodger-blue-600">
                                    <path
                                        d="M12 .587l3.668 7.431L24 9.587l-6 5.848L19.336 24 12 20.091 4.664 24 6 15.435l-6-5.848 8.332-1.569L12 .587z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="w-3 h-3 text-dodger-blue-600">
                                    <path
                                        d="M12 .587l3.668 7.431L24 9.587l-6 5.848L19.336 24 12 20.091 4.664 24 6 15.435l-6-5.848 8.332-1.569L12 .587z" />
                                </svg>
                            </div>
                            <div class="text-sm">Buku yang sangat bagus !. Menjelaskan seluruh materi dengan detail dan
                                terperinci, mudah
                                untuk dipahami dan tidak membosankan.</div>
                        </div>
                    </div>

                    <div class ="flex gap-4">
                        <div>
                            <img src="{{ secure_asset('build/assets/profile1.jpeg') }}" alt=""
                                class="h-8 w-12 rounded-full">
                        </div>
                        <div class="flex flex-col gap-2">
                            <p class="font-medium">Diddy</p>
                            <div class="flex gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="w-3 h-3 text-dodger-blue-600">
                                    <path
                                        d="M12 .587l3.668 7.431L24 9.587l-6 5.848L19.336 24 12 20.091 4.664 24 6 15.435l-6-5.848 8.332-1.569L12 .587z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="w-3 h-3 text-dodger-blue-600">
                                    <path
                                        d="M12 .587l3.668 7.431L24 9.587l-6 5.848L19.336 24 12 20.091 4.664 24 6 15.435l-6-5.848 8.332-1.569L12 .587z" />
                                </svg>
                            </div>
                            <div class="text-sm">Buku yang sangat bagus !. Menjelaskan seluruh materi dengan detail dan
                                terperinci, mudah
                                untuk dipahami dan tidak membosankan.</div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
