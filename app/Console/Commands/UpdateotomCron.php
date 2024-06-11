<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Pt_inv_pif_log;
use App\Models\Pt_inv_pif_fg;
use App\Models\Pt_inv_pif_master;
use App\Models\Pt_inv_pif_retail_inner;

use App\Models\Pt_inv_pif_log_mysql;
use App\Models\Pt_inv_pif_fg_mysql;
use App\Models\Pt_inv_pif_master_mysql;
use App\Models\Pt_inv_pif_retail_inner_mysql;

use Mail;

class UpdateotomCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upotom:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        $count_fg = 0;
        $count_master = 0;
        $count_retail_inner = 0;
        $count_log = 0;

        $get_data_fg = Pt_inv_pif_fg::where("flag_db" , 0)->get();
        // dd($get_data_fg);
        if(count($get_data_fg) > 0){
            foreach($get_data_fg as $data_fg){
                $get_datainmysql = Pt_inv_pif_fg_mysql::where('sku_code',$data_fg->sku_code)
                                                        ->where('sku_7digit',$data_fg->sku_7digit)
                                                        ->delete();

                $insert_fg = new Pt_inv_pif_fg_mysql;
                $insert_fg->sku_id = $data_fg->sku_id;
                $insert_fg->sku_code = $data_fg->sku_code;
                $insert_fg->sku_7digit = $data_fg->sku_7digit;
                $insert_fg->sku_name = $data_fg->sku_name;
                $insert_fg->product_year = $data_fg->product_year;
                $insert_fg->category = $data_fg->category;
                $insert_fg->catalog_status = $data_fg->catalog_status;
                $insert_fg->age = $data_fg->age;
                $insert_fg->ean_barcode = $data_fg->ean_barcode;
                $insert_fg->flag_dia = $data_fg->flag_dia;
                $insert_fg->product_width_inch = $data_fg->product_width_inch;
                $insert_fg->product_length_inch = $data_fg->product_length_inch;
                $insert_fg->product_height_inch = $data_fg->product_height_inch;
                $insert_fg->product_weight_lbs = $data_fg->product_weight_lbs;
                $insert_fg->size_biggest = $data_fg->size_biggest;
                $insert_fg->product_width_cm = $data_fg->product_width_cm;
                $insert_fg->product_length_cm = $data_fg->product_length_cm;
                $insert_fg->product_height_cm = $data_fg->product_height_cm;
                $insert_fg->product_weight_kg = $data_fg->product_weight_kg;
                $insert_fg->sku_description = $data_fg->sku_description;
                $insert_fg->care_instruction = $data_fg->care_instruction;
                $insert_fg->assembly_instruction = $data_fg->assembly_instruction;
                $insert_fg->caution_sheet = $data_fg->caution_sheet;
                $insert_fg->how_to_play = $data_fg->how_to_play;
                $insert_fg->award_1 = $data_fg->award_1;
                $insert_fg->award_2 = $data_fg->award_2;
                $insert_fg->award_3 = $data_fg->award_3;
                $insert_fg->award_4 = $data_fg->award_4;
                $insert_fg->award_5 = $data_fg->award_5;
                $insert_fg->award_6 = $data_fg->award_6;
                $insert_fg->child_dev_1 = $data_fg->child_dev_1;
                $insert_fg->child_dev_2 = $data_fg->child_dev_2;
                $insert_fg->child_dev_3 = $data_fg->child_dev_3;
                $insert_fg->child_dev_4 = $data_fg->child_dev_4;
                $insert_fg->child_dev_5 = $data_fg->child_dev_5;
                $insert_fg->child_dev_6 = $data_fg->child_dev_6;
                $insert_fg->pieces_count = $data_fg->pieces_count;
                $insert_fg->compositions = $data_fg->compositions;
                $insert_fg->prop65 = $data_fg->prop65;
                $insert_fg->choking_hazard = $data_fg->choking_hazard;
                $insert_fg->warning_label = $data_fg->warning_label;
                $insert_fg->list_of_accessories = $data_fg->list_of_accessories;
                $insert_fg->dimension_cm = $data_fg->dimension_cm;
                $insert_fg->dimension_inch = $data_fg->dimension_inch;
                $insert_fg->colors = $data_fg->colors;
                $insert_fg->lifestyle_img_1 = $data_fg->lifestyle_img_1;
                $insert_fg->lifestyle_img_2 = $data_fg->lifestyle_img_2;
                $insert_fg->lifestyle_img_3 = $data_fg->lifestyle_img_3;
                $insert_fg->lifestyle_img_4 = $data_fg->lifestyle_img_4;
                $insert_fg->lifestyle_img_5 = $data_fg->lifestyle_img_5;
                $insert_fg->lifestyle_img_6 = $data_fg->lifestyle_img_6;
                $insert_fg->lifestyle_img_7 = $data_fg->lifestyle_img_7;
                $insert_fg->lifestyle_img_8 = $data_fg->lifestyle_img_8;
                $insert_fg->lifestyle_img_9 = $data_fg->lifestyle_img_9;
                $insert_fg->lifestyle_img_10 = $data_fg->lifestyle_img_10;
                $insert_fg->main_image = $data_fg->main_image;
                $insert_fg->product_img_1 = $data_fg->product_img_1;
                $insert_fg->product_img_2 = $data_fg->product_img_2;
                $insert_fg->product_img_3 = $data_fg->product_img_3;
                $insert_fg->product_img_4 = $data_fg->product_img_4;
                $insert_fg->product_img_5 = $data_fg->product_img_5;
                $insert_fg->product_img_6 = $data_fg->product_img_6;
                $insert_fg->product_img_7 = $data_fg->product_img_7;
                $insert_fg->product_img_8 = $data_fg->product_img_8;
                $insert_fg->product_img_9 = $data_fg->product_img_9;
                $insert_fg->package_front = $data_fg->package_front;
                $insert_fg->package_back = $data_fg->package_back;
                $insert_fg->package_top = $data_fg->package_top;
                $insert_fg->package_bottom = $data_fg->package_bottom;
                $insert_fg->package_left = $data_fg->package_left;
                $insert_fg->package_right = $data_fg->package_right;
                $insert_fg->package_shot_1 = $data_fg->package_shot_1;
                $insert_fg->package_shot_2 = $data_fg->package_shot_2;
                $insert_fg->package_shot_3 = $data_fg->package_shot_3;
                $insert_fg->package_shot_4 = $data_fg->package_shot_4;
                $insert_fg->bullet_point_1 = $data_fg->bullet_point_1;
                $insert_fg->bullet_point_2 = $data_fg->bullet_point_2;
                $insert_fg->bullet_point_3 = $data_fg->bullet_point_3;
                $insert_fg->bullet_point_4 = $data_fg->bullet_point_4;
                $insert_fg->long_description = $data_fg->long_description;
                $insert_fg->plastic_type = $data_fg->plastic_type;
                $insert_fg->plastic_location = $data_fg->plastic_location;
                $insert_fg->nrf_color_number = $data_fg->nrf_color_number;
                $insert_fg->nrf_color_name = $data_fg->nrf_color_name;
                $insert_fg->max_child_height_cm = $data_fg->max_child_height_cm;
                $insert_fg->max_child_weight_kg = $data_fg->max_child_weight_kg;
                $insert_fg->planwood = $data_fg->planwood;
                $insert_fg->carbon_footprint_kg = $data_fg->carbon_footprint_kg;
                $insert_fg->carbon_footprint_lbs = $data_fg->carbon_footprint_lbs;
                $insert_fg->creation_date = $data_fg->creation_date;
                $insert_fg->created_by = $data_fg->created_by;
                $insert_fg->last_update_date = $data_fg->last_update_date;
                $insert_fg->last_updated_by = $data_fg->last_updated_by;

                if($insert_fg->save()){
                    $update_data_fg = Pt_inv_pif_fg::where('sku_code',$data_fg->sku_code)
                                                    ->where('sku_7digit',$data_fg->sku_7digit)
                                                    ->update(['flag_db' => 1]);
                    $count_fg++;
                }
            }
        }

        $get_data_master = Pt_inv_pif_master::where('flag_db' , 0)->get();

        if(count($get_data_master) > 0){
            foreach($get_data_master as $data_master){

                $get_datainmysql = Pt_inv_pif_master_mysql::where('sku_id',$data_master->sku_id)
                                                            ->where('master_id',$data_master->master_id)
                                                            ->delete();

                $insert_master = new Pt_inv_pif_master_mysql;
                $insert_master->sku_id = $data_master->sku_id;
                $insert_master->master_id = $data_master->master_id;
                $insert_master->master_code = $data_master->master_code;
                $insert_master->master_width_cm = $data_master->master_width_cm;
                $insert_master->master_deep_cm = $data_master->master_deep_cm;
                $insert_master->master_height_cm = $data_master->master_height_cm;
                $insert_master->master_width_inch = $data_master->master_width_inch;
                $insert_master->master_deep_inch = $data_master->master_deep_inch;
                $insert_master->master_height_inch = $data_master->master_height_inch;
                $insert_master->master_weight_kg = $data_master->master_weight_kg;
                $insert_master->master_weight_lbs = $data_master->master_weight_lbs;
                $insert_master->master_box_type = $data_master->master_box_type;
                $insert_master->per_set = $data_master->per_set;
                $insert_master->per_piece = $data_master->per_piece;
                $insert_master->per_nw_kg = $data_master->per_nw_kg;
                $insert_master->per_gw_kg = $data_master->per_gw_kg;
                $insert_master->per_nw_lbs = $data_master->per_nw_lbs;
                $insert_master->per_gw_lbs = $data_master->per_gw_lbs;
                $insert_master->per_cuft = $data_master->per_cuft;
                $insert_master->per_ctns = $data_master->per_ctns;
                $insert_master->creation_date = $data_master->creation_date;
                $insert_master->created_by = $data_master->created_by;
                $insert_master->last_update_date = $data_master->last_update_date;
                $insert_master->last_updated_by = $data_master->last_updated_by;

                if($insert_master->save()){
                    $update_data_master = Pt_inv_pif_master::where('sku_id', $data_master->sku_id)
                                                            ->where('master_id',$data_master->master_id)
                                                            ->update(['flag_db' => 1]);
                    $count_master++;
                }
            }
        }

        $get_data_retail_inner = Pt_inv_pif_retail_inner::where('flag_db' , 0)->get();

        if(count($get_data_retail_inner) > 0){
            foreach($get_data_retail_inner as $data_retail_inner){

                $get_datainmysql = Pt_inv_pif_retail_inner_mysql::where('sku_id',$data_retail_inner->sku_id)
                                                                ->where('retail_code',$data_retail_inner->retail_code)
                                                                ->where('master_id',$data_retail_inner->master_id)
                                                                ->delete();

                $insert_retail_inner = new Pt_inv_pif_retail_inner_mysql;
                $insert_retail_inner->sku_id = $data_retail_inner->sku_id;
                $insert_retail_inner->master_id = $data_retail_inner->master_id;
                $insert_retail_inner->retail_code = $data_retail_inner->retail_code;
                $insert_retail_inner->retail_width_cm = $data_retail_inner->retail_width_cm;
                $insert_retail_inner->retail_deep_cm = $data_retail_inner->retail_deep_cm;
                $insert_retail_inner->retail_height_cm = $data_retail_inner->retail_height_cm;
                $insert_retail_inner->retail_width_inch = $data_retail_inner->retail_width_inch;
                $insert_retail_inner->retail_deep_inch = $data_retail_inner->retail_deep_inch;
                $insert_retail_inner->retail_height_inch = $data_retail_inner->retail_height_inch;
                $insert_retail_inner->retail_weight_kg = $data_retail_inner->retail_weight_kg;
                $insert_retail_inner->retail_weight_lbs = $data_retail_inner->retail_weight_lbs;
                $insert_retail_inner->retail_box_type = $data_retail_inner->retail_box_type;
                $insert_retail_inner->retail_pack_box = $data_retail_inner->retail_pack_box;
                $insert_retail_inner->product_retail_w_lbs = $data_retail_inner->product_retail_w_lbs;
                $insert_retail_inner->product_retail_w_kg = $data_retail_inner->product_retail_w_kg;
                $insert_retail_inner->inner_code = $data_retail_inner->inner_code;
                $insert_retail_inner->inner_width_cm = $data_retail_inner->inner_width_cm;
                $insert_retail_inner->inner_deep_cm = $data_retail_inner->inner_deep_cm;
                $insert_retail_inner->inner_height_cm = $data_retail_inner->inner_height_cm;
                $insert_retail_inner->inner_width_inch = $data_retail_inner->inner_width_inch;
                $insert_retail_inner->inner_deep_inch = $data_retail_inner->inner_deep_inch;
                $insert_retail_inner->inner_height_inch = $data_retail_inner->inner_height_inch;
                $insert_retail_inner->inner_weight_kg = $data_retail_inner->inner_weight_kg;
                $insert_retail_inner->inner_weight_lbs = $data_retail_inner->inner_weight_lbs;
                $insert_retail_inner->inner_box_type = $data_retail_inner->inner_box_type;
                $insert_retail_inner->inner_pack_box = $data_retail_inner->inner_pack_box;
                $insert_retail_inner->creation_date = $data_retail_inner->creation_date;
                $insert_retail_inner->created_by = $data_retail_inner->created_by;
                $insert_retail_inner->last_update_date = $data_retail_inner->last_update_date;
                $insert_retail_inner->last_updated_by = $data_retail_inner->last_updated_by;

                if($insert_retail_inner->save()){
                    $update_data_retail_inner = Pt_inv_pif_retail_inner::where('sku_id', $data_retail_inner->sku_id)
                                                                        ->where('retail_code',$data_retail_inner->retail_code)
                                                                        ->where('master_id',$data_retail_inner->master_id)
                                                                        ->update(['flag_db' => 1]);
                    $count_retail_inner++;
                }
            }
        }

        $get_data_log = Pt_inv_pif_log::where('flag_db' , 0)->get();

        if(count($get_data_log) > 0){
            foreach($get_data_log as $data_log){

                // $get_datainmysql = Pt_inv_pif_log_mysql::where('sku_id',$data_log->sku_id)->delete();

                $insert = new Pt_inv_pif_log_mysql;
                $insert->update_id = $data_log->update_id;
                $insert->sku_id = $data_log->sku_id;
                $insert->column_name = $data_log->column_name;
                $insert->old_data = $data_log->old_data;
                $insert->new_data = $data_log->new_data;
                $insert->update_date = $data_log->update_date;
                $insert->updated_by = $data_log->updated_by;

                if($insert->save()){
                    $update_data_log = Pt_inv_pif_log::where('sku_id', $data_log->sku_id)->update(['flag_db' => 1]);
                    $count_log++;
                }               
            }
        }   

        if($count_fg == 0 && $count_master == 0 && $count_retail_inner == 0 && $count_log == 0){
            $status = "error";
        }else{
            $status = "success";
        }
        
        if($count_fg == 0 && $count_master == 0 && $count_retail_inner == 0 && $count_log == 0){

            \Log::info("No Data Transfer From Oracle To MySQL");
            
        }else{
            
            \Log::info("Update Oracle To MySQL");

            $mail_data = [  'count_fg' => number_format($count_fg), 
                            'count_master' => number_format($count_master), 
                            'count_retail_inner' => number_format($count_retail_inner), 
                            'count_log' => number_format($count_log)
                        ];

            \Mail::send('email.update_otm', ['mail_data' => $mail_data] , function($message){
                $message->to('Kittiphit@plantoys.com')
                        ->subject('Cron Job Update Database in '.date('d-M-Y H:i:s'));
            });
        
            \Log::info('Cron Cummand Update Oracle To MySQL Run Successfully!');

        }

    }
}
