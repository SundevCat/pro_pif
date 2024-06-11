<?php

namespace App\Exports;

use App\Models\Pt_inv_pif_fg;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Sheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

use Illuminate\Support\Facades\DB;

class ExportProductDetail implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents



{
    /**
     * @return \Illuminate\Support\Collection
     */

    private $data_where;



    public function __construct($data = 0)
    {
        $this->data_where = $data;
    }

    public function collection()
    {
        $source_data = [];

        if (!empty($this->data_where['SKU_CODE'])) {
            array_push($source_data, $this->data_where['SKU_CODE']);
        }
        if (!empty($this->data_where['SKU_7DIGIT'])) {
            array_push($source_data, $this->data_where['SKU_7DIGIT']);
        }
        if (!empty($this->data_where['SKU_NAME'])) {
            array_push($source_data, $this->data_where['SKU_NAME']);
        }
        if (!empty($this->data_where['PRODUCT_YEAR'])) {
            array_push($source_data, $this->data_where['PRODUCT_YEAR']);
        }
        if (!empty($this->data_where['CATEGORY'])) {
            array_push($source_data, $this->data_where['CATEGORY']);
        }
        if (!empty($this->data_where['CATALOG_STATUS'])) {
            array_push($source_data, $this->data_where['CATALOG_STATUS']);
        }
        if (!empty($this->data_where['AGE'])) {
            array_push($source_data, $this->data_where['AGE']);
        }
        if (!empty($this->data_where['EAN_BARCODE'])) {
            array_push($source_data, $this->data_where['EAN_BARCODE']);
        }
        if (!empty($this->data_where['PRODUCT_WIDTH_INCH'])) {
            array_push($source_data, $this->data_where['PRODUCT_WIDTH_INCH']);
        }
        if (!empty($this->data_where['PRODUCT_LENGTH_INCH'])) {
            array_push($source_data, $this->data_where['PRODUCT_LENGTH_INCH']);
        }
        if (!empty($this->data_where['PRODUCT_HEIGHT_INCH'])) {
            array_push($source_data, $this->data_where['PRODUCT_HEIGHT_INCH']);
        }
        if (!empty($this->data_where['PRODUCT_WEIGHT_LBS'])) {
            array_push($source_data, $this->data_where['PRODUCT_WEIGHT_LBS']);
        }
        if (!empty($this->data_where['SIZE_BIGGEST'])) {
            array_push($source_data, $this->data_where['SIZE_BIGGEST']);
        }
        if (!empty($this->data_where['PRODUCT_WIDTH_CM'])) {
            array_push($source_data, $this->data_where['PRODUCT_WIDTH_CM']);
        }
        if (!empty($this->data_where['PRODUCT_LENGTH_CM'])) {
            array_push($source_data, $this->data_where['PRODUCT_LENGTH_CM']);
        }
        if (!empty($this->data_where['PRODUCT_HEIGHT_CM'])) {
            array_push($source_data, $this->data_where['PRODUCT_HEIGHT_CM']);
        }
        if (!empty($this->data_where['PRODUCT_WEIGHT_KG'])) {
            array_push($source_data, $this->data_where['PRODUCT_WEIGHT_KG']);
        }
        if (!empty($this->data_where['SKU_DESCRIPTION'])) {
            array_push($source_data, $this->data_where['SKU_DESCRIPTION']);
        }
        if (!empty($this->data_where['CARE_INSTRUCTION'])) {
            array_push($source_data, $this->data_where['CARE_INSTRUCTION']);
        }
        if (!empty($this->data_where['ASSEMBLY_INSTRUCTION'])) {
            array_push($source_data, $this->data_where['ASSEMBLY_INSTRUCTION']);
        }
        if (!empty($this->data_where['CAUTION_SHEET'])) {
            array_push($source_data, $this->data_where['CAUTION_SHEET']);
        }
        if (!empty($this->data_where['HOW_TO_PLAY'])) {
            array_push($source_data, $this->data_where['HOW_TO_PLAY']);
        }
        if (!empty($this->data_where['AWARD_1'])) {
            array_push($source_data, $this->data_where['AWARD_1']);
        }
        if (!empty($this->data_where['AWARD_2'])) {
            array_push($source_data, $this->data_where['AWARD_2']);
        }
        if (!empty($this->data_where['AWARD_3'])) {
            array_push($source_data, $this->data_where['AWARD_3']);
        }
        if (!empty($this->data_where['AWARD_4'])) {
            array_push($source_data, $this->data_where['AWARD_4']);
        }
        if (!empty($this->data_where['AWARD_5'])) {
            array_push($source_data, $this->data_where['AWARD_5']);
        }
        if (!empty($this->data_where['AWARD_6'])) {
            array_push($source_data, $this->data_where['AWARD_6']);
        }
        if (!empty($this->data_where['CHILD_DEV_1'])) {
            array_push($source_data, $this->data_where['CHILD_DEV_1']);
        }
        if (!empty($this->data_where['CHILD_DEV_2'])) {
            array_push($source_data, $this->data_where['CHILD_DEV_2']);
        }
        if (!empty($this->data_where['CHILD_DEV_3'])) {
            array_push($source_data, $this->data_where['CHILD_DEV_3']);
        }
        if (!empty($this->data_where['CHILD_DEV_4'])) {
            array_push($source_data, $this->data_where['CHILD_DEV_4']);
        }
        if (!empty($this->data_where['CHILD_DEV_5'])) {
            array_push($source_data, $this->data_where['CHILD_DEV_5']);
        }
        if (!empty($this->data_where['CHILD_DEV_6'])) {
            array_push($source_data, $this->data_where['CHILD_DEV_6']);
        }
        if (!empty($this->data_where['MASTER_CODE'])) {
            array_push($source_data, $this->data_where['MASTER_CODE']);
        }
        if (!empty($this->data_where['MASTER_WIDTH_CM'])) {
            array_push($source_data, $this->data_where['MASTER_WIDTH_CM']);
        }
        if (!empty($this->data_where['MASTER_DEEP_CM'])) {
            array_push($source_data, $this->data_where['MASTER_DEEP_CM']);
        }
        if (!empty($this->data_where['MASTER_HEIGHT_CM'])) {
            array_push($source_data, $this->data_where['MASTER_HEIGHT_CM']);
        }
        if (!empty($this->data_where['MASTER_WIDTH_INCH'])) {
            array_push($source_data, $this->data_where['MASTER_WIDTH_INCH']);
        }
        if (!empty($this->data_where['MASTER_DEEP_INCH'])) {
            array_push($source_data, $this->data_where['MASTER_DEEP_INCH']);
        }
        if (!empty($this->data_where['MASTER_HEIGHT_INCH'])) {
            array_push($source_data, $this->data_where['MASTER_HEIGHT_INCH']);
        }
        if (!empty($this->data_where['MASTER_WEIGHT_KG'])) {
            array_push($source_data, $this->data_where['MASTER_WEIGHT_KG']);
        }
        if (!empty($this->data_where['MASTER_WEIGHT_LBS'])) {
            array_push($source_data, $this->data_where['MASTER_WEIGHT_LBS']);
        }
        if (!empty($this->data_where['MASTER_BOX_TYPE'])) {
            array_push($source_data, $this->data_where['MASTER_BOX_TYPE']);
        }

        array_push($source_data, "GTIN");

        if (!empty($this->data_where['PER_SET'])) {
            array_push($source_data, $this->data_where['PER_SET']);
        }
        if (!empty($this->data_where['PER_PIECE'])) {
            array_push($source_data, $this->data_where['PER_PIECE']);
        }
        if (!empty($this->data_where['PER_NW_KG'])) {
            array_push($source_data, $this->data_where['PER_NW_KG']);
        }
        if (!empty($this->data_where['PER_GW_KG'])) {
            array_push($source_data, $this->data_where['PER_GW_KG']);
        }
        if (!empty($this->data_where['PER_NW_LBS'])) {
            array_push($source_data, $this->data_where['PER_NW_LBS']);
        }
        if (!empty($this->data_where['PER_GW_LBS'])) {
            array_push($source_data, $this->data_where['PER_GW_LBS']);
        }
        if (!empty($this->data_where['PER_CUFT'])) {
            array_push($source_data, $this->data_where['PER_CUFT']);
        }
        if (!empty($this->data_where['PER_CTNS'])) {
            array_push($source_data, $this->data_where['PER_CTNS']);
        }
        if (!empty($this->data_where['RETAIL_CODE'])) {
            array_push($source_data, $this->data_where['RETAIL_CODE']);
        }
        if (!empty($this->data_where['RETAIL_WIDTH_CM'])) {
            array_push($source_data, $this->data_where['RETAIL_WIDTH_CM']);
        }
        if (!empty($this->data_where['RETAIL_WIDTH_CM'])) {
            array_push($source_data, $this->data_where['RETAIL_DEEP_CM']);
        }
        if (!empty($this->data_where['RETAIL_WIDTH_CM'])) {
            array_push($source_data, $this->data_where['RETAIL_HEIGHT_CM']);
        }
        if (!empty($this->data_where['RETAIL_WIDTH_CM'])) {
            array_push($source_data, $this->data_where['RETAIL_WIDTH_INCH']);
        }
        if (!empty($this->data_where['RETAIL_WIDTH_CM'])) {
            array_push($source_data, $this->data_where['RETAIL_DEEP_INCH']);
        }
        if (!empty($this->data_where['RETAIL_WIDTH_CM'])) {
            array_push($source_data, $this->data_where['RETAIL_HEIGHT_INCH']);
        }

        if (!empty($this->data_where['RETAIL_WIDTH_CM'])) {
            array_push($source_data, "RETAIL_WIDTH_CM as RETAIL_WIDTH_CM2");
        }
        if (!empty($this->data_where['RETAIL_WIDTH_CM'])) {
            array_push($source_data, "RETAIL_DEEP_CM as RETAIL_DEEP_CM2");
        }
        if (!empty($this->data_where['RETAIL_WIDTH_CM'])) {
            array_push($source_data, "RETAIL_HEIGHT_CM as RETAIL_HEIGHT_CM2");
        }
        if (!empty($this->data_where['RETAIL_WIDTH_CM'])) {
            array_push($source_data, "RETAIL_WIDTH_INCH as RETAIL_WIDTH_INCH2");
        }
        if (!empty($this->data_where['RETAIL_WIDTH_CM'])) {
            array_push($source_data, "RETAIL_DEEP_INCH as RETAIL_DEEP_INCH2");
        }
        if (!empty($this->data_where['RETAIL_WIDTH_CM'])) {
            array_push($source_data, "RETAIL_HEIGHT_INCH as RETAIL_HEIGHT_INCH2");
        }

        if (!empty($this->data_where['RETAIL_WEIGHT_KG'])) {
            array_push($source_data, $this->data_where['RETAIL_WEIGHT_KG']);
        }
        if (!empty($this->data_where['RETAIL_WEIGHT_LBS'])) {
            array_push($source_data, $this->data_where['RETAIL_WEIGHT_LBS']);
        }
        if (!empty($this->data_where['RETAIL_BOX_TYPE'])) {
            array_push($source_data, $this->data_where['RETAIL_BOX_TYPE']);
        }
        if (!empty($this->data_where['RETAIL_PACK_BOX'])) {
            array_push($source_data, $this->data_where['RETAIL_PACK_BOX']);
        }
        if (!empty($this->data_where['PRODUCT_RETAIL_W_LBS'])) {
            array_push($source_data, $this->data_where['PRODUCT_RETAIL_W_LBS']);
        }
        if (!empty($this->data_where['PRODUCT_RETAIL_W_LBS'])) {
            array_push($source_data, $this->data_where['PRODUCT_RETAIL_W_KG']);
        }

        if (!empty($this->data_where['PRODUCT_RETAIL_W_LBS'])) {
            array_push($source_data, "PRODUCT_RETAIL_W_LBS as PRODUCT_RETAIL_W_LBS2");
        }
        if (!empty($this->data_where['PRODUCT_RETAIL_W_LBS'])) {
            array_push($source_data, "PRODUCT_RETAIL_W_KG as PRODUCT_RETAIL_W_KG2");
        }

        if (!empty($this->data_where['INNER_CODE'])) {
            array_push($source_data, $this->data_where['INNER_CODE']);
        }
        if (!empty($this->data_where['INNER_WIDTH_CM'])) {
            array_push($source_data, $this->data_where['INNER_WIDTH_CM']);
        }
        if (!empty($this->data_where['INNER_DEEP_CM'])) {
            array_push($source_data, $this->data_where['INNER_DEEP_CM']);
        }
        if (!empty($this->data_where['INNER_HEIGHT_CM'])) {
            array_push($source_data, $this->data_where['INNER_HEIGHT_CM']);
        }
        if (!empty($this->data_where['INNER_WIDTH_INCH'])) {
            array_push($source_data, $this->data_where['INNER_WIDTH_INCH']);
        }
        if (!empty($this->data_where['INNER_DEEP_INCH'])) {
            array_push($source_data, $this->data_where['INNER_DEEP_INCH']);
        }
        if (!empty($this->data_where['INNER_HEIGHT_INCH'])) {
            array_push($source_data, $this->data_where['INNER_HEIGHT_INCH']);
        }
        if (!empty($this->data_where['INNER_WEIGHT_KG'])) {
            array_push($source_data, $this->data_where['INNER_WEIGHT_KG']);
        }
        if (!empty($this->data_where['INNER_WEIGHT_LBS'])) {
            array_push($source_data, $this->data_where['INNER_WEIGHT_LBS']);
        }
        if (!empty($this->data_where['INNER_BOX_TYPE'])) {
            array_push($source_data, $this->data_where['INNER_BOX_TYPE']);
        }
        if (!empty($this->data_where['INNER_PACK_BOX'])) {
            array_push($source_data, $this->data_where['INNER_PACK_BOX']);
        }
        if (!empty($this->data_where['PIECES_COUNT'])) {
            array_push($source_data, $this->data_where['PIECES_COUNT']);
        }
        if (!empty($this->data_where['COMPOSITIONS'])) {
            array_push($source_data, $this->data_where['COMPOSITIONS']);
        }
        if (!empty($this->data_where['PROP65'])) {
            array_push($source_data, $this->data_where['PROP65']);
        }
        if (!empty($this->data_where['CHOKING_HAZARD'])) {
            array_push($source_data, $this->data_where['CHOKING_HAZARD']);
        }
        if (!empty($this->data_where['WARNING_LABEL'])) {
            array_push($source_data, $this->data_where['WARNING_LABEL']);
        }
        if (!empty($this->data_where['LIST_OF_ACCESSORIES'])) {
            array_push($source_data, $this->data_where['LIST_OF_ACCESSORIES']);
        }
        if (!empty($this->data_where['DIMENSION_CM'])) {
            array_push($source_data, $this->data_where['DIMENSION_CM']);
        }
        if (!empty($this->data_where['DIMENSION_INCH'])) {
            array_push($source_data, $this->data_where['DIMENSION_INCH']);
        }
        if (!empty($this->data_where['COLORS'])) {
            array_push($source_data, $this->data_where['COLORS']);
        }
        if (!empty($this->data_where['LIFESTYLE_IMG_1'])) {
            array_push($source_data, $this->data_where['LIFESTYLE_IMG_1']);
        }
        if (!empty($this->data_where['LIFESTYLE_IMG_2'])) {
            array_push($source_data, $this->data_where['LIFESTYLE_IMG_2']);
        }
        if (!empty($this->data_where['LIFESTYLE_IMG_3'])) {
            array_push($source_data, $this->data_where['LIFESTYLE_IMG_3']);
        }
        if (!empty($this->data_where['LIFESTYLE_IMG_4'])) {
            array_push($source_data, $this->data_where['LIFESTYLE_IMG_4']);
        }
        if (!empty($this->data_where['LIFESTYLE_IMG_5'])) {
            array_push($source_data, $this->data_where['LIFESTYLE_IMG_5']);
        }
        if (!empty($this->data_where['LIFESTYLE_IMG_6'])) {
            array_push($source_data, $this->data_where['LIFESTYLE_IMG_6']);
        }
        if (!empty($this->data_where['LIFESTYLE_IMG_7'])) {
            array_push($source_data, $this->data_where['LIFESTYLE_IMG_7']);
        }
        if (!empty($this->data_where['LIFESTYLE_IMG_8'])) {
            array_push($source_data, $this->data_where['LIFESTYLE_IMG_8']);
        }
        if (!empty($this->data_where['LIFESTYLE_IMG_9'])) {
            array_push($source_data, $this->data_where['LIFESTYLE_IMG_9']);
        }
        if (!empty($this->data_where['LIFESTYLE_IMG_10'])) {
            array_push($source_data, $this->data_where['LIFESTYLE_IMG_10']);
        }
        if (!empty($this->data_where['MAIN_IMAGE'])) {
            array_push($source_data, $this->data_where['MAIN_IMAGE']);
        }
        if (!empty($this->data_where['PRODUCT_IMG_1'])) {
            array_push($source_data, $this->data_where['PRODUCT_IMG_1']);
        }
        if (!empty($this->data_where['PRODUCT_IMG_2'])) {
            array_push($source_data, $this->data_where['PRODUCT_IMG_2']);
        }
        if (!empty($this->data_where['PRODUCT_IMG_3'])) {
            array_push($source_data, $this->data_where['PRODUCT_IMG_3']);
        }
        if (!empty($this->data_where['PRODUCT_IMG_4'])) {
            array_push($source_data, $this->data_where['PRODUCT_IMG_4']);
        }
        if (!empty($this->data_where['PRODUCT_IMG_5'])) {
            array_push($source_data, $this->data_where['PRODUCT_IMG_5']);
        }
        if (!empty($this->data_where['PRODUCT_IMG_6'])) {
            array_push($source_data, $this->data_where['PRODUCT_IMG_6']);
        }
        if (!empty($this->data_where['PRODUCT_IMG_7'])) {
            array_push($source_data, $this->data_where['PRODUCT_IMG_7']);
        }
        if (!empty($this->data_where['PRODUCT_IMG_8'])) {
            array_push($source_data, $this->data_where['PRODUCT_IMG_8']);
        }
        if (!empty($this->data_where['PRODUCT_IMG_9'])) {
            array_push($source_data, $this->data_where['PRODUCT_IMG_9']);
        }
        if (!empty($this->data_where['PACKAGE_FRONT'])) {
            array_push($source_data, $this->data_where['PACKAGE_FRONT']);
        }
        if (!empty($this->data_where['PACKAGE_BACK'])) {
            array_push($source_data, $this->data_where['PACKAGE_BACK']);
        }
        if (!empty($this->data_where['PACKAGE_TOP'])) {
            array_push($source_data, $this->data_where['PACKAGE_TOP']);
        }
        if (!empty($this->data_where['PACKAGE_BOTTOM'])) {
            array_push($source_data, $this->data_where['PACKAGE_BOTTOM']);
        }
        if (!empty($this->data_where['PACKAGE_LEFT'])) {
            array_push($source_data, $this->data_where['PACKAGE_LEFT']);
        }
        if (!empty($this->data_where['PACKAGE_RIGHT'])) {
            array_push($source_data, $this->data_where['PACKAGE_RIGHT']);
        }
        if (!empty($this->data_where['PACKAGE_SHOT_1'])) {
            array_push($source_data, $this->data_where['PACKAGE_SHOT_1']);
        }
        if (!empty($this->data_where['PACKAGE_SHOT_2'])) {
            array_push($source_data, $this->data_where['PACKAGE_SHOT_2']);
        }
        if (!empty($this->data_where['PACKAGE_SHOT_3'])) {
            array_push($source_data, $this->data_where['PACKAGE_SHOT_3']);
        }
        if (!empty($this->data_where['PACKAGE_SHOT_4'])) {
            array_push($source_data, $this->data_where['PACKAGE_SHOT_4']);
        }
        if (!empty($this->data_where['BULLET_POINT_1'])) {
            array_push($source_data, $this->data_where['BULLET_POINT_1']);
        }
        if (!empty($this->data_where['BULLET_POINT_2'])) {
            array_push($source_data, $this->data_where['BULLET_POINT_2']);
        }
        if (!empty($this->data_where['BULLET_POINT_3'])) {
            array_push($source_data, $this->data_where['BULLET_POINT_3']);
        }
        if (!empty($this->data_where['BULLET_POINT_4'])) {
            array_push($source_data, $this->data_where['BULLET_POINT_4']);
        }
        if (!empty($this->data_where['PLASTIC_TYPE'])) {
            array_push($source_data, $this->data_where['PLASTIC_TYPE']);
        }
        if (!empty($this->data_where['PLASTIC_LOCATION'])) {
            array_push($source_data, $this->data_where['PLASTIC_LOCATION']);
        }
        if (!empty($this->data_where['NRF_COLOR_NUMBER'])) {
            array_push($source_data, $this->data_where['NRF_COLOR_NUMBER']);
        }
        if (!empty($this->data_where['NRF_COLOR_NAME'])) {
            array_push($source_data, $this->data_where['NRF_COLOR_NAME']);
        }
        if (!empty($this->data_where['MAX_CHILD_HEIGHT_CM'])) {
            array_push($source_data, $this->data_where['MAX_CHILD_HEIGHT_CM']);
        }
        if (!empty($this->data_where['MAX_CHILD_WEIGHT_KG'])) {
            array_push($source_data, $this->data_where['MAX_CHILD_WEIGHT_KG']);
        }
        if (!empty($this->data_where['PLANWOOD'])) {
            array_push($source_data, $this->data_where['PLANWOOD']);
        }
        if (!empty($this->data_where['CARBON_FOOTPRINT_KG'])) {
            array_push($source_data, $this->data_where['CARBON_FOOTPRINT_KG']);
        }
        if (!empty($this->data_where['CARBON_FOOTPRINT_LBS'])) {
            array_push($source_data, $this->data_where['CARBON_FOOTPRINT_LBS']);
        }

        $get_data = Pt_inv_pif_fg::join('apps.pt_inv_pif_master', 'apps.pt_inv_pif_fg.sku_id', '=', 'apps.pt_inv_pif_master.sku_id');

        if (!empty($this->data_where['LAST_REVISION'])) {
            $get_data->join(
                DB::raw('( SELECT sku_code sku ,max(sku_7digit) as sku_7dig FROM apps.Pt_inv_pif_fg  GROUP BY sku_code) msku'),
                function ($join) {
                    $join->on('apps.Pt_inv_pif_fg.sku_code', '=', 'msku.sku')
                        ->on("apps.Pt_inv_pif_fg.sku_7digit", "=", "msku.sku_7dig");
                }
            );
        }

        $get_data->join("apps.pt_inv_pif_retail_inner", function ($join) {
            $join->on("apps.pt_inv_pif_master.sku_id", "=", "apps.pt_inv_pif_retail_inner.sku_id")
                ->on("apps.pt_inv_pif_master.master_id", "=", "apps.pt_inv_pif_retail_inner.master_id");
        })
            ->select($source_data)
            ->orderby('sku_code', 'asc');

        if (!empty($this->data_where['SKU_7DIGIT'])) {
            $get_data->orderby('sku_7digit', 'asc');
        }

        if (empty($this->data_where['select_all'])) {
            $get_data->whereIn('sku_code', explode(",", $this->data_where['sku_code']));
        } else {
            if (!empty($this->data_where['search'])) {

                $search = mb_strtolower(trim($this->data_where['search']));

                $get_data->where('sku_code', 'LIKE', '%' . $this->data_where['search'] . '%');
                $get_data->Orwhere('sku_name', 'LIKE', '%' . $this->data_where['search'] . '%');
                $get_data->Orwhere('product_year', 'LIKE', '%' . $this->data_where['search'] . '%');
                $get_data->OrwhereRaw("LOWER(category) LIKE '%" . $search . "%'");
                $get_data->OrwhereRaw("LOWER(catalog_status) LIKE '%" . $search . "%'");
                $get_data->Orwhere('age', 'LIKE', '%' . $this->data_where['search'] . '%');
            }
        }


        //customer flter catagory not like DEAD STOCK, OL, OEM, PROMOTION  
        // if (!empty($this->data_where['CATEGORY'])) {
        //     if ((Auth::user()->is_admin == "2")) {
        //         $get_data->where('CATEGORY', 'NOT LIKE', '%DEAD STOCK%');
        //         $get_data->where('CATEGORY','NOT LIKE', '%OL%');
        //         $get_data->where('CATEGORY','NOT LIKE', '%OEM%');
        //         $get_data->where('CATEGORY','NOT LIKE', '%PROMOTION%');
        //     }
        // }



        // var_dump($get_data->get()); die;
        // dd($get_data->get());
        return  $get_data->get();
    }

