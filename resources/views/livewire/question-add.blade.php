<x-panel>
    <div class="max-w-2xl">
        <form class="flex flex-col gap-4" wire:submit.prevent="createQuestion">
            <div>
                <label for="question-type">Question Type:</label>
                <select wire:model="type" id="question-type">
                    <option value="">Select question type</option>
                    <option value="multiple">Multiple Choice</option>
                    <option value="order">Order</option>
                </select>
            </div>

            <div>
                <label for="question-text">Question Text:</label>
                <input wire:model="text" id="question-text" type="text">
            </div>

            @if($type === 'multiple')
            <div class="flex flex-col gap-6">
                @foreach($options as $index => $option)
                <div class="flex gap-6 divide-x-2">
                    <input wire:model="options.{{ $index }}" type="text">
                    <div class="relative flex items-center justify-center px-6">
                        <div class="flex h-6 items-center">
                            <input id="isCorrect" wire:model="correctAnswers.{{ $index }}" name="isCorrect" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-600">
                        </div>
                        <div class="ml-3 text-sm leading-6">
                            <label for="isCorrect" class="font-medium text-gray-900">Is correct</label>
                        </div>
                    </div>
                    <button class="px-6" wire:click.prevent="removeOption({{ $index }})">Remove</button>
                </div>
                @endforeach
                <button wire:click.prevent="addOption()" class="max-w-max rounded-md bg-orange-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600">Add option</button>
            </div>
            @elseif($type === 'order')
            <div class="flex flex-col divide-y-2">
                @foreach($correctOrder as $index => $order)
                <div class="flex flex-col gap-4 py-6">
                    <input wire:model="correctOrder.{{ $index }}" type="text">
                    <button wire:click.prevent="removeOption({{ $index }})">Remove</button>
                </div>
                @endforeach
                <button wire:click.prevent="addOption()" class="max-w-max rounded-md bg-orange-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600">Add item </button>
            </div>
            @endif

            <div>
                <a href="/admin" type="submit" class="max-w-maxrounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Back</a>
                <button type="submit" class="max-w-max rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600">Save question</button>
            </div>
        </form>
    </div>






</x-panel>