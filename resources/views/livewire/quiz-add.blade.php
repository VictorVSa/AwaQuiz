<x-panel>
    <div class="space-y-10 divide-y divide-gray-900/10">
        <div class="grid grid-cols-1 gap-x-8 gap-y-8 pt-10 md:grid-cols-3">
            <div class="px-4 sm:px-0">
                <h2 class="text-base font-semibold leading-7 text-gray-900">New Quiz</h2>
            </div>

            <form wire:submit.prevent="createQuiz" class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
                <div class="px-4 py-6 sm:p-8">
                    <div class="grid  grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <div class="sm:col-span-4">
                            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-orange-600 sm:max-w-md">
                                    <input type="text" wire:model="name" name="name" id="name" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Cat breeds quiz">
                                    @error('name') <span class="mt-2 text-sm text-red-600">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="selected_client" class="block text-sm font-medium leading-6 text-gray-900">For Client</label>
                            <div class="mt-2">
                                <select name="selectedClient" wire:model="selected_client" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-orange-600 sm:text-sm sm:leading-6">
                                    @foreach ($clients as $client)
                                    <option value="{{$client->id}}">{{$client->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Available Questions</label>
                            <div class="mt-2">
                                <select name="availableQuestions" multiple class="min-h-[150px] mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-orange-600 sm:text-sm sm:leading-6">
                                    @foreach ($availableQuestions as $id)
                                    @php
                                    $question = \App\Models\Question::find($id);
                                    @endphp
                                    <option wire:click="selectQuestion({{ $id }})" value="{{$question->id}}">{{$question->text}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Selected</label>
                            <div class="mt-2">
                                <select name="selectedQuestions" multiple class="min-h-[150px] mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-orange-600 sm:text-sm sm:leading-6">
                                    @foreach ($selectedQuestions as $id)
                                    @php
                                    $question = \App\Models\Question::find($id);
                                    @endphp
                                    <option wire:click="removeQuestion({{ $id }})" value="{{$question->id}}">{{$question->text}}</option>
                                    @endforeach
                                </select>
                                @error('selectedQuestions') <span class="mt-2 text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                    <a href="/admin" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                    <button type="submit" class="rounded-md bg-orange-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600">Save</button>
                </div>
            </form>
        </div>
    </div>
</x-panel>