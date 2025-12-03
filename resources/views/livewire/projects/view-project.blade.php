<div>
    <div class="mb-5">
        <flux:heading>ID</flux:heading>
        <flux:text class="mt-2">{{ $project->id }}</flux:text>
    </div>

    <div class="mb-5">
        <flux:heading>Title</flux:heading>
        <flux:text class="mt-2">{{ $project->title }}</flux:text>
    </div>

    <div class="mb-5">
        <flux:heading>Project Code</flux:heading>
        <flux:text class="mt-2">{{ $project->project_code }}</flux:text>
    </div>

    <div class="mb-5">
        <flux:heading>SST Date</flux:heading>
        <flux:text class="mt-2">{{ $project->sst_date->format('d/m/Y') }}</flux:text>
    </div>

    <div class="mb-5">
        <flux:heading>JPICT Number</flux:heading>
        <flux:text class="mt-2">{{ $project->jpict_number }}</flux:text>
    </div>

    <div class="mb-5">
        <flux:heading>JPICT Approval Date</flux:heading>
        <flux:text class="mt-2">{{ $project->jpict_approval_date->format('d/m/Y') }}</flux:text>
    </div>

    <div class="mb-5">
        <flux:heading>Contract Period</flux:heading>
        <flux:text class="mt-2">{{ $project->contract_period }}</flux:text>
    </div>

    <div class="mb-5">
        <flux:heading>Start Date</flux:heading>
        <flux:text class="mt-2">{{ $project->start_date->format('d/m/Y') }}</flux:text>
    </div>

    <div class="mb-5">
        <flux:heading>End Date</flux:heading>
        <flux:text class="mt-2">{{ $project->end_date->format('d/m/Y') }}</flux:text>
    </div>

    <div class="mb-5">
        <flux:heading>Contract Value</flux:heading>
        <flux:text class="mt-2">{{ $project->contract_value }}</flux:text>
    </div>

    <div class="mb-5">
        <flux:heading>Company Name</flux:heading>
        <flux:text class="mt-2">{{ $project->company_name }}</flux:text>
    </div>

    <div class="mb-5">
        <flux:heading>Company PIC</flux:heading>
        <flux:text class="mt-2">{{ $project->company_pic }}</flux:text>
    </div>

    <div class="mb-5">
        <flux:heading>Department Owner</flux:heading>
        <flux:text class="mt-2">{{ $project->department_owner }}</flux:text>
    </div>

    <div class="mb-5">
        <flux:heading>Project Owner</flux:heading>
        <flux:text class="mt-2">{{ $project->project_owner }}</flux:text>
    </div>

    <div class="mb-5">
        <flux:heading>Officer In Charge</flux:heading>
        <flux:text class="mt-2">{{ $project->officer_in_charge }}</flux:text>
    </div>

    <div class="mb-5">
        <flux:heading>Sealed Date</flux:heading>
        <flux:text class="mt-2">{{ $project->sealed_date->format('d/m/Y') }}</flux:text>
    </div>

    <div class="mb-5">
        <flux:heading>Contract Status</flux:heading>
        <flux:text class="mt-2">{{ $project->contract_status_label }}</flux:text>
    </div>

    <div class="mb-5">
        <flux:heading>Remarks</flux:heading>
        <flux:text class="mt-2">{{ $project->remarks }}</flux:text>
    </div>

    <div class="mb-5">
        <flux:heading>Created At</flux:heading>
        <flux:text class="mt-2">{{ $project->created_at->format('d/m/Y h:i A') }}</flux:text>
    </div>

    <div class="mb-5">
        <flux:heading>Updated At</flux:heading>
        <flux:text class="mt-2">{{ $project->updated_at->diffForHumans() }}</flux:text>
    </div>
</div>