    public function headings(): array
    {

        $source_header_data = [];

        if (!empty($this->data_where['SKU_CODE'])) {
            array_push($source_header_data, "SKU");
        }
        if (!empty($this->data_where['SKU_7DIGIT'])) {
            array_push($source_header_data, "7 Digit");
        }
        if (!empty($this->data_where['SKU_NAME'])) {
            array_push($source_header_data, "Name - en-US");
        }
        if (!empty($this->data_where['PRODUCT_YEAR'])) {
            array_push($source_header_data, "Product Year");
        }
        if (!empty($this->data_where['CATEGORY'])) {
            array_push($source_header_data, "Category");
        }
        if (!empty($this->data_where['CATALOG_STATUS'])) {
            array_push($source_header_data, "Catalog Status");
        }
        if (!empty($this->data_where['AGE'])) {
            array_push($source_header_data, "Age");
        }
        if (!empty($this->data_where['EAN_BARCODE'])) {
            array_push($source_header_data, "EAN Barcode (on inner box)");
        }
        if (!empty($this->data_where['PRODUCT_WIDTH_INCH'])) {
            array_push($source_header_data, "Width of Product (inch)");
        }
        if (!empty($this->data_where['PRODUCT_LENGTH_INCH'])) {
            array_push($source_header_data, "Length of Product (inch)");
        }
        if (!empty($this->data_where['PRODUCT_HEIGHT_INCH'])) {
            array_push($source_header_data, "Height of Product (inch)");
        }
        if (!empty($this->data_where['PRODUCT_WEIGHT_LBS'])) {
            array_push($source_header_data, "Product Weight (Ibs)");
        }
        if (!empty($this->data_where['SIZE_BIGGEST'])) {
            array_push($source_header_data, "Size of the biggest part");
        }
        if (!empty($this->data_where['PRODUCT_WIDTH_CM'])) {
            array_push($source_header_data, "Product Width (cm.)");
        }
        if (!empty($this->data_where['PRODUCT_LENGTH_CM'])) {
            array_push($source_header_data, "Product Length (cm.)");
        }
        if (!empty($this->data_where['PRODUCT_HEIGHT_CM'])) {
            array_push($source_header_data, "Product Height (cm.)");
        }
        if (!empty($this->data_where['PRODUCT_WEIGHT_KG'])) {
            array_push($source_header_data, "Product Weight(kg.)");
        }
        if (!empty($this->data_where['SKU_DESCRIPTION'])) {
            array_push($source_header_data, "Product Description - en-US");
        }
        if (!empty($this->data_where['CARE_INSTRUCTION'])) {
            array_push($source_header_data, "Care Instruction");
        }
        if (!empty($this->data_where['ASSEMBLY_INSTRUCTION'])) {
            array_push($source_header_data, "Assembly instructions");
        }
        if (!empty($this->data_where['CAUTION_SHEET'])) {
            array_push($source_header_data, "Caution Sheet");
        }
        if (!empty($this->data_where['HOW_TO_PLAY'])) {
            array_push($source_header_data, "How to play");
        }
        if (!empty($this->data_where['AWARD_1'])) {
            array_push($source_header_data, "Award-1");
        }
        if (!empty($this->data_where['AWARD_2'])) {
            array_push($source_header_data, "Award-2");
        }
        if (!empty($this->data_where['AWARD_3'])) {
            array_push($source_header_data, "Award-3");
        }
        if (!empty($this->data_where['AWARD_4'])) {
            array_push($source_header_data, "Award-4");
        }
        if (!empty($this->data_where['AWARD_5'])) {
            array_push($source_header_data, "Award-5");
        }
        if (!empty($this->data_where['AWARD_6'])) {
            array_push($source_header_data, "Award-6");
        }
        if (!empty($this->data_where['CHILD_DEV_1'])) {
            array_push($source_header_data, "Child Development 1");
        }
        if (!empty($this->data_where['CHILD_DEV_2'])) {
            array_push($source_header_data, "Child Development 2");
        }
        if (!empty($this->data_where['CHILD_DEV_3'])) {
            array_push($source_header_data, "Child Development 3");
        }
        if (!empty($this->data_where['CHILD_DEV_4'])) {
            array_push($source_header_data, "Child Development 4");
        }
        if (!empty($this->data_where['CHILD_DEV_5'])) {
            array_push($source_header_data, "Child Development 5");
        }
        if (!empty($this->data_where['CHILD_DEV_6'])) {
            array_push($source_header_data, "Child Development 6");
        }
        if (!empty($this->data_where['MASTER_CODE'])) {
            array_push($source_header_data, "Master Carton - Code");
        }
        if (!empty($this->data_where['MASTER_WIDTH_CM'])) {
            array_push($source_header_data, "Master Carton - Master-Display Size(Outside) - W(cm.)");
        }
        if (!empty($this->data_where['MASTER_DEEP_CM'])) {
            array_push($source_header_data, "Master Carton - Master-Display Size(Outside) - D(cm.)");
        }
        if (!empty($this->data_where['MASTER_HEIGHT_CM'])) {
            array_push($source_header_data, "Master Carton - Master-Display Size(Outside) - H(cm.)");
        }
        if (!empty($this->data_where['MASTER_WIDTH_INCH'])) {
            array_push($source_header_data, "Master Carton - Master-Display Size(Outside) - W(inch)");
        }
        if (!empty($this->data_where['MASTER_DEEP_INCH'])) {
            array_push($source_header_data, "Master Carton - Master-Display Size(Outside) - D(inch)");
        }
        if (!empty($this->data_where['MASTER_HEIGHT_INCH'])) {
            array_push($source_header_data, "Master Carton - Master-Display Size(Outside) - H(inch)");
        }
        if (!empty($this->data_where['MASTER_WEIGHT_KG'])) {
            array_push($source_header_data, "Master Carton - Weight(kgs.)");
        }
        if (!empty($this->data_where['MASTER_WEIGHT_LBS'])) {
            array_push($source_header_data, "Master Carton - Weight(lbs.)");
        }
        if (!empty($this->data_where['MASTER_BOX_TYPE'])) {
            array_push($source_header_data, "Master Carton - Box Type");
        }
        
        array_push($source_header_data, "GTIN");
        
        if (!empty($this->data_where['PER_SET'])) {
            array_push($source_header_data, "SET");
        }
        if (!empty($this->data_where['PER_PIECE'])) {
            array_push($source_header_data, "per Master - PIECE");
        }
        if (!empty($this->data_where['PER_NW_KG'])) {
            array_push($source_header_data, "per Master - NW(kg.)");
        }
        if (!empty($this->data_where['PER_GW_KG'])) {
            array_push($source_header_data, "per Master - GW(kg.)");
        }
        if (!empty($this->data_where['PER_NW_LBS'])) {
            array_push($source_header_data, "per Master - NW(lbs.)");
        }
        if (!empty($this->data_where['PER_GW_LBS'])) {
            array_push($source_header_data, "per Master - GW(lbs.)");
        }
        if (!empty($this->data_where['PER_CUFT'])) {
            array_push($source_header_data, "per Master - CUFT");
        }
        if (!empty($this->data_where['PER_CTNS'])) {
            array_push($source_header_data, "per Master - CTNS/20 FCL");
        }
        if (!empty($this->data_where['RETAIL_CODE'])) {
            array_push($source_header_data, "Retail Box - Code");
        }
        if (!empty($this->data_where['RETAIL_WIDTH_CM'])) {
            array_push($source_header_data, "Retail Box - W(cm.)");
        }
        if (!empty($this->data_where['RETAIL_WIDTH_CM'])) {
            array_push($source_header_data, "Retail Box - D(cm.)");
        }
        if (!empty($this->data_where['RETAIL_WIDTH_CM'])) {
            array_push($source_header_data, "Retail Box - H(cm.)");
        }
        if (!empty($this->data_where['RETAIL_WIDTH_CM'])) {
            array_push($source_header_data, "Retail Box - W(inch)");
        }
        if (!empty($this->data_where['RETAIL_WIDTH_CM'])) {
            array_push($source_header_data, "Retail Box - D(inch)");
        }
        if (!empty($this->data_where['RETAIL_WIDTH_CM'])) {
            array_push($source_header_data, "Retail Box - H(inch)");
        }

        if (!empty($this->data_where['RETAIL_WIDTH_CM'])) {
            array_push($source_header_data, "Width of Retail Package (cm)");
        }
        if (!empty($this->data_where['RETAIL_WIDTH_CM'])) {
            array_push($source_header_data, "Length of Retail Package (cm)");
        }
        if (!empty($this->data_where['RETAIL_WIDTH_CM'])) {
            array_push($source_header_data, "Height of Retail Package (cm)");
        }
        if (!empty($this->data_where['RETAIL_WIDTH_CM'])) {
            array_push($source_header_data, "Width of Retail Package (in)");
        }
        if (!empty($this->data_where['RETAIL_WIDTH_CM'])) {
            array_push($source_header_data, "Length of Retail Package (in)");
        }
        if (!empty($this->data_where['RETAIL_WIDTH_CM'])) {
            array_push($source_header_data, "Height of Retail Package (in)");
        }

        if (!empty($this->data_where['RETAIL_WEIGHT_KG'])) {
            array_push($source_header_data, "Retail Box - Weight(kgs.)");
        }
        if (!empty($this->data_where['RETAIL_WEIGHT_LBS'])) {
            array_push($source_header_data, "Retail Box - Weight(lbs.)");
        }
        if (!empty($this->data_where['RETAIL_BOX_TYPE'])) {
            array_push($source_header_data, "Retail Box - Box Type");
        }
        if (!empty($this->data_where['RETAIL_PACK_BOX'])) {
            array_push($source_header_data, "Retail Box - Pack/Box");
        }
        if (!empty($this->data_where['PRODUCT_RETAIL_W_LBS'])) {
            array_push($source_header_data, "Weight(lbs.) of Product+Retail");
        }
        if (!empty($this->data_where['PRODUCT_RETAIL_W_LBS'])) {
            array_push($source_header_data, "Weight(kg.) of Product+Retail");
        }

        if (!empty($this->data_where['PRODUCT_RETAIL_W_LBS'])) {
            array_push($source_header_data, "Weight of Retail Package (lbs.)");
        }
        if (!empty($this->data_where['PRODUCT_RETAIL_W_LBS'])) {
            array_push($source_header_data, "Weight of Retail Package (kg)");
        }

        if (!empty($this->data_where['INNER_CODE'])) {
            array_push($source_header_data, "Inner Box - Code");
        }
        if (!empty($this->data_where['INNER_WIDTH_CM'])) {
            array_push($source_header_data, "Inner Box - W(cm.)");
        }
        if (!empty($this->data_where['INNER_DEEP_CM'])) {
            array_push($source_header_data, "Inner Box - D(cm.)");
        }
        if (!empty($this->data_where['INNER_HEIGHT_CM'])) {
            array_push($source_header_data, "Inner Box - H(cm.)");
        }
        if (!empty($this->data_where['INNER_WIDTH_INCH'])) {
            array_push($source_header_data, "Inner Box - W(inch)");
        }
        if (!empty($this->data_where['INNER_DEEP_INCH'])) {
            array_push($source_header_data, "Inner Box - D(inch)");
        }
        if (!empty($this->data_where['INNER_HEIGHT_INCH'])) {
            array_push($source_header_data, "Inner Box - H(inch)");
        }
        if (!empty($this->data_where['INNER_WEIGHT_KG'])) {
            array_push($source_header_data, "Inner Box - Weight(kgs.)");
        }
        if (!empty($this->data_where['INNER_WEIGHT_LBS'])) {
            array_push($source_header_data, "Inner Box - Weight(lbs.)");
        }
        if (!empty($this->data_where['INNER_BOX_TYPE'])) {
            array_push($source_header_data, "Inner Box - Box Type");
        }
        if (!empty($this->data_where['INNER_PACK_BOX'])) {
            array_push($source_header_data, "Inner Box - Pack/Unit");
        }
        if (!empty($this->data_where['PIECES_COUNT'])) {
            array_push($source_header_data, "Pieces Count");
        }
        if (!empty($this->data_where['COMPOSITIONS'])) {
            array_push($source_header_data, "Composition");
        }
        if (!empty($this->data_where['PROP65'])) {
            array_push($source_header_data, "PROP65");
        }
        if (!empty($this->data_where['CHOKING_HAZARD'])) {
            array_push($source_header_data, "Choking Hazard");
        }
        if (!empty($this->data_where['WARNING_LABEL'])) {
            array_push($source_header_data, "Warning Label");
        }
        if (!empty($this->data_where['LIST_OF_ACCESSORIES'])) {
            array_push($source_header_data, "List of accessories");
        }
        if (!empty($this->data_where['DIMENSION_CM'])) {
            array_push($source_header_data, "Package Dimension (cm.)");
        }
        if (!empty($this->data_where['DIMENSION_INCH'])) {
            array_push($source_header_data, "Package Dimensions (inch)");
        }
        if (!empty($this->data_where['COLORS'])) {
            array_push($source_header_data, "Colors");
        }
        if (!empty($this->data_where['LIFESTYLE_IMG_1'])) {
            array_push($source_header_data, "Lifestyle Image 1");
        }
        if (!empty($this->data_where['LIFESTYLE_IMG_2'])) {
            array_push($source_header_data, "Lifestyle Image 2");
        }
        if (!empty($this->data_where['LIFESTYLE_IMG_3'])) {
            array_push($source_header_data, "Lifestyle Image 3");
        }
        if (!empty($this->data_where['LIFESTYLE_IMG_4'])) {
            array_push($source_header_data, "Lifestyle Image 4");
        }
        if (!empty($this->data_where['LIFESTYLE_IMG_5'])) {
            array_push($source_header_data, "Lifestyle Image 5");
        }
        if (!empty($this->data_where['LIFESTYLE_IMG_6'])) {
            array_push($source_header_data, "Lifestyle Image 6");
        }
        if (!empty($this->data_where['LIFESTYLE_IMG_7'])) {
            array_push($source_header_data, "Lifestyle Image 7");
        }
        if (!empty($this->data_where['LIFESTYLE_IMG_8'])) {
            array_push($source_header_data, "Lifestyle Image 8");
        }
        if (!empty($this->data_where['LIFESTYLE_IMG_9'])) {
            array_push($source_header_data, "Lifestyle Image 9");
        }
        if (!empty($this->data_where['LIFESTYLE_IMG_10'])) {
            array_push($source_header_data, "Lifestyle Image 10");
        }
        if (!empty($this->data_where['MAIN_IMAGE'])) {
            array_push($source_header_data, "Main Image");
        }
        if (!empty($this->data_where['PRODUCT_IMG_1'])) {
            array_push($source_header_data, "Product Image alt 1");
        }
        if (!empty($this->data_where['PRODUCT_IMG_2'])) {
            array_push($source_header_data, "Product Image alt 2");
        }
        if (!empty($this->data_where['PRODUCT_IMG_3'])) {
            array_push($source_header_data, "Product Image alt 3");
        }
        if (!empty($this->data_where['PRODUCT_IMG_4'])) {
            array_push($source_header_data, "Product Image alt 4");
        }
        if (!empty($this->data_where['PRODUCT_IMG_5'])) {
            array_push($source_header_data, "Product Image alt 5");
        }
        if (!empty($this->data_where['PRODUCT_IMG_6'])) {
            array_push($source_header_data, "Product Image alt 6");
        }
        if (!empty($this->data_where['PRODUCT_IMG_7'])) {
            array_push($source_header_data, "Product Image alt 7");
        }
        if (!empty($this->data_where['PRODUCT_IMG_8'])) {
            array_push($source_header_data, "Product Image alt 8");
        }
        if (!empty($this->data_where['PRODUCT_IMG_9'])) {
            array_push($source_header_data, "Product Image alt 9");
        }
        if (!empty($this->data_where['PACKAGE_FRONT'])) {
            array_push($source_header_data, "Package Shot - Front");
        }
        if (!empty($this->data_where['PACKAGE_BACK'])) {
            array_push($source_header_data, "Package Shot - Back");
        }
        if (!empty($this->data_where['PACKAGE_TOP'])) {
            array_push($source_header_data, "Package Shot - Top");
        }
        if (!empty($this->data_where['PACKAGE_BOTTOM'])) {
            array_push($source_header_data, "Package Shot - Bottom");
        }
        if (!empty($this->data_where['PACKAGE_LEFT'])) {
            array_push($source_header_data, "Package Shot - Left");
        }
        if (!empty($this->data_where['PACKAGE_RIGHT'])) {
            array_push($source_header_data, "Package Shot - Right");
        }
        if (!empty($this->data_where['PACKAGE_SHOT_1'])) {
            array_push($source_header_data, "Package Shot - Angle 1");
        }
        if (!empty($this->data_where['PACKAGE_SHOT_2'])) {
            array_push($source_header_data, "Package Shot - Angle 2");
        }
        if (!empty($this->data_where['PACKAGE_SHOT_3'])) {
            array_push($source_header_data, "Package Shot - Angle 3");
        }
        if (!empty($this->data_where['PACKAGE_SHOT_4'])) {
            array_push($source_header_data, "Package Shot - Angle 4");
        }
        if (!empty($this->data_where['BULLET_POINT_1'])) {
            array_push($source_header_data, "Bullet Point Product 1");
        }
        if (!empty($this->data_where['BULLET_POINT_2'])) {
            array_push($source_header_data, "Bullet Point Product 2");
        }
        if (!empty($this->data_where['BULLET_POINT_3'])) {
            array_push($source_header_data, "Bullet Point Product 3");
        }
        if (!empty($this->data_where['BULLET_POINT_4'])) {
            array_push($source_header_data, "Bullet Point Product 4");
        }
        if (!empty($this->data_where['PLASTIC_TYPE'])) {
            array_push($source_header_data, "Plastic Type");
        }
        if (!empty($this->data_where['PLASTIC_LOCATION'])) {
            array_push($source_header_data, "Plastic Location");
        }
        if (!empty($this->data_where['NRF_COLOR_NUMBER'])) {
            array_push($source_header_data, "NRF Color Number");
        }
        if (!empty($this->data_where['NRF_COLOR_NAME'])) {
            array_push($source_header_data, "NRF Color Name");
        }
        if (!empty($this->data_where['MAX_CHILD_HEIGHT_CM'])) {
            array_push($source_header_data, "Max Child Height (cm)");
        }
        if (!empty($this->data_where['MAX_CHILD_WEIGHT_KG'])) {
            array_push($source_header_data, "Max Child Weight (kg)");
        }
        if (!empty($this->data_where['PLANWOOD'])) {
            array_push($source_header_data, "PlanWood");
        }
        if (!empty($this->data_where['CARBON_FOOTPRINT_KG'])) {
            array_push($source_header_data, "Carbon Footprint (kg)");
        }
        if (!empty($this->data_where['CARBON_FOOTPRINT_LBS'])) {
            array_push($source_header_data, "Carbon Footprint (lbs)");
        }

        return $source_header_data;
    }

