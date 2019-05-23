<input type="hidden" name="publikasi_id" value="{{ $id }}">

<div class="form-group">
    <label for="dosen_id">Nama</label>
    {{ Form::select('dosen_id', $dosens, null,['class'=> 'form-control', 'nama' => 'nama', 'placeholder' => 'Dosen']) }}
</div>

<div class="form-group">
    <label for="posisi">Posisi</label>
    {{ Form::text('posisi', null, ['class' => 'form-control', 'id' => 'posisi', 'placeholder' => 'posisi']) }}
</div>

