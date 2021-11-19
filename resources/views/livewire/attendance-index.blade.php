
<div class="card">
    <div class="card-header">
        <div id="map"></div>
    </div>
    <div class="card-header d-flex justify-content-between align-items-center">
        {{-- <div>
            <div id="map"></div>
        </div> --}}
        <div>
            Riwayat Absensi
        </div>
    </div>
    <div class="card-body">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        {{-- {{Carbon\Carbon::now()->format('H : i') > '16 : 00' ? 'benar' : 'salah'}} --}}
        @if (session()->has('keluar'))
            <div class="alert alert-success">
                {{session('keluar')}}
            </div>
        @endif
        <table class="table rounded">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Lokasi Absen Masuk</th>
                    <th scope="col">Jam Absen Masuk</th>
                    <th scope="col">Lokasi Absen Keluar</th>
                    <th scope="col">Jam Absen Keluar</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($attendances as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        {{$item->user->name}}
                    </td>
                    <td>
                        {{
                            Carbon\Carbon::parse($item->date)->format('d M Y')
                        }}
                    </td>
                    <td>
                        {{$item->location_clock_in}}
                    </td>
                    <td>
                        {{
                            Carbon\Carbon::parse($item->clock_in)->format('H : i')
                        }}
                    </td>
                    @if ($item->clock_out == NULL)
                        <td>
                            <form wire:submit.prevent="absenKeluar({{$item->id}})">
                                <button type="submit" class="btn btn-info">Absen Keluar</button>
                            </form>
                        </td>
                    @else
                    <td>
                        {{$item->location_clock_out}}
                    </td>
                    <td>
                        {{
                            Carbon\Carbon::parse($item->clock_out)->format('H : i')
                        }}
                    </td>
                    @endif
                </tr>
                @empty
                <tr>
                    <th scope="row">Belum ada data</th>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
