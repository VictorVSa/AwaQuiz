<x-panel>
    <form wire:submit.prevent="submitQuiz" class="flex flex-col gap-4">
        <ul role="list" class="divide-y divide-gray-100 overflow-hidden bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl">
            @foreach ($questions as $qIndex => $question)
            <li class="relative flex justify-between gap-x-6 px-4 py-5 hover:bg-gray-50 sm:px-6">
                <div class="flex gap-x-4">
                    <span class="h-12 w-12 flex justify-center items-center rounded-full bg-gray-50 text-center" alt="">{{$loop->index + 1}} </span>
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">
                            <span class="absolute inset-x-0 -top-px bottom-0"></span>
                            {{$question->text}}
                        </p>
                        <fieldset>
                            <div class="flex  flex-col space-y-5 ">
                                @foreach ($question->options as $oIndex => $option)
                                <div class="relative flex items-start">
                                    <div class="flex h-6 items-center">
                                        <input id="{{$option . $loop->index}}" name="{{$loop->index}}" value="{{ $option }}" wire:model="userResponses.{{ $question->id }}.{{ $oIndex }}" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-600">
                                    </div>
                                    <div class="ml-3 text-sm leading-6">
                                        <label for="{{$option . $loop->index}}" class="font-medium text-gray-900">{{$option}}</label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </fieldset>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        <button type="submit" class="max-w-max rounded-md bg-orange-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600">Submit answers</button>
    </form>

</x-panel>