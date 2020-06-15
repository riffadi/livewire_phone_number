<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    
    @if ($statusUpdate)
        <livewire:contact-update></livewire:contact-update>
    @else
        <livewire:contact-create></livewire:contact-create>
    @endif
    
    <hr>

    <div class="row">
        <div class="col">
            <select wire:model="paginate" name="" id="" class="form-control form-control-sm w-auto">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
            </select>
        </div>
    </div>
    <hr>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
                <?php $number = 0; ?>
                @foreach ($contacts as $contact)
                <?php $number++ ?>
                    <tr>
                        <th scope="row">{{ $number }}</th>
                        <th>{{ $contact->name }}</th>
                        <th>{{ $contact->phone }}</th>
                        <th>
                            <button wire:click="getContact({{ $contact->id }})" class="btn btn-sm btn-info text-white">Edit</button>
                            <button wire:click="destroy({{ $contact->id }})" class="btn btn-sm btn-danger text-white">Delete</button>
                        </th>
                    </tr>
                @endforeach
        </tbody>
    </table>

    {{ $contacts->links() }}
</div>
