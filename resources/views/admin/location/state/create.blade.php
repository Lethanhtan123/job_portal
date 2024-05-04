@extends('admin.layouts.master')
@section('contents')
<section class="section">
    <div class="section-header">
        <h1>All State</h1>
    </div>
    <div class="section-body">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create new State </h4>
                </div>
                <div class=" card-body">
                    <form action="{{ route('admin.state.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Country</label>

                                    <select name="country" id="" class="select2 form-control {{ hasError($errors, 'country') }}">
                                        @foreach ($Country as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('country')" class="mt-2" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control {{ hasError($errors, 'name') }}"
                                        id="" value="{{ old('name') }}">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
