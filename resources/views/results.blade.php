<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Questionnaire') }}
        </h2>
    </x-slot>

    <results-index
        :results="{{ json_encode($results) }}"
    ></results-index>
</x-app-layout>
