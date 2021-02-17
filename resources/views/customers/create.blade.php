<x-app-layout>
    <section class="text-gray-700 body-font">
        <div class="container px-8 pt-10 pb-24 mx-auto lg:px-4">
            <h3 class="text-center font-bold text-2xl text-gray-800">Add Customer!</h3>
            <form
                action="{{route('customers.store')}}"
                method="POST"
                class="flex flex-col w-full p-8 mx-auto mt-10 border-2 rounded-lg lg:w-2/6 md:w-1/2 md:ml-auto md:mt-0">

                @csrf
                <div class="relative ">
                    <input type="text" name="name" placeholder="Name"
                           class="bg-white w-full px-4 py-2 mb-4 mr-4 text-base text-blue-700 bg-gray-100 border rounded-lg focus:ring-0"
                           required>
                    <span class="text-red-700">@error('name') {{$message}} @enderror</span>
                </div>
                <div class="relative ">
                    <input type="number" name="for_him" placeholder="Money for him"
                           class="bg-white w-full px-4 py-2 mb-4 mr-4 text-base text-blue-700 bg-gray-100 border rounded-lg focus:ring-0"
                           required>
                    <span class="text-red-700">@error('for_him') {{$message}} @enderror</span>
                </div>
                <div class="relative ">
                    <input type="number" name="on_him" placeholder="Money on him"
                           class="bg-white w-full px-4 py-2 mb-4 mr-4 text-base text-blue-700 bg-gray-100 border rounded-lg focus:ring-0"
                           required>
                    <span class="text-red-700">@error('on_him') {{$message}} @enderror</span>
                </div>

                <div class="flex justify-center">
                    <button
                        type="submit"
                        class="px-3 py-2 font-semibold text-white transition duration-500 ease-in-out transform rounded shadow-xl lg:w-1/4 bg-gradient-to-r from-blue-700 hover:from-blue-600 to-blue-600 hover:to-blue-700 focus:ring focus:outline-none">
                        Add!
                    </button>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