    public function registerEvents(): array
    {
        return
            [
                AfterSheet::class    => function (AfterSheet $event) {
                    $position = [];
                    $colors = [];
                    $fcolors = [];
                    $maximumletter = 'ZZ';
                    //loop for push 'A' to 'ZZ' in position array
                    for ($letter = 'A'; $letter < $maximumletter; $letter++) {
                        array_push($position, $letter);
                    }
                    //loop for check data before export and push color follow heading name
                    foreach ($this->headings() as $key => $value) {
                        if ($value == 'SKU') {
                            array_push($colors, "1565C0"); //blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == '7 Digit') {
                            array_push($colors, "1565C0"); //blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Name - en-US') {
                            array_push($colors, "1565C0"); //blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Product Year') {
                            array_push($colors, "1565C0"); //blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Category') {
                            array_push($colors, "1565C0"); //blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Catalog Status') {
                            array_push($colors, "1B5E20"); //green color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Age') {
                            array_push($colors, "1565C0"); //blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'EAN Barcode (on inner box)') {
                            array_push($colors, "1565C0"); //blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Width of Product (inch)') {
                            array_push($colors, "C62828"); //red color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Length of Product (inch)') {
                            array_push($colors, "C62828"); //red color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Height of Product (inch)') {
                            array_push($colors, "C62828"); //red color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Product Weight (Ibs)') {
                            array_push($colors, "C62828"); //red color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Size of the biggest part') {
                            array_push($colors, "C62828"); //red color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Product Width (cm.)') {
                            array_push($colors, "C62828"); //red color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Product Length (cm.)') {
                            array_push($colors, "C62828"); //red color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Product Height (cm.)') {
                            array_push($colors, "C62828"); //red color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Product Weight(kg.)') {
                            array_push($colors, "C62828"); //red color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Product Description - en-US') {
                            array_push($colors, "1565C0"); //blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Care Instruction') {
                            array_push($colors, "FFCC99"); //egg color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Assembly instructions') {
                            array_push($colors, "FFFFCC"); //yellow color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Caution Sheet') {
                            array_push($colors, "FFCC99"); //egg color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'How to play') {
                            array_push($colors, "FFFFCC"); //yellow color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Award-1') {
                            array_push($colors, "CDDC39"); //green color
                            array_push($fcolors, "000000"); //black color
                        }
                        if ($value == 'Award-2') {
                            array_push($colors, "CDDC39"); //green color
                            array_push($fcolors, "000000"); //black color
                        }
                        if ($value == 'Award-3') {
                            array_push($colors, "CDDC39"); //green color
                            array_push($fcolors, "000000"); //black color
                        }
                        if ($value == 'Award-4') {
                            array_push($colors, "CDDC39"); //green color
                            array_push($fcolors, "000000"); //black color
                        }
                        if ($value == 'Award-5') {
                            array_push($colors, "CDDC39"); //green color
                            array_push($fcolors, "000000"); //black color
                        }
                        if ($value == 'Award-6') {
                            array_push($colors, "CDDC39"); //green color
                            array_push($fcolors, "000000"); //black color
                        }
                        if ($value == 'Child Development 1') {
                            array_push($colors, "00838F"); //green mint color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Child Development 2') {
                            array_push($colors, "00838F"); //green mint color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Child Development 3') {
                            array_push($colors, "00838F"); //green mint color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Child Development 4') {
                            array_push($colors, "00838F"); //green mint color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Child Development 5') {
                            array_push($colors, "00838F"); //green mint color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Child Development 6') {
                            array_push($colors, "00838F"); //green mint color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Master Carton - Code') {
                            array_push($colors, "283593"); //dark blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Master Carton - Master-Display Size(Outside) - W(cm.)') {
                            array_push($colors, "283593"); //dark blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Master Carton - Master-Display Size(Outside) - D(cm.)') {
                            array_push($colors, "283593"); //dark blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Master Carton - Master-Display Size(Outside) - H(cm.)') {
                            array_push($colors, "283593"); //dark blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Master Carton - Master-Display Size(Outside) - W(inch)') {
                            array_push($colors, "283593"); //dark blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Master Carton - Master-Display Size(Outside) - D(inch)') {
                            array_push($colors, "283593"); //dark blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Master Carton - Master-Display Size(Outside) - H(inch)') {
                            array_push($colors, "283593"); //dark blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Master Carton - Weight(kgs.)') {
                            array_push($colors, "283593"); //dark blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Master Carton - Weight(lbs.)') {
                            array_push($colors, "283593"); //dark blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Master Carton - Box Type') {
                            array_push($colors, "283593"); //dark blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'GTIN') {
                            array_push($colors, "283593"); //dark blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'SET') {
                            array_push($colors, "FFFFCC"); //yellow color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'per Master - PIECE') {
                            array_push($colors, "AD1457"); //dark pink color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'per Master - NW(kg.)') {
                            array_push($colors, "AD1457"); //dark pink color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'per Master - GW(kg.)') {
                            array_push($colors, "AD1457"); //dark pink color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'per Master - NW(lbs.)') {
                            array_push($colors, "AD1457"); //dark pink color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'per Master - GW(lbs.)') {
                            array_push($colors, "AD1457"); //dark pink color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'per Master - CUFT') {
                            array_push($colors, "AD1457"); //dark pink color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'per Master - CTNS/20 FCL') {
                            array_push($colors, "AD1457"); //dark pink color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Retail Box - Code') {
                            array_push($colors, "EF6C00"); //orange color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Retail Box - W(cm.)') {
                            array_push($colors, "EF6C00"); //orange color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Retail Box - D(cm.)') {
                            array_push($colors, "EF6C00"); //orange color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Retail Box - H(cm.)') {
                            array_push($colors, "EF6C00"); //orange color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Retail Box - W(inch)') {
                            array_push($colors, "EF6C00"); //orange color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Retail Box - D(inch)') {
                            array_push($colors, "EF6C00"); //orange color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Retail Box - H(inch)') {
                            array_push($colors, "EF6C00"); //orange color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Width of Retail Package (cm)') {
                            array_push($colors, "4527A0"); //purple color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Length of Retail Package (cm)') {
                            array_push($colors, "4527A0"); //purple color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Height of Retail Package (cm)') {
                            array_push($colors, "4527A0"); //purple color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Width of Retail Package (in)') {
                            array_push($colors, "4527A0"); //purple color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Length of Retail Package (in)') {
                            array_push($colors, "4527A0"); //purple color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Height of Retail Package (in)') {
                            array_push($colors, "4527A0"); //purple color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Retail Box - Weight(kgs.)') {
                            array_push($colors, "EF6C00"); //orange color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Retail Box - Weight(lbs.)') {
                            array_push($colors, "EF6C00"); //orange color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Retail Box - Box Type') {
                            array_push($colors, "EF6C00"); //orange color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Retail Box - Pack/Box') {
                            array_push($colors, "EF6C00"); //orange color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Weight(lbs.) of Product+Retail') {
                            array_push($colors, "15A646"); //green color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Weight(kg.) of Product+Retail') {
                            array_push($colors, "15A646"); //green color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Weight of Retail Package (lbs.)') {
                            array_push($colors, "4527A0"); //purple color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Weight of Retail Package (kg)') {
                            array_push($colors, "4527A0"); //purple color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Inner Box - Code') {
                            array_push($colors, "1565C0"); //blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Inner Box - W(cm.)') {
                            array_push($colors, "1565C0"); //blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Inner Box - D(cm.)') {
                            array_push($colors, "1565C0"); //blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Inner Box - H(cm.)') {
                            array_push($colors, "1565C0"); //blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Inner Box - W(inch)') {
                            array_push($colors, "1565C0"); //blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Inner Box - D(inch)') {
                            array_push($colors, "1565C0"); //blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Inner Box - H(inch)') {
                            array_push($colors, "1565C0"); //blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Inner Box - Weight(kgs.)') {
                            array_push($colors, "1565C0"); //blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Inner Box - Weight(lbs.)') {
                            array_push($colors, "1565C0"); //blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Inner Box - Box Type') {
                            array_push($colors, "1565C0"); //blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Inner Box - Pack/Unit') {
                            array_push($colors, "1565C0"); //blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Pieces Count') {
                            array_push($colors, "1B5E20"); //green color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Composition') {
                            array_push($colors, "1B5E20"); //green color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'PROP65') {
                            array_push($colors, "FF8F00"); //orenge color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Choking Hazard') {
                            array_push($colors, "FF8F00"); //orenge color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Warning Label') {
                            array_push($colors, "FF8F00"); //orenge color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'List of accessories') {
                            array_push($colors, "1B5E20"); //green color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Package Dimension (cm.)') {
                            array_push($colors, "FFFFCC"); //yellow color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Package Dimensions (inch)') {
                            array_push($colors, "FFCC99"); //egg color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Colors') {
                            array_push($colors, "1B5E20"); //green color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Lifestyle Image 1') {
                            array_push($colors, "D84315"); //red color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Lifestyle Image 2') {
                            array_push($colors, "D84315"); //red color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Lifestyle Image 3') {
                            array_push($colors, "D84315"); //red color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Lifestyle Image 4') {
                            array_push($colors, "D84315"); //red color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Lifestyle Image 5') {
                            array_push($colors, "D84315"); //red color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Lifestyle Image 6') {
                            array_push($colors, "D84315"); //red color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Lifestyle Image 7') {
                            array_push($colors, "D84315"); //red color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Lifestyle Image 8') {
                            array_push($colors, "D84315"); //red color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Lifestyle Image 9') {
                            array_push($colors, "D84315"); //red color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Lifestyle Image 10') {
                            array_push($colors, "FFFFCC"); //yellow color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Main Image') {
                            array_push($colors, "1565C0"); //blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Product Image alt 1') {
                            array_push($colors, "D84315"); //red color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Product Image alt 2') {
                            array_push($colors, "D84315"); //red color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Product Image alt 3') {
                            array_push($colors, "D84315"); //red color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Product Image alt 4') {
                            array_push($colors, "D84315"); //red color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Product Image alt 5') {
                            array_push($colors, "D84315"); //red color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Product Image alt 6') {
                            array_push($colors, "D84315"); //red color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Product Image alt 7') {
                            array_push($colors, "FFFFCC"); //yellow color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Product Image alt 8') {
                            array_push($colors, "FFFFCC"); //yellow color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Product Image alt 9') {
                            array_push($colors, "FFFFCC"); //yellow color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Package Shot - Front') {
                            array_push($colors, "FDD835"); //yellow color
                            array_push($fcolors, "000000"); //black color
                        }
                        if ($value == 'Package Shot - Back') {
                            array_push($colors, "FDD835"); //yellow color
                            array_push($fcolors, "000000"); //black color
                        }
                        if ($value == 'Package Shot - Top') {
                            array_push($colors, "FDD835"); //yellow color
                            array_push($fcolors, "000000"); //black color
                        }
                        if ($value == 'Package Shot - Bottom') {
                            array_push($colors, "FDD835"); //yellow color
                            array_push($fcolors, "000000"); //black color
                        }
                        if ($value == 'Package Shot - Left') {
                            array_push($colors, "FDD835"); //yellow color
                            array_push($fcolors, "000000"); //black color
                        }
                        if ($value == 'Package Shot - Right') {
                            array_push($colors, "FDD835"); //yellow color
                            array_push($fcolors, "000000"); //black color
                        }
                        if ($value == 'Package Shot - Angle 1') {
                            array_push($colors, "FDD835"); //yellow color
                            array_push($fcolors, "000000"); //black color
                        }
                        if ($value == 'Package Shot - Angle 2') {
                            array_push($colors, "FDD835"); //yellow color
                            array_push($fcolors, "000000"); //black color
                        }
                        if ($value == 'Package Shot - Angle 3') {
                            array_push($colors, "FFCC99"); //egg color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Package Shot - Angle 4') {
                            array_push($colors, "FFCC99"); //egg color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Bullet Point Product 1') {
                            array_push($colors, "0277BD"); //blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Bullet Point Product 2') {
                            array_push($colors, "0277BD"); //blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Bullet Point Product 3') {
                            array_push($colors, "0277BD"); //blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Bullet Point Product 4') {
                            array_push($colors, "0277BD"); //blue color
                            array_push($fcolors, "FFFFFF"); //white color
                        }
                        if ($value == 'Plastic Type') {
                            array_push($colors, "FFFFCC"); //yellow color
                            array_push($fcolors, "000000"); //black color
                        }
                        if ($value == 'Plastic Location') {
                            array_push($colors, "FFFFCC"); //yellow color
                            array_push($fcolors, "000000"); //black color
                        }
                        if ($value == 'NRF Color Number') {
                            array_push($colors, "FFCC99"); //egg color
                            array_push($fcolors, "000000"); //black color
                        }
                        if ($value == 'NRF Color Name') {
                            array_push($colors, "FFCC99"); //egg color
                            array_push($fcolors, "000000"); //black color
                        }
                        if ($value == 'Max Child Height (cm)') {
                            array_push($colors, "FFFFCC"); //yellow color
                            array_push($fcolors, "000000"); //black color
                        }
                        if ($value == 'Max Child Weight (kg)') {
                            array_push($colors, "FFFFCC"); //yellow color
                            array_push($fcolors, "000000"); //black color
                        }
                        if ($value == 'PlanWood') {
                            array_push($colors, "FFCC99"); //egg color
                            array_push($fcolors, "000000"); //black color
                        }
                        if ($value == 'Carbon Footprint (kg)') {
                            array_push($colors, "FFFFCC"); //yellow color
                            array_push($fcolors, "000000"); //black color
                        }
                        if ($value == 'Carbon Footprint (lbs)') {
                            array_push($colors, "FFFFCC"); //yellow color
                            array_push($fcolors, "000000"); //black color
                        }
                    }

                    //loop for show color 
                    foreach ($colors as $key => $value) {
                        $event->sheet->getDelegate()->getStyle($position[$key] . '1')->applyFromArray([
                            'fill' => [
                                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                                'color' => ['argb' => $value]
                            ],
                            'font' => [
                                'bold' => true,
                                'color' => ['argb' => $fcolors[$key]]
                            ]
                        ]);

                        if ($this->headings()[$key] == "EAN Barcode (on inner box)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER);
                        }

                        if ($this->headings()[$key] == "Width of Product (inch)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Length of Product (inch)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Height of Product (inch)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Product Weight (Ibs)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Product Width (cm.)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Product Length (cm.)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Product Height (cm.)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Product Weight(kg.)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Master Carton - Master-Display Size(Outside) - W(cm.)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Master Carton - Master-Display Size(Outside) - D(cm.)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Master Carton - Master-Display Size(Outside) - H(cm.)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Master Carton - Master-Display Size(Outside) - W(inch)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Master Carton - Master-Display Size(Outside) - D(inch)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Master Carton - Master-Display Size(Outside) - H(inch)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Master Carton - Weight(kgs.)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Master Carton - Weight(lbs.)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "GTIN") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER);
                        }
                        if ($this->headings()[$key] == "per Master - NW(kg.)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "per Master - GW(kg.)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "per Master - NW(lbs.)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "per Master - GW(lbs.)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "per Master - CUFT") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Retail Box - W(cm.)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Retail Box - D(cm.)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Retail Box - H(cm.)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Retail Box - W(inch)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Retail Box - D(inch)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Retail Box - H(inch)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Width of Retail Package (cm)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Length of Retail Package (cm)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Height of Retail Package (cm)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Width of Retail Package (in)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Length of Retail Package (in)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Height of Retail Package (in)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Retail Box - Weight(kgs.)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Retail Box - Weight(lbs.)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Weight(lbs.) of Product+Retail") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Weight(kg.) of Product+Retail") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Weight of Retail Package (lbs.)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Weight of Retail Package (kg)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Inner Box - W(cm.)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Inner Box - D(cm.)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Inner Box - H(cm.)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Inner Box - W(inch)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Inner Box - D(inch)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Inner Box - H(inch)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Inner Box - Weight(kgs.)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Inner Box - Weight(lbs.)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Carbon Footprint (kg)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                        if ($this->headings()[$key] == "Carbon Footprint (lbs)") {
                            $event->sheet->getStyle($position[$key])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
                        }
                    }
                },
            ];
    }
}
