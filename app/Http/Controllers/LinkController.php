<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    public function list()
    {
        $links = Link::all();
        return view("list", ['links' => $links]);
    }

    public function create(Request $request)
    {
        Link::create(
            [
                'link' => $request->link,
                'short_link' => Str::random(8),
                'transfer_limit' => $request->transfer_limit,
                'expired_at' => $request->link_lifetime,
            ]
        );
        return redirect(route('link.list'));
    }

    public function show($short_link)
    {
        $link = Link::where('short_link', $short_link)->firstOrFail();
        if (($link->transfer_limit > 0 && $link->expired_at >= Carbon::now()) || ($link->transfer_limit == 0)) {
            if ($link->transfer_limit == 1) {
                $link->transfer_limit = -1;
                $link->save();
            }
            if ($link->transfer_limit > 1) {
                $link->transfer_limit -= 1;
                $link->save();
            }
            return redirect($link->link);
        }
        return view("404");
    }
}
