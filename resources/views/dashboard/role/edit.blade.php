
<x-app-layout>
  <h1 class="text-2xl font-semibold p-4">Edit Role</h1>
  <x-splade-form :default="$role" :action="route('roles.update', $role)" method="PUT" class="p-4 bg-white rounded-md space-y-2">
      <x-splade-input name="name" label="Name" />
      <x-splade-select name="permissions[]" :options="$permissions" multiple relation choices />
      <x-splade-submit />
  </x-splade-form>
</x-app-layout>



{{-- <x-app-layout>
  <div class="max-w-4xl mx-auto py-12">
      <div class="bg-white shadow-md rounded-lg p-6">
          <h1 class="text-2xl font-semibold mb-4">Edit Role</h1>
          <form action="{{ route('roles.update', $role) }}" method="POST" class="space-y-6">
              @csrf
              @method('PUT')

              <div>
                  <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                  <input type="text" name="name" id="name" value="{{ old('name', $role->name) }}" required
                         class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>

              <div>
                  <label for="permissions" class="block text-sm font-medium text-gray-700">Permissions</label>
                  <select name="permissions[]" id="permissions" multiple
                          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                      @foreach($permissions as $id => $name)
                          <option value="{{ $id }}" {{ in_array($id, $role->permissions->pluck('id')->toArray()) ? 'selected' : '' }}>
                              {{ $name }}
                          </option>
                      @endforeach
                  </select>
              </div>

              <div>
                  <button type="submit"
                          class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                      Update Role
                  </button>
              </div>
          </form>
      </div>
  </div>
</x-app-layout> --}}



{{-- <x-app-layout>
   <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-1">
              <div class="bg-white shadow-md rounded my-6 p-5">
                <form method="POST" action="{{ route('admin.roles.update',$role->id)}}">
                  @csrf
                  @method('put')
                <div class="flex flex-col space-y-2">
                  <label for="role_name" class="text-gray-700 select-none font-medium">Role Name</label>
                  <input
                    id="role_name"
                    type="text"
                    name="name"
                    value="{{ old('name',$role->name) }}"
                    placeholder="Placeholder"
                    class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                  />
                </div>

                <h3 class="text-xl my-4 text-gray-600">Permissions</h3>
                <div class="grid grid-cols-3 gap-4">
                  @foreach($permissions as $permission)
                      <div class="flex flex-col justify-cente">
                          <div class="flex flex-col">
                              <label class="inline-flex items-center mt-3">
                                  <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="permissions[]" value="{{$permission->id}}"  @if(count($role->permissions->where('id',$permission->id)))
                                      checked 
                                    @endif
                                  ><span class="ml-2 text-gray-700">{{ $permission->name }}</span>
                              </label>
                          </div>
                      </div>
                  @endforeach
                </div>
                <div class="text-center mt-16">
                  <button type="submit" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">Update</button>
                </div>
              </div>

             
            </div>
        </main>
    </div>
</div>
</x-app-layout> --}}
