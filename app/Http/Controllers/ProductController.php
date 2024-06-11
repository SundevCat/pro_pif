<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
// use DataTables;
use Redirect;
// use Crypt;

use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Crypt;


use App\Models\Pt_inv_pif_log;
use App\Models\Pt_inv_pif_fg;
use App\Models\Pt_inv_pif_master;
use App\Models\Pt_inv_pif_retail_inner;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportProductDetail;

class ProductController extends Controller
{
    public function list_data(){
        $list_data = [
            'Product' => [
                            'SKU_CODE' => 'SKU_CODE',
                            'SKU_7DIGIT' => 'SKU_7DIGIT',
                            'LAST_REVISION' => 'LAST_REVISION',
                            'ALL_REVISION' => 'ALL_REVISION',
                            'SKU_NAME' => 'SKU_NAME',
                            'PRODUCT_YEAR' => 'PRODUCT_YEAR',
                            'CATEGORY' => 'CATEGORY',
                            'CATALOG_STATUS' => 'CATALOG_STATUS',
                            'AGE' => 'AGE',
                            'EAN_BARCODE' => 'EAN_BARCODE',
                            'FLAG_DIA' => 'FLAG_DIA',
                            'PRODUCT_WIDTH_INCH' => 'PRODUCT_WIDTH_INCH',
                            'PRODUCT_LENGTH_INCH' => 'PRODUCT_LENGTH_INCH',
                            'PRODUCT_HEIGHT_INCH' => 'PRODUCT_HEIGHT_INCH',
                            'PRODUCT_WEIGHT_LBS' => 'PRODUCT_WEIGHT_LBS',
                            'SIZE_BIGGEST' => 'SIZE_BIGGEST',
                            'PRODUCT_WIDTH_CM' => 'PRODUCT_WIDTH_CM',
                            'PRODUCT_LENGTH_CM' => 'PRODUCT_LENGTH_CM',
                            'PRODUCT_HEIGHT_CM' => 'PRODUCT_HEIGHT_CM',
                            'PRODUCT_WEIGHT_KG' => 'PRODUCT_WEIGHT_KG',
                            'SKU_DESCRIPTION' => 'SKU_DESCRIPTION',
                            'CARE_INSTRUCTION' => 'CARE_INSTRUCTION',
                            'ASSEMBLY_INSTRUCTION' => 'ASSEMBLY_INSTRUCTION',
                            'CAUTION_SHEET' => 'CAUTION_SHEET',
                            'HOW_TO_PLAY' => 'HOW_TO_PLAY',
                            'PIECES_COUNT' => 'PIECES_COUNT',
                            'COMPOSITIONS' => 'COMPOSITIONS',
                            'LIST_OF_ACCESSORIES' => 'LIST_OF_ACCESSORIES',
                            'DIMENSION_CM' => 'DIMENSION_CM',
                            'DIMENSION_INCH' => 'DIMENSION_INCH',
                            'COLORS' => 'COLORS',
                            'LONG_DESCRIPTION' => 'LONG_DESCRIPTION',
                            'PLASTIC_TYPE' => 'PLASTIC_TYPE',
                            'PLASTIC_LOCATION' => 'PLASTIC_LOCATION',
                            'NRF_COLOR_NUMBER' => 'NRF_COLOR_NUMBER',
                            'NRF_COLOR_NAME' => 'NRF_COLOR_NAME',
                            'MAX_CHILD_HEIGHT_CM' => 'MAX_CHILD_HEIGHT_CM',
                            'MAX_CHILD_WEIGHT_KG' => 'MAX_CHILD_WEIGHT_KG',
                            'PLANWOOD' => 'PLANWOOD',
                            'CARBON_FOOTPRINT_KG' => 'CARBON_FOOTPRINT_KG',
                            'CARBON_FOOTPRINT_LBS' => 'CARBON_FOOTPRINT_LBS'
                        ],
            'Award' => [
                        'AWARD_1' => 'AWARD_1',
                        'AWARD_2' => 'AWARD_2',
                        'AWARD_3' => 'AWARD_3',
                        'AWARD_4' => 'AWARD_4',
                        'AWARD_5' => 'AWARD_5',
                        'AWARD_6' => 'AWARD_6'
                        ],
            'Child_Development' => [
                                    'CHILD_DEV_1' => 'CHILD_DEV_1',
                                    'CHILD_DEV_2' => 'CHILD_DEV_2',
                                    'CHILD_DEV_3' => 'CHILD_DEV_3',
                                    'CHILD_DEV_4' => 'CHILD_DEV_4',
                                    'CHILD_DEV_5' => 'CHILD_DEV_5',
                                    'CHILD_DEV_6' => 'CHILD_DEV_6'
                                    ],
            'Warning_Statements' => [
                                    'PROP65' => 'PROP65',
                                    'CHOKING_HAZARD' => 'CHOKING_HAZARD',
                                    'WARNING_LABEL' => 'WARNING_LABEL',
                                    ],
            'Lifestyle_Image' => [
                                    'LIFESTYLE_IMG_1' => 'LIFESTYLE_IMG_1',
                                    'LIFESTYLE_IMG_2' => 'LIFESTYLE_IMG_2',
                                    'LIFESTYLE_IMG_3' => 'LIFESTYLE_IMG_3',
                                    'LIFESTYLE_IMG_4' => 'LIFESTYLE_IMG_4',
                                    'LIFESTYLE_IMG_5' => 'LIFESTYLE_IMG_5',
                                    'LIFESTYLE_IMG_6' => 'LIFESTYLE_IMG_6',
                                    'LIFESTYLE_IMG_7' => 'LIFESTYLE_IMG_7',
                                    'LIFESTYLE_IMG_8' => 'LIFESTYLE_IMG_8',
                                    'LIFESTYLE_IMG_9' => 'LIFESTYLE_IMG_9',
                                    'LIFESTYLE_IMG_10' => 'LIFESTYLE_IMG_10'
                                ],
            'Product_Image' => [
                                    'MAIN_IMAGE' => 'MAIN_IMAGE',
                                    'PRODUCT_IMG_1' => 'PRODUCT_IMG_1',
                                    'PRODUCT_IMG_2' => 'PRODUCT_IMG_2',
                                    'PRODUCT_IMG_3' => 'PRODUCT_IMG_3',
                                    'PRODUCT_IMG_4' => 'PRODUCT_IMG_4',
                                    'PRODUCT_IMG_5' => 'PRODUCT_IMG_5',
                                    'PRODUCT_IMG_6' => 'PRODUCT_IMG_6',
                                    'PRODUCT_IMG_7' => 'PRODUCT_IMG_7',
                                    'PRODUCT_IMG_8' => 'PRODUCT_IMG_8',
                                    'PRODUCT_IMG_9' => 'PRODUCT_IMG_9'
                                ],
            'Package_Shot_Image' => [
                                        'PACKAGE_FRONT' => 'PACKAGE_FRONT',
                                        'PACKAGE_BACK' => 'PACKAGE_BACK',
                                        'PACKAGE_TOP' => 'PACKAGE_TOP',
                                        'PACKAGE_BOTTOM' => 'PACKAGE_BOTTOM',
                                        'PACKAGE_LEFT' => 'PACKAGE_LEFT',
                                        'PACKAGE_RIGHT' => 'PACKAGE_RIGHT',
                                        'PACKAGE_SHOT_1' => 'PACKAGE_SHOT_1',
                                        'PACKAGE_SHOT_2' => 'PACKAGE_SHOT_2',
                                        'PACKAGE_SHOT_3' => 'PACKAGE_SHOT_3',
                                        'PACKAGE_SHOT_4' => 'PACKAGE_SHOT_4'
                                    ],
            'Bullet' => [
                            'BULLET_POINT_1' => 'BULLET_POINT_1',
                            'BULLET_POINT_2' => 'BULLET_POINT_2',
                            'BULLET_POINT_3' => 'BULLET_POINT_3',
                            'BULLET_POINT_4' => 'BULLET_POINT_4'
                        ],
            'Master' => [
                            'MASTER_CODE' => 'MASTER_CODE',
                            'MASTER_WIDTH_CM' => 'MASTER_WIDTH_CM',
                            'MASTER_DEEP_CM' => 'MASTER_DEEP_CM',
                            'MASTER_HEIGHT_CM' => 'MASTER_HEIGHT_CM',
                            'MASTER_WIDTH_INCH' => 'MASTER_WIDTH_INCH',
                            'MASTER_DEEP_INCH' => 'MASTER_DEEP_INCH',
                            'MASTER_HEIGHT_INCH' => 'MASTER_HEIGHT_INCH',
                            'MASTER_WEIGHT_KG' => 'MASTER_WEIGHT_KG',
                            'MASTER_WEIGHT_LBS' => 'MASTER_WEIGHT_LBS',
                            'MASTER_BOX_TYPE' => 'MASTER_BOX_TYPE',
                            'PER_SET' => 'PER_SET',
                            'PER_PIECE' => 'PER_PIECE',
                            'PER_NW_KG' => 'PER_NW_KG',
                            'PER_GW_KG' => 'PER_GW_KG',
                            'PER_NW_LBS' => 'PER_NW_LBS',
                            'PER_GW_LBS' => 'PER_GW_LBS',
                            'PER_CUFT' => 'PER_CUFT',
                            'PER_CTNS' => 'PER_CTNS'
                        ],
            'Retail' => [
                            'RETAIL_CODE' => 'RETAIL_CODE',
                            'RETAIL_WIDTH_CM' => 'RETAIL_WIDTH_CM',
                            'RETAIL_DEEP_CM' => 'RETAIL_DEEP_CM',
                            'RETAIL_HEIGHT_CM' => 'RETAIL_HEIGHT_CM',
                            'RETAIL_WIDTH_INCH' => 'RETAIL_WIDTH_INCH',
                            'RETAIL_DEEP_INCH' => 'RETAIL_DEEP_INCH',
                            'RETAIL_HEIGHT_INCH' => 'RETAIL_HEIGHT_INCH',
                            'RETAIL_WEIGHT_KG' => 'RETAIL_WEIGHT_KG',
                            'RETAIL_WEIGHT_LBS' => 'RETAIL_WEIGHT_LBS',
                            'RETAIL_BOX_TYPE' => 'RETAIL_BOX_TYPE',
                            'RETAIL_PACK_BOX' => 'RETAIL_PACK_BOX',
                            'PRODUCT_RETAIL_W_LBS' => 'PRODUCT_RETAIL_W_LBS',
                            'PRODUCT_RETAIL_W_KG' => 'PRODUCT_RETAIL_W_KG'
                        ],
            'Inner' => [
                            'INNER_CODE' => 'INNER_CODE',
                            'INNER_WIDTH_CM' => 'INNER_WIDTH_CM',
                            'INNER_DEEP_CM' => 'INNER_DEEP_CM',
                            'INNER_HEIGHT_CM' => 'INNER_HEIGHT_CM',
                            'INNER_WIDTH_INCH' => 'INNER_WIDTH_INCH',
                            'INNER_DEEP_INCH' => 'INNER_DEEP_INCH',
                            'INNER_HEIGHT_INCH' => 'INNER_HEIGHT_INCH',
                            'INNER_WEIGHT_KG' => 'INNER_WEIGHT_KG',
                            'INNER_WEIGHT_LBS' => 'INNER_WEIGHT_LBS',
                            'INNER_BOX_TYPE' => 'INNER_BOX_TYPE',
                            'INNER_PACK_BOX' => 'INNER_PACK_BOX'
                        ],
        ];

        return $list_data;
    }

