@extends('admin.layouts.admin')

@section('title', 'Edit Quiz')

@section('content')
<form action="{{ route('adminquiz.update', $quiz->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Quiz Title -->
    <div class="mb-4">
        <label for="title" class="block text-sm font-medium">Quiz Title</label>
        <input type="text" name="title" id="title" value="{{ old('title', $quiz->title) }}" class="w-full border-gray-300 rounded-md" required>
        @error('title')
            <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror
    </div>

    <!-- Module Selection -->
    <div class="mb-4">
        <label for="module_id" class="block text-sm font-medium">Select Module</label>
        <select name="module_id" id="module_id" class="w-full border-gray-300 rounded-md" required>
            @foreach ($modules as $module)
                <option value="{{ $module->id }}" {{ old('module_id', $quiz->module_id) == $module->id ? 'selected' : '' }}>
                    {{ $module->name }}
                </option>
            @endforeach
        </select>
        @error('module_id')
            <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror
    </div>

    <!-- Questions and Answers -->
    <div class="space-y-4">
        @foreach ($quiz->questions as $index => $question)
            <div class="border p-4 rounded-md space-y-2">
                <label for="question_{{ $index }}" class="block text-sm font-medium">Question {{ $index + 1 }}</label>
                <input type="text" name="questions[{{ $index }}][text]" id="question_{{ $index }}" value="{{ old('questions.' . $index . '.text', $question->text) }}" class="w-full border-gray-300 rounded-md" required>
                @error("questions.{$index}.text")
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror

                <!-- Question Points -->
                <div class="mb-4">
                    <label for="question_{{ $index }}_point" class="block text-sm font-medium">Points</label>
                    <input type="number" name="questions[{{ $index }}][point]" id="question_{{ $index }}_point" value="{{ old('questions.' . $index . '.point', $question->point) }}" class="w-full border-gray-300 rounded-md" required>
                    @error("questions.{$index}.point")
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Answers for this Question -->
                <div class="space-y-2">
                    @foreach ($question->answers as $answerIndex => $answer)
                        <div class="flex items-center space-x-4">
                            <input type="text" name="questions[{{ $index }}][answers][{{ $answerIndex }}][text]" value="{{ old('questions.' . $index . '.answers.' . $answerIndex . '.text', $answer->text) }}" class="w-full border-gray-300 rounded-md" required>
                            @error("questions.{$index}.answers.{$answerIndex}.text")
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror

                            <label for="is_correct_{{ $index }}_{{ $answerIndex }}">
                                <input type="checkbox" name="questions[{{ $index }}][answers][{{ $answerIndex }}][is_correct]" id="is_correct_{{ $index }}_{{ $answerIndex }}" {{ old('questions.' . $index . '.answers.' . $answerIndex . '.is_correct', $answer->is_correct) ? 'checked' : '' }} class="form-checkbox h-5 w-5 text-blue-600">
                                Correct Answer
                            </label>
                            @error("questions.{$index}.answers.{$answerIndex}.is_correct")
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <!-- Submit Button -->
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update Quiz</button>
</form>
@endsection
