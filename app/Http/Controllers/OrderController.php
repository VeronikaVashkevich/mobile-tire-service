<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    const TEL_REGEX = '/^[0-9]{7}$/';
    const STATUSES = [
        '1' => 'Создан',
        '2' => 'Выполняется',
        '3' => 'Завершен',
        '0' => 'Отменен',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('orders.index', [
            'orders' => Order::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('orders.addOrder', [
            'services' => Service::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'number' => 'required|numeric',
            'client_phone' => 'required|string|regex:' . self::TEL_REGEX,
            'city' => 'required|string|max:70',
            'street' => 'required|string|max:150',
            'building' => 'required|numeric|min:1',
            'car' => 'required|string|max:70',
            'services' => 'required'
        ]);

        $order = new Order;

        $order->number = $validated['number'];
        $order->client_phone = $validated['client_phone'];
        $order->city = $validated['city'];
        $order->street = $validated['street'];
        $order->building = $validated['building'];
        $order->car = $validated['car'];

        $services = $validated['services'];
        $totalSum = 0;
        foreach ($services as $service) {
            $totalSum += Service::query()->where('id', '=', $service)->first()->price;
        }

        $order->totalSum = round($totalSum, 2);
        $order->status = self::STATUSES['1'];

        $order->save();

        foreach ($services as $service) {
            DB::table('order_service')->insert([
                'order_id' => $order->id,
                'service_id' => $service,
            ]);
        }

        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    public function updateStatus(Request $request)
    {
        $order = Order::query()->where('id', '=', $request->order)->first();

        $order->status = self::STATUSES[$request->status];

        $order->save();

        return redirect()->route('orders.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
