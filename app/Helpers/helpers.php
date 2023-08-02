<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use Config;
use Illuminate\Support\Str;
use DB;

use Illuminate\Support\Facades\Cache;

class Helper
{
    public static function getLabel($key = null, $code = null)
    {

        $seconds = 1;


        $cache_para  = Cache::remember('_cache-globle', $seconds, function () {
            $cache_para['profile_country'] =   DB::table('Global_Parameters.profile_country')
                ->select(['code_ISO as  id', 'label_eng as label'])
                ->get()->toArray();

            $cache_para['profile_title'] =   DB::table('Global_Parameters.profile_title')
                ->select(['id', 'label_eng as label'])
                ->get()->toArray();

            $cache_para['mb_category'] =   DB::table('Global_Parameters.mb_category')
                ->select(['id', 'label_eng as label'])
                ->get()->toArray();

            $cache_para['mb_scientific_section'] =   DB::table('Global_Parameters.mb_scientific_section')
                ->select(['abr as id', 'label_eng as label'])
                ->where('type_of_section', '=', 'NSSc')
                ->orWhere('type_of_section', '=', 'NSc')
                ->get()->toArray();

            $cache_para['mb_working_groups'] =   DB::table('Global_Parameters.mb_scientific_section')
                ->select(['abr as id', 'label_eng as label'])
                ->where('type_of_section', '=', 'NWk')
                ->get()->toArray();
            $cache_para['mb_union_regions'] =   DB::table('Global_Parameters.mb_union_regions')
                ->select(['code as id', 'label_eng as label'])
                ->get()->toArray();
            $cache_para['mb_category_group'] =   DB::table('Global_Parameters.mb_category_group')
                ->select(['name as id', 'display_name as label'])
                ->get()->toArray();

            $cache_para['union_region'] =   DB::table('Global_Parameters.profile_country')
                ->select(['code_ISO as  id', 'region as label'])
                ->get()->toArray();

            return $cache_para;
        });

        if ($code) :
            /**
             * @find index from laravel array
             * @send label value
             */
            $index = array_search($code, array_column($cache_para[$key], 'id'));

            if (isset($index)) {

                return  $cache_para[$key][$index]->label;
            } else {
                return "";
            }
        else :
            return '';
        endif;
    }

