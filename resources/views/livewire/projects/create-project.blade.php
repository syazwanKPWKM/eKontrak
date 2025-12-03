<div>
    <form wire:submit="saveProject" class="my-6 w-full space-y-6" autocomplete="off">
        <flux:input id="title" wire:model="title" label="Title" type="text" />

        <flux:input id="project_code" wire:model="project_code" label="Project Code" type="text" />

        <flux:input id="sst_date" wire:model="sst_date" label="SST Date" type="date" />

        <flux:input id="jpict_number" wire:model="jpict_number" label="JPICT Number" type="text" />

        <flux:input id="jpict_approval_date" wire:model="jpict_approval_date" label="JPICT Approval Date" type="date" />

        <flux:input id="contract_period" wire:model="contract_period" label="Contract Period" type="text" />

        <flux:input id="start_date" wire:model="start_date" label="Start Date" type="date" />

        <flux:input id="end_date" wire:model="end_date" label="End Date" type="date" />

        <flux:input id="contract_value" wire:model="contract_value" label="Contract Value" type="text" />

        <flux:input id="company_name" wire:model="company_name" label="Company Name" type="text" />

        <flux:input id="company_pic" wire:model="company_pic" label="Company PIC" type="text" />

        <flux:input id="department_owner" wire:model="department_owner" label="Department Owner" type="text" />

        <flux:input id="project_owner" wire:model="project_owner" label="Project Owner" type="text" />

        <flux:input id="officer_in_charge" wire:model="officer_in_charge" label="Officer In Charge" type="text" />

        <flux:input id="sealed_date" wire:model="sealed_date" label="Sealed Date" type="date" />

        <flux:select id="contract_status" wire:model="contract_status" placeholder="Choose contract status..." label="Contract Status">
            @foreach ($contractStatusOptions as $value => $label)
                <flux:select.option value="{{ $value }}">{{ $label }}</flux:select.option>
            @endforeach
        </flux:select>

        <flux:textarea id="remarks" wire:model="remarks" label="Remarks" />
        
        <div class="flex justify-end">
            <flux:button type="submit" variant="primary">Save</flux:button>
        
        </div>
    </form>
</div>
