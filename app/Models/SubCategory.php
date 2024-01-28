<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;


    private static $image,$imageName,$directory,$imageUrl,$sub_category,$extension;

    public static function newSubCategory($request)
    {
        self::$image                    =$request->file('image');
        self::$extension                =self::$image->getClientOriginalExtension();
        self::$imageName                =time().'.'.self::$extension;
        self::$directory                ='upload/category-images/';
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl                 =self::$directory.self::$imageName;

        self::$sub_category              =new SubCategory();
        self::$sub_category->category_id =$request->category_id;
        self::$sub_category->name        =$request->name;
        self::$sub_category->description =$request->description;
        self::$sub_category->image       =self::$imageUrl;
        self::$sub_category->status      =$request->status;
        self::$sub_category->save();

    }

    public function category()
    {
        return $this->hasMany(Category::class);
    }

    public static function updateSubCategory($request, $id)
    {
        self::$sub_category                 =SubCategory::find($id);

        if($request->file('image'))
        {
            self::$image                    =$request->file('image');
            self::$extension                =self::$image->getClientOriginalExtension();
            self::$imageName                =time().'.'.self::$extension;
            self::$directory                ='upload/sub-category-images/';
            self::$image->move(self::$directory,self::$imageName);
            self::$imageUrl                 =self::$directory.self::$imageName;
        }
        else
        {
            self::$imageUrl                  =self::$sub_category->image;
        }

            self::$sub_category->category_id =$request->category_id;
            self::$sub_category->name        =$request->name;
            self::$sub_category->description =$request->description;
            self::$sub_category->image       =self::$imageUrl;
            self::$sub_category->status      =$request->status;
            self::$sub_category->save();

    }

    public static function deleteSubCategory($id)
    {
        self::$sub_category               =SubCategory::find($id);
        self::$sub_category->delete();
    }

}
