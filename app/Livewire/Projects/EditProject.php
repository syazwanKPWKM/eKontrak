<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;
use Illuminate\Validation\Rule;

class EditProject extends Component
{
    public Project $project;

    public string $title = '';

    public string $project_code = '';

    public string $sst_date = '';

    public string $jpict_number = '';

    public string $jpict_approval_date = '';

    public string $contract_period = '';

    public string $start_date = '';

    public string $end_date = '';

    public string $contract_value = '';

    public string $company_name = '';

    public string $company_pic = '';

    public string $department_owner = '';

    public string $project_owner = '';

    public string $officer_in_charge = '';

    public string $sealed_date = '';

    public string $contract_status = '';

    public string $remarks = '';

    public array $contractStatusOptions = [];

    public function mount(string $id) 
    {
        $this->project = Project::findOrFail($id); 

        $this->title = $this->project->title;
        $this->project_code = $this->project->project_code;
        $this->sst_date = $this->project->sst_date->format('Y-m-d');
        $this->jpict_number = $this->project->jpict_number;
        $this->jpict_approval_date = $this->project->jpict_approval_date->format('Y-m-d');
        $this->contract_period = $this->project->contract_period;
        $this->start_date = $this->project->start_date->format('Y-m-d');
        $this->end_date = $this->project->end_date->format('Y-m-d');
        $this->contract_value = (string)$this->project->contract_value;
        $this->company_name = $this->project->company_name;
        $this->company_pic = $this->project->company_pic;
        $this->department_owner = $this->project->department_owner;
        $this->project_owner = $this->project->project_owner;
        $this->officer_in_charge = $this->project->officer_in_charge;
        $this->sealed_date = $this->project->sealed_date->format('Y-m-d');
        $this->contract_status = $this->project->contract_status;
        $this->remarks = $this->project->remarks;

        $this->contractStatusOptions = Project::statusOptions();
    }

    protected function rules()
    {
        // Validation rules can be defined here
        return[
            'title' => ['required', 'string', 'max:255'],
            'project_code' => [
                'required',
                'string',
                'max:100',
                Rule::unique('projects', 'project_code')->ignore($this->project->id),
            ],
            'sst_date' => ['required', 'date'],
            'jpict_number' => ['required', 'string', 'max:255'],
            'jpict_approval_date' => ['required', 'date'],
            'contract_period' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'contract_value' => ['required', 'numeric'],
            'company_name' => ['required', 'string', 'max:255'],
            'company_pic' => ['required', 'string', 'max:255'],
            'department_owner' => ['required', 'string', 'max:255'],
            'project_owner' => ['required', 'string', 'max:255'],
            'officer_in_charge' => ['required', 'string', 'max:255'],
            'sealed_date' => ['required', 'date'],
            'contract_status' => ['required', 'string', Rule::in(array_keys(Project::statusOptions()))],
            'remarks' => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function updateProject()
    {
        // Validate the input data
        $this->validate();

        // Update project data
        $this->project->update([
            'title' => $this->title,
            'project_code' => $this->project_code,
            'sst_date' => $this->sst_date,
            'jpict_number' => $this->jpict_number,
            'jpict_approval_date' => $this->jpict_approval_date,
            'contract_period' => $this->contract_period,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'contract_value' => $this->contract_value,
            'company_name' => $this->company_name,
            'company_pic' => $this->company_pic,
            'department_owner' => $this->department_owner,
            'project_owner' => $this->project_owner,
            'officer_in_charge' => $this->officer_in_charge,
            'sealed_date' => $this->sealed_date,
            'contract_status' => $this->contract_status,
            'remarks' => $this->remarks,
        ]);

        // Flash message
        session()->flash('status', 'Project updated successfully.');

        // Redirect to project list
        return $this->redirect('/projects');
    }

    public function render()
    {
        return view('livewire.projects.edit-project');
    }
}
