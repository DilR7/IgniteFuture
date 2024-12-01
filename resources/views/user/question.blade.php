@extends('user.layouts.template')

@section('main-content')
    <div class="bg-white border-b-2 border-dodger-blue-300">
        <div class="w-full mx-auto px-4 sm:px-6 lg:px-12 flex items-center justify-between h-16">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('imgs/Logo.png') }}" alt="Logo" class="h-10 w-10 sm:h-12 sm:w-12">
                <p class="font-bold text-lg sm:text-xl">Ignite<span class="text-dodger-blue-500">Future</span></p>
            </div>

            <div class="flex items-center space-x-2 sm:space-x-4">
                @if (Auth::check())
                    <a href="{{ route('logout') }}"
                        class="text-dodger-blue-500 font-medium rounded-lg px-3 py-2 sm:px-4 sm:py-2 bg-dodger-blue-200 hover:bg-dodger-blue-500 hover:text-white">Log
                        Out</a>
                @else
                    <a href="{{ route('register') }}"
                        class="text-dodger-blue-500 font-medium rounded-lg px-3 py-2 sm:px-4 sm:py-2 bg-dodger-blue-200 hover:bg-dodger-blue-500 hover:text-white">Create
                        Account</a>
                    <a href="{{ route('login') }}"
                        class="bg-dodger-blue-500 font-medium text-white px-3 py-2 sm:px-4 sm:py-2 rounded-lg hover:bg-dodger-blue-900">Sign
                        In</a>
                @endif
            </div>
        </div>
    </div>

    {{-- Quiz Section --}}
    <div x-data="{
        currentQuestion: 0,
        selectedAnswers: {},
        score: null,
        quiz_id: '{{ $quiz_id }}',
        timeRemaining: 600,
        timer: null,
        showModal: false,
        isSubmitted: false,
        timeUp: false,
        startTimer() {
            this.timer = setInterval(() => {
                if (this.timeRemaining > 0) {
                    this.timeRemaining--;
                } else {
                    clearInterval(this.timer);
                    this.timeUp = true;
                    this.submitQuiz();
                }
            }, 1000);
        },
        formatTime(seconds) {
            const minutes = Math.floor(seconds / 60);
            const secs = seconds % 60;
            return `${minutes}:${secs < 10 ? '0' : ''}${secs}`;
        },
        openModal() {
            this.showModal = true;
        },
        confirmSubmit() {
            this.showModal = false;
            clearInterval(this.timer);
            fetch('{{ route('submit.quiz') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ answers: this.selectedAnswers, quiz_id: this.quiz_id })
                })
                .then(response => response.json())
                .then(data => {
                    this.score = data.score;
                    this.isSubmitted = true;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        },
        submitQuiz() {
            this.openModal();
        },
        resetQuiz() {
            this.currentQuestion = 0;
            this.selectedAnswers = {};
            this.score = null;
            this.timeUp = false;
            this.isSubmitted = false;
            this.timeRemaining = 600;
            this.startTimer();
        }
    }" x-init="startTimer()" class="px-4 sm:px-12 md:px-32 py-4 bg-gray-100">

        {{-- Timer --}}
        <div class="text-right mb-4" x-show="!isSubmitted">
            <span class="font-bold text-red-500 text-lg">
                Time Remaining: <span x-text="formatTime(timeRemaining)"></span>
            </span>
        </div>

        {{-- Questions --}}
        <div class="bg-white border border-gray-200 shadow-sm rounded-lg" x-show="!isSubmitted">
            @foreach ($questions as $index => $question)
                <div x-show="currentQuestion === {{ $index }}" class="p-6">
                    <div class="font-bold text-xl mb-4">Question {{ $index + 1 }}</div>
                    <p class="mb-6">{{ $question->text }}</p>

                    <div class="flex flex-col space-y-4">
                        @foreach ($question->answers as $answer)
                            <label class="flex items-center">
                                <input type="radio" name="answer_{{ $question->id }}" :value="{{ $answer->id }}"
                                    @click="selectedAnswers[{{ $question->id }}] = {{ $answer->id }}" class="mr-2">
                                <span>{{ $answer->text }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            @endforeach

            {{-- Navigation Buttons --}}
            <div class="flex justify-between items-center px-6 py-4 border-t border-gray-200">
                <button @click="currentQuestion = Math.max(currentQuestion - 1, 0)" x-show="currentQuestion > 0"
                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                    Previous
                </button>

                <button @click="currentQuestion = Math.min(currentQuestion + 1, {{ count($questions) - 1 }})"
                    x-show="currentQuestion < {{ count($questions) - 1 }}"
                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                    Next
                </button>

                <button @click="submitQuiz" x-show="currentQuestion === {{ count($questions) - 1 }}"
                    class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">
                    Submit
                </button>
            </div>
        </div>

        {{-- Modal --}}
        <div x-show="showModal"
            class="fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center z-50 px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-lg p-6 w-96">
                <div class="text-center">
                    <div class="flex justify-center mb-6">
                        <svg class="text-blue-600 w-12 h-12" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-semibold mb-4"
                        x-text="timeUp ? 'Time is up! Retake the quiz?' : 'Are you sure you want to submit the quiz?'"></h2>
                    <div class="flex justify-center space-x-4">
                        <button @click="confirmSubmit"
                            class="py-3 px-6 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-blue-600 focus:ring-4 focus:ring-gray-200"
                            x-show="timeUp">
                            Submit Quiz
                        </button>
                        <button @click="showModal = false"
                            class="py-3 px-6 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-blue-600 focus:ring-4 focus:ring-gray-200"
                            x-show="!timeUp">
                            No, Cancel
                        </button>
                        <button @click="confirmSubmit"
                            class="py-3 px-6 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300"
                            x-show="!timeUp">
                            Yes, I'm sure
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Score Display --}}
        <div x-show="score !== null && isSubmitted" class="my-32 text-center">
            <div class="text-2xl font-bold text-green-600 mb-4">
                Quiz Submitted! <br>
                Your Score: <span x-text="score"></span>
            </div>
            <div class="flex justify-center space-x-4">
                <button @click="resetQuiz"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-300 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    Retake
                </button>
                <button onclick="window.location.href='{{ route('quiz') }}';"
                    class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                    Back To Quiz
                </button>
            </div>
        </div>
    </div>

    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
