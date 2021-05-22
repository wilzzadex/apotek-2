@foreach ($satuan as $item)
    <option value="{{ $item->unit->id }}">{{ $item->unit->nama }}</option>
@endforeach