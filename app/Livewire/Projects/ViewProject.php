<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;

class ViewProject extends Component
{
    public Project $project;

    public function mount(string $id) 
    {
        $this->project = Project::findOrFail($id); 
    }


    public function render()
    {
        return view('livewire.projects.view-project');
    }
}
