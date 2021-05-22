@foreach ($satuan as $item)
    <option value="{{ $item->id }}">{{ $item->nama }}</option>
@endforeach