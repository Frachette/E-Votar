<x-app-layout mainClass="flex" page_title="- Elections">
    <x-slot name="sidebar">
        <x-sidebar></x-sidebar>
    </x-slot>

    <x-slot name="header">
        <x-header></x-header>
    </x-slot>
    <x-slot name="main">
        <div class="bg-transparent px-2 py-0 min-h-screen ">
            <div class="mx-auto ">
                <div class="flex flex-row justify-between items-start mb-4">
                    <div class="mb-2 md:mb-0 text-left">
                        <h1 class="text-base font-semibold leading-6 text-gray-900">Election</h1>
                        <p class=" text-[11px] text-gray-500">List of Election of USeP Tagum Unit</p>
                    </div>
                </div>
            </div>
            <livewire:superadmin.elections-table/>
        </div>


    </x-slot>
</x-app-layout>
