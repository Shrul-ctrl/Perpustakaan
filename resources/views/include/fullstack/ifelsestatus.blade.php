<td>
@if($data->status_pengajuan === 'menunggu pengajuan')
<p class="dash-lable mb-0 bg-primary bg-opacity-10 text-primary rounded-2 d-flex">Menunggu Persetujuan</p>
@elseif($data->status_pengajuan === 'pengajuan diterima')
<p class="dash-lable mb-0 bg-info bg-opacity-10 text-info rounded-2">Pengajuan Diterima</p>
@elseif($data->status_pengajuan === 'pengajuan ditolak')
<p class="dash-lable mb-0 bg-danger bg-opacity-10 text-danger rounded-2">Pengajuan Ditolak</p>
@elseif($data->status_pengajuan === 'pengembalian diterima')
<p class="dash-lable mb-0 bg-warning bg-opacity-10 text-warning rounded-2">Pengembalian Diterima</p>
@elseif($data->status_pengajuan === 'pengembalian ditolak')
<p class="dash-lable mb-0 bg-danger bg-opacity-10 text-danger rounded-2">Pengembalian Ditolak</p>
@elseif($data->status_pengajuan === 'dikembalikan')
<p class="dash-lable mb-0 bg-warning bg-opacity-10 text-warning rounded-2">Dikembalikan</p>
@elseif($data->status_pengajuan === 'sukses')
<p class="dash-lable mb-0 bg-success bg-opacity-10 text-success rounded-2">Sukses</p>
@else
<p class="dash-lable mb-0 bg-danger bg-opacity-10 text-danger rounded-2">Ditolak</p>
@endif
</td>