@php
$idValue = '';
if (isset($item)){
    $idValue = $item->id;
}
if (isset($arrId)){
    $idValue = $arrId;
}
@endphp
<input type="hidden" name="id" value="{{$idValue}}">
<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align"> Price *</label>
    <div class="col-md-6 col-sm-6 ">
        <input type="number" name="price"
               value="{{ $item->price ?? request()->old('price') }}"
               class="form-control ">
        @error('price')
        <div class="text-danger">* {{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group item">
    <label class="col-form-label col-md-3 col-sm-3 label-align">Categories *</label>
    <div class="col-md-6 col-sm-6 col-form-label">
        <select name="category_id" class="form-control">
            <option selected disabled>--Select--</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}"
                    {{isset($item) && $item->category_id == $category->id ? 'selected': '' }}
                    {{request()->old('category_id') == $category->id ? 'selected': '' }}>

                    {{$category->name}}</option>
            @endforeach
        </select>
        @error('category_id')
        <div class="text-danger">* {{ $message }}</div>
        @enderror
    </div>
</div>
<?php
$status = [

    (object)[
        'name' => 'hết hàng',
        'value' => 0
    ],
    (object)[
        'name' => 'còn hàng',
        'value' => 1
    ],
]
?>
<div class="form-group item">
    <label class="col-form-label col-md-3 col-sm-3 label-align">Status *</label>
    <div class="col-md-6 col-sm-6 col-form-label">
        <select name="status" class="form-control">
            <option selected disabled>--Select--</option>
            @foreach($status as $st)
                <option value="{{$st->value}}"
                    {{isset($item) && $item->status == $st->value ? 'selected': '' }}>
                    {{$st->name}}</option>
            @endforeach
        </select>
        @error('status')
        <div class="text-danger">* {{ $message }}</div>
        @enderror
    </div>
</div>
