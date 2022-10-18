<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
   public function viewsubcategory(){
        $this->data["viewsubcategory"]=SubCategory::all();
        return view("backend.subcategory.viewsubcategory",$this->data);
   }
   public function addsubcategory(){
       $this->data["categorydata"]=Category::all();
       $this->data["editdata"]=new SubCategory();
       return view("backend.addsubcategory.addsubcategory",$this->data);
   }
   public function addsubcategorystore(Request $request){
        $request->validate(
            [
                "name"=>"required|max:12",
                "subcategoryname"=>"required"
            ]
        );
        $addsubcategory=new SubCategory();
        $addsubcategory->category_id=$request->subcategoryname;
        $addsubcategory->name=$request->name;
        $addsubcategory->save();
        return redirect()->to("viewsubcategorise")->with("subcategory","subcategory create successfully");
    }
    public function editsubcategory(Request $request,$id){
        $this->data["categorydata"]=Category::all();
        $this->data["editdata"]=SubCategory::findOrFail($id);
       return view("backend.addsubcategory.addsubcategory",$this->data);
    }
    public function editsubcategorystore(Reauest $request,$id){
        return "done";
    }
    public function editcategory($id){
        $this->data["categorydata"]=Category::all();
        $this->data["categorydatanece"]=Category::findOrFail($id);
        $this->data["editdata"]=SubCategory::findOrfail($id);
        return view("backend.editform.editform",$this->data);
    }
    public function editstoredata(Request $request,$id){
       $request->validate(
        [
            "name"=>"required",
            "subcategoryname"=>"required"

        ]);
        $updated=SubCategory::findOrFail($id);
        $updated->category_id=$request->subcategoryname;
        $updated->name=$request->name;
        $updated->save();
       return redirect()->to('/viewsubcategorise')->with("updatesubcategory","SubCategory Updated Successfully!");

    }
    public function deletesubcategory(Request $request,$id){
        $deletesubcategory=SubCategory::findOrFail($id)->delete();
        return redirect()->to("/viewsubcategorise")->with("subcategorydeleted","subcategory deleted successfully!");
    }
}
