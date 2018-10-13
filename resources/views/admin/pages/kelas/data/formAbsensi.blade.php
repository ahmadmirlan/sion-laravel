@for($i=0; $i<$kehadiran->count(); $i++)
    <tr class="bg-secondary">
        <td>{{\App\Mahasiswa::where('id',$kehadiran[$i]->id_mahasiswa)->pluck('nim')->first()}}</td>
        <td>{{\App\Mahasiswa::where('id',$kehadiran[$i]->id_mahasiswa)->pluck('nama')->first()}}</td>
        <input type="hidden" value={{$kehadiran[$i]->id_mahasiswa}} id="{{"id_mahasiswa".$i}}" name="{{"id_mahasiswa".$i}}">
        <td>{!! Form::select('P'.$i, ['' => '-', 'H' => 'H', 'S' => 'S','I' => 'I','A' => 'A'], $kehadiran[$i]->pertemuan,
            ['class' => 'form-control','data-provide' => 'selectpicker','data-width' => '20%']); !!}</td>
    </tr>
@endfor