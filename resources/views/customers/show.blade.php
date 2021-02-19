<x-app-layout>
    <div class="flex justify-center items-center mt-5 mb-5">
        <img src="{{$customer->avatar}}" alt="{{$customer->name}}'s photo" class="w-10 h-10 rounded-full object-cover">
        <h1 class="text-gray-700 font-bold text-3xl">{{$customer->name}}</h1>
    </div>
    <table class="m-auto">
        <thead class="">
        <tr class="bg-gray-800">
            <th class="px-6 py-2">
                <span class="text-gray-300">Avatar</span>
            </th>
            <th class="px-6 py-2">
                <span class="text-gray-300">Name</span>
            </th>
            <th class="px-6 py-2">
                <span class="text-gray-300">For Him</span>
            </th>
            <th class="px-6 py-2">
                <span class="text-gray-300">On Him</span>
            </th>
            <th class="px-6 py-2">
                <span class="text-gray-300">Total Money</span>
            </th>
            <th class="px-6 py-2">
                <span class="text-gray-300">Dealing Time</span>
            </th>

            <th class="px-6 py-2">
                <span class="text-gray-300">Last Updated Time</span>
            </th>
        </tr>
        </thead>
        <tbody class="bg-gray-200">
        <tr class="bg-white border-4 border-gray-200">
            <td class="px-6 py-2 flex flex-row items-center">
                <img
                    class="h-8 w-8 rounded-full object-cover"
                    src="{{$customer->avatar}}"
                    alt="{{$customer->name}}"
                />
            </td>
            <td>
                <span
                    class="text-center ml-6 font-semibold hover:underline hover:text-gray-700">{{$customer->name}}
                </span>
            </td>
            <td class="bg-red-400">
                <span class="text-center ml-6 font-semibold">{{$customer->for_him}}</span>
            </td>
            <td class="bg-green-400">
                <span class="text-center ml-6 font-semibold">{{$customer->on_him}}</span>
            </td>
            <td class=" @if($customer->total > 0) bg-green-500 @else bg-red-500 @endif">
                       <span class="text-center ml-6 font-semibold">
                           {{$customer->total}}
                       </span>
            </td>

            <td class="px-6 py-2">
                <span>{{$customer->created_at}}</span>
            </td>
            <td class="px-6 py-2">
                <span>{{$customer->updated_at}}</span>
            </td>
            <td class="px-6 py-2">
                <a href="{{route('customers.edit',$customer->id)}}"
                   class="bg-indigo-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black ">
                    Edit
                </a>
            </td>
            <td class="px-6 py-2">
                <form action="{{route('customers.destroy',$customer->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button
                        type="submit"
                        class="bg-red-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-red-500 hover:text-black ">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        </tbody>
    </table>

</x-app-layout>
