<?php

namespace App\Livewire\Projects;

use Livewire\Component;
use App\Models\Project;
use Livewire\WithPagination;

class ListProject extends Component
{
    use WithPagination;

    public function deleteProject(string $id)
    {
        $this->authorize('delete-project');

        // Find project by ID
        $project = Project::findOrFail($id);

        // Delete project
        $project->delete();

        // Flash message
        session()->flash('status', 'Project deleted successfully.');

        // Redirect to project list
        return $this->redirect('/projects');
    }

    public function render()
    {
        $projects = Project::latest()->paginate(10);

        return view('livewire.projects.list-project', [
            'projects' => $projects, 
        ]);
    }
}
