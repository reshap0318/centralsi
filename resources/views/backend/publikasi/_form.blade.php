<div class="form-group">
    <label for="judul">Judul</label>
    {{ Form::textarea('judul', null, ['class' => 'form-control', 'id' => 'judul', 'placeholder' => 'Judul Publikasi']) }}
</div>

<div class="form-group">
    <label for="tahun">Tahun</label>
    {{ Form::text('tahun', null, ['class' => 'form-control', 'id' => 'tahun', 'placeholder' => 'Tahun Publikasi']) }}
</div>

<div class="form-group">
    <label for="nama_publikasi">Nama Publikasi</label>
    {{ Form::text('nama_publikasi', null, ['class' => 'form-control', 'id' => 'nama_publikasi', 'placeholder' => 'Nama Publikasi']) }}
</div>

<div class="form-group">
    <label for="jenis_publikasi">Jenis Publikasi</label>
    {{ Form::text('jenis_publikasi', null, ['class' => 'form-control', 'id' => 'jenis_publikasi', 'placeholder' => 'Jenis Publikasi']) }}
</div>

<div class="form-group">
    <label for="total_dana">Total Dana</label>
    {{ Form::text('total_dana', null, ['class' => 'form-control', 'id' => 'total_dana', 'placeholder' => 'Total Dana']) }}
</div>

<div class="form-group">
    <label for="url">URL</label>
    {{ Form::text('url', null, ['class' => 'form-control', 'id' => 'url', 'placeholder' => 'URL']) }}
</div>

<div class="form-group">
    <label for="file_artikel">File Artikel (PDF)</label>
    {{ Form::file('file_artikel', null, ['class' => 'form-control', 'id' => 'file_artikel'])}}
</div>

<div class="form-group">
    <label for="publisher">Publish (PDF)</label>
    {{ Form::file('publisher', null, ['class' => 'form-control', 'id' => 'publisher', 'placeholder' => 'Publish Publikasi']) }}
</div>