    public function list_fillter(){
        $list_fillter = [
            // '' => 'กรุณาเลือกFillter',
            'SKU_CODE' => 'SKU_CODE',
            'SKU_7DIGIT' => 'SKU_7DIGIT',
            'SKU_NAME' => 'SKU_NAME',
            'MAIN_IMAGE' => 'MAIN_IMAGE',
            'PRODUCT_YEAR' => 'PRODUCT_YEAR',
            'CATEGORY' => 'CATEGORY',
            'CATALOG_STATUS' => 'CATALOG_STATUS',
            'AGE' => 'AGE',
            'AWARD' => 'AWARD',
            'CHILD_DEVELOPMENT' => 'CHILD_DEVELOPMENT',
            'MASTER_BOX_TYPE' => 'MASTER_BOX_TYPE',
            'RETAIL_BOX_TYPE' => 'RETAIL_BOX_TYPE',
            'INNER_BOX_TYPE' => 'INNER_BOX_TYPE',
            'COMPOSITIONS' => 'COMPOSITIONS',
            'PROP65' => 'PROP65',
            'CHOKING_HAZARD' => 'CHOKING_HAZARD',
            'WARNING_LABEL' => 'WARNING_LABEL',
            'LIST_OF_ACCESSORIES' => 'LIST_OF_ACCESSORIES',
            'COLORS' => 'COLORS',
            'BULLET' => 'BULLET',
            'PLANWOOD' => 'PLANWOOD'
        ];

        return $list_fillter;
    }

