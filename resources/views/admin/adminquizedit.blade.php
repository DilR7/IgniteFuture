@extends('admin.layouts.admin')

@section('title', 'Edit Quiz')

@section('content')
    <form action="{{ route('adminquiz.update', $quiz->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium">Quiz Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $quiz->title) }}"
                class="w-full border-gray-300 rounded-md" required>
            @error('title')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="desc" class="block text-sm font-medium">Quiz Description</label>
            <input type="text" name="desc" id="desc" value="{{ old('desc', $quiz->desc) }}"
                class="w-full border-gray-300 rounded-md" required>
            @error('desc')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="img" class="block text-sm font-medium">Quiz Image (Optional)</label>
            <input type="file" name="img" id="img" value="{{ old('img', $quiz->img) }}"
                class="w-full border-gray-300 rounded-md">
            @error('img')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="module_id" class="block text-sm font-medium">Select Module</label>
            <select name="module_id" id="module_id" class="w-full border-gray-300 rounded-md" required>
                @foreach ($modules as $module)
                    <option value="{{ $module->id }}"
                        {{ old('module_id', $quiz->module_id) == $module->id ? 'selected' : '' }}>
                        {{ $module->name }}
                    </option>
                @endforeach
            </select>
            @error('module_id')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="space-y-4">
            @foreach ($quiz->questions as $index => $question)
                <div class="border p-4 rounded-md space-y-2">
                    <label for="question_{{ $index }}" class="block text-sm font-medium">Question
                        {{ $index + 1 }}</label>
                    <input type="hidden" name="questions[{{ $index }}][id]" value="{{ $question->id }}">
                    <input type="text" name="questions[{{ $index }}][text]" id="question_{{ $index }}"
                        value="{{ old('questions.' . $index . '.text', $question->text) }}"
                        class="w-full border-gray-300 rounded-md" required>
                    @error("questions.{$index}.text")
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror

                    <div class="mb-4">
                        <label for="question_{{ $index }}_point" class="block text-sm font-medium">Points</label>
                        <input type="number" name="questions[{{ $index }}][point]"
                            id="question_{{ $index }}_point"
                            value="{{ old('questions.' . $index . '.point', $question->point) }}"
                            class="w-full border-gray-300 rounded-md">
                        @error("questions.{$index}.point")
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        @foreach ($question->answers as $answerIndex => $answer)
                            <div class="flex items-center space-x-4">
                                <input type="hidden"
                                    name="questions[{{ $index }}][answers][{{ $answerIndex }}][id]"
                                    value="{{ $answer->id }}">
                                <input type="text"
                                    name="questions[{{ $index }}][answers][{{ $answerIndex }}][text]"
                                    value="{{ old('questions.' . $index . '.answers.' . $answerIndex . '.text', $answer->text) }}"
                                    class="w-full border-gray-300 rounded-md" required>
                                @error("questions.{$index}.answers.{$answerIndex}.text")
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror

                                <label for="is_correct_{{ $index }}_{{ $answerIndex }}">
                                    <input type="checkbox"
                                        name="questions[{{ $index }}][answers][{{ $answerIndex }}][is_correct]"
                                        value="1" id="is_correct_{{ $index }}_{{ $answerIndex }}"
                                        {{ old('questions.' . $index . '.answers.' . $answerIndex . '.is_correct', $answer->is_correct) ? 'checked' : '' }}
                                        class="form-checkbox h-5 w-5 text-blue-600">
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

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update Quiz</button>
    </form>
@endsection
