<div>
    {{-- Flash message --}}
    @if (session()->has('status'))
        <flux:callout class="mb-6" variant="success" icon="check-circle" heading="{{ session('status') }}" /> 
    @endif

    @can('create-project')
    <flux:button href="{{ route('projects.create') }}" variant="primary">Add Project</flux:button>    
    @endcan
    
    <div class="overflow-x-auto mt-6">
        <div class="inline-block min-w-full align-middle">
            <div class="overflow-hidden border border-gray-200 dark:border-gray-700 rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Project Code
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider ">
                                SST Date
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider ">
                                Contract Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse ($projects as $project)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{$project->id}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{$project->title}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{$project->project_code}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{$project->sst_date->format('d M Y')}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{$project->contract_status_label}}</td>

                                {{-- Actions --}}
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <flux:dropdown>
                                        <flux:button icon:trailing="chevron-down" size="sm">Actions</flux:button>

                                        <flux:menu>
                                            @can('read-project')
                                            <flux:menu.item href="{{ route('projects.show', $project->id) }}">View</flux:menu.item>
                                            @endcan

                                            @can('update-project')
                                            <flux:menu.item href="{{ route('projects.edit', $project->id) }}">Edit</flux:menu.item>    
                                            @endcan
                                            
                                            @can('delete-project')
                                            <flux:menu.item wire:click="deleteProject({{ $project->id }})" wire:confirm="Are you sure want to delete this project">Delete</flux:menu.item>
                                            @endcan
                                        </flux:menu>
                                    </flux:dropdown>
                                </td>
                            </tr>
                        @empty
                           <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-sm text-gray-500 dark:text-gray-400">
                                <p class="mt-2">No projects found.</p>
                            
                            </td> 
                           </tr> 
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- Pagination --}}
    <div class="mt-4">
        {{ $projects->links() }}
    </div>
</div>
