<x-app-layout>
  <div class="flex justify-between">
      <h1 class="text-2xl font-semibold p-4">Roles Index</h1>
      <div class="p-4">
        @can('Role_create')
        <Link href="{{ route('roles.create') }}"
        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded text-white">New Role</Link>
        @endcan
         
      </div>
  </div>

  @can('Role_access')
  <x-splade-table :for="$roles">
      @cell('action', $role)
          <div class="space-x-2">
            @can('Role_edit')
            <Link href="{{ route('roles.edit', $role) }}" class="text-green-400 hover:text-green-700 font-semibold">
                Edit
                </Link>
            @endcan
             
            @can('Role_delete')
            <Link href="{{ route('roles.destroy', $role) }}" method="DELETE" confirm="Delete the role"
            confirm-text="Are you sure?" confirm-button="Yes" cancel-button="No"
            class="text-red-400 hover:text-red-700 font-semibold">
        Delete
        </Link> 
            @endcan
              
          </div>
      @endcell
  </x-splade-table>   
@endcan
</x-app-layout>



 