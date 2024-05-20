<x-app-layout>
   
        

    <div class="flex justify-between">
        <h1 class="text-2xl font-semibold p-4">Users Index</h1>
        <div class="p-4">
            @can('add_user')
            <Link href="{{ route('users.create') }}"
                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded text-white">New User</Link>
            @endcan
        </div>
    </div>
 
    <x-splade-table :for="$users">
        @cell('role',$user)
        {{-- <div>{{ $user->getRoleNames()}}</div> --}}
        <div>{{ implode(', ', $user->getRoleNames()->toArray()) }}</div>
        @endcell
        @cell('action', $user)
        <div class="space-x-2">
            @can('edit_user')
            <Link href="{{ route('users.edit', $user) }}"  
            class="text-green-400 hover:text-green-700 font-semibold">
              Edit
            </Link>
            @endcan
            
            @can('delete_user')
            <Link href="{{ route('users.destroy', $user) }}" method="DELETE" confirm="Delete the user"
            confirm-text="Are you sure?" confirm-button="Yes" cancel-button="No"
            class="text-red-400 hover:text-red-700 font-semibold">
             Delete
            </Link>
            @endcan
            
        </div>
        @endcell
    </x-splade-table>
</x-app-layout>