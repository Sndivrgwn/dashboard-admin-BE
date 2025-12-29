<?php

namespace App\Services\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImages;
use App\Services\CrudService;
use Exception;
use Illuminate\Support\Facades\Storage;

class ProductService extends CrudService
{
    public function __construct(Product $model)
    {
        return parent::__construct($model);
    }

    public function getAll()
    {
        return parent::findAllWith(['brand' => function ($query) {
            $query->select('id', 'name');
        }, 'category' => function ($query) {
            $query->select('id', 'name');
        }, 'product_images' => function($query) {
            $query->select("path", "product_id");
        }]);
    }

    public function getById($id)
    {
        return parent::findBy("id", $id);
    }

    public function create(array $data)
    {
        $productData = collect($data)->except("images")->toArray();

        $product = parent::create($productData);

        if(isset($data["images"])) {
            foreach($data["images"] as $image) {
                $path = $image->store("product", "public");

                $product->product_images()->create([
                    "path" => $path
                ]);
            }
        }

        return $product;
    }

    public function up(array $data, $id)
    {
        $product = parent::findBy("id", $id)->first();

        if (isset($data["image"]) && $data["image"] instanceof \Illuminate\Http\UploadedFile) {
            if (!empty($product->image)) {
                Storage::disk("public")->delete($product->image);
            }
            $data["image"] = $data["image"]->store("product", "public");
        } else {
            unset($data["image"]);
        }

        return $product->update($data);
    }


    public function del($id)
    {
        return parent::delete($id);
    }
}