    public function list_sku(){
        $sku_code_list = Pt_inv_pif_fg::select('sku_code')
                                           ->groupby('sku_code')
                                           ->orderby('sku_code','asc')
                                           ->get();

        $list_sku = [];
        foreach($sku_code_list as $data){
            $list_sku += [ $data->sku_code => $data->sku_code ];
        }

        return $list_sku;
    }

    public function list_product_year(){
        $product_year_list = Pt_inv_pif_fg::select('product_year')
                                           ->groupby('product_year')
                                           ->orderby('product_year','desc')
                                           ->get();

        $list_product_year = ['' => 'Please choose'];
        foreach($product_year_list as $data){
            $list_product_year += [ $data->product_year => $data->product_year ];
        }

        return $list_product_year;
    }

    public function list_category(){
        $category_list = Pt_inv_pif_fg::select('category')
                                           ->groupby('category')
                                           ->orderby('category','asc')
                                           ->get();

        $list_category = ['' => 'Please choose'];
        foreach($category_list as $data){
            $list_category += [ $data->category => $data->category ];
        }

        return $list_category;
    }

    public function list_catalog_status(){
        $catalog_status_list = Pt_inv_pif_fg::select('catalog_status')
                                           ->groupby('catalog_status')
                                           ->orderby('catalog_status','asc')
                                           ->get();

        $list_catalog_status = ['' => 'Please choose'];
        foreach($catalog_status_list as $data){
            $list_catalog_status += [ $data->catalog_status => $data->catalog_status ];
        }

        return $list_catalog_status;
    }

    public function list_age(){
        $age_list = Pt_inv_pif_fg::select('age')
                                    ->whereNotNull('age')
                                    ->groupby('age')
                                    ->orderby('age','desc')
                                    ->get();

        $list_age = [];
        foreach($age_list as $data){
            $list_age += [ $data->age => $data->age ];
        }
        
        return $list_age;
    }

    // public function list_award(){
    //      $award_list = Pt_inv_pif_fg::select('award_1','award_2','award_3','award_4','award_5','award_6')
    //                                        ->groupby('award_1','award_2','award_3','award_4','award_5','award_6')
    //                                        ->orderby('award_1','desc')
    //                                        ->get();

    //     $list_award = ['' => 'Please choose Award'];
    //     foreach($award_list as $data){
    //         $list_award += [ $data->award => $data->award ];
    //     }

    //     return $list_award;
    // }

