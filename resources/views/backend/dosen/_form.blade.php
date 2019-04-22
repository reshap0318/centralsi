<div class="form-group">
    <label for="nama">Nama</label>
    {{ Form::text('nama', null, ['class' => 'form-control', 'id' => 'nama', 'placeholder' => 'Nama Dosen']) }}
</div>

<div class="form-group">
    <label for="nip">NIP</label>
    {{ Form::text('nip', null, ['class' => 'form-control', 'id' => 'nip', 'placeholder' => 'NIP Dosen']) }}
</div>

<div class="form-group">
    <label for="nip">NIDN</label>
    {{ Form::text('nidn', null, ['class' => 'form-control', 'id' => 'nidn', 'placeholder' => 'NIDN Dosen']) }}
</div>

<div class="form-group">
    <label for="nik">NIK</label>
    {{ Form::text('nik', null, ['class' => 'form-control', 'id' => 'nik', 'placeholder' => 'NIK Dosen']) }}
</div>

<div class="form-group">
    <label for="tempat_lahir">Tempat Lahir</label>
    {{ Form::text('tempat_lahir', null, ['class' => 'form-control', 'id' => 'tempat_lahir', 'placeholder' => 'Tempat Lahir Dosen']) }}
</div>

<div class="form-group">
    <label for="tanggal_lahir">Tanggal Lahir</label>
    {{ Form::input('date', 'tanggal_lahir', null, ['class' => 'form-control', 'id' => 'nip', 'placeholder' => 'NIP Dosen']) }}
</div>

<div class="form-group">
    <label for="email">email</label>
    {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email Dosen']) }}
</div>

<div class="form-group">
    <label for="nohp">No. HP</label>
    {{ Form::text('nohp', null, ['class' => 'form-control', 'id' => 'nohp', 'placeholder' => 'No HP Dosen']) }}
</div>