    public static function getCodeNames($key = 'id', $code = 'label')
    {
        $seconds = 1;

        $cache_para  = Cache::remember('_cache-globle', $seconds, function () {

            $cache_para['profile_country'] = DB::table('Global_Parameters.profile_country')
                    ->select(['code_ISO as  id', 'label_eng as label'])
                    ->get()->toArray();

            $cache_para['profile_title'] = DB::table('Global_Parameters.profile_title')
                ->select(['id', 'label_eng as label'])
                ->get()->toArray();

            $cache_para['mb_category'] = DB::table('Global_Parameters.mb_category')
                ->select(['id', 'label_eng as label'])
                ->get()->toArray();

            $cache_para['mb_scientific_section'] = DB::table('Global_Parameters.mb_scientific_section')
                ->select(['abr as id', 'label_eng as label'])
                ->where('type_of_section', '=', 'NSSc')
                ->orWhere('type_of_section', '=', 'NSc')
                ->get()->toArray();

            $cache_para['mb_working_groups'] = DB::table('Global_Parameters.mb_scientific_section')
                ->select(['abr as id', 'label_eng as label'])
                ->where('type_of_section', '=', 'NWk')
                ->get()->toArray();
            $cache_para['mb_union_regions'] = DB::table('Global_Parameters.mb_union_regions')
                ->select(['code as id', 'label_eng as label'])
                ->get()->toArray();
            $cache_para['mb_category_group'] = DB::table('Global_Parameters.mb_category_group')
                ->select(['name as id', 'display_name as label'])
                ->get()->toArray();
            $cache_para['union_region'] = DB::table('Global_Parameters.profile_country')
                ->select(['code_ISO as  id', 'region as label'])
                ->get()->toArray();
            //dd($cache_para);



            //dd($cache_para);
            return $cache_para;
        });
        foreach($cache_para as $key=>$cache_data){


            //dd($cache_data);

            foreach($cache_data as $cache_key=>$cache_details){

                $details[$cache_details->id] = $cache_details->label;

                //print_r($details);
                //print_r($cache_details->id);
                //print_r($cache_details->label);
            }

        }
        //print_r($details["LK"]);
        print_r(array($cache_details->id=>$cache_details->label));

        if ($code) :
            return array($cache_details->id=>$cache_details->label);

        endif;



    }
    public static function getList($key = null)
    {
        $seconds = 3;


        $cache_para   = Cache::remember('cache-globle', $seconds, function () {

            $cache_para['profile_country'] =   DB::table('Global_Parameters.profile_country')
                ->select('code_ISO', 'label_eng', 'region')
                ->get();

            $cache_para['profile_gender'] =   DB::table('Global_Parameters.profile_gender')
                ->select('*')
                ->get();
            $cache_para['mb_category'] =   DB::table('Global_Parameters.mb_category')
                ->select('*')
                ->get();
            $cache_para['mb_union_regions'] =   DB::table('Global_Parameters.mb_union_regions')
                ->select('*')
                ->get();
            $cache_para['profile_organisation_type'] =   DB::table('Global_Parameters.profile_organisation_type')
                ->select(['label_eng'])
                ->get();
            $cache_para['profile_origin'] =   DB::table('global_parameters.profile_origin')
                ->select(['label_eng'])
                ->groupby(['label_eng'])
                ->get();
            $cache_para['mb_category_group'] =   DB::table('global_parameters.mb_category_group')
                ->select(['name'])
                ->groupby(['name'])
                ->get();
            $cache_para['mb_type_of_category'] =   DB::table('global_parameters.mb_category')
                ->select(['type_of_category'])
                ->groupby(['type_of_category'])
                ->get();
            $cache_para['profile_title'] =   DB::table('Global_Parameters.profile_title')
                ->select(['id', 'label_eng'])
                ->get();
            $cache_para['profile_job_category'] =   DB::table('Global_Parameters.profile_job_category')
                ->select(['id', 'label_eng'])
                ->get();
            // $cache_para['user_status'] =   DB::table('identity.users')
            //     ->select(['status'])->groupBy('status')
            //     ->get();

            $cache_para['union_departments'] =   DB::table('Global_Parameters.union_departments')
                ->select(['name_eng'])
                ->get();
            $cache_para['type_of_sections'] =   DB::table('Global_Parameters.mb_scientific_section')
                ->select(['type_of_section'])->groupBy('type_of_section')
                ->get();


            $cache_para['profile_qualification'] =   DB::table('Global_Parameters.profile_qualification')
                ->select(['id', 'label_eng'])
                ->get();
            $cache_para['profile_organisation_type'] =   DB::table('Global_Parameters.profile_organisation_type')
                ->select(['id', 'label_eng'])
                ->get();

            $cache_para['profile_language'] =   DB::table('Global_Parameters.profile_language')
                ->select(['id', 'label_eng'])
                ->get();
            $cache_para['email'] =   DB::table('Global_Parameters.profile_email_subscription')
                ->select(['*'])
                ->get();

            $cache_para['profile_phone_code'] =   DB::table('Global_Parameters.profile_country')
                ->select(['id', 'phonecode', 'label_eng'])
                ->get();
            $cache_para['profile_origin'] =   DB::table('Global_Parameters.profile_origin')
                ->select(['id', 'label_eng'])
                ->get();
            $cache_para['mb_scientific_section'] =   DB::table('Global_Parameters.mb_scientific_section')
                ->select(['label_eng', 'abr', 'id'])
                ->where('type_of_section', '=', 'NSSc')
                ->orWhere('type_of_section', '=', 'NSc')
                ->get();
            $cache_para['mb_scientific_section_NWk'] =   DB::table('Global_Parameters.mb_scientific_section')
                ->select(['label_eng', 'abr', 'id'])
                ->where('type_of_section', '=', 'NWk')
                ->get();

            $cache_para['mb_category_associate'] =   DB::table('Global_Parameters.mb_category')
                ->select(['*'])
                ->where('type_of_membership', '=', 'Associate')
                ->get();
            $cache_para['mb_category_organization'] =   DB::table('Global_Parameters.mb_category')
                ->select(['*'])
                ->where('type_of_membership', '=', 'Individuals')
                ->get();
            $cache_para['membership_data'] =   DB::table('membership.membership')
                ->select(['*'])
                ->get();
            $cache_para['mb_category_indivitual'] =   DB::table('Global_Parameters.mb_category')
                ->select(['*'])
                ->where('type_of_membership', '=', 'Organisational')
                ->get();

            $cache_para['mb_category_type'] =   DB::table('Global_Parameters.mb_category')
                ->select(['type_of_membership'])
                ->groupBy('type_of_membership')
                ->get();
            $cache_para['mb_scientific_section2'] =   DB::table('Global_Parameters.mb_scientific_section')
                ->select(['label_eng'])
                ->groupBy('label_eng')
                ->get();
            $cache_para['membership_category'] =   DB::table('Global_Parameters.mb_category')
                ->select(['type_of_membership'])
                ->groupBy('type_of_membership')
                ->get();

            $cache_para['membership'] =   DB::table('membership.membership')
                ->select(['membership_id', 'membership_renewal_type'])
                ->groupBy('membership_renewal_type', 'membership_id')
                ->get();
            $cache_para['membership_renewal'] =   DB::table('membership.membership')
                ->select(['membership_renewal_type'])
                ->groupBy('membership_renewal_type')
                ->get();
            $cache_para['membership_renewal_status'] =   DB::table('membership.membership')
                ->select(['renewal_status'])
                ->groupBy('renewal_status')
                ->get();
            $cache_para['membership_validity_status'] =   DB::table('membership.membership')
                ->select(['validity_status'])
                ->groupBy('validity_status')
                ->get();
            $cache_para['membership_paymentt'] =   DB::table('membership.membership')
                ->select(['payment_source_tag'])
                ->groupBy('payment_source_tag')
                ->get();
            $cache_para['membership_current_membership'] =   DB::table('membership.membership')
                ->select(['current_membership_category'])
                ->groupBy('current_membership_category')
                ->get();
            $cache_para['membership_share_profile'] =   DB::table('membership.membership')
                ->select(['share_profile_agreed'])
                ->groupBy('share_profile_agreed')
                ->get();
            $cache_para['membership_status'] =   DB::table('membership.membership')
                ->select(['membership_status'])
                ->groupBy('membership_status')
                ->get();
            $cache_para['membership_origin'] =   DB::table('membership.membership')
                ->select(['origin'])
                ->groupBy('origin')
                ->get();
            $cache_para['renewal'] =   DB::table('global_parameters.mb_category')
                ->select(['type_of_category'])
                ->groupBy('type_of_category')
                ->get();
            $cache_para['memberships'] =   DB::table('membership.membership')
                ->select(['*'])
                ->get();

            $cache_para['membership_addons'] =   DB::table('membership.membership_addons')
                ->select(['*'])
                ->get();




            return $cache_para;
        });


        if ($key) :
            return  $cache_para[$key];
        else :
            return null;
        endif;
    }
    public static function applClasses()
    {
        // Demo
        $fullURL = request()->fullurl();
        if (App()->environment() === 'production') {
            for ($i = 1; $i < 7; $i++) {
                $contains = Str::contains($fullURL, 'demo-' . $i);
                if ($contains === true) {
                    $data = config('custom.' . 'demo-' . $i);
                }
            }
        } else {
            $data = config('custom.custom');
        }

        // default data array
        $DefaultData = [
            'mainLayoutType' => 'vertical',
            'theme' => 'light',
            'sidebarCollapsed' => false,
            'navbarColor' => '',
            'horizontalMenuType' => 'floating',
            'verticalMenuNavbarType' => 'floating',
            'footerType' => 'static', //footer
            'layoutWidth' => 'boxed',
            'showMenu' => true,
            'bodyClass' => '',
            'pageClass' => '',
            'pageHeader' => true,
            'contentLayout' => 'default',
            'blankPage' => false,
            'defaultLanguage' => 'en',
            'direction' => env('MIX_CONTENT_DIRECTION', 'ltr'),
        ];

        // if any key missing of array from custom.php file it will be merge and set a default value from dataDefault array and store in data variable
        if (isset($DefaultData) && isset($data)) :
            $data = array_merge($DefaultData, $data);
        else :
            $data = $DefaultData;
        endif;


        // All options available in the template
        $allOptions = [
            'mainLayoutType' => array('vertical', 'horizontal'),
            'theme' => array('light' => 'light', 'dark' => 'dark-layout', 'bordered' => 'bordered-layout', 'semi-dark' => 'semi-dark-layout'),
            'sidebarCollapsed' => array(true, false),
            'showMenu' => array(true, false),
            'layoutWidth' => array('full', 'boxed'),
            'navbarColor' => array('bg-primary', 'bg-info', 'bg-warning', 'bg-success', 'bg-danger', 'bg-dark'),
            'horizontalMenuType' => array('floating' => 'navbar-floating', 'static' => 'navbar-static', 'sticky' => 'navbar-sticky'),
            'horizontalMenuClass' => array('static' => '', 'sticky' => 'fixed-top', 'floating' => 'floating-nav'),
            'verticalMenuNavbarType' => array('floating' => 'navbar-floating', 'static' => 'navbar-static', 'sticky' => 'navbar-sticky', 'hidden' => 'navbar-hidden'),
            'navbarClass' => array('floating' => 'floating-nav', 'static' => 'navbar-static-top', 'sticky' => 'fixed-top', 'hidden' => 'd-none'),
            'footerType' => array('static' => 'footer-static', 'sticky' => 'footer-fixed', 'hidden' => 'footer-hidden'),
            'pageHeader' => array(true, false),
            'contentLayout' => array('default', 'content-left-sidebar', 'content-right-sidebar', 'content-detached-left-sidebar', 'content-detached-right-sidebar'),
            'blankPage' => array(false, true),
            'sidebarPositionClass' => array('content-left-sidebar' => 'sidebar-left', 'content-right-sidebar' => 'sidebar-right', 'content-detached-left-sidebar' => 'sidebar-detached sidebar-left', 'content-detached-right-sidebar' => 'sidebar-detached sidebar-right', 'default' => 'default-sidebar-position'),
            'contentsidebarClass' => array('content-left-sidebar' => 'content-right', 'content-right-sidebar' => 'content-left', 'content-detached-left-sidebar' => 'content-detached content-right', 'content-detached-right-sidebar' => 'content-detached content-left', 'default' => 'default-sidebar'),
            'defaultLanguage' => array('en' => 'en', 'fr' => 'fr', 'de' => 'de', 'pt' => 'pt'),
            'direction' => array('ltr', 'rtl'),
        ];

        //if mainLayoutType value empty or not match with default options in custom.php config file then set a default value
        foreach ($allOptions as $key => $value) {
            if (array_key_exists($key, $DefaultData)) {
                if (gettype($DefaultData[$key]) === gettype($data[$key])) {
                    // data key should be string
                    if (is_string($data[$key])) {
                        // data key should not be empty
                        if (isset($data[$key]) && $data[$key] !== null) {
                            // data key should not be exist inside allOptions array's sub array
                            if (!array_key_exists($data[$key], $value)) {
                                // ensure that passed value should be match with any of allOptions array value
                                $result = array_search($data[$key], $value, 'strict');
                                if (empty($result) && $result !== 0) {
                                    $data[$key] = $DefaultData[$key];
                                }
                            }
                        } else {
                            // if data key not set or
                            $data[$key] = $DefaultData[$key];
                        }
                    }
                } else {
                    $data[$key] = $DefaultData[$key];
                }
            }
        }

        //layout classes
        $layoutClasses = [
            'theme' => $data['theme'],
            'layoutTheme' => $allOptions['theme'][$data['theme']],
            'sidebarCollapsed' => $data['sidebarCollapsed'],
            'showMenu' => $data['showMenu'],
            'layoutWidth' => $data['layoutWidth'],
            'verticalMenuNavbarType' => $allOptions['verticalMenuNavbarType'][$data['verticalMenuNavbarType']],
            'navbarClass' => $allOptions['navbarClass'][$data['verticalMenuNavbarType']],
            'navbarColor' => $data['navbarColor'],
            'horizontalMenuType' => $allOptions['horizontalMenuType'][$data['horizontalMenuType']],
            'horizontalMenuClass' => $allOptions['horizontalMenuClass'][$data['horizontalMenuType']],
            'footerType' => $allOptions['footerType'][$data['footerType']],
            'sidebarClass' => '',
            'bodyClass' => $data['bodyClass'],
            'pageClass' => $data['pageClass'],
            'pageHeader' => $data['pageHeader'],
            'blankPage' => $data['blankPage'],
            'blankPageClass' => '',
            'contentLayout' => $data['contentLayout'],
            'sidebarPositionClass' => $allOptions['sidebarPositionClass'][$data['contentLayout']],
            'contentsidebarClass' => $allOptions['contentsidebarClass'][$data['contentLayout']],
            'mainLayoutType' => $data['mainLayoutType'],
            'defaultLanguage' => $allOptions['defaultLanguage'][$data['defaultLanguage']],
            'direction' => $data['direction'],
        ];
        // set default language if session hasn't locale value the set default language
        if (!session()->has('locale')) {
            app()->setLocale($layoutClasses['defaultLanguage']);
        }

        // sidebar Collapsed
        if ($layoutClasses['sidebarCollapsed'] == 'true') {
            $layoutClasses['sidebarClass'] = "menu-collapsed";
        }

        // blank page class
        if ($layoutClasses['blankPage'] == 'true') {
            $layoutClasses['blankPageClass'] = "blank-page";
        }

        return $layoutClasses;
    }

    public static function updatePageConfig($pageConfigs)
    {
        $demo = 'custom';
        $fullURL = request()->fullurl();
        if (App()->environment() === 'production') {
            for ($i = 1; $i < 7; $i++) {
                $contains = Str::contains($fullURL, 'demo-' . $i);
                if ($contains === true) {
                    $demo = 'demo-' . $i;
                }
            }
        }
        if (isset($pageConfigs)) {
            if (count($pageConfigs) > 0) {
                foreach ($pageConfigs as $config => $val) {
                    Config::set('custom.' . $demo . '.' . $config, $val);
                }
            }
        }
    }
}