    public function index(){

        // dd(Auth::check());

        $data = Pt_inv_pif_fg::select('sku_id','sku_code','sku_7digit','sku_name','main_image',
                                            'mlud.last_update as last_update_date',
                                            'product_year','category','catalog_status','age')
                                    ->join(DB::raw('( SELECT sku_code sku ,max(sku_7digit) as sku_7dig FROM apps.Pt_inv_pif_fg  GROUP BY sku_code) msku'),
                                    function($join)
                                    {
                                        $join->on('apps.Pt_inv_pif_fg.sku_code', '=', 'msku.sku')
                                        ->on("apps.Pt_inv_pif_fg.sku_7digit","=","msku.sku_7dig");
                                    })
                                    ->join(DB::raw('( SELECT sku_code sku ,max(last_update_date) as last_update FROM apps.Pt_inv_pif_fg  GROUP BY sku_code) mlud'),
                                    function($join)
                                    {
                                        $join->on('apps.Pt_inv_pif_fg.sku_code', '=', 'mlud.sku');
                                    })
                                    // ->orderby('mlud.last_update' , 'DESC')
                                    ->get();

        // dd($data);
            $list_data_export=[
                'Product' => [
                    'SKU_CODE' => 'SKU',
                    'SKU_7DIGIT' => '7 Digit',
                    'LAST_REVISION' => 'LAST_REVISION',
                    'ALL_REVISION' => 'ALL_REVISION',
                    'SKU_NAME' => 'Name - en-US',
                    'PRODUCT_YEAR' => 'Product Year',
                    'CATEGORY' => 'Category',
                    'CATALOG_STATUS' => 'Catalog Status',
                    'AGE' => 'Age',
                    'EAN_BARCODE' => 'EAN Barcode (on inner box)',
                    'FLAG_DIA' => 'Flag DIA',
                    'PRODUCT_WIDTH_INCH' => 'Width of Product (inch)',
                    'PRODUCT_LENGTH_INCH' => 'Length of Product (inch)',
                    'PRODUCT_HEIGHT_INCH' => 'Height of Product (inch)',
                    'PRODUCT_WEIGHT_LBS' => 'Product Weight (Ibs)',
                    'SIZE_BIGGEST' => 'Size of the biggest part',
                    'PRODUCT_WIDTH_CM' => 'Product Width (cm)',
                    'PRODUCT_LENGTH_CM' => 'Product Length (cm)',
                    'PRODUCT_HEIGHT_CM' => 'Product Height (cm)',
                    'PRODUCT_WEIGHT_KG' => 'Product Weight(kg)',
                    'SKU_DESCRIPTION' => 'Product Description - en-US',
                    'CARE_INSTRUCTION' => 'Care Instruction',
                    'ASSEMBLY_INSTRUCTION' => 'Assembly Instruction',
                    'CAUTION_SHEET' => 'Caution Sheet',
                    'HOW_TO_PLAY' => 'How to play',
                    'PIECES_COUNT' => 'Pieces Count',
                    'COMPOSITIONS' => 'Composition',
                    'LIST_OF_ACCESSORIES' => 'List of accessories',
                    'DIMENSION_CM' => 'Dimension(cm.)',
                    'DIMENSION_INCH' => 'Dimension(inch)',
                    'COLORS' => 'Colors',
                    'LONG_DESCRIPTION' => 'Long Description',
                    'PLASTIC_TYPE' => 'Plastic Type',
                    'PLASTIC_LOCATION' => 'Plastic Location',
                    'NRF_COLOR_NUMBER' => 'NRF Color Number',
                    'NRF_COLOR_NAME' => 'NRF Color Name',
                    'MAX_CHILD_HEIGHT_CM' => 'Max Child Height (cm)',
                    'MAX_CHILD_WEIGHT_KG' => 'Max Child Weight (kg)',
                    'PLANWOOD' => 'PlanWood',
                    'CARBON_FOOTPRINT_KG' => 'Carbon Footprint (kg)',
                    'CARBON_FOOTPRINT_LBS' => 'Carbon Footprint (lbs)'
                ],
    'Award' => [
                'AWARD_1' => 'Award 1',
                'AWARD_2' => 'Award 2',
                'AWARD_3' => 'Award 3',
                'AWARD_4' => 'Award 4',
                'AWARD_5' => 'Award 5',
                'AWARD_6' => 'Award 6'
                ],
    'Child_Development' => [
                            'CHILD_DEV_1' => 'Child Development 1',
                            'CHILD_DEV_2' => 'Child Development 2',
                            'CHILD_DEV_3' => 'Child Development 3',
                            'CHILD_DEV_4' => 'Child Development 4',
                            'CHILD_DEV_5' => 'Child Development 5',
                            'CHILD_DEV_6' => 'Child Development 6'
                            ],
    'Warning_Statements' => [
                            'PROP65' => 'PROP65',
                            'CHOKING_HAZARD' => 'Choking Hazard',
                            'WARNING_LABEL' => 'Warning Label',
                            ],
    'Lifestyle_Image' => [
                            'LIFESTYLE_IMG_1' => 'Lifestyle Image 1',
                            'LIFESTYLE_IMG_2' => 'Lifestyle Image 2',
                            'LIFESTYLE_IMG_3' => 'Lifestyle Image 3',
                            'LIFESTYLE_IMG_4' => 'Lifestyle Image 4',
                            'LIFESTYLE_IMG_5' => 'Lifestyle Image 5',
                            'LIFESTYLE_IMG_6' => 'Lifestyle Image 6',
                            'LIFESTYLE_IMG_7' => 'Lifestyle Image 7',
                            'LIFESTYLE_IMG_8' => 'Lifestyle Image 8',
                            'LIFESTYLE_IMG_9' => 'Lifestyle Image 9',
                            'LIFESTYLE_IMG_10' => 'Lifestyle Image 10'
                        ],
    'Product_Image' => [
                            'MAIN_IMAGE' => 'Main Image',
                            'PRODUCT_IMG_1' => 'Product Image alt 1',
                            'PRODUCT_IMG_2' => 'Product Image alt 2',
                            'PRODUCT_IMG_3' => 'Product Image alt 3',
                            'PRODUCT_IMG_4' => 'Product Image alt 4',
                            'PRODUCT_IMG_5' => 'Product Image alt 5',
                            'PRODUCT_IMG_6' => 'Product Image alt 6',
                            'PRODUCT_IMG_7' => 'Product Image alt 7',
                            'PRODUCT_IMG_8' => 'Product Image alt 8',
                            'PRODUCT_IMG_9' => 'Product Image alt 9'
                        ],
    'Package_Shot_Image' => [
                                'PACKAGE_FRONT' => 'Package - Front',
                                'PACKAGE_BACK' => 'Package - Back',
                                'PACKAGE_TOP' => 'Package - Top',
                                'PACKAGE_BOTTOM' => 'Package - Bottom',
                                'PACKAGE_LEFT' => 'Package - Left',
                                'PACKAGE_RIGHT' => 'Package - Right',
                                'PACKAGE_SHOT_1' => 'Package Shot 1',
                                'PACKAGE_SHOT_2' => 'Package Shot 2',
                                'PACKAGE_SHOT_3' => 'Package Shot 3',
                                'PACKAGE_SHOT_4' => 'Package Shot 4'
                            ],
    'Bullet' => [
                    'BULLET_POINT_1' => 'Bullet Point 1',
                    'BULLET_POINT_2' => 'Bullet Point 2',
                    'BULLET_POINT_3' => 'Bullet Point 3',
                    'BULLET_POINT_4' => 'Bullet Point 4'
                ],
    'Master' => [
                    'MASTER_CODE' => 'Master Code',
                    'MASTER_WIDTH_CM' => 'Master Width (cm)',
                    'MASTER_DEEP_CM' => 'Master Deep (cm)',
                    'MASTER_HEIGHT_CM' => 'Master Height (cm)',
                    'MASTER_WIDTH_INCH' => 'Master Width (Inch)',
                    'MASTER_DEEP_INCH' => 'Master Deep (Inch)',
                    'MASTER_HEIGHT_INCH' => 'Master Height (Inch)',
                    'MASTER_WEIGHT_KG' => 'Master Weight (kg)',
                    'MASTER_WEIGHT_LBS' => 'Master Weight (lbs)',
                    'MASTER_BOX_TYPE' => 'Master Box Type',
                    'PER_SET' => 'Per Set',
                    'PER_PIECE' => 'Per Piece',
                    'PER_NW_KG' => 'Per NW (kg)',
                    'PER_GW_KG' => 'Per GW (kg)',
                    'PER_NW_LBS' => 'Per NW (lbs)',
                    'PER_GW_LBS' => 'Per GW (lbs)',
                    'PER_CUFT' => 'Per CUFT',
                    'PER_CTNS' => 'Per CTNS'
                ],
    'Retail' => [
                    'RETAIL_CODE' => 'Retail Code',
                    'RETAIL_WIDTH_CM' => 'Retail Width (cmh)',
                    'RETAIL_DEEP_CM' => 'Retail Deep (cm)',
                    'RETAIL_HEIGHT_CM' => 'Retail Height (cm)',
                    'RETAIL_WIDTH_INCH' => 'Retail Width (Inch)',
                    'RETAIL_DEEP_INCH' => 'Retail Deep (Inch)',
                    'RETAIL_HEIGHT_INCH' => 'Retail Height (Inch)',
                    'RETAIL_WEIGHT_KG' => 'Retail Weight (kg)',
                    'RETAIL_WEIGHT_LBS' => 'Retail Weight (lbs)',
                    'RETAIL_BOX_TYPE' => 'Retail Box Type',
                    'RETAIL_PACK_BOX' => 'Retail Pack Box',
                    'PRODUCT_RETAIL_W_LBS' => 'Product Retail W (lbs)',
                    'PRODUCT_RETAIL_W_KG' => 'Product Retail W (kg)'
                ],
    'Inner' => [
                    'INNER_CODE' => 'Inner Code',
                    'INNER_WIDTH_CM' => 'Inner Width (cm)',
                    'INNER_DEEP_CM' => 'Inner Deep (cm)',
                    'INNER_HEIGHT_CM' => 'Inner Height (cm)',
                    'INNER_WIDTH_INCH' => 'Inner Width (Inch)',
                    'INNER_DEEP_INCH' => 'Inner Deep (Inch)',
                    'INNER_HEIGHT_INCH' => 'Inner Height (Inch)',
                    'INNER_WEIGHT_KG' => 'Inner Weight (kg)',
                    'INNER_WEIGHT_LBS' => 'Inner Weight (lbs)',
                    'INNER_BOX_TYPE' => 'Inner Box Type',
                    'INNER_PACK_BOX' => 'Inner Pack Box'
                ],
            ];
        return View::make('product.index')->with('data', $data)->with('list_data', $this->list_data())->with('list_data_export',$list_data_export);
    }

