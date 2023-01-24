<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Sales;
use App\Models\StockOpname;
use App\Models\Store;
use App\Models\Visibility;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::latest()->take(10)->get();

        $sales = Sales::latest()->take(10)->get();
        $stocks = StockOpname::latest()->take(10)->get();
        $visibilities = Visibility::latest()->take(10)->get();;

        $allData = $activities->concat($sales)->concat($stocks)->concat($visibilities);
        $allData = $allData->sortByDesc('created_at');

        return view('dashboard.index')->with([
            'allData' => $allData,
        ]);
    }

    public function menu()
    {
        return view('dashboard.menu');
    }

    public function activityCreate()
    {
        $stores = Store::orderBy('store_name')->get();

        return view('activity.create')->with([
            'stores' => $stores,
        ]);
    }

    public function activityStore(Request $request)
    {
        try {
            $data = $this->storeImage($request, 'activity', 'activity');
            Activity::create($data);
            return redirect('activity')->with(['success' => 'Berhasil upload Activity !']);
        } catch (Exception $e) {
            return redirect('activity')->with(['error' => 'Somethings wrong']);
        }
    }

    public function stockOpnameCreate()
    {
        $stores = Store::orderBy('store_name')->get();

        return view('stockopname.create')->with([
            'stores' => $stores,
        ]);
    }

    public function stockOpnameStore(Request $request)
    {
        try {
            $data = $this->storeImage($request, 'stockOpname', 'stockopname');
            StockOpname::create($data);
            return redirect('stockopname')->with(['success' => 'Berhasil upload Stock Opname !']);
        } catch (Exception $e) {
            return redirect('stockopname')->with(['error' => 'Somethings wrong']);
        }
    }

    public function visibilityCreate()
    {
        $stores = Store::orderBy('store_name')->get();

        return view('visibility.create')->with([
            'stores' => $stores,
        ]);
    }

    public function visibilityStore(Request $request)
    {
        try {
            $data = $this->storeImage($request, 'visibility', 'visibility');
            Visibility::create($data);
            return redirect('visibility')->with(['success' => 'Berhasil upload Visibility !']);
        } catch (Exception $e) {
            return redirect('visibility')->with(['error' => 'Somethings wrong']);
        }
    }

    public function salesCreate()
    {
        $stores = Store::orderBy('store_name')->get();

        return view('sales.create')->with([
            'stores' => $stores,
        ]);
    }

    public function salesStore(Request $request)
    {
        try {
            // dd($request->all());
            $data = $this->storeImageSales($request, 'sales', 'sales');
            Sales::create($data);
            return redirect('sales')->with(['success' => 'Berhasil upload Sales !']);
        } catch (Exception $e) {
            return redirect('sales')->with(['error' => $e]);
        }
    }

    public function storeImage(Request $request, $file_field, $path, $disk = 'owncloud')
    {
        try {
            $this->validate($request, [
                'store_id' => 'required',
                $file_field => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
                'description' => 'required',
            ]);
            

            $file = $request->file($file_field);
            $date = Carbon::now()->format('Y-m-d');
            $store = Store::find($request->store_id);
            $store_name = $store->store_name;
            $extension = $file->getClientOriginalExtension();
            $path = $path . '/' . $date;
            if (! Storage::disk($disk)->exists($path)) {
                Storage::disk($disk)->makeDirectory($path);
            }

            switch ($file_field) {
                case 'stockOpname':
                    $filename = "Stock Opname - ".$store_name." ".$date."_". time() .".".$extension;
                    break;
                case 'activity':
                    $filename = "Activity - ".$store_name." ".$date."_". time() .".".$extension;
                    break;
                case 'visibility':
                    $filename = "Visibility - ".$store_name." ".$date."_". time() .".".$extension;
                    break;
                default:
                    $filename = "Image - ".$store_name." ".$date."_". time() .".".$extension;
                    break;
            }

            
            $file->storeAs($path, $filename, $disk);

            return [
                'store_id' => $request->store_id,
                'filename' => $filename,
                'description' => $request->description,
            ];
        } catch (Exception $e) {
        }
    }

    public function storeImageSales(Request $request, $file_field, $path, $disk = 'owncloud')
    {
        try {
            $this->validate($request, [
                'store_id' => 'required',
                $file_field => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
                'cust_name' => 'required',
                'unit_sold' => 'required',
                'type' => 'required',
                'imei' => 'required',
                'alamat' => 'required',
            ]);

            $file = $request->file($file_field);
            $date = Carbon::now()->format('Y-m-d');
            $store = Store::find($request->store_id);
            $store_name = $store->store_name;
            $extension = $file->getClientOriginalExtension();
            $path = $path . '/' . $date;
            if (! Storage::disk($disk)->exists($path)) {
                Storage::disk($disk)->makeDirectory($path);
            }

            $filename = "Sales - ".$store_name." ".$date."_". time() .".".$extension;
            
            $file->storeAs($path, $filename, $disk);

            return [
                'store_id' => $request->store_id,
                'filename' => $filename,
                'cust_name' => $request->cust_name,
                'unit_sold' => $request->unit_sold,
                'type' => $request->type,
                'imei' => $request->imei,
                'alamat' => $request->alamat,
            ];
        } catch (Exception $e) {
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
