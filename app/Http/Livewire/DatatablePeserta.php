<?php

namespace App\Http\Livewire;

use App\Models\Peserta;
use Livewire\Component;
use Livewire\WithPagination;


class DatatablePeserta extends Component
{
	use WithPagination;

	public $searchByName;
	public $page = 1;
    public $pesertaId = null;

    protected $updatesQueryString = [
        ['page' => ['except' => 1]],
        ['searchByName' => ['except' => '']],
    ];

	protected $paginationTheme = 'bootstrap';

    public function render()
    {
    	$data = Peserta::latest()->paginate(10);
    	if (!is_null($this->searchByName)) {
            $data = Peserta::where('nama', 'like', '%' . $this->searchByName . '%')
                            ->latest()
                            ->paginate(10);
        }
        return view('livewire.datatable-peserta',[ 'data' => $data ]);
    }

    public function confirmationDelete($pesertaId)
    {
        $this->pesertaId = $pesertaId;
        $this->dispatchBrowserEvent('confirmation-delete');
    }

    public function deletePeserta()
    {
        $peserta = Peserta::findOrFail($this->pesertaId);
        $peserta->delete();
        $this->dispatchBrowserEvent('confirmation-delete');
        // dd($peserta);
    }
}