    public function index_dinamic(Request $request){
        // dd($request->all());
        $data = Pt_inv_pif_fg::select('sku_id','sku_code','sku_7digit','sku_name','main_image',
                                            'mlud.last_update as last_update_date',
                                            'product_year','category','catalog_status','age')
                                    ->join(DB::raw('( SELECT sku_code sku ,max(sku_7digit) as sku_7dig FROM apps.Pt_inv_pif_fg  GROUP BY sku_code) msku'),
                                    function($join)
                                    {
                                        $join->on('apps.Pt_inv_pif_fg.sku_code', '=', 'msku.sku')
                                        ->on("apps.Pt_inv_pif_fg.sku_7digit","=","msku.sku_7dig");
                                    })
                                    ->join(DB::raw('( SELECT sku_code sku ,max(last_update_date) as last_update FROM apps.Pt_inv_pif_fg  GROUP BY sku_code) mlud'),
                                    function($join)
                                    {
                                        $join->on('apps.Pt_inv_pif_fg.sku_code', '=', 'mlud.sku');
                                    })
                                    ->orderby('sku_code' , 'asc');
                                    // ->get();

        $header_data = "SKU_CODE,MAIN_IMAGE,SKU_NAME,PRODUCT_YEAR,AGE,CATEGORY,CATALOG_STATUS";
                                    
        // $fillter_data = "";
        // $fillter = explode(",",$fillter_data);
        // dd(count($fillter),$fillter,$fillter_data,!empty($fillter_data));

        return View::make('product.index_new')
                    ->with('data', $data->paginate(10))
                    ->with('chk_list', $header_data)
                    // ->with('fillter_data', $fillter_data)
                    ->with('list_data', $this->list_data())
                    ->with('list_fillter', $this->list_fillter())
                    
                    ->with('data_sku', "")
                    ->with('data_product_year', "")
                    ->with('data_category', "")
                    ->with('data_catalog_status', "")
                    ->with('data_age', "")
                    ->with('data_award', "")

                    ->with('list_sku', $this->list_sku() )
                    ->with('list_product_year', $this->list_product_year() )
                    ->with('list_category', $this->list_category() )
                    ->with('list_catalog_status', $this->list_catalog_status() )
                    ->with('list_age', $this->list_age() )

                    ;
    }

