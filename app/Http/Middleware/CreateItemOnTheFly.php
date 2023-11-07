<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class CreateItemOnTheFly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if ($request->item_id == 0) {
        //     $request->validate([
        //         'item_name' => [
        //             'required',
        //             'string',
        //             'min:2',
        //             'max:255',
        //             Rule::unique('items', 'name')->where('user_id', $this->user()->id)->ignore($this->item_id)
        //         ],
        //         // unique for the current user
        //         'item_price' => 'required|numeric|min:50',
        //         // category exists and belongs to the current user
        //         'category_id' => [
        //             'required',
        //             'numeric',
        //             'min:1',
        //             'max:255',
        //             Rule::exists('categories', 'id')->where('user_id', $this->user()->id)
        //         ],
        //     ]);
        // }

        return $next($request);
    }
}
