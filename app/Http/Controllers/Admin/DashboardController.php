<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __invoke(Request $request): View
    {
        $user = $request->user();
        $isAdmin = $user->isAdmin();

        // Admin sees all sales; a salesman only sees the sales he made himself.
        $sales = fn () => DB::table('sales')
            ->where('status', '!=', 'voided')
            ->when(! $isAdmin, fn ($q) => $q->where('user_id', $user->id));

        $lowStock = fn () => DB::table('inventory_levels as i')
            ->join('products as p', 'p.id', '=', 'i.product_id')
            ->where('p.track_inventory', true)
            ->whereNull('p.deleted_at')
            ->whereColumn('i.quantity_on_hand', '<=', 'p.reorder_level');

        $money = fn ($value) => '$'.number_format((float) $value, 2);

        $todayTotal = $sales()->where('sold_at', '>=', today())->sum('grand_total');
        $todayCount = $sales()->where('sold_at', '>=', today())->count();

        $stats = [
            [
                'label' => $isAdmin ? "Today's sales" : 'My sales today',
                'value' => $money($todayTotal),
                'hint' => $todayCount.' sale(s)',
            ],
            [
                'label' => 'Active products',
                'value' => DB::table('products')->where('is_active', true)->whereNull('deleted_at')->count(),
                'hint' => 'visible in the store',
            ],
            [
                'label' => 'Low stock items',
                'value' => $lowStock()->count(),
                'hint' => 'at or below reorder level',
            ],
            [
                'label' => 'Pending online orders',
                'value' => DB::table('orders')->where('status', 'pending')->count(),
                'hint' => 'waiting for confirmation',
            ],
        ];

        if ($isAdmin) {
            $stats[] = [
                'label' => 'Sales this month',
                'value' => $money($sales()->where('sold_at', '>=', now()->startOfMonth())->sum('grand_total')),
                'hint' => 'all channels',
            ];
            $stats[] = [
                'label' => 'Customers',
                'value' => DB::table('customers')->whereNull('deleted_at')->count(),
                'hint' => 'registered + walk-in',
            ];
            $stats[] = [
                'label' => 'Staff accounts',
                'value' => DB::table('users')->whereIn('role', ['admin', 'salesman'])->where('is_active', true)->count(),
                'hint' => 'admins + salesmen',
            ];
        }

        return view('admin.dashboard', [
            'stats' => $stats,
            'lowStockItems' => $lowStock()
                ->orderBy('i.quantity_on_hand')
                ->limit(8)
                ->get(['p.title', 'p.sku', 'i.quantity_on_hand', 'p.reorder_level']),
            'recentSales' => $sales()
                ->orderByDesc('sold_at')
                ->limit(5)
                ->get(['sale_number', 'channel', 'grand_total', 'sold_at']),
            'isAdmin' => $isAdmin,
        ]);
    }
}