    public function getdatatablet(Request $request){
        // dd($request->all());
        
        if ($request->ajax()) {

            $data = Pt_inv_pif_fg::select('sku_id','sku_code','sku_7digit','sku_name','main_image','last_update_date','product_year','category','catalog_status','age')
                                        ->join(DB::raw('( SELECT sku_code sku ,max(sku_7digit) as sku_7dig FROM apps.Pt_inv_pif_fg  GROUP BY sku_code) msku'),
                                        function($join)
                                        {
                                            $join->on('apps.Pt_inv_pif_fg.sku_code', '=', 'msku.sku')
                                            ->on("apps.Pt_inv_pif_fg.sku_7digit","=","msku.sku_7dig");
                                        })
                                        // ->orderby('last_update_date','desc')
                                        // ->orderby('sku_code','asc')
                                        ;
                                        // dd($data->get());
            // $data = Pt_inv_pif_fg::select('sku_id','sku_code','sku_7digit','sku_name','main_image','last_update_date');
            if($request['search']["value"] != ""){
                // $data->Where('age','LIKE', '%'.$request['search']["value"].'%');
                // $data->Orwhere('product_year','LIKE', '%'.$request['search']["value"].'%');

                $search = mb_strtolower(trim($request['search']["value"]));
    
                $data->where('sku_code','LIKE', '%'.$request['search']["value"].'%');
                $data->OrwhereRaw("LOWER(sku_name) LIKE '%".$search."%'");
                $data->Orwhere('product_year','LIKE', '%'.$request['search']["value"].'%');
                $data->OrwhereRaw("LOWER(category) LIKE '%".$search."%'");
                $data->OrwhereRaw("LOWER(catalog_status) LIKE '%".$search."%'");
                $data->Orwhere('age','LIKE', '%'.$request['search']["value"].'%');

            }
            // dd($data->toSql());
            $datatables = Datatables::of($data)
                ->editColumn('sku_code', function ($data) {
                    $tool = '<a class="text-hover" href=' . URL("product/tosevendigit/" . Crypt::encrypt($data->sku_code)) . '>' . $data->sku_code . '</a>';
                    return $tool;
                })
                ->editColumn('main_image', function ($data) {
                    if ($data->main_image != "N/A") {
                        // dd(@file_get_contents($data->main_image));

                        $tool = '<img src="' . $data->main_image . '" alt="' . $data->sku_name . '" style="width: 100px;height: 100px;">';
                        
                        return $tool;

                        // $file = @file_get_contents($data->main_image);
                        //     if($file){
                        //         $tool = '<img src="' . $data->main_image . '" alt="' . $data->sku_name . '" style="width: 100px;height: 100px;">';
                        //     }else{
                        //         $tool = '<img src="' . url('/public/images/Image-Not-Available.png') . '" alt="' . $data->sku_name . '" style="width: 80px;height: 100px;">';
                        //     }

                        // return $tool;
                    } else {
                        $tool = '<img src="' . url('/public/images/Image-Not-Available.png') . '" alt="' . $data->sku_name . '" style="width: 80px;height: 100px;">';
                        return $tool;
                    }
                })
                ->editColumn('last_update_date', function ($data) {
                    $get_last = Pt_inv_pif_fg::select(DB::raw('max(last_update_date) as last_update_date'))->where('sku_code' , $data->sku_code)->first();
                    return date_format(date_create($get_last->last_update_date), 'd-M-Y H:i:s');
                })
                ->addColumn('chbox', function ($data) use ($request){

                    $data_sku = explode("," , $request->sku_code);

                    if( in_array($data->sku_code , $data_sku ) ){
                        $tool = '<div class="dt-checkbox" style="margin:auto;">';
                        $tool .= '<input type="checkbox" class="chbox" id="' . $data->sku_code . '"  name="chkid[]" value="' . $data->sku_code . '" checked >';
                        $tool .= '<span class="dt-checkbox-label"></span></div>';
                    }else{
                        $tool = '<div class="dt-checkbox" style="margin:auto;">';
                        $tool .= '<input type="checkbox" class="chbox" id="' . $data->sku_code . '"  name="chkid[]" value="' . $data->sku_code . '">';
                        $tool .= '<span class="dt-checkbox-label"></span></div>';
                    }

                    return $tool;
                })
                ->rawColumns(['sku_code', 'main_image', 'last_update_date', 'chbox'])
                ->make(true);

            return $datatables;
        }
    }

    public function tosevendigit($sku_code)
    {
        return View::make('product.to7digit')->with('sku_code', $sku_code);
    }

