<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Questionnaire') }}
        </h2>
    </x-slot>

    <questionnaire
        :questions="{{ json_encode($questions) }}"
        :submit-url="{{ json_encode(route('submit-questionnaire')) }}"
    ></questionnaire>
</x-app-layout>
