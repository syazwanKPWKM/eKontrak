<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;
use Illuminate\Validation\Rule;

class CreateProject extends Component
{
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

    public function mount()
    {
        $this->contractStatusOptions = Project::statusOptions();
    }

    protected function rules()
    {
        // Define validation rules here
        return[
            'title' => ['required', 'string', 'max:255'],
            'project_code' => ['required', 'string', 'max:100', Rule::unique('projects', 'project_code')],
            'sst_date' => ['required', 'date'],
            'jpict_number' => ['required', 'string', 'max:255'],
            'jpict_approval_date' => ['required', 'date'],
            'contract_period' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after:start_date'],
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

    public function saveProject()
    {
        //Validate the input data
        $this->validate();

        //Store project data
        Project::create([
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

        // Session flash message
        session()->flash('status', 'Project created successfully.');

        // Redirect to project list
        return $this->redirect('/projects');
    }

    public function render()
    {
        return view('livewire.projects.create-project');
    }
}
