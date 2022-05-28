<?php


namespace App\Services\Product;


use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function store($data){
        try {
            DB::beginTransaction();
            $data['is_avialable'] = isset($data['is_avialable']) ? '1' : '0';

            if(isset($data['colors'])){
                $colors = $data['colors'];
                unset($data['colors']);
            }

            if(isset($data['tag_ids'])){
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            $data['image'] = isset($data['image']) ? Storage::disk('public')->put('/images', $data['image']) : null;

            $products = Product::firstOrCreate([
                'title' => $data['title'],
            ], $data);

            if(isset($tagIds)){
                $products->tags()->attach($tagIds);
            }
            if(isset($colors)){
                $products->colors()->attach($colors);
            }
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            abort(500);
        }
    }
    public function update($data, $product){
        try {
            DB::beginTransaction();
            $data['is_avialable'] = isset($data['is_avialable']) ? '1' : '0';

            if(isset($data['colors'])){
                $colors = $data['colors'];
                unset($data['colors']);
            }

            if(isset($data['tag_ids'])){
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }
            if(isset($data['image'])){
                $data['image'] = Storage::disk('public')->put('/images', $data['image']);

            }

            $product->update($data);

            if(isset($tagIds)){
                $product->tags()->sync($tagIds);
            }
            if(isset($colors)){
                $product->colors()->sync($colors);
            }

            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            abort(500);
        }
        return $product;
    }
}
