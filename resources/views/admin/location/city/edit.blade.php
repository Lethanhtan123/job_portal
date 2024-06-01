@extends('admin.layouts.master')
@section('contents')
<section class="section">
    <div class="section-header">
        <h1>All City</h1>
    </div>
    <div class="section-body">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update City</h4>
                </div>
                <div class=" card-body">
                    <form action="{{ route('admin.city.update',$City->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Country</label>

                                    <select name="country" id=""
                                        class="select2 form-control country {{ hasError($errors, 'country') }}">
                                        @foreach ($Country as $item)
                                        <option @selected($item->id===$City->country_id) value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('country')" class="mt-2" />
                                </div>
                            </div>

                            {{-- <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">State</label>

                                    <select name="state" id=""
                                        class="select2 form-control state {{ hasError($errors, 'state') }}">
                                        @foreach ($State as $item)
                                        <option @selected($item->id===$City->state_id) value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('state')" class="mt-2" />
                                </div>
                            </div> --}}

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">City Name</label>
                                    <input type="text" name="city" class="form-control {{ hasError($errors, 'city') }}"
                                        id="" value="{{ old('city',$City->name) }}">
                                    <x-input-error :messages="$errors->get('city')" class="mt-2" />

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

{{-- @push('scripts')
<script>
    $(document).ready(function() {
        $('.country').on('change', function() {
            let country_id = $(this).val();

            $.ajax({
                mehtod: 'GET',
                url: '{{ route("admin.get-states", ":id") }}'.replace(":id", country_id),
                data: {},
                success: function(response) {
                    let html = '';

                    $.each(response, function(index, value) {
                        html += `<option value="${value.id}" >${value.name}</option>`
                    });

                    $('.state').html(html);

                },
                error: function(xhr, status, error) {

                }
            })
        })
    })
</script>
@endpush --}}
