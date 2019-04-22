<div class="form-group">
    <label for="nama">Nama</label>
    {{ Form::text('nama', null, ['class' => 'form-control', 'id' => 'nama', 'placeholder' => 'Nama Mahasiswa']) }}
</div>

<div class="form-group">
    <label for="nim">NIM</label>
    {{ Form::text('nim', null, ['class' => 'form-control', 'id' => 'nim', 'placeholder' => 'NIM Mahasiswa']) }}
</div>

<div class="form-group">
    <label for="angkatan">Angkatan</label>
    {{ Form::text('angkatan', null, ['class' => 'form-control', 'id' => 'angkatan', 'placeholder' => 'Angkatan Mahasiswa']) }}
</div>

<div class="form-group">
    <label for="tempat_lahir">Tempat Lahir</label>
    {{ Form::text('tempat_lahir', null, ['class' => 'form-control', 'id' => 'tempat_lahir', 'placeholder' => 'Tempat Lahir Mahasiswa']) }}
</div>

<div class="form-group">
    <label for="tanggal_lahir">Tanggal Lahir</label>
    {{ Form::input('date', 'tanggal_lahir', null, ['class' => 'form-control', 'id' => 'tanggal_lahir', 'placeholder' => 'Tanggal Lahir Mahasiswa']) }}
</div>

<div class="form-group">
    <label for="email">email</label>
    {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email Mahasiswa']) }}
</div>

<div class="form-group">
    <label for="nohp">No. HP</label>
    {{ Form::text('nohp', null, ['class' => 'form-control', 'id' => 'nohp', 'placeholder' => 'No. HP Mahasiswa']) }}
</div>

