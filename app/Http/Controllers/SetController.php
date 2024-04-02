<?php

namespace App\Http\Controllers;

use App\Http\Requests\Set\Import;
use App\Models\Set;
use Inertia\Inertia;

class SetController extends Controller
{
    public function import(Import $request)
    {
        $data = $request->string("export");
        
        $data = trim($data);
        $set = Set::create([
            "title" => "Imported Set",
            "description" => "Lorem ipsum dolor sit amet, consetetur sadipscing",
            "user_id" => auth()->id(),
        ]);

        $cards = [];
        foreach (explode("\n", $data) as $line) {
            $line = trim($line);
            if (empty($line)) {
                continue;
            }
            $line = explode("\t", $line);
            if (count($line) < 2) {
                continue;
            }
            $key = $line[0];
            $value = $line[1];

            $cards[] = [
                "key" => $key,
                "value" => $value,
                "set_id" => $set->id,
            ];
        }

        $set->cards()->createMany($cards);
        
        return redirect("/train/{$set->id}");
    }

    public function train(string $set)
    {
        
        $set = Set::findOrFail($set);
        $initial_flash_cards = $set->cards()->get();

        return Inertia::render("Set/Train", [
            "set" => $set,
            "initialFlashCards" => $initial_flash_cards,
        ]);
    }
}
