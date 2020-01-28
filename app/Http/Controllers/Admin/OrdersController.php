<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Status;
use App\Models\Textile;
use App\Models\Textileable;
use Darryldecode\Cart\CartCollection;
use Darryldecode\Cart\CartCondition;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;


class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(30);
        $statuses = Status::all();
        return view('admin.orders.index', [
            'orders' => $orders,
            'statuses' => $statuses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */


    public function edit($id)
    {
        $userId = 1;
        $order = Order::where('id', $id)->first();
        $statuses = Status::all();
        $cartCollection = $order->cart_data;
        $items = json_decode($cartCollection, true);


        return view('admin.orders.edit', [
            'order' => $order,
            'statuses' => $statuses,
            'items' => $items,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $input = $request->all();
        if ($input['status'] == 2 and $order->status != 2) {
            $temps = json_decode($order->cart_data);
            foreach ($temps as $temp) {
                $t = Textile::where('id', $temp->attributes->checked_textiles)->update(['textiles_qty' => DB::raw('textiles_qty-1')]);
            }
        }
        $order->fill($input)->save();

        return back()->with('success', 'Your Textile has been added successfully. Please wait for the admin to approve.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {


    }
}
