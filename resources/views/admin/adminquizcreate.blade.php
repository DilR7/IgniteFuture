@extends('admin.layouts.admin')

@section('title', 'Add Quiz')

@section('content')
@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('adminquiz.post') }}" method="POST">
    @csrf
    <div class="mb-4">
        <label for="title" class="block text-sm font-medium">Quiz Title</label>
        <input type="text" name="title" id="title" class="w-full border-gray-300 rounded-md" value="{{ old('title') }}" required>
        @error('title')
            <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="desc" class="block text-sm font-medium">Quiz Description</label>
        <textarea name="desc" id="desc" class="w-full border-gray-300 rounded-md" required>{{ old('desc') }}</textarea>
        @error('desc')
            <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="module_id" class="block text-sm font-medium">Select Module</label>
        <select name="module_id" id="module_id" class="w-full border-gray-300 rounded-md" required>
            <option value="" disabled selected>Select a module</option>
            @foreach ($modules as $module)
                <option value="{{ $module->id }}" {{ old('module_id') == $module->id ? 'selected' : '' }}>{{ $module->name }}</option>
            @endforeach
        </select>
        @error('module_id')
            <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div id="questions-container">
        <h3 class="text-lg font-medium mb-2">Questions</h3>
        <button type="button" class="bg-green-600 text-white px-3 py-2 rounded mb-4" onclick="addQuestion()">+ Add Question</button>

        <!-- Questions will be added dynamically here -->
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Add Quiz</button>
</form>

<script>
    let questionIndex = 0;

    function addQuestion() {
        const questionsContainer = document.getElementById('questions-container');
        const questionHTML = `
            <div class="question-block mb-6 border p-4 rounded-md">
                <h4 class="text-md font-medium mb-2">Question</h4>
                <label for="questions[${questionIndex}][text]" class="block text-sm font-medium">Question Text</label>
                <input type="text" name="questions[${questionIndex}][text]" class="w-full border-gray-300 rounded-md mb-2" value="{{ old('questions[${questionIndex}][text]') }}" required>
                @error('questions.${questionIndex}.text')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror

                <label for="questions[${questionIndex}][point]" class="block text-sm font-medium">Point</label>
                <input type="number" name="questions[${questionIndex}][point]" class="w-full border-gray-300 rounded-md mb-2" value="{{ old('questions[${questionIndex}][point]') }}" required>
                @error('questions.${questionIndex}.point')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror

                <div class="answers-container">
                    <h5 class="text-sm font-medium mb-2">Answers</h5>
                    <button type="button" class="bg-green-600 text-white px-2 py-1 rounded mb-4" onclick="addAnswer(this, ${questionIndex})">+ Add Answer</button>

                    <!-- Answers will be added dynamically here -->
                </div>
            </div>
        `;
        questionsContainer.insertAdjacentHTML('beforeend', questionHTML);
        questionIndex++;
    }

    function addAnswer(button, questionIndex) {
        const answersContainer = button.parentElement;
        const answerIndex = answersContainer.querySelectorAll('.answer-block').length;
        const answerHTML = `
            <div class="answer-block mb-2">
                <label for="questions[${questionIndex}][answers][${answerIndex}][text]" class="block text-sm font-medium">Answer Text</label>
                <input type="text" name="questions[${questionIndex}][answers][${answerIndex}][text]" class="w-full border-gray-300 rounded-md mb-1" value="{{ old('questions[${questionIndex}][answers][${answerIndex}][text]') }}" required>

                <label for="questions[${questionIndex}][answers][${answerIndex}][is_correct]" class="block text-sm font-medium">Is Correct?</label>
                <select name="questions[${questionIndex}][answers][${answerIndex}][is_correct]" class="w-full border-gray-300 rounded-md mb-2" required>
                    <option value="0" {{ old('questions[${questionIndex}][answers][${answerIndex}][is_correct]') == '0' ? 'selected' : '' }}>No</option>
                    <option value="1" {{ old('questions[${questionIndex}][answers][${answerIndex}][is_correct]') == '1' ? 'selected' : '' }}>Yes</option>
                </select>
            </div>
        `;
        answersContainer.insertAdjacentHTML('beforeend', answerHTML);
    }
</script>
@endsection
