<?php

namespace App\Livewire\Client;

use App\Helpers\ConektaPayment;
use App\Helpers\Utility;
use App\Models\Address;
use App\Models\AddressPurchase;
use App\Models\Inventory;
use App\Models\ProductPrice;
use App\Models\ProductPricePurchase;
use App\Models\Purchase;
use App\Models\PurchaseOrderConekta;
use App\Models\SchoolListProduct;
use App\Models\User;
use App\Rules\ZipRule;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SchoolListProducts extends Component
{
    public $school_list, $list, $result = [], $section, $invoice, $address, $addresses, $address_id, $new_address, $main_street,
    $between_streets, $zip_code, $reference, $neighborhood, $products, $max, $btn_action = 1;

    public function render()
    {
        $this->calculateTotal();
        return view('livewire.client.school-list-products');
    }

    public function mount()
    {
        $this->list = $this->list();
        // info($this->list);
        $this->invoice = 1;
        $this->address = 1;
        $this->new_address = 0;
        $this->listAddress();
        $this->address_id = count($this->addresses) == 0 ? null : $this->addresses->first()->id;
        $this->section = 1;
        // $this->maxElements =
    }

    public function list()
    {
        $list_product = SchoolListProduct::join('products', 'products.id', '=', 'school_list_products.product_id')
            ->where('school_list_products.school_list_id', $this->school_list->id)
            ->select('products.id', 'products.name', 'products.iva', 'school_list_products.quantity')
            ->get()
            ->toArray();
        $this->max = collect($list_product)->max('quantity');

        foreach ($list_product as $index => $row) {
            $price = ProductPrice::where([['status_id', '=', 8], ['product_id', '=', $row['id']]])->first();
            $list_product[$index]['price'] = $price->price;
            
            $quantity = Utility::quantity($row['id']);
            $list_product[$index]['price_id'] = $price->id;
            $list_product[$index]['available'] = $quantity > 0 ? 1 : 0;
            $list_product[$index]['available_quantity'] = $quantity;
            $list_product[$index]['quantity'] = $quantity < $list_product[$index]['quantity'] ? $quantity : $list_product[$index]['quantity'];
        }
        return $list_product;
    }

    public function changeSection($id)
    {
        info($this->addresses);
        info($this->address_id);
        if ($id == 2) {
            // info(collect($this->list));
            if (collect($this->list)->sum('quantity') < 1) {
                $this->addError('products', 'No tiene ningún producto seleccionado.');
                return;
            }
        }
        if (($id == 4 && $this->address == 1 && $this->address_id == 0) || $this->new_address == 1) {
            $this->addError('address', 'Debe seleccionar un domicilio o registrar uno nuevo.');
            return;
        }
        $this->section = $id;
    }

    public function calculateTotal()
    {
        $list = collect($this->list);
        $subtotal = 0;
        foreach ($list as $row) {
            $subtotal += $row['price'] * $row['quantity'];
        }
        $iva = 0;
        foreach ($list->where('iva', 1) as $row) {
            $iva += round($row['price'] * 0.16, 2) * $row['quantity'];
        }
        // $iva = round($iva * 0.16, 2);
        $total = 0;
        $total = $iva + $subtotal;
        $home_delivery = $this->address == 1 ? 50 : 0;
        $total = $this->address == 1 ? $total + $home_delivery : $total;
        $this->result = ['subtotal' => $subtotal, 'iva' => $iva, 'total' => $total, 'home_delivery' => $home_delivery];
    }

    public function increaseProduct($index)
    {
        $this->btn_action = 0;
        if ($this->list[$index]['quantity'] < $this->max + 2) {
            $this->list[$index]['quantity'] = $this->list[$index]['quantity'] + 1;
        }
        $this->btn_action = 1;
    }

    public function decreaseProduct($index)
    {
        $this->btn_action = 0;
        if ($this->list[$index]['quantity'] > 0) {
            $this->list[$index]['quantity'] = $this->list[$index]['quantity'] - 1;
        }
        $this->btn_action = 1;
    }

    public function listAddress()
    {
        $this->addresses = Address::where([['user_id', '=', auth()->user()->id], ['status_id', '=', '21']])
            ->select('*')
            ->get();
    }

    public function saveAddress()
    {
        $this->validate([
            'main_street' => 'required|string|max:200',
            'between_streets' => 'required|string|max:200',
            'zip_code' => ['required', 'integer', new ZipRule()],
            'reference' => 'required|string|max:200',
            'neighborhood' => 'required|string|max:200',
        ]);

        DB::beginTransaction();
        try {
            //
            $address = Address::create([
                'main_street' => $this->main_street,
                'between_streets' => $this->between_streets,
                'zip_code' => $this->zip_code,
                'reference' => $this->reference,
                'neighborhood' => $this->neighborhood,
                'user_id' => auth()->user()->id,
                'status_id' => 21,
            ]);
            DB::commit();
            $this->listAddress();
            $this->address_id = $address->id;
            $this->new_address = 0;
            // session()->flash('status', 'Los datos se guardaron correctamente.');
            // return redirect()->route('schools.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            info($th->getMessage());
        }
    }

    public function checkList()
    {
        $status = false;
        return $status;
    }

    public function savePurchase()
    {

        $conekta = ConektaPayment::orderPayment($this->address, $this->list);
        if ($conekta['code'] != 200) {
            $this->addError('order', 'No se genero la orden de pago.');
            return;
        }
        // info($conekta['response']);

        DB::beginTransaction();
        try {
            $purchase = Purchase::create([
                'home_delivery' => $this->address,
                'invoice' => $this->invoice,
                'user_id' => auth()->user()->id,
                'status_id' => 14, //cambiar a 12
                'school_list_id' => $this->school_list->id,
            ]);

            if ($this->address == 1) {
                AddressPurchase::create([
                    'address_id' => $this->address_id,
                    'purchase_id' => $purchase->id,
                ]);
            }

            foreach ($this->list as $item) {
                if ($item['quantity'] > 0) {
                    ProductPricePurchase::create([
                        'quantity' => $item['quantity'],
                        'purchase_id' => $purchase->id,
                        'product_price_id' => $item['price_id'],
                    ]);
                }
            }

            $user = User::find(auth()->user()->id);
            $user->update([
                'customer_id' => $conekta['response']['customer_info']['customer_id'],
            ]);

            PurchaseOrderConekta::create([
                'order_id' => $conekta['response']['id'],
                'checkout_id' => $conekta['response']['checkout']['id'],
                'checkout_name' => $conekta['response']['checkout']['name'],
                'purchase_id' => $purchase->id,
            ]);
            DB::commit();
            session()->flash('status', 'Los datos se guardaron correctamente.');
            return redirect()->route('school.list.checkout', $purchase->id);
        } catch (\Throwable $th) {
            DB::rollBack();
            info($th->getMessage());
        }
    }
}