    public function getdatatablet7digit(Request $request)
    {
       
        $data = Pt_inv_pif_fg::select(
            'sku_id',
            'sku_7digit',
            'sku_name',
            'last_update_date'
        );
        if ($request->sku_code != "") {
            $sku_code = Crypt::decrypt($request->sku_code);
            $data->where('sku_code', intval($sku_code));
        }

        $datatables = Datatables::of($data)
            ->editColumn('sku_7digit', function ($data) {
                $tool = '<a class="text-hover" href=' . URL("product/detail/" . Crypt::encrypt($data->sku_7digit)) . '>' . $data->sku_7digit . '</a>';
                return $tool;
            })
            ->editColumn('last_update_date', function ($data) {
                return date_format(date_create($data->last_update_date), 'd-M-Y H:i:s');
            })
            ->addColumn('data_history', function ($data) {
                $check_log = Pt_inv_pif_log::where('sku_id', $data->sku_id)->get();
                $tool = "";
                if(count($check_log) > 0){
                    $tool .= '<div class=" action-buttons" style="text-align: center;">
                    <a class="btn btn-outline-danger" id="del_id"  href = "product/productlog/' . Crypt::encrypt($data->sku_id) . ' ") title="Data History" style="color: rgb(219, 68, 55);">
                    <i class="fa fa-history"></i></a></div>';
                }
                return $tool;
            })
            ->rawColumns(['sku_7digit', 'last_update_date', 'data_history'])
            ->make(true);
        return $datatables;
    }

    public function product_detail($sku_id)
    {
        $sku_7digit = Crypt::decrypt($sku_id);

        $product_detail = Pt_inv_pif_fg::join('apps.Pt_inv_pif_master', 'apps.Pt_inv_pif_fg.sku_id', '=', 'apps.Pt_inv_pif_master.sku_id')
                                        ->join("apps.Pt_inv_pif_retail_inner",function($join){
                                            $join->on("apps.Pt_inv_pif_master.sku_id","=","apps.Pt_inv_pif_retail_inner.sku_id")
                                                ->on("apps.Pt_inv_pif_master.master_id","=","apps.Pt_inv_pif_retail_inner.master_id");
                                        })
                                        ->where('sku_7digit', $sku_7digit)
                                        ->first();

        $product_master = Pt_inv_pif_master::where('sku_id' , $product_detail->sku_id)->get();

        $product_inner = Pt_inv_pif_retail_inner::select('inner_code','inner_width_cm','inner_deep_cm','inner_height_cm','inner_width_inch','inner_deep_inch','inner_height_inch','inner_weight_kg','inner_weight_lbs','inner_box_type','inner_pack_box')
                                            ->where('sku_id' , $product_detail->sku_id)
                                            ->groupby('inner_code','inner_width_cm','inner_deep_cm','inner_height_cm','inner_width_inch','inner_deep_inch','inner_height_inch','inner_weight_kg','inner_weight_lbs','inner_box_type','inner_pack_box')
                                            ->get();
        $product_retail = Pt_inv_pif_retail_inner::select('retail_code','retail_width_cm','retail_deep_cm','retail_height_cm','retail_width_inch','retail_deep_inch','retail_height_inch','retail_weight_kg','retail_weight_lbs','retail_box_type','retail_pack_box','product_retail_w_lbs','product_retail_w_kg')
                                            ->where('sku_id' , $product_detail->sku_id)
                                            ->groupby('retail_code','retail_width_cm','retail_deep_cm','retail_height_cm','retail_width_inch','retail_deep_inch','retail_height_inch','retail_weight_kg','retail_weight_lbs','retail_box_type','retail_pack_box','product_retail_w_lbs','product_retail_w_kg')
                                            ->get();                                       

        return View::make('product.product_detail')
                    ->with('product_detail', $product_detail)
                    ->with('product_master', $product_master)
                    ->with('product_inner', $product_inner)
                    ->with('product_retail', $product_retail);
    }

    public function product_log($sku_id)
    {
        return View::make('product.product_history')->with('sku_id', $sku_id);
    }
    public function getlogproductdatatable(Request $request)
    {
        $data = Pt_inv_pif_log::select(
            'update_id',
            'sku_id',
            'column_name',
            'old_data',
            'new_data',
            'update_date',
            'updated_by',
        );
        if ($request->sku_id != "") {
            $sku_id = Crypt::decrypt($request->sku_id);
            $data->where('sku_id', intval($sku_id));
        }
        $datalogtable = DataTables::of($data)
        ->editColumn('update_date', function ($data) {
            return date_format(date_create($data->update_date), 'd-M-Y H:i:s');
         })
        ->make(true);
        return $datalogtable;
    }
    public function product_export_excel(Request $request){
        // dd($request->all());
        return Excel::download(new ExportProductDetail($request->all()), 'Product_detail-'.date('d-m-Y').'.xlsx');

        // return redirect()->route('product_info');
    }

    public function getdatatablet_dinamic(Request $request){

        $data = Pt_inv_pif_fg::select('sku_code as SKU','sku_7digit','sku_name as Product Name','main_image as Main Image','last_update_date')
                                ->whereIn('sku_7digit' , function($query){
                                    $query->select(DB::raw('max(sku_7digit) as sku_7digit'))
                                    ->from(with(new Pt_inv_pif_fg)->getTable())
                                    ->groupby('sku_code');
                                })
                                ->orderby('last_update_date','desc');
        $status = "success";
        return response()->json(['status' => $status , 'table' => $data->get() ]);
    }

    public function fillter_data(Request $request){
        // dd($request->all());

        $data_chk_list = explode(",",$request->chk_list);
        $source_data = $data_chk_list;

        // $get_data = Pt_inv_pif_fg;
            // join('apps.pt_inv_pif_master', 'apps.pt_inv_pif_fg.sku_id', '=', 'apps.pt_inv_pif_master.sku_id');

        if (in_array("LAST_REVISION", $source_data)){
            if(array_search("LAST_REVISION",$source_data)){
                unset($source_data[array_search("LAST_REVISION",$source_data)]);
            }
        }

        $get_data = Pt_inv_pif_fg::join(DB::raw('( SELECT sku_code sku ,max(sku_7digit) as sku_7dig FROM apps.Pt_inv_pif_fg  GROUP BY sku_code) msku'),
        function($join)
        {
            $join->on('apps.Pt_inv_pif_fg.sku_code', '=', 'msku.sku')
            ->on("apps.Pt_inv_pif_fg.sku_7digit","=","msku.sku_7dig");
        });

        if( array_search("INNER_CODE" , $source_data) ||
            array_search("INNER_WIDTH_CM" , $source_data) ||
            array_search("INNER_DEEP_CM" , $source_data) ||
            array_search("INNER_HEIGHT_CM" , $source_data) ||
            array_search("INNER_WIDTH_INCH" , $source_data) ||
            array_search("INNER_DEEP_INCH" , $source_data) ||
            array_search("INNER_HEIGHT_INCH" , $source_data) ||
            array_search("INNER_WEIGHT_KG" , $source_data) ||
            array_search("INNER_WEIGHT_LBS" , $source_data) ||
            array_search("INNER_BOX_TYPE" , $source_data) ||
            array_search("INNER_PACK_BOX" , $source_data) ||
        
            array_search("RETAIL_CODE" , $source_data) ||
            array_search("RETAIL_WIDTH_CM" , $source_data) ||
            array_search("RETAIL_DEEP_CM" , $source_data) ||
            array_search("RETAIL_HEIGHT_CM" , $source_data) ||
            array_search("RETAIL_WIDTH_INCH" , $source_data) ||
            array_search("RETAIL_DEEP_INCH" , $source_data) ||
            array_search("RETAIL_HEIGHT_INCH" , $source_data) ||
            array_search("RETAIL_WEIGHT_KG" , $source_data) ||
            array_search("RETAIL_WEIGHT_LBS" , $source_data) ||
            array_search("RETAIL_BOX_TYPE" , $source_data) ||
            array_search("RETAIL_PACK_BOX" , $source_data) ||
            array_search("PRODUCT_RETAIL_W_LBS" , $source_data) ||
            array_search("PRODUCT_RETAIL_W_KG" , $source_data) ||

            array_search("MASTER_CODE" , $source_data) ||
            array_search("MASTER_WIDTH_CM" , $source_data) ||
            array_search("MASTER_DEEP_CM" , $source_data) ||
            array_search("MASTER_HEIGHT_CM" , $source_data) ||
            array_search("MASTER_WIDTH_INCH" , $source_data) ||
            array_search("MASTER_DEEP_INCH" , $source_data) ||
            array_search("MASTER_HEIGHT_INCH" , $source_data) ||
            array_search("MASTER_WEIGHT_KG" , $source_data) ||
            array_search("MASTER_WEIGHT_LBS" , $source_data) ||
            array_search("MASTER_BOX_TYPE" , $source_data) ||
            array_search("PER_SET" , $source_data) ||
            array_search("PER_PIECE" , $source_data) ||
            array_search("PER_NW_KG" , $source_data) ||
            array_search("PER_GW_KG" , $source_data) ||
            array_search("PER_NW_LBS" , $source_data) ||
            array_search("PER_GW_LBS" , $source_data) ||
            array_search("PER_CUFT" , $source_data) ||
            array_search("PER_CTNS" , $source_data) 

        ){
            $get_data->join("apps.pt_inv_pif_retail_inner",function($join){
                $join->on("apps.pt_inv_pif_master.sku_id","=","apps.pt_inv_pif_retail_inner.sku_id")
                    ->on("apps.pt_inv_pif_master.master_id","=","apps.pt_inv_pif_retail_inner.master_id");
            });
        }

        $get_data->select($source_data);
        $get_data->orderby('sku_code' , 'asc');
        if (in_array("SKU_7DIGIT", $source_data)){
            $get_data->orderby('sku_7digit' , 'asc');
        }

        if(!empty($request->list_sku)){
            if(is_array($request->list_sku)){
                $get_data->whereIn('sku_code' , $request->list_sku);
            }else{
                $list_sku = explode(",",$request->chk_list);
                $get_data->whereIn('sku_code' , $list_sku);
            }
        }
        if(!empty($request->list_product_year)){
            $get_data->where('product_year' , $request->list_product_year);
        }
        if(!empty($request->list_category)){
            $get_data->where('category' , $request->list_category);
        }
        if(!empty($request->list_catalog_status)){
            $get_data->where('catalog_status' , $request->list_catalog_status);
        }
        if(!empty($request->list_age)){
            if(is_array($request->list_age)){
                $get_data->whereIn('age' , $request->list_age);
            }else{
                $list_age = explode(",",$request->chk_list);
                $get_data->whereIn('age' , $list_age);
            }
        }

        if(!empty($request->list_award)){

                $get_data->where(function ($query) use  ($request) {

                        $search = mb_strtolower(trim($request->list_award));
    
                        $query->OrwhereRaw("LOWER(award_1) LIKE '%".$search."%'")
                            ->OrwhereRaw("LOWER(award_2) LIKE '%".$search."%'")
                            ->OrwhereRaw("LOWER(award_3) LIKE '%".$search."%'")
                            ->OrwhereRaw("LOWER(award_4) LIKE '%".$search."%'")
                            ->OrwhereRaw("LOWER(award_5) LIKE '%".$search."%'")
                            ->OrwhereRaw("LOWER(award_6) LIKE '%".$search."%'");
                });

                // $get_data->Orwhere('award_1' , 'LIKE', '%'.$request->list_award.'%')
                //     ->Orwhere('award_2' , 'LIKE', '%'.$request->list_award.'%')
                //     ->Orwhere('award_3' , 'LIKE', '%'.$request->list_award.'%')
                //     ->Orwhere('award_4' , 'LIKE', '%'.$request->list_award.'%')
                //     ->Orwhere('award_5' , 'LIKE', '%'.$request->list_award.'%')
                //     ->Orwhere('award_6' , 'LIKE', '%'.$request->list_award.'%');
        }

        // if(count($request->list_fillter) > 0 ){
        //     dd("test");
        //     foreach($request->list_fillter as $value){
        //         dd($value);
        //     }
        // }
        // dd($get_data->toSql());
        // dd($request->list_sku);
        // dd(count($request->list_sku));

        

        return View::make('product.index_fillter_data')
                    ->with('header_data', $source_data)
                    ->with('data', $get_data->paginate(10))
                    ->with('list_data', $this->list_data())
                    ->with('chk_list', $request->chk_list)
                    
                    ->with('data_sku',  (is_array($request->list_sku) )? $request->list_sku: explode(",",$request->list_sku))
                    ->with('data_product_year', $request->list_product_year)
                    ->with('data_category', $request->list_category)
                    ->with('data_catalog_status', $request->list_catalog_status)
                    ->with('data_age', (is_array($request->list_age) )? $request->list_age: explode(",",$request->list_age))
                    ->with('data_award', $request->list_award)

                    ->with('list_sku', $this->list_sku() )
                    ->with('list_product_year', $this->list_product_year() )
                    ->with('list_category', $this->list_category() )
                    ->with('list_catalog_status', $this->list_catalog_status() )
                    ->with('list_age', $this->list_age() )
                    ;
    }
}
