@extends('user.layouts.template')

@section('main-content')
    <div class="bg-white border-b border-gray-200">
        <div class="w-full mx-auto px-4 sm:px-6 lg:px-12 flex items-center justify-between h-20">
            <div class="flex pr-4">
                <img>
                <p class="font-bold text-xl">IgniteFuture</p>
            </div>
        </div>
    </div>

    <div x-data="{
        currentQuestion: 0,
        selectedAnswers: {},
        score: null,
        quiz_id: '{{ $quiz_id }}',
        submitQuiz() {
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
                    alert('Your score: ' + this.score); // Display the score
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    }" x-init="startTimer()" class="w-full">
        <div class="text-right p-4">
            <span class="font-bold text-red-500 text-lg">Time Remaining: <span x-text="formatTime(timeRemaining)"></span></span>
        </div>
        <div class="flex flex-col gap-4 m-2">
            <div class="flex flex-col border-2 border-blue-500 rounded-lg p-4">

                <div class="items-start">
                    @foreach ($questions as $index => $question)
                        <div x-show="currentQuestion === {{ $index }}" class="w-full">
                            <div class="p-4 font-bold">Question {{ $index + 1 }}</div>
                            <div class="ml-4">{{ $question->text }}</div>

                            <div class="ml-4 flex flex-col mt-4 mb-4">
                                @foreach ($question->answers as $answer)
                                    <label class="flex items-center mb-2">
                                        <input type="radio" name="answer_{{ $question->id }}" :value="{{ $answer->id }}"
                                            @click="selectedAnswers[{{ $question->id }}] = {{ $answer->id }}"
                                            class="mr-2">
                                        {{ $answer->text }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="ml-4 flex justify-between mt-4 mb-4">
                    <button @click="currentQuestion = Math.max(currentQuestion - 1, 0)" x-show="currentQuestion > 0"
                        class="p-2 bg-blue-500 text-white mx-4 rounded-md font-medium">Previous</button>

                    <button @click="currentQuestion = Math.min(currentQuestion + 1, {{ count($questions) - 1 }})"
                        x-show="currentQuestion < {{ count($questions) - 1 }}"
                        class="p-2 bg-blue-500 text-white mx-4 rounded-md font-medium">Next</button>

                    <button @click="submitQuiz" x-show="currentQuestion === {{ count($questions) - 1 }}"
                        class="p-2 bg-green-500 text-white mx-4 rounded-md font-medium">Submit</button>
                </div>
            </div>
        </div>

        <div x-show="score !== null" class="mt-6 text-center text-xl font-bold text-green-600">
            Your Score: <span x-text="score"></span>
        </div>
    </div>

    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
