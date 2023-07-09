<x-app-layout>

    <form method="post" action="{{ route('account.withdrawal.destroy') }}">
        @csrf
        @method('delete')

        <div class="py-12">
            <div class="sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <section>
                            <header>
                                <h2 class="text-lg font-medium text-gray-900">
                                    退会手続き
                                </h2>
                            </header>

                            <div class="p-4 sm:p-8">
                                <x-input-label for="withdrawal_reason" :value="__('退会理由')" :required="false" />
                                <textarea id="withdrawal_reason" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-orange-300 focus:border-orange-300"></textarea>
                                <x-input-error :messages="$errors->get('withdrawal_reason')" class="mt-2" />
                                <x-cancel-button>キャンセル</x-cancel-button>
                                <x-submit-button>退会する</x-submit-button>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </form>

</x-app-layout>